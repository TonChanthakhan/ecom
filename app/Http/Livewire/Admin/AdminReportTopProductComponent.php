<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class AdminReportTopProductComponent extends Component
{
    public function render()
    {

        $topfives = DB::table('products')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as total_sold'),DB::raw('SUM(order_items.price) as total_price'))
        ->groupBy('products.id', 'products.name')
        ->orderByDesc('total_sold')
        ->limit(5) // Adjust as per your requirement
        ->get();
        return view('livewire.admin.admin-report-top-product-component',['topfives'=>$topfives])->layout('layouts.base');
    }
}
