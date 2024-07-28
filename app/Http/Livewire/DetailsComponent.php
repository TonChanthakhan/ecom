<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Models\OderItem;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public $satt=[];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($products_id,$products_name,$products_price)
    {
        Cart::instance('cart')->add($products_id,$products_name,$this->qty,$products_price,$this->satt)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('products.cart');
    }

    public function inceaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function addToWishlist($products_id,$products_name,$products_price)
    {
        Cart::instance('wishlist')->add($products_id,$products_name,1,$products_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeFromWishlist($products_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $products_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = Product::inRandomOrder()->limit(4)->get();
        $related_product = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.detail-component',['product' => $product,'popular_products'=>$popular_product,'related_products'=>$related_product,'sale'=>$sale])->layout('layouts.base');
    }
}
