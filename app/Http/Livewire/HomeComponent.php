<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    protected $listeners = [
        'addToCart'=>'toCart'
    ];

    public function toCart(){
        dd('added');
    }

    public function render()
    {
        return view('livewire.home-component')->layout('layouts.base');
    }
}
