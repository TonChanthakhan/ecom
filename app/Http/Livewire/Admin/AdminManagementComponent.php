<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminManagementComponent extends Component
{
    public function render()
    {
        $managers = User::where('utype', 'ADM')->orderBy('id','asc')->paginate(10);
        return view('livewire.admin.admin-management-component',['managers'=>$managers])->layout('layouts.base');
    }
}
