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
    </style>
@endpush

@push('livewireStyles')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="card col-md-8">
            <div class="card-header d-flex justify-content-between">
                <h4><i class="fas fa-wallet"></i> {{ $title }}</h4>
                <div class=" btn btn-sm btn-danger"><i class="fas fa-clock"></i> <span class="date"></span></div>

            </div>
            <hr>
            <div class="card-body">

                <div class="row">

                    <livewire:show-produk />
                    {{-- <livewire:show-produk /> --}}

                </div>
            </div>
        </div>

        <div class="col-md-4">

            <livewire:cart.show-cart />

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').addClass('sidebar-mini')
            setInterval(() => {
                var waktu = new Date();
                let waktuNow = waktu.toLocaleTimeString()
                $('.date').html(waktuNow)
            }, 1000);

            $('.collapse').removeClass('show')
        })
    </script>
@endpush

@push('livewireScripts')
    @livewireStyles
@endpush
