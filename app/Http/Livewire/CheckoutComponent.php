<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Exception;
use App\Models\Product;
use App\Http\Livewire\DB;
use App\Http\Livewire\Session;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class CheckoutComponent extends Component
{
    use WithFileUploads;
    public $ship_to_differrent;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    // public $city;
    // public $province;
    // public $country;
    // public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            // 'city' => 'required',
            // 'province' => 'required',
            // 'country' => 'required',
            // 'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->ship_to_differrent)
        {
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

        }

        if($this->paymentmode == 'card')
        {
            $this->validateOnly($fields,[
                'card_no' => 'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year' =>'required|numeric',
                'cvc' => 'required|numeric',

            ]);
        }

        if($this->paymentmode == 'BCEL')
        {
            $this->validateOnly($fields,[
                'image' => 'required|mimes:jpeg,png',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'line2' => 'required',
            // 'city' => 'required',
            // 'province' => 'required',
            // 'country' => 'required',
            // 'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->paymentmode == 'card')
        {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year' =>'required|numeric',
                'cvc' => 'required|numeric',

            ]);
        }

        if($this->paymentmode == 'BCEL')
        {
            $this->validate([
                'image' => 'required|mimes:jpeg,png',
            ]);
        }

        \DB::beginTransaction();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        // $order->city = $this->city;
        // $order->province = $this->province;
        // $order->country = $this->country;
        // $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_differrent ? 1:0;
        $order->save();

        $validationErrors = [];
        foreach(Cart::instance('cart')->content() as $item)
        {
            $product = Product::findOrFail($item->id);
            if ($product->quantity < $item->qty) {

                $validationErrors[] = "ສິນຄ້າ {$product->name} ໃນຮ້ານບໍ່ພຽງພໍ, ຈຳນວນທີ່ທ່ານຕ້ອງການ: {$item->qty} , ຈຳນວນສິນຄ້າທີ່ຄົງເຫຼືອໃນຮ້ານ: {$product->quantity}";
                \DB::rollback();
            }else{
                $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price * $item->qty;
            if($item->options)
            {
                $orderItem->options = serialize($item->options);
            }

            $orderItem->save();
            $product->decrement('quantity', $item->qty);

            }

            // \DB::table('products')->where('id', '=', $orderItem->product_id)->decrement('quantity', $orderItem->quantity);

            if($product->quantity == 0 && $product->stock_status !='outofstock'){
                $product->stock_status = 'outofstock';
            }else if($product->quantity > 0 && $product->stock_status =='outofstock'){
                $product->stock_status = 'instock';
            }
            $product->saveQuietly();
        }



        if (!empty($validationErrors)) {
            Session()->flash('errors', $validationErrors);
            return redirect()->back();
        }

        \DB::commit();

        if($this->ship_to_differrent)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;

            $shipping->save();
        }

        if($this->paymentmode == 'cod')
        {
            $this->makeTransation($order->id, 'pending');
            $this->resetCart();
        }
        else if($this->paymentmode == 'card')
        {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try{

                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);

                if(!isset($token['id']))
                {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->firstname . ' ' .$this->lastname,
                    'email' =>$this->email,
                    'phone' =>$this->mobile,
                    'address' => [
                        'line1' =>$this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country,
                    ],
                    'shipping' => [
                        'name' => $this->firstname . ' ' .$this->lastname,
                        'address' => [
                            'line1' =>$this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country,
                        ],
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no' . $order->id
                ]);

                if($charge['status'] == 'succeeded')
                {
                    $this->makeTransation($order->id, 'approved');
                    $this->resetCart();
                }

                else
                {
                    session()->flash('stripe-error', 'Error in Transaction!');
                    $this->thankyou = 0;
                }
            }  catch(Exception $e){
                \DB::rollback();
                session()->flash('stripe-error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
        else if($this->paymentmode == 'BCEL'){

            $this->makeTransation($order->id, 'pending');
            $this->resetCart();
        }




        // $this->sendOrderConfirmationMaill($order);


    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransation($order_id,$status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
         if($this->image){
             $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
             $this->image->storeAs('transactions',$imageName);
             $transaction->image = $imageName;
         }
        $transaction->save();
    }

    public function sendOrderConfirmationMaill($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('products.cart');
        }

    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
