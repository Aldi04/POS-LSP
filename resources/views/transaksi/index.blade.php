@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Transaksi</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                            <li class="breadcrumb-item active"><a>Index</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12 col-md4">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Pilih Produk</h4>

                                <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <select id="produkSelect" class="form-control select2" name="produk_id" required>
                                                <option value="">&mdash;</option>
                                                @foreach($produks as $res)
                                                <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Form Nama Produk harus diisi!
                                            </div>
                                        </div>
                                        <div id="trDetailProduk" class="tr-detail-produk">
                                            <p>Stok Tersisa : <b id="tr_stok">0</b></p>
                                            <p>Harga : <b id="tr_harga">IDR 101011</b></p>
                                            <span><i>Sudah termasuk PPN & Diskon toko</i></span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div class="row">
                                            <div class="col-11">
                                                <input type="number" class="form-control" value="1" name="jumlah" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="submit-btn">Tambah</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div> <!-- end col -->

                    <div class="col-12 col-md-8">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="mt-0 header-title">Keranjang</h4>
                                    @if($totalCarts != 0)
                                    <a class="btn btn-warning btn-sm" href="{{ route('transaksiClean') }}">Bersihkan Keranjang</a>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Barcode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th colspan="2">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $res)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                        $res->produk->barcode, 'C39')}}" height="20" width="100">
                                                        <span class="text-barcode">{{ $res->produk->barcode }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $res->produk->nama }}</td>
                                                <td>{{ $res->jumlah }}</td>
                                                <td>{{ $res->produk->currency->currency }} {{ number_format($res->sub_total,2,',','.') }}</td>
                                                <td>
                                                    <a href="#" data-uri="{{ route('transaksi.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <p class="h5">Total Harga : <b>IDR {{ number_format($totalCarts,2,',','.') }}</b></p>
                                </div>
                                <hr>
                            </div>
                            <div class="card-footer text-right">
                                @if($totalCarts != 0)
                                <a href="{{ route('checkout.index') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-shopping-cart"></i> Checkout</a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page content-->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->

    <footer class="footer">
        © 2018 Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
    </footer>

</div>

@endsection