@extends('backend.template')
@section('halaman-sekarang', 'Pengaturan Aplikasi')
@section('content')

    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Form Pendaftaran</h3>
                    <div class="card-toolbar">
                        <form id="form" enctype="multipart/form-data" method="POST">
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nim</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Jika belum di isi silahkan isi nim anda"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="nim" name="nim"
                            placeholder="NIM" value="" readonly />
                        <span class="text-danger" id="nNim"></span>
                    </div>

                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama Lengkap</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Jika belum di isi silahkan isi nama anda"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="nama_lengkap" name="nama_lengkap"
                            placeholder="Masukkan Nama Lengkap" value="" readonly />
                        <span class="text-danger" id="nNama"></span>
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Dosen Pembimbing 1</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Jika belum di isi silahkan isi nama anda"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="pembimbing_satu"
                            name="pembimbing_satu" placeholder="Masukkan Nama Lengkap" value="" readonly />
                        <span class="text-danger" id="nNama"></span>
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Dosen Pembimbing 2</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Jika belum di isi silahkan isi nama anda"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="pembimbing_dua"
                            name="pembimbing_dua" placeholder="Masukkan Nama Lengkap" value="" readonly />
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Judul Proposal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Judul Skripsi yang ingin di ajukan"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="judul_proposal"
                            name="judul_proposal" placeholder="Judul Skripsi" value="" readonly />

                    </div>

                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">File Proposal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="File Proposal"></i>
                        </label>
                        <!--end::Label-->
                        <input type="file" class="form-control form-control-solid" id="file_proposal"
                            name="file_proposal" />
                    </div>

                    <div class="text-center">
                        <button type="button" onclick="" class="btn btn-sm btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
