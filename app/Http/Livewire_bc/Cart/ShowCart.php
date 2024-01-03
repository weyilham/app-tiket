<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowCart extends Component
{
    protected $listeners = ['cartAdd' => 'render'];
    public function render()
    {
        return view('livewire.cart.show-cart');
    }

    public function clearCart()
    {
        Cart::destroy();
        // return view('livewire.cart.item-cart');
    }
}
