<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemCart extends Component
{
    public $jumlah = 1;
    public function render()
    {
        return view('livewire.cart.item-cart', [
            'carts' => Cart::content()
        ]);
    }

    public function increment()
    {
        $this->jumlah++;
    }

    public function decrement()
    {
        $this->jumlah--;
    }
}
