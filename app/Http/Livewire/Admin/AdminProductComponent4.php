<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Llivewire\WithPagination;

class AdminProductComponent4 extends Component
{
    public function render()
    {
        $products =  Product::paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
