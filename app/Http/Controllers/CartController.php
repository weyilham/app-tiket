<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //

    public function addCart(Request $request)
    {
        $tiket = Tiket::where('id', $request->id)->first();
        // dd($tiket->id);
        Cart::add($tiket->id, $tiket->kategori, 1, $tiket->harga, 0);
        return view('livewire.cart.item-cart');
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return response()->json(array('jumCart' => Cart::count(), 'total' => Cart::subtotal()));
    }

    public function destroy()
    {
        Cart::destroy();
        return response()->json(['carts' => "<p class='text-danger'>Belum ada item yang di pesan</p>", 'jumCart' => Cart::count()]);
    }
}
