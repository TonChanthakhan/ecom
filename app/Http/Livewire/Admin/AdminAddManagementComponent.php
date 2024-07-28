<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAddManagementComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required|confirmed|min:8',

        ]);
    }

    public function addManagement(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required|confirmed|min:8',

        ]);

        $manager = new User();
        $manager->name = $this->name;
        $manager->email = $this->email;
        $manager->password = bcrypt($this->password);
        $manager->utype = 'ADM';
        $manager->save();
        session()->flash('success','ສຳເລັດແລ້ວ');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-management-component')->layout('layouts.base');
    }
}
