<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
    public 
    $cartItems,
    $shipping,
    $hasPromo,
    $promoCode,
    $discount,
    $checkSubtotal,
    $checkTotal,
    $createAccount,
    $subtotal = [];

    protected $listeners = [
        'refresh'=>'$refresh'
    ];

    // public function mount(){
    // }

    public function clearCart(){
        session()->flush('cart');
        redirecto('shop');
    }

    public function productPrice($price,$qty){
        if (!$qty) {
            return $price;
        }
        return $price * $qty;
    }

    public function qty($type,$id,$count){
        $cart = CartItems();
        foreach ($cart as $product) {
            if ($product['id'] == $id) {
                if ($type == '+') {
                    session(['cart.'.$count.'.qty'=> ++$product['qty']]);
                } else {
                    session(['cart.'.$count.'.qty'=> --$product['qty']]);
                }
                $this->emit('refresh');
            }
        }
    }

    public function subtotal($count,$price){
        $this->subtotal[$count] = $price;
    }

    public function checkSubtotal(){
        return array_sum($this->subtotal);
    }

    public function checkTotal(){

        if ($this->shipping) {
            // return $this->shipping + array_sum($this->subtotal);
        }

        if ($this->discount) {
            return [
                'total' => array_sum($this->subtotal),
                'discount' => array_sum($this->subtotal) - (array_sum($this->subtotal) * ($this->discount/100))
            ];
        }

        if ($this->shipping && $this->discount) {
            // return array_sum($this->subtotal);
        }

        return [
            'total' => array_sum($this->subtotal)
        ];
    }

    public function deleteFromCart($id){
        session()->forget('cart.'.$id.'');
        $this->emit('alert');
    }

    public function render()
    {
        if ($this->promoCode) {
            $isValid = curlOut(''.domain('8080').'/api/promo/'.$this->promoCode.'','GET');
            if (isset($isValid['success'])) {
                $this->discount = $isValid['success'];
                session(['promoSuccess' => $isValid['success']]);
            } else{
                $this->discount = false;
                session(['promoError' => 'Invalid Code!']);
            }
        }

        $cartItems = CartItems();
        if ($cartItems) {
            $this->subtotal = []; // reset subtotal array
            $this->cartItems = $cartItems;
            $count = 0;
            foreach ($cartItems as $item) {
                $this->subtotal($count,$this->productPrice($item['price'],$item['qty']));
                ++$count;
            }
        } 

        $this->checkSubtotal = $this->checkSubtotal();
        $this->checkTotal = $this->checkTotal();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
