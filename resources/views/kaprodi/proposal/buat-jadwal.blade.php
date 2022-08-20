@extends('backend.template')
@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@yield('title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Nomor Daftar</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Nomor Daftar"></i>
                                    </label>
                                    <input type="text" name="no_daftar" id="no_daftar" value="{{ $tanggal }}"
                                        class="form-control solid" readonly>
                                    <span class="text-danger" id="nNoDaftarError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="required fs-6 fw-bold mb-2">Nama Mahasiswa</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Pilih mahasiswa untuk membuat jadwal"
                                        name="dospem1" id="Nama Mahasiswa">
                                        <option value="" holder>Pilih Mahasiswa</option>
                                        @foreach ($sempro as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="nMhsError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="pt-4"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Penguji 1</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Penguji 1"></i>
                                    </label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Pilih Penguji 1 untuk membuat jadwal"
                                        name="penguji_1" id="penguji_1">
                                        <option value="" holder>Pilih Penguji 1</option>
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="nPenguji1Error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Penguji 2</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Penguji 2"></i>
                                    </label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Pilih Penguji 2 untuk membuat jadwal"
                                        name="penguji_2" id="penguji_2">
                                        <option value="" holder>Pilih Penguji 2</option>
                                        @foreach ($dosen as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="nPenguji2Error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <input type="number" name="diskon" id="diskon" class="form-control" max="99"
                                        maxlength="2">
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga Diskon</label>
                                    <input type="number" name="harga_diskon" id="harga_diskon"
                                        class="form-control"readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control"
                                        accept=".png, .jpg, .jpeg">
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div id="thumbnail-preview"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto[]" id="foto" class="form-control"
                                        accept=".jpeg, .jpg, .png" multiple>
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div id="foto-preview"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="button" onclick="simpan()">Simpan</button>
                            <a href="#" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
