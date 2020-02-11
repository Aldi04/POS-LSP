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
            <div class="page-content-wrapper">
                @include("layouts.toastSession")
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title mb-5">
                                            <div class="mt-0 float-right">
                                                <img class="rounded mr-2 mo-mb-4" width="75" src="{{ asset('img_upload/toko/'.$informasiTokos->foto) }}" alt="{{ $informasiTokos->nama }}">
                                            </div>
                                            <br>
                                            <h2><strong>{{ $informasiTokos->nama }}</strong></h2>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <address>
                                                    <strong>Tanggal :</strong><br>
                                                    @include('_FUNCTION.tglIndo')
                                                    {{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <address>
                                                    <strong>Kasir :</strong><br>
                                                    {{ Auth::user()->name }}
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">
                                                <h4><strong>Ringkasan Pembelian</strong></h4>
                                                <span><i>Barang tidak dapat dihapus disini.</i></span>
                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
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
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h4><strong>Pembayaran</strong></h4>
                                                        <span><i>Metode pembayaran yang kami sediakan adalah untuk memudahkan Anda membayar faktur.</i></span>
                                                        <div class="images">
                                                            <img class="rounded mr-2 mo-mb-2" alt="200x100" width="150" src="{{ asset('img/metode_pembayaran/cash.jpg') }}" data-holder-rendered="true">
                                                        </div>
                                                        <br>
                                                        <span><i>Harga sudah termasuk PPN dan diskon toko kami.</i></span>
                                                    </div>
                                                    <div class="col-lg-4 text-right">
                                                        <hr class="mt-2 mb-2">
                                                        <div class="invoice-detail-item m-r-15">
                                                            <div class="font-16">Total</div>
                                                            <p class="h2">IDR {{ number_format($totalCarts,2,',','.') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- end row -->
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-success waves-effect waves-light btn-icon icon-left" data-toggle="modal" data-target="#modalCreate"><i class="mdi mdi-cash-100"></i> Pembayaran</button>
                                        &nbsp;
                                        <a href="{{ url()->previous() }}" class="btn btn-primary waves-effect waves-light btn-icon icon-left"><i class="mdi mdi-close"></i> Cancel</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button id="printInvoice" class="btn btn-warning waves-effect waves-light btn-icon icon-left"><i class="mdi mdi-printer"></i> Print</button>
                                    </div>
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

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('checkout.store') }}" class="needs-validation" novalidate="">
                @csrf
                <input type="hidden" name="total" value="{{ $totalCarts }}">
                <div class="modal-body">
                        <div class="form-group">
                            <label>Bayar</label>
                            <input type="hidden" name="metode_pembayaran" value="Cash">
                            <input type="text" class="form-control" name="bayar" required="" placeholder="Isi sesuai dengan yang di bayar">
                            <div class="invalid-feedback">
                                Form Bayar harus diisi!
                            </div>
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