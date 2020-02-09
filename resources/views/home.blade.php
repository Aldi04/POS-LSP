@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Welcome to Agroxa Dashboard, {{ Auth::user()->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h6 class="text-uppercase verti-label text-white-50">Pengguna</h6>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mt-0 text-white-50">Pengguna</h6>
                                        <h3 class="mb-3 mt-0">{{ $users }}</h3>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="ion-android-friends display-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h6 class="text-uppercase verti-label text-white-50">Produk</h6>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mt-0 text-white-50">Produk</h6>
                                        <h3 class="mb-3 mt-0">{{ $produks }}</h3>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="ti-harddrives display-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h6 class="text-uppercase verti-label text-white-50 m-r-15">Produk</h6>
                                    <h6 class="text-uppercase verti-label text-white-50">Kosong</h6>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mt-0 text-white-50">Produk Kosong</h6>
                                        <h3 class="mb-3 mt-0">{{ $produk_kosong }}</h3>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="ti-package display-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h6 class="text-uppercase verti-label text-white-50">Transaksi</h6>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mt-0 text-white-50">Transaksi</h6>
                                        <h3 class="mb-3 mt-0">{{ $checkouts }}</h3>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="ti-shopping-cart display-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page content-->

        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <footer class="footer">
        © 2018 Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
    </footer>

</div>
@endsection