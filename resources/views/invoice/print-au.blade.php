<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Agroxa</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">

    <!-- Plugins css -->
    <link href="{{ asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/assets/plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

    <!-- DataTables -->
    <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <style>
        body{
            background-color: #fff !important;
        }
        .img-print img{
            width: 100px;
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="print-padding d-flex flex-column text-left">
            <div class="img-print d-flex justify-content-center mb-4">
                <img src="{{ asset('img_upload/toko/'.$informasiTokos->foto) }}" alt="{{ $informasiTokos->nama }}">
            </div>
            <div class="w-full text-center d-flex justify-content-center flex-column">
                <h1>{{ $informasiTokos->nama }}</h1>
                <p>{!! $informasiTokos->alamat !!}</p>
            </div>
            <div class="text-center mt-3">
                <span class="badge badge-primary">Laporan Riwayat Transaksi</span>
            </div>
            <div class="hr-line"></div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode Transaksi</th>
                        <th>Total Pembelian</th>
                        <th>Metode Pembayaran</th>
                        <th>Nama Kasir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkouts as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                $res->kode_unik, 'C39')}}" height="20" width="100">
                                <span class="text-barcode">{{ $res->kode_unik }}</span>
                            </div>
                        </td>
                        <td>IDR {{ number_format($res->total,2,',','.') }}</td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $res->metode_pembayaran }}
                            </div>
                        </td>
                        <td>{{ $res->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        window.print()
    </script>
</body>
</html>