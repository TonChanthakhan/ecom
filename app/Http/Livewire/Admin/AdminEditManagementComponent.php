<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminEditManagementComponent extends Component
{
    public $name;
    public $email;
    public $new_password;
    public $new_password_confirmation;

    public $management_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'new_password'=> 'required|confirmed|min:8',

        ]);
    }

    public function mount($management_id)
    {

        $manager = User::find($management_id);
        $this->name = $manager->name;
        $this->email = $manager->email;
    }

    public function updateManagement(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'new_password'=> 'required|confirmed|min:8',

        ]);

        $manager = User::find($this->management_id);
        $manager->name = $this->name;
        $manager->email = $this->email;
        $manager->password = bcrypt($this->new_password);
        $manager->save();
        if($manager->save())
        {
            return redirect('/admin/management');
        }

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-management-component')->layout('layouts.base');
    }
}
