@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Persentase Keuntungan</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a>Persentase Keuntungan</a></li>
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

                                <h4 class="mt-0 header-title">Persentase Keuntungan</h4>
                                <a href="#" class="btn btn-primary waves-effect waves-light btn btn-sm m-b-15" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                                <table id="datatable" class="table table-striped dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Persentase Keuntungan (%)</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @include("_FUNCTION.tglIndo")
                                        @foreach($persentaseKeuntungans as $res)
                                        @php
                                        $d = $res->created_at;
                                        $t = $d->format('Y-m-d');
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $res->persentase_keuntungan }}</td>
                                            <td>
                                                <div class="badge badge-pill badge-success">
                                                    {{ tgl_indo($t) }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" __persentaseKeuntungan="{{ $res->persentase_keuntungan }}" __action="{{ route('persentaseKeuntungan.update', $res->id) }}" class="btn btn-outline-warning btn-sm edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" data-uri="{{ route('persentaseKeuntungan.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
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
            <form method="POST" action="{{ route('persentaseKeuntungan.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" name="persentase_keuntungan" required="" placeholder="Persentase Keuntungan">
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
                    <input id="currencyInputEdit" type="text" class="form-control" name="persentase_keuntungan" required="" placeholder="Persentase Keuntungan">
                    <div class="invalid-feedback">
                        Form Persentase Keuntungan harus diisi!
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