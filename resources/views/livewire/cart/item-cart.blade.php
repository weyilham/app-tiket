<div id="cart-item">
    <div class="card-body">
        @if (Cart::count() > 0)
            <div class="form-group">
                <label for="nama">Nama Pembeli </label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Pembeli" required>
            </div>
            @foreach ($carts as $cart)
                <div class="card shadow-sm border">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-ticket-alt" style="font-size: 16px"></i> {{ $cart->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3 rounded" src="/img/1.jpg" width="100px" alt="Generic placeholder image">
                            <div class="media-body">
                                <div class="form-group">
                                    <label for="nama">Jumlah : </label>
                                    <div class="btn-group" role="group" aria-label="Counter Buttons">
                                        <!-- Tombol Kurang -->
                                        @if ($jumlah > 1)
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="decrement">-</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm" wire:click="decrement"
                                                disabled>-</button>
                                        @endif
                                        <!-- Input Counter -->

                                        <input type="text" class="form-control text-center form-control-sm"
                                            id="counter" value="{{ $cart->qty }}" min="1" readonly
                                            wire:model="jumlah">

                                        <!-- Tombol Tambah -->

                                        <button type="button" class="btn btn-success btn-sm"
                                            wire:click="increment">+</button>

                                    </div>
                                    {{-- <input type="number" value="{{ $jumlah }}" min="1"
                                class="form-control form-control-sm" id="nama" wire:model="jumlah"> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        @endif


        <hr class="m-0">
        <p>{{ $jumlah }}</p>
        <livewire:cart.footer-cart :jumlah="$jumlah" />
        <hr class="m-0">
        <button class="btn btn-primary my-3"><i class="fas fa-money-bill-wave"></i> Bayar Pesanan</button>


    </div>
</div>
