@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Laporan Produk Masuk</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                            <li class="breadcrumb-item active"><a>Laporan Produk Masuk</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Produk Masuk</h4>
                                <a href="">
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-sm m-b-10">Print Produk</button>
                                </a>
                                <table id="datatable-buttons" class="table table-striped dt-uponsive nowrap justify-content-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($produks as $res)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                    $res->barcode, 'C39')}}" height="20" width="100">
                                                    <span class="text-barcode">{{ $res->barcode }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $res->nama }}</td>
                                            <td>{{ $res->kategori->kategori }}</td>
                                            <td>{{ $res->stok }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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