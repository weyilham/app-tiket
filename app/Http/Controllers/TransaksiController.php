<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {

        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'jumlahBayar' => 'required'
        ], [
            'nama.required' => 'Nama Pembeli',
            'jumlahBayar.required' => 'Jumlah Pembayaran',

        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        foreach (Cart::content() as $item) {
            $cart[] = [
                'id' => $item->id,
                'qty' => $item->qty,
            ];
        }

        foreach ($cart as $c) {
            $produk_id = $c['id'];
            $qty = $c['qty'];
        }

        $data = [
            'produk_id' => $produk_id,
            'nama_pembeli' => $request->nama,
            'tgl_transaksi' => Date('Y-m-d'),
            'jumlah' => $qty,
            'total' => $request->jumlahBayar,
            'jum_bayar' => $request->bayar,
            'kembalian' => $request->kembali,
            'sisa' => $request->kembali,
            'tipe_pembayaran' => 'Cash'
        ];

        Transaksi::create($data);
        Cart::destroy();
        return response()->json(['cart' => "<p class='text-danger'>Belum ada item yang di pesan</p>", 'jumCart' => Cart::count()]);
    }

    public function print()
    {
        return view('transaksi.print_tiket', [
            'title' => 'Wisata Air Tirta Persada DM',
            'tiket' => Transaksi::latest()->first()
        ]);
    }
}
