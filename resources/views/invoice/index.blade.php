@extends('layouts.app') 

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Riwayat Transaksi</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbboard</a></li>
                            <li class="breadcrumb-item active"><a>Riwayat Transaksi</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                @include("layouts.toastSession")
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Riwayat Transaksi</h4>
                                <hr>
                                <table id="datatable-buttons" class="table table-striped dt-uponsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode Transaksi</th>
                                            <th>Total Pembelian</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Nama Kasir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($checkouts as $res)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                    $res->kode_unik, 'C39')}}" height="20" width="100">
                                                    <span class="text-barcode">{{ $res->kode_unik }}</span>
                                                </div>
                                            </td>
                                            <td>IDR {{ number_format($res->total,2,',','.') }}</td>
                                            <td>
                                                <div class="badge badge-info font-14">
                                                    {{ $res->metode_pembayaran }}
                                                </div>
                                            </td>
                                            <td>{{ $res->user->name }}</td>
                                            <td>
                                                <a href="{{ route('invoice.show', $res->kode_unik) }}" class="btn btn-primary waves-effect waves-light">Selengkapnya</a>
                                            </td>
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