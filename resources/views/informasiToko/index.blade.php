@extends('layouts.app') @section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Informasi Toko</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Informasi Toko</li>
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

                                <h4 class="mt-0 header-title">Informasi Toko</h4>
                                <form method="POST" action="{{ route('informasiToko.update', $d->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" name="nama" class="form-control" required value="{{ $d->nama }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" name="kode_pos" class="form-control" required value="{{ $d->kode_pos }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" class="form-control" required value="{{ $d->telepon }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" required value="{{ $d->keterangan }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div>
                                            <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="alamat" required>{!! $d->alamat !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Toko</label>
                                    <input type="file" name="foto"lass="filestyle" data-buttonname="btn-secondary" value="{{  $d->foto }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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