@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Berita</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $jumlahberita }}</h2>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="icon-list"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Kategori</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $jumlahkategori }}</h2>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="icon-screen-tablet"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card gradient-3">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Admin</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $jumlahadmin }}</h2>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="icon-user"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
