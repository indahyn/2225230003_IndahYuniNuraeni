@extends('layout')
@section('content')
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 text-warning animated slideInDown">{{ $title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}" class="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid callback my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                @foreach ($berita as $row)
                    <div class="col-md-6 col-12 mb-5">
                        <a href="{{ url('beritadetail/' . $row->idberita) }}">
                            <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" style="height: 550px"
                                data-wow-delay="0.5s">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <img src="{{ asset('foto/' . $row->foto) }}" width="100%"
                                            style="height: 300px;object-fit:cover" style="border-radius:10px">
                                        <h5 class="mt-3">{{ potong($row->judul, 35) }}...</h5>
                                        <span>
                                            <i class="fa fa-tag"></i> {{ tanggal($row->tanggal) }}
                                        </span>
                                        <p style="text-align: justify" class="mt-2 text-dark">
                                            {{ potong(strip_tags($row->deskripsi), 100) }}...</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{ $berita->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    2225230003_IndahYuniNuraeni
                </div>
            </div>
        </div>
    </div>
@endsection
