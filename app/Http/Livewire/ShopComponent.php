<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShopComponent extends Component
{
    public // Sidebar variables
    $category,
    $brandFilter = [];

    public 
    $shop;

    protected $listeners = [
        'alert'=>'$refresh'
    ];


    public function mount(){
        $result = curlOut(''.domain('8080').'/api/category','GET');
        $this->category = $result['success'];
        
        if (isset($this->category)) {
            $this->setActiveBrand();
        }
    }

    public function addToCart($id){
        if (session()->has('cart')) {
            $inCart = false;
            foreach (session('cart') as $item) {
                if ($item['id'] == $id) {
                    $inCart = true;
                }
            }
            if (!$inCart) {
                // dd($this->shop);
                foreach ($this->shop as $product) {
                    if ($product['id'] == $id) {
                        session()->push('cart',[
                            'id'=>$id,
                            'name'=>$product['name'],
                            'price'=>$product['price'],
                            'qty'=>1
                        ]);
                    }
                }
                $this->emit('alert');
            } else {
                # code...
            }
            
        } else {
            // dd($this->shop);
            foreach ($this->shop as $product) {
                if ($product['id'] == $id) {
                    session()->push('cart',[
                        'id'=>$id,
                        'name'=>$product['name'],
                        'price'=>$product['price'],
                        'qty'=>2
                    ]);
                }
            }
            $this->emit('alert','1');
        }
        
    }

    public function setActiveBrand($brandId = null){
        if (!$brandId) {
            $shop = curlOut(''.domain('8080').'/api/product','GET');
            if ($shop['success']) {
                $this->shop = $shop['success'];
            } else {
                # code...
            }
            $this->brandFilter[0] = 'filter-link active';
        }else{
            $shop = curlOut(''.domain('8080').'/api/product/category/'.$brandId.'','GET');
            if ($shop['success']) {
                $this->shop = $shop['success'];
            } else {
                # code...
            }
            $this->brandFilter[0] = 'filter-link';
        }

        for ($i=1; $i <= count($this->category); $i++) { 
            if ($brandId && $brandId == $i) {
                $this->brandFilter[$i] = 'filter-link active';
            } else {
                $this->brandFilter[$i] = 'filter-link';
            }
            
        }
    }

    public function render()
    {
        return view('livewire.shop-component')->layout('layouts.base');
    }
}
