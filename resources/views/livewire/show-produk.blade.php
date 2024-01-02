<div class="col-md-6">
    <div class="card card-primary shadow">
        <div class="card-header">
            <h4>{{ $item->kategori }}</h4>
            <div class="card-header-action">
                <button wire:click='addCart({{ $item->id }})' class="btn btn-sm btn-primary tombol-pesan-tiket"><i
                        class="fas fa-ticket-alt"></i>
                    Pesan
                    Tiket</button>
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
