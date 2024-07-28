<?php

namespace App\Http\Livewire\Admin;

use App\Models\PurchaseOrder;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class AdminPurchaseOrderComponent extends Component
{

    public function updateOrderStatus($purchaseorder_id,$status)
    {
        $purchaseorder = PurchaseOrder::find($purchaseorder_id);
        $purchaseorder->status = $status;

        $purchaseorder->save();

    }
    public function render()
    {
        $purchaseorders = PurchaseOrder::with('supplier')
        ->orderBy('created_at', 'DESC')->paginate(12);


        return view('livewire.admin.admin-purchase-order-component',['purchaseorders'=>$purchaseorders])->layout('layouts.base');
    }
}
