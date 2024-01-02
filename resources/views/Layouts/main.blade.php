@include('Layouts.Partials.header')

@include('Layouts.Partials.sidebar')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fas fa-cash-register" style="font-size: 20px"></i> Aplikasi Pembelian Tiket</h1>

        </div>
        <div class="row">
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>




    </section>
</div>

@include('Layouts.Partials.footer')
