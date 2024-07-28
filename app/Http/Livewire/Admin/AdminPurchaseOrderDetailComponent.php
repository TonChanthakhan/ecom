<?php

namespace App\Http\Livewire\Admin;

use App\Models\PurchaseOrder;
use Livewire\Component;

class AdminPurchaseOrderDetailComponent extends Component
{
    public $purchaseorder_id;

    public function mount($purchaseorder_id)
    {
        $this->$purchaseorder_id = $purchaseorder_id;
    }

    // public function deliveyOrders()
    // {
    //     $porder = PurchaseOrder::find($this->purchaseorder_id);
    //     $porder->status = 'confirmed';
    //     $porder->save();
    //     session()->flash('order_message', 'purchaseorder has been confirmed!');
    // }

    // public function cancelOrders()
    // {
    //     $porder = PurchaseOrder::find($this->purchaseorder_id);
    //     $porder->status = 'canceled';
    //     $porder->save();
    //     session()->flash('order_message', 'purchaseorder has been canceled!');
    // }
    public function render()
    {
        $porder = PurchaseOrder::find($this->purchaseorder_id);
        return view('livewire.admin.admin-purchase-order-detail-component',['porder'=>$porder])->layout('layouts.base');
    }
}
