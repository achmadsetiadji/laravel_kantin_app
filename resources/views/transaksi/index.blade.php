@extends('layouts/main')

@section('title', 'Transaksi')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cashier</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="mt-3 mb-3 row card-group">
                        @foreach($makanans as $makanan)
                            <div class="col-3 mb-4 item-cashier" data-id="{{ $makanan->id_makanan }}"
                                data-name="{{ $makanan->nama_makanan }}"
                                data-price="{{ $makanan->harga_makanan }}"
                                data-image="{{ $makanan->gambar_makanan }}">
                                <div style="border: none;" class="card text-center">
                                    <img style="border-radius: 15px !important; width: 90px;"
                                        class="rounded mx-auto d-block"
                                        src="image/{{ $makanan->gambar_makanan }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body p-2">
                                        <h5 class="h6 card-title mb-1 font-weight-bold text-dark">
                                            {{ $makanan['nama_makanan'] }}</h5>
                                        <p style="font-size: 12px;" class="card-text text-dark">Rp.
                                            {{ $makanan['harga_makanan'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Curent Order</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div style="height: 300px;" id="current-order" class="overflow-auto">


                    </div>
                    <hr>

                        <div class="row">
                            <p class="col-8">Subtotal : </p>
                            <p class="col-4 text-right"> Rp 20000 </p>
                        </div>

                        <div class="row">
                            <p class="col-8">Tax : </p>
                            <p class="col-4 text-right"> - </p>
                        </div>

                        <hr>
                        <div class="row">
                            <p class="col-8 h4">Total : </p>
                            <p class="col-4 text-right"> Rp 20000 </p>
                        </div>
                        <button type="button" id="pay" class="btn btn-success btn-md btn-block mt-3">Pay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
