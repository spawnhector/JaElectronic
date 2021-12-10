<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartBucket extends Component
{
    public 
    $itemCount;

    protected $listeners = [
        'alert'=>'$refresh'
    ];

    // public function mount(){
    //     $cartItems = CartItems();
    //     if ($cartItems) {
    //         $this->itemCount = count($cartItems);
    //     } 
    // }

    public function render()
    {
        $cartItems = CartItems();
        if ($cartItems) {
            $this->itemCount = count($cartItems);
        } 
        return view('livewire.cart-bucket');
    }
}
