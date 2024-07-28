<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminReportOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('status','delivered')->orderBy('created_at', 'DESC')->get()->take(12);
        return view('livewire.admin.admin-report-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
