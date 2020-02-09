@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Informasi Toko</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Manajemen Toko</a></li>
                            <li class="breadcrumb-item active">Informasi Toko</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Informasi Toko</h4>

                                <form method="POST" action="{{ route('informasiToko.update', $d->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control" name="nama" required="" value="{{ $d->nama }}">
                                        <div class="invalid-feedback">
                                            Form Nama Toko harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode POS</label>
                                        <input type="text" class="form-control" name="kode_pos" required="" value="{{ $d->kode_pos }}">
                                        <div class="invalid-feedback">
                                            Form Kode POS harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" class="form-control" name="telepon" required="" value="{{ $d->telepon }}">
                                        <div class="invalid-feedback">
                                            Form Telepon harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" required="" value="{{ $d->keterangan }}">
                                        <div class="invalid-feedback">
                                            Form Keterangan harus diisi!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea id="elm1" name="alamat" required="">{!! $d->alamat !!}</textarea>
                                        <div class="invalid-feedback">
                                            Form Alamat harus diisi!
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Dropzone</h4>
                                <p class="text-muted m-b-30">DropzoneJS is an open source library
                                    that provides drag’n’drop file uploads with image previews.
                                </p>

                                <div class="m-b-30">
                                    <form class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                    </form>
                                </div>

                                <div class="text-center m-t-15">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                    </form>
                </div> <!-- end row -->

            </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <footer class="footer">
        © 2018 Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
    </footer>

</div>
@endsection