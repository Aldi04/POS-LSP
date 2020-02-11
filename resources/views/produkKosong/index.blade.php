@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Produk Kosong</h4>
                        @include("layouts.toastSession")
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                            <li class="breadcrumb-item active"><a>Produk Kosong</a></li>
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

                                <h4 class="mt-0 mb-4 header-title">Produk Kosong</h4>
                                <table id="datatable-buttons" class="table table-striped dt-uponsive nowrap justify-content-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
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
                                                    $res->barcode, 'C39')}}" height="30" width="120">
                                                    <span class="text-barcode">{{ $res->barcode }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $res->nama }}</td>
                                            <td>{{ $res->kategori->kategori }}</td>
                                            <td>{{ $res->stok }}</td>
                                            <td>
                                                <button __nama="{{ $res->nama }}" __action="{{ route('produkKosong.update', $res->id) }}" class="edit btn btn-success btn-sm"><i class="typcn typcn-plus"></i> Tambah Stok</button>
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

<button id="openFormCreate" data-toggle="modal" data-target="#modalCreate"></button>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok
                    &nbsp;<span id="namaProduk" class="badge badge-secondary"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreate" method="POST" action="" class="needs-validation" novalidate="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input type="text" class="form-control" name="stok" value="0" required="" placeholder="Stok">
                    <div class="invalid-feedback">
                        Form Stok harus diisi!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection