@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Units</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a>Units</a></li>
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
                                        <h4 class="mt-0 header-title">Units</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn btn-sm m-b-15" data-toggle="modal" data-target="#modalCreate">Tambah Unit</a>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @include("_FUNCTION.tglIndo")
                                        @foreach($units as $res)
                                        @php
                                        $d = $res->created_at;
                                        $t = $d->format('Y-m-d');
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $res->unit }}</td>
                                            <td>
                                                <div class="badge badge-pill badge-success font-12">
                                                    {{ tgl_indo($t) }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" __unit="{{ $res->unit }}" __stokMinimum="{{ $res->stok_minimum }}" __action="{{ route('units.update', $res->id) }}" class="btn btn-warning waves-effect waves-light btn-sm edit"><i class="typcn typcn-edit"></i> Edit</a>
                                                <a href="#" data-uri="{{ route('units.destroy', $res->id) }}" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="typcn typcn-trash"></i> Delete</a>
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
            <form method="POST" action="{{ route('units.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" name="unit" required="" placeholder="Unit">
                    <div class="invalid-feedback">
                        Form Unit harus diisi!
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
                    <input id="currencyInputEdit" type="text" class="form-control" name="unit" required="" placeholder="Unit">
                    <div class="invalid-feedback">
                        Form Unit harus diisi!
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