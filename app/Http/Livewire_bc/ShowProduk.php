<?php

namespace App\Http\Livewire;

use App\Models\Tiket;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowProduk extends Component
{
    public $item;
    public function mount($item)

    {
        $this->item = $item;
    }
    public function render()
    {

        return view('livewire.show-produk', [
            'tiket' => Tiket::all(),
        ]);
    }

    public function addCart($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        Cart::add($tiket->id, $tiket->kategori, 1, $tiket->harga, 0);
        // dd(Cart::content());
        $this->emit('cartAdd');
        // return view('livewire.cart.item-cart');
    }
}
