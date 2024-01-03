<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class FooterCart extends Component
{
    public $jumlah = 2;
    // public function mount($jumlah)
    // {
    //     $this->jumlah = $jumlah;
    // }
    public function render()
    {
        // dd($this->jumlah);
        return view('livewire.cart.footer-cart');
    }
}
