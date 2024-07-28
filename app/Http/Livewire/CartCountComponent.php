<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\DB;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
