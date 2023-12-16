@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('panel/beritaeditsimpan/' . $row->idberita) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Judul Berita</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="text" class="form-control" name="judul"
                                            value="{{ $row->judul }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $row->tanggal }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Isi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" required>{{ $row->deskripsi }}</textarea>
                                        <script>
                                            CKEDITOR.replace('deskripsi');
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" name="idkategori" required>
                                            @foreach ($kategori as $rowkategori)
                                                <option <?php if ($rowkategori->idkategori == $row->idkategori) {
                                                    echo 'selected';
                                                } ?> value="<?= $rowkategori->idkategori ?>">
                                                    <?= $rowkategori->kategori ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Foto Berita</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
