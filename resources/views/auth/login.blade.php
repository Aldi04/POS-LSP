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
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.html" class="logo logo-admin"><img src="{{ asset('admin/assets/images/logo.png')}}" height="30" alt="logo"></a>
                </h3>
                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to Agroxa.</p>

                    <form class="form-horizontal m-t-30" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="text-muted">© 2020 Agroxa.</p>
        </div>

    </div>

    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/assets/js/waves.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js')}}"></script>

</body>

</html>