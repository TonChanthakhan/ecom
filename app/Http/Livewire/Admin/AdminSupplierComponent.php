<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class AdminSupplierComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        session()->flash('message','Product has been Deleted successfully');
    }

    public function render()
    {
        $suppliers = Supplier::paginate(10);
        return view('livewire.admin.admin-supplier-component',['suppliers'=>$suppliers])->layout('layouts.base');
    }
}
