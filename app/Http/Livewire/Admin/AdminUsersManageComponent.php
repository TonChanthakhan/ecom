<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUsersManageComponent extends Component
{

    public function deleteUser($id)
    {

        $user = User::find($id);
        $user->delete();
        session()->flash ('message', 'user has been deleted successfully!');
    }
    public function render()
    {
        $users = User::where('utype', 'USR')->orderBy('id','asc')->paginate(10);
        return view('livewire.admin.admin-users-manage-component',['users'=>$users])->layout('layouts.base');
    }
}
