<div class="card  card-primary shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h4><i class="fas fa-shopping-cart" style="font-size: 16px"></i> Cart Pembelian Tiket</h4>
        <div>
            <div class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Jumlah Pesanan"><i
                    class="fas fa-clipboard-list"></i> <span class="jum-pesanan">{{ Cart::count() }}</span></div>
            <button class="btn btn-danger btn-sm my-3" data-toggle="tooltip" data-placement="bottom"
                title="Hapus Semua Cart"><i class="fas fa-trash-alt" wire:click="clearCart"></i></button>
        </div>


    </div>

    <hr class="m-0">
    <div class="card-body " id="card-item">
        @if (Cart::count() > 0)
            <livewire:cart.item-cart />
        @else
            <p class="text-danger">Cart Belum tersedia.</p>
        @endif
    </div>
</div>
