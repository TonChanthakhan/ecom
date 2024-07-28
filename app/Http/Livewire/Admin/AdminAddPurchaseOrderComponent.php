<?php

namespace App\Http\Livewire\Admin;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\Supplier;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminAddPurchaseOrderComponent extends Component
{
    public $searchTerm;
    use WithPagination;

    public $supplier;
    public $quantity;
    public $selectedProducts = [];

    public $unit = [];




    public function add($productId)
    {

        if ($this->selectedProducts[$productId] == false) {
            // If selected, remove it from the array (deselect)
            unset($this->selectedProducts[$productId]);

        } else {
            $product = Product::find($productId);
            if ($product) {

                $this->selectedProducts[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    // Add other necessary details here
                ];
            }

        }
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'supplier' => 'required',

        ]);

        if($this->selectedProducts)
        {
            $this->validateOnly($fields,[
                'selectedProducts' => 'required|array',
            'quantity.*' => 'required|integer',
            'unit.*' => 'required',
            ]);
        }
    }

    public function addPurchaseOrder(){

        // dd($this->selectedProducts, $this->unit, $this->quantity);
        $this->validate([
            'supplier' => 'required',

       ]);

       if($this->selectedProducts)
        {
            $this->validate([
                'selectedProducts' => 'required|array',
            'quantity.*' => 'required|integer',
            'unit.*' => 'required',
            ]);
        }

       $purchaseorder = new PurchaseOrder();
       $purchaseorder->supp_id  = $this->supplier;
       $purchaseorder->status = 'pending';
       $purchaseorder->save();

       foreach ($this->selectedProducts as $item) {

        $purchaseorderdetail = new PurchaseOrderDetail();
        $purchaseorderdetail->purchase_order_id  = $purchaseorder->id;
        $purchaseorderdetail->supplier_id = $purchaseorder->supp_id;
        $purchaseorderdetail->product_id = $item['id'];
        $purchaseorderdetail->quantity = $this->quantity[$item['id']];
        $purchaseorderdetail->unit = $this->unit[$item['id']];
        $purchaseorderdetail->save();
       }



       return redirect()->route('admin.purchaseorder');
    }
    public function render()
    {
        $suppliers = Supplier::All();
        $search = '%' . $this->searchTerm . '%';
        $products = Product::where('name', 'LIKE', $search)
            ->orWhere('stock_status', 'LIKE', $search)
            ->orWhere('regular_price', 'LIKE', $search)
            ->orWhere('sale_price', 'LIKE', $search)
            ->orderBy('quantity', 'ASC')->paginate(10);
        return view('livewire.admin.admin-add-purchase-order-component', ['products' => $products, 'suppliers' => $suppliers])->layout('layouts.base');
    }
}
