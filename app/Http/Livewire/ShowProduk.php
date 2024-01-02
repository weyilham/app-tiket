<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProduk extends Component
{
    public function render()
    {
        return view('livewire.show-produk');
    }

    public function store()
    {
        dd('ok');
    }
}
