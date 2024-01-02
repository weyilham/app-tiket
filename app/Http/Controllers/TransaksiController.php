<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        return view('transaksi.index', [
            'title' => 'Transaksi Pembelian',
            'tiket' => Tiket::all()
        ]);
    }
}
