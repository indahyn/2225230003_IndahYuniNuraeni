@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{ url('panel/beritatambah') }}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach ($berita as $row)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $row->judul }}</td>
                                                <td>{{ tanggal($row->tanggal) }}</td>
                                                <td><img src="{{ asset('foto/' . $row->foto) }}" width="150px"
                                                        style="border-radius:10px" alt="">
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary m-1"
                                                        href="{{ url('panel/beritaedit/' . $row->idberita) }}">Edit</a>
                                                    <a class="btn btn-danger bdel m-1"
                                                        href="{{ url('panel/beritahapus/' . $row->idberita) }}">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
