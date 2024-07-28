<?php

namespace App\Http\Livewire\Admin;

use App\Models\PurchaseOrder;
use Livewire\Component;

class AdminReportPurchaseOrderComponent extends Component
{
    public function render()
    {
        $purchaseorders = PurchaseOrder::with('supplier')->WHERE('status','confirmed')
        ->orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-report-purchase-order-component',['purchaseorders'=>$purchaseorders])->layout('layouts.base');
    }
}
