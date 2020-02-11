@extends('layouts.app')

@section('content')
<!-- Start content -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Produk</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active">Tambah Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 mb-4 header-title">Form Tambah Produk</h4>
                        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control selectric" name="kategori_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($kategoris as $res)
                                    <option value="{{ $res->id }}">{{ $res->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" required>
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <select class="form-control selectric" name="currency_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($currencies as $res)
                                    <option value="{{ $res->id }}">{{ $res->currency }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select class="form-control selectric" name="unit_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($units as $res)
                                    <option value="{{ $res->id }}">{{ $res->unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli" required="">
                                <div class="invalid-feedback">
                                    Form Harga Beli harus diisi!
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <select class="form-control selectric" name="laba" required>
                                            <option value="">Persentase Laba</option>
                                            @foreach($persentaseKeuntungans as $res)
                                            <option value="{{ $res->persentase_keuntungan }}">{{ $res->persentase_keuntungan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select class="form-control selectric" name="ppn" required>
                                            <option value="">Stok Minimum &mdash; PPN</option>
                                            @foreach($ppns as $res)
                                            <option value="{{ $res->ppn }}">{{ $res->stok_minimum }} &mdash; {{ $res->ppn }}%</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Diskon Produk</label>
                                <input type="number" class="form-control" name="diskon" required>
                                <div class="invalid-feedback">
                                    Form Diskon Produk harus diisi!
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="keterangan" required></textarea>
                                <div class="invalid-feedback">
                                    Form Keterangan harus diisi!
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary waves-effect m-l-5 ">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light ">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end page content-->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->

    <footer class="footer ">
        © 2018 Agroxa <span class="d-none d-sm-inline-block ">- Crafted with <i class="mdi mdi-heart text-danger "></i> by Themesbrand.</span>
    </footer>

</div>
@endsection