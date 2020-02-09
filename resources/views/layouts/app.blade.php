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
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                        <img src="{{ asset('admin/assets/images/logo.png')}}" alt="" height="24">
                    </span>
                    <i>
                        <img src="{{ asset('admin/assets/images/logo-sm.png')}}" alt="" height="22">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="navbar-right d-flex list-inline float-right mb-0">
                    <li class="dropdown notification-list d-none d-sm-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown notification-list">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if(!empty(Auth::user()->foto))
                                <img alt="image" src="{{ asset('img_upload/pengguna/'.Auth::user()->foto) }}" class="nav-img rounded-circle mr-1">
                                @else
                                <img alt="image" src="{{ asset('admin/assets/images/users/user-5.png') }}" class="nav-img rounded-circle mr-1">
                                @endif
                                <span class="ml-2 text-white">Selamat Datang, {{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ti-user m-r-5"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="ti-power-off text-danger"><i class="ti-power-off text-danger"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Dashboard</li>
                        <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="mdi mdi-home"></i><span> Dashboard </span>
                            </a>
                        </li>
                        @if(Auth::user()->level == "Admin Utama")
                        <li class="menu-title">Manajemen Toko</li>
                        <li>
                            <a href="{{ route('informasiToko.index') }}" class="waves-effect">
                                <i class="mdi mdi-home-modern"></i><span> Informasi Toko </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}" class="waves-effect">
                                <i class="ion-android-friends"></i><span> Pengguna </span>
                            </a>
                        </li>

                        <li class="menu-title">Konfigurasi</li>
                        <li>
                            <a href="{{ route('currencies.index') }}" class="waves-effect">
                                <i class="mdi mdi-currency-usd"></i><span> Currencies </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ppn.index') }}" class="waves-effect">
                                <i class="mdi mdi-percent"></i><span> PPN </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('units.index') }}" class="waves-effect">
                                <i class="typcn typcn-th-small"></i><span> Units </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('persentaseKeuntungan.index') }}" class="waves-effect">
                                <i class="fas fa-percentage"></i><span> Persentase Keuntungan </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kategoriProduk.index') }}" class="waves-effect">
                                <i class="ti-package"></i><span> Kategori Produk </span>
                            </a>
                        </li>

                        <li class="menu-title">Inventory</li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-harddrives"></i><span> Produk </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('produk.index') }}">Semua Produk</a></li>
                                <li><a href="{{ route('produkMasuk') }}">Laporan Produk Masuk</a></li>
                                <li><a href="{{ route('produkKosong.index') }}">Stok Kosong</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Transaksi</li>
                        <li>
                            <a href="{{ route('transaksi.index') }}" class="waves-effect">
                                <i class="ti-shopping-cart"></i><span> Transaksi </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('invoice.index') }}" class="waves-effect">
                                <i class="dripicons-clock"></i><span> Riwayat Transaksi </span>
                            </a>
                        </li>
                        @endif @if(Auth::user()->level == "Admin Gudang")
                        <li class="menu-title">Konfigurasi</li>
                        <li>
                            <a href="{{ route('currencies.index') }}" class="waves-effect">
                                <i class="mdi mdi-currency-usd"></i><span> Currencies </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ppn.index') }}" class="waves-effect">
                                <i class="mdi mdi-percent"></i><span> PPN </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('units.index') }}" class="waves-effect">
                                <i class="typcn typcn-th-small"></i><span> Units </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('persentaseKeuntungan.index') }}" class="waves-effect">
                                <i class="fas fa-percentage"></i><span> Persentase Keuntungan </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kategoriProduk.index') }}" class="waves-effect">
                                <i class="ti-package"></i><span> Kategori Produk </span>
                            </a>
                        </li>

                        <li class="menu-title">Inventory</li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-harddrives"></i><span> Produk </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('produk.index') }}">Semua Produk</a></li>
                                <li><a href="{{ route('produkMasuk') }}">Laporan Produk Masuk</a></li>
                                <li><a href="{{ route('produkKosong.index') }}">Stok Kosong</a></li>
                            </ul>
                        </li>
                        @endif @if(Auth::user()->level == "Kasir")
                        <li class="menu-title">Transaksi</li>
                        <li>
                            <a href="{{ route('transaksi.index') }}" class="waves-effect">
                                <i class="ti-shopping-cart"></i><span> Transaksi </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('invoice.index') }}" class="waves-effect">
                                <i class="dripicons-clock"></i><span> Riwayat Transaksi </span>
                            </a>
                        </li>
                        @endif
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
        @yield('content')
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/waves.min.js')}}"></script>

    <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Peity JS -->
    <script src="{{ asset('admin/assets/plugins/peity/jquery.peity.min.js')}}"></script>

    <script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js')}}"></script>

    <!-- Dropzone js -->
    <script src="{{ asset('admin/assets/plugins/dropzone/dist/dropzone.js')}}"></script>

    <!--Wysiwig js-->
    <script src="{{ asset('admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js')}}"></script>

    <script>
        $(document).ready(function() {
            if ($("#elm1").length > 0) {
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height: 100,
                    toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                        title: 'Bold text',
                        inline: 'b'
                    }, {
                        title: 'Red text',
                        inline: 'span',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Red header',
                        block: 'h1',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Example 1',
                        inline: 'span',
                        classes: 'example1'
                    }, {
                        title: 'Example 2',
                        inline: 'span',
                        classes: 'example2'
                    }, {
                        title: 'Table styles'
                    }, {
                        title: 'Table row 1',
                        selector: 'tr',
                        classes: 'tablerow1'
                    }]
                });
            }
        });
    </script>
    <script>
        $('.edit').click(function(e) {
            e.preventDefault()

            let __currency = $(this).attr("__currency")
            let __action = $(this).attr("__action")

            $('#formEdit').attr("action", __action)
            $("#currencyInputEdit").val(__currency)

            $("#openModalEdit").click()
        })
    </script>
    <script>
        $('.edit').click(function(e) {
            e.preventDefault()

            let __ppn = $(this).attr("__ppn")
            let __stokMinimum = $(this).attr("__stokMinimum")
            let __action = $(this).attr("__action")

            $('#formEdit').attr("action", __action)
            $("#currencyInputEdit").val(__ppn)
            $("#stokMinimumInputEdit").val(__stokMinimum)

            $("#openModalEdit").click()
        })
    </script>
    <script>
        $('.edit').click(function(e) {
            e.preventDefault()

            let __unit = $(this).attr("__unit")
            let __action = $(this).attr("__action")

            $('#formEdit').attr("action", __action)
            $("#currencyInputEdit").val(__unit)

            $("#openModalEdit").click()
        })
    </script>
    <script>
        $('.edit').click(function(e) {
            e.preventDefault()

            let __persentaseKeuntungan = $(this).attr("__persentaseKeuntungan")
            let __action = $(this).attr("__action")

            $('#formEdit').attr("action", __action)
            $("#currencyInputEdit").val(__persentaseKeuntungan)

            $("#openModalEdit").click()
        })
    </script>
    <script>
        $('.edit').click(function(e) {
            e.preventDefault()

            let __kategori = $(this).attr("__kategori")
            let __action = $(this).attr("__action")

            $('#formEdit').attr("action", __action)
            $("#kategoriInputEdit").val(__kategori)

            $("#openModalEdit").click()
        })
    </script>
    <script>
        $('.edit').click(function() {
            let __nama = $(this).attr("__nama")
            let __action = $(this).attr("__action")

            $('#formCreate').attr("action", __action)
            $('#namaProduk').html(__nama)
            $('#openFormCreate').click()
        })
    </script>
    <script>
        $('#trDetailProduk').hide()
        $('#produkSelect').change(function() {
            let _id = $(this).val()
            if (_id != "") {
                $.ajax({
                    url: "{{ url('produk') }}/" + _id,
                    method: "GET",
                    success: function(data) {
                        $('#tr_stok').html(data.stok)
                        $('#tr_harga').html("IDR " + data.harga_jual)
                        $('#trDetailProduk').slideDown("slow")
                    }
                })
            } else {
                $('#trDetailProduk').slideUp("slow")
            }
        })
    </script>

</body>

</html>