<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Agroxa - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">

        <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-block">

                    <div class="ex-page-content text-center">
                        <h1 class="text-dark">404!</h1>
                        <h4 class="">Sorry, page not found</h4><br>

                        <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ route('home')}}"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">© 2018 Agroxa. Crafted with <i class="mdi mdi-heart text-primary"></i> by Themesbrand</p>
            </div>

        </div>

            

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('admin/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.js')}}"></script>

    </body>

</html>