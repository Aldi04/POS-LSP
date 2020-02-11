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
                        <h4 class="page-title">Edit Produk</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Produk</h4>
                        <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama" required="" value="{{ $produk->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control selectric" name="kategori_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($kategoris as $res)
                                    @if($produk->kategori_id == $res->id)
                                    <option value="{{ $res->id }}" selected>{{ $res->kategori }}</option>
                                    @else
                                    <option value="{{ $res->id }}">{{ $res->kategori }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" required="" value="{{ $produk->stok }}">
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <select class="form-control selectric" name="currency_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($currencies as $res)
                                    @if($produk->currency_id == $res->id)
                                    <option value="{{ $res->id }}" selected>{{ $res->currency }}</option>
                                    @else
                                    <option value="{{ $res->id }}">{{ $res->currency }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select class="form-control selectric" name="unit_id" required>
                                    <option value="">&mdash;</option>
                                    @foreach($units as $res)
                                    @if($produk->unit_id == $res->id)
                                    <option value="{{ $res->id }}" selected>{{ $res->unit }}</option>
                                    @else
                                    <option value="{{ $res->id }}">{{ $res->unit }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli" required="" value="{{ $produk->harga_beli }}">
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
                                            <option value="{{ $produk->laba }}" selected>{{ $produk->laba }}%</option>
                                            @foreach($persentaseKeuntungans as $res)
                                            <option value="{{ $res->persentase_keuntungan }}">{{ $res->persentase_keuntungan }}%</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select class="form-control selectric" name="ppn" required>
                                            <option value="">Stok Minimum &mdash; PPN</option>
                                            <option value="{{ $produk->ppn }}" selected>{{ $produk->ppn }}%</option>
                                            @foreach($ppns as $res)
                                            <option value="{{ $res->ppn }}">{{ $res->stok_minimum }} &mdash; {{ $res->ppn }}%</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Diskon Produk</label>
                                <input type="number" class="form-control" name="diskon" value="{{ $produk->diskon }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="keterangan" required>{!! $produk->keterangan !!}</textarea>
                            </div>
                            <div class="form-group ">
                                <div class="text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary waves-effect m-l-5 ">
                                        Cancel
                                    </a>
                                    <button type="submit " class="btn btn-primary waves-effect waves-light ">
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