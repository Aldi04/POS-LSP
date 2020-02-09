@extends('layouts.app')

@section('content')
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .invoice-print,
        .invoice-print * {
            visibility: visible;
        }

        .invoice-print {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Transaksi</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                            <li class="breadcrumb-item active"><a>Index</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title d-flex justify-content-between">
                                            <h2>{{ $informasiTokos->nama }}</h2>
                                            <div class="img-invoice">
                                                <img src="{{ asset('img_upload/toko/'.$informasiTokos->foto) }}" alt="{{ $informasiTokos->nama }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Kasir :</strong><br>
                                                    {{ Auth::user()->name }}
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Tanggal:</strong><br>
                                                    @include('_FUNCTION.tglIndo')
                                                    {{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}<br><br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">Ringkasan Pembelian</div>
                                        <p class="section-lead">Semua barang yang dibeli tidak dapat dihapus di sini.</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Barcode</th>
                                                        <th>Nama Produk</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah</th>
                                                        <th colspan="2">Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($carts as $res)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                                                            $res->produk->barcode, 'C39')}}" height="20" width="100">
                                                                <span class="text-barcode">{{ $res->produk->barcode }}</span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $res->produk->nama }}</td>
                                                        <td>IDR {{ number_format($res->produk->harga_jual,2,',','.') }}</td>
                                                        <td>{{ $res->jumlah }}</td>
                                                        <td>IDR {{ number_format($res->sub_total,2,',','.') }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                                <div class="section-title">Metode Pembayaran</div>
                                                <p class="section-lead">Metode pembayaran yang kami sediakan adalah untuk memudahkan Anda membayar faktur.</p>
                                                <div class="images">
                                                    <img class="metode_pembayaran_img" src="{{ asset('img/metode_pembayaran/cash.jpg') }}" alt="cash">
                                                    <img class="metode_pembayaran_img" src="{{ asset('img/metode_pembayaran/dana.jpg') }}" alt="dana">
                                                </div>
                                                <br>
                                                <span><i>Harga sudah termasuk PPN dan diskon toko kami.</i></span>
                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($totalCarts,2,',','.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-md-right">
                                    <div class="float-lg-left mb-lg-0 mb-3">
                                        <button class="btn btn-primary btn-icon icon-left" data-toggle="modal" data-target="#modalCreate"><i class="fas fa-credit-card"></i> Pembayaran</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
                                    </div>
                                    <button id="printInvoice" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('checkout.store') }}" class="needs-validation" novalidate="">
                @csrf
                <input type="hidden" name="total" value="{{ $totalCarts }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input id="radioCash" type="radio" name="metode_pembayaran" value="Cash" class="selectgroup-input" checked="">
                                <span class="selectgroup-button"><b>CASH</b></span>
                            </label>
                            <label class="selectgroup-item">
                                <input id="radioDana" type="radio" name="metode_pembayaran" value="Dana EBank" class="selectgroup-input">
                                <span class="selectgroup-button"><b>DANA EBANK</b></span>
                            </label>
                        </div>
                    </div>
                    <div id="cashContent">
                        <div class="form-group">
                            <label>Bayar</label>
                            <input type="text" class="form-control" name="bayar" required="" placeholder="Bayar">
                            <div class="invalid-feedback">
                                Form Bayar harus diisi!
                            </div>
                        </div>
                    </div>
                    <div id="danaContent">
                        <span><i>*Pembayaran dengan DANA EBANK sedang dalam proses.</i></span>
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