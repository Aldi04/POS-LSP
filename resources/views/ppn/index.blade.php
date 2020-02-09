@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">PPN</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Dashbboard</a></li>
                            <li class="breadcrumb-item active"><a>PPN</a></li>
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

                                <h4 class="mt-0 header-title">PPN</h4>
                                <a href="#" class="btn btn-primary waves-effect waves-light btn btn-sm m-b-15" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                                <table id="datatable" class="table table-striped dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Stok Minimum</th>
                                            <th>PPN (%)</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @include("_FUNCTION.tglIndo")
                                        @foreach($ppns as $res)
                                        @php
                                        $d = $res->created_at;
                                        $t = $d->format('Y-m-d');
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $res->stok_minimum }}</td>
                                            <td>{{ $res->ppn }}</td>
                                            <td>
                                                <div class="badge badge-pill badge-success">
                                                    {{ tgl_indo($t) }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" __ppn="{{ $res->ppn }}" __stokMinimum="{{ $res->stok_minimum }}" __action="{{ route('ppn.update', $res->id) }}" class="btn btn-outline-warning btn-sm edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" data-uri="{{ route('ppn.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
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

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('ppn.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-body">
                    <input type="number" class="form-control" name="stok_minimum" required="" placeholder="Stok Minimum">
                    <div class="invalid-feedback">
                        Form Stok Minimum harus diisi!
                    </div>
                    <br>
                    <input type="number" class="form-control" name="ppn" required="" placeholder="PPN">
                    <div class="invalid-feedback">
                        Form PPN harus diisi!
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
<button id="openModalEdit" data-toggle="modal" data-target="#modalEdit" style="display:none"></button>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST" action="" class="needs-validation" novalidate="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input id="stokMinimumInputEdit" type="number" class="form-control" name="stok_minimum" required="" placeholder="Stok Minimum">
                    <div class="invalid-feedback">
                        Form Stok Minimum harus diisi!
                    </div>
                    <br>
                    <input id="currencyInputEdit" type="number" class="form-control" name="ppn" required="" placeholder="PPN">
                    <div class="invalid-feedback">
                        Form PPN harus diisi!
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