@extends('layouts.app') @section('content')
<!-- Start content -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Pengguna</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></li>
                            <li class="breadcrumb-item active">Edit Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Form Edit Pengguna</h4>
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" required="" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="alamat" required="">{!! $user->alamat !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level" required>
                                    @php $l = ["Admin Utama", "Admin Gudang", "Kasir"] @endphp @foreach($l as $ls) @if($ls == $user->level)
                                    <option value="{{ $ls }}" selected>{{ $ls }}</option>
                                    @else
                                    <option value="{{ $ls }}">{{ $ls }}</option>
                                    @endif @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto Pengguna</label>
                                <input type="file" name="foto" lass="filestyle" data-buttonname="btn-secondary" value="{{ $user->foto }}">
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