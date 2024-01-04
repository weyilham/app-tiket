@extends('Layouts.main')

@push('styles')
    <style>
        .gambar {
            width: 100%;
            height: 100%;
            /* object-fit: cover !important; */
        }

        .card-produk {
            padding: 0px !important;
            /* height: 40px; */
            /* max-width: 30%; */

        }

        .harga-tiket {
            position: absolute;
            top: 20px;
            left: 20px;
            /* left: 0px; */
        }

        .modalPembayaran {
            z-index: 100000;
        }
    </style>
@endpush

@section('content')
    <div class="row container-fluid">
        <div class="card col-md-8 card-primary ">
            <div class="card-header d-flex justify-content-between">
                <h4><i class="fas fa-wallet"></i> {{ $title }}</h4>
                <div class=" btn btn-sm btn-danger"><i class="fas fa-clock"></i> <span class="date"></span></div>

            </div>
            <hr>
            <div class="card-body">

                <div class="row">

                    @foreach ($tiket as $item)
                        <div class="col-md-6">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h4>{{ $item->kategori }}</h4>
                                    <div class="card-header-action">
                                        <button class="btn btn-sm btn-primary tombol-pesan-tiket"
                                            data-id="{{ $item->id }}"><i class="fas fa-ticket-alt"></i>
                                            Pesan Tiket</button>
                                    </div>
                                </div>
                                <div class="card-body card-produk position-relative">
                                    <button class="harga-tiket btn btn-sm btn-danger">Rp.
                                        <span>{{ $item->harga }}</span>
                                    </button>
                                    <img src="/img/1.jpg" alt="" class="gambar">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card  card-primary shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h4><i class="fas fa-shopping-cart" style="font-size: 16px"></i> Cart Pembelian Tiket</h4>
                    <div>
                        <div class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom"
                            title="Jumlah Pesanan"><i class="fas fa-clipboard-list"></i> <span
                                class="jum-pesanan">{{ Cart::count() }}</span></div>
                        <button class="btn btn-danger btn-sm my-3 clear-cart" data-toggle="tooltip" data-placement="bottom"
                            title="Hapus Semua Cart"><i class="fas fa-trash-alt" wire:click="clearCart"></i></button>
                    </div>


                </div>

                <hr class="m-0">
                <div class="card-body " id="card-item">
                    <div class="cart-item">
                        @if (Cart::count() > 0)
                            <div id="cart-item">
                                <div class="card-body">
                                    @if (Cart::count() > 0)
                                        <div class="form-group">
                                            <label for="nama">Nama Pembeli </label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Nama Pembeli" required>
                                        </div>
                                        @foreach (Cart::content() as $cart)
                                            <div class="card shadow-sm border">
                                                <div class="card-header d-flex justify-content-between">
                                                    <h4><i class="fas fa-ticket-alt" style="font-size: 16px"></i>
                                                        {{ $cart->name }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="media">
                                                        <img class="mr-3 rounded" src="/img/1.jpg" width="100px"
                                                            alt="Generic placeholder image">
                                                        <div class="media-body">
                                                            <div class="form-group">
                                                                <label for="nama">Jumlah : </label>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Counter Buttons">
                                                                    <input type="hidden" id="rowId"
                                                                        value="{{ $cart->rowId }}">
                                                                    <input type="number"
                                                                        class="form-control text-center form-control-sm"
                                                                        id="qty" value="{{ $cart->qty }}"
                                                                        min="1">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif


                                    <hr class="m-0">
                                    <div class="card-footer">
                                        <table>
                                            <tr>
                                                <th width="700">Jumlah Pembelian </th>
                                                <th><i class="fas fa-ticket-alt"></i> x <span
                                                        class="qty-tiket">{{ Cart::count() }}</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th width="700">Total Bayar (Rp) </th>
                                                <th class="subtotal-cart">{{ Cart::subtotal() }}</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr class="m-0">
                                    <button class="btn btn-primary my-3" id="bayar-pesanan" data-toggle="modal"
                                        data-target="#modalPembayaran"><i class="fas fa-money-bill-wave"></i> Bayar
                                        Pesanan</button>


                                </div>
                            </div>
                        @else
                            <p class="text-danger">Belum ada item yang di pesan</p>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPembayaran" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fas fa-money-bill-wave btn btn-sm btn-primary"></i> Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="card col-12">
                            <div class="card-header d-flex justify-content-between">
                                <div class="bayar">
                                    <table>
                                        <tr>
                                            <th>Total Pembayaran</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Rp. <span class="total-pembayaran">{{ Cart::total() }}</span> </h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="kembali">
                                    <table>
                                        <tr>
                                            <th>Total Kembalian</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Rp. <span class="total-kembalian">0</span></h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <hr class="m-0 border-primary">

                            <div class="card-body">
                                <label for="">Jumlah Pembayaran</label>
                                <input type="number" min="0" class="form-control" id="jumlah-bayar">

                                <button class="btn btn-sm btn-warning mt-2 uang-pas">Uang Pas</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger tombol-keluar">Keluar</button>
                    <button type="button" class="btn btn-primary tombol-bayar">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openNewWindow() {
            // Ganti URL berikut dengan URL yang ingin Anda tuju
            var newWindow = window.open("transaksi/print", "NewWindow",
                "width=600, height=400");

            // Opsional: Fokus pada jendela baru
            if (newWindow) {
                newWindow.focus();
            }
        }
        $(document).ready(function() {



            $('body').addClass('sidebar-mini')
            setInterval(() => {
                var waktu = new Date();
                let waktuNow = waktu.toLocaleTimeString()
                $('.date').html(waktuNow)
            }, 1000);

            $('.collapse').removeClass('show')




            //addCart
            $('.tombol-pesan-tiket').on('click', function(e) {
                const id = $(this).data('id')
                // console.log();
                $.ajax({
                    url: "{{ route('cart') }}",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        // console.log(data.carts);

                        let jumCart = $('.jum-pesanan').html()
                        $('.cart-item').html(data);
                        $('.jum-pesanan').html(parseInt(jumCart) + 1);

                    }
                })
            })

            $('.clear-cart').on('click', function(event) {
                $.ajax({
                    url: "{{ route('cart') }}",
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        // console.log(data.carts);
                        $('.jum-pesanan').html(data.jumCart);
                        $('.cart-item').html(data.carts);

                    }
                })
            })

            $(document).on('change', '#qty', function() {
                const rowId = $('#rowId').val();
                const qty = $(this).val();

                $.ajax({
                    url: "{{ route('cart') }}",
                    type: "put",
                    data: {
                        qty: qty,
                        rowId: rowId
                    },
                    success: function(response) {
                        $('.qty-tiket').html(response.jumCart)
                        $('.subtotal-cart').html(response.total)
                        // console.log('ok');
                    }
                })
            })

            $(document).on('click', '#bayar-pesanan', function(e) {
                $('.modal-backdrop').removeClass()
                let total = $('.subtotal-cart').html()
                $('.total-pembayaran').html(total)
            })


            //pembayaran uang pas
            $(document).on('click', '.uang-pas', function() {
                let jumlahBayar = $('#jumlah-bayar').val()
                let totalBayar = $('.total-pembayaran').html()


                let bayar = parseInt(totalBayar.toString().replace(',', ''))
                let kembali = parseInt(totalBayar.toString().replace(',', '')) - parseInt(totalBayar
                    .toString().replace(',', ''))
                // console.log(totalKembalian);
                $('#jumlah-bayar').val(bayar)
                $('#jumlah-bayar').attr('readonly', true)

                $('.total-kembalian').html(kembali)

            })

            $(document).on('click', '.tombol-keluar', function(e) {
                $('.total-kembalian').html('0')
                $('#jumlah-bayar').val('')
                $('#jumlah-bayar').attr('readonly', false)
                // alert('ok')
                $('#modalPembayaran').toggleClass('show')
            })

            $(document).on('change', '#jumlah-bayar', function(e) {
                let jumlahBayar = $('#jumlah-bayar').val()
                let totalBayar = $('.total-pembayaran').html()


                let bayar = parseInt(totalBayar.toString().replace(',', ''))
                let kembali = parseInt(jumlahBayar) - bayar

                $('#jumlah-bayar').attr('readonly', false)
                $('.total-kembalian').html(kembali)
            })



            $(document).on('click', '.tombol-bayar', function(e) {
                const nama = $('#nama').val();
                let jumlahBayar = $('#jumlah-bayar').val()
                let totalBayar = $('.total-pembayaran').html()
                let bayar = parseInt(totalBayar.toString().replace(',', ''))

                let kembali = parseInt(jumlahBayar) - bayar


                $.ajax({
                    url: "{{ route('transaksi') }}",
                    type: 'POST',
                    data: {

                        nama: nama,
                        jumlahBayar: jumlahBayar,
                        bayar: bayar,
                        kembali: kembali,
                    },
                    success: function(response) {
                        // console.log(response);
                        Swal.fire({
                            title: "Terimakasih!",
                            text: 'Pembayaran Berhasil',
                            icon: "success",
                            footer: `<button onclick="openNewWindow()" target='_blank' class='btn btn-sm btn-success'><i class="fas fa-print"></i> Cetak Tiket </button>`
                        });
                        $('#modalPembayaran').toggleClass('show')
                        if ($("#modalPembayaran").css("display") === "block") {
                            // Remove the display: block style
                            $("#modalPembayaran").css("display", "");
                        }
                        $('.jum-pesanan').html(response.jumCart);
                        $('.cart-item').html(response.cart);



                    },
                    error: function(errors) {

                        Swal.fire({
                            icon: "error",
                            title: `Terjadi Kesalahan`,
                            text: `Nama Pembeli atau Jumlah Pembayaran tidak Boleh kosong!`,
                        });

                    }


                })


            })





        })
    </script>
@endpush
