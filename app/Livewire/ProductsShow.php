<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsShow extends Component
{
    public function render()
    {
        $products = Product ::paginate(10);
        return view('livewire.products-show',compact ("products"));
    }
}
