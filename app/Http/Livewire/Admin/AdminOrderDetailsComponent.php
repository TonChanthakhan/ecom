<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->$order_id = $order_id;
    }
    public function deliveyOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'delivered';
        $order->delivered_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message', 'Order has been delivered!');
    }

    public function cancelOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message', 'Order has been canceled!');
    }

    public function render()
    {
        $orders = Order::findOrFail($this->order_id);
        return view('livewire.admin.admin-order-details-component',['orders'=>$orders])->layout('layouts.base');
    }
}
