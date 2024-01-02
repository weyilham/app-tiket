<div>
    <div class="card-body">

        <div class="form-group">
            <label for="nama">Nama Pembeli </label>
            <input type="text" class="form-control" id="nama" placeholder="Jono Supriadi">
        </div>

        <div class="card shadow-sm border">
            <div class="card-header">
                <h4><i class="fas fa-ticket-alt" style="font-size: 16px"></i> Kolam Renang DM</h4>
                <div class="card-header-action">
                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-danger" href="#"><i
                            class="fas fa-minus"></i></a>
                </div>

            </div>
            <div class="collapse show" id="mycard-collapse">
                <div class="card-body">
                    <div class="media">
                        <img class="mr-3 rounded" src="/img/1.jpg" width="100px" alt="Generic placeholder image">
                        <div class="media-body">
                            <div class="form-group">
                                <label for="nama">Jumlah : </label>
                                <input type="number" value="1" min="1" class="form-control form-control-sm"
                                    id="nama" placeholder="Jono Supriadi">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <hr class="m-0">
        <livewire:cart.footer-cart />
        <hr class="m-0">
        <button class="btn btn-primary my-3"><i class="fas fa-money-bill-wave"></i> Bayar Pesanan</button>


    </div>
</div>
