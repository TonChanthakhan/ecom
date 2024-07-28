<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Supplier;

class AdminAddSupplierComponent extends Component
{

    use WithFileUploads;
    public $name;
    public $email;
    public $address;
    public $tel;


    public function addSupplier()
    {
        $this->validate([
             'name' => 'required',
             'email' => 'required',
             'address' => 'required',
             'tel' => 'required',


        ]);
        $supplier = new Supplier();
        $supplier->name = $this->name;
        $supplier->email = $this->email;
        $supplier->address = $this->address;
        $supplier->tel = $this->tel;
        $supplier->save();
        session()->flash('message','Product has been created successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-supplier-component')->layout('layouts.base');
    }
}
