@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Pengguna</h4>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Manajemen Toko</a></li>
                            <li class="breadcrumb-item active"><a>Pengguna</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Pengguna</h4>
                                <a href="{{route('users.create')}}">
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-sm m-b-10">Tambah User</button>
                                </a>
                                &nbsp;
                                <a target="blank" href="{{ route('printUsers') }}" class="btn btn-primary waves-effect waves-light btn-sm m-b-10"><i class="fas fa-print"></i> Cetak</a>
                                <table id="datatable-buttons" class="table table-striped dt-uponsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if(!empty($u->foto))
                                                <img src="{{ asset('img_upload/pengguna/'.$u->foto) }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $u->name }}" style="object-fit: cover;border-radius: 50%;border: 1px"> @else
                                                <img src="{{ asset('admin/assets/images/users/user-5.png') }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $u->name }}" style="object-fit: cover;border-radius: 50%;border: 1px"> @endif
                                            </td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>
                                                <span class="badge badge-pill badge-info">
                                                    {{ $u->level}}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="#" data-uri="{{ route('users.destroy', $u->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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