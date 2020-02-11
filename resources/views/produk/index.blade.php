@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Produk</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a>Produk</a></li>
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

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h4 class="mt-0 header-title">Table Produk</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('produk.create') }}">
                                            <button type="button" class="btn btn-primary waves-effect waves-light btn-sm m-b-10">Tambah Produk</button>
                                        </a>
                                    </div>
                                </div>
                                <table id="datatable-buttons" class="table table-striped dt-uponsive nowrap justify-content-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($produks as $res)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                    $res->barcode, 'C39')}}" height="30" width="180">
                                                    <span class="text-barcode">{{ $res->barcode }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $res->nama }}</td>
                                            <td>{{ $res->kategori->kategori }}</td>
                                            <td>{{ $res->stok }}</td>
                                            <td>{{ $res->currency->currency }} {{ number_format($res->harga_jual,2,',','.') }}</td>
                                            
                                            <td>
                                                <a href="{{ route('produk.edit', $res->id) }}" class="btn btn-warning waves-effect waves-light btn-sm"><i class="typcn typcn-edit"></i> Edit</a>
                                                <a href="#" data-uri="{{ route('produk.destroy', $res->id) }}" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="typcn typcn-trash"></i> Delete</a>
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