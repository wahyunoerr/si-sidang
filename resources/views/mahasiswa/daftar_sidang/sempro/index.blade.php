@extends('backend.template')
@section('halaman-sekarang', 'Daftar Sidang Proposal')
@section('content')

    @if (empty($pemb))
        <center>
            <h1>Silahkan Ajukan Judul</h1>
        </center>
    @elseif ($pemb->status_proposal == 0 ||
        ($pemb->status_proposal == 1 && $pemb->status_bimbingan2 == 0) ||
        $pemb->status_bimbingan2 == 0)
        <center>
            <h1>Silahkan Minta Tanda Tangan Pembimbing!</h1>
        </center>
    @elseif($pemb->status_proposal == 1 && $pemb->status_bimbingan2 == 1 && empty($daf))
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
                                placeholder="NIM" value="{{ Auth::user()->serial_user }}" readonly />
                            <span class="text-danger" id="nNim"></span>
                        </div>

                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama Lengkap</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Jika belum di isi silahkan isi nama anda"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" id="nama_lengkap"
                                name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="{{ Auth::user()->name }}"
                                readonly />
                            <span class="text-danger" id="nNama"></span>
                        </div>
                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Pembimbing 1</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Pilih Pembimbing 1"></i>
                            </label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Pilih Dosen Pembimbing 1" name="dospem1" id="dospem1"
                                {{ isset($pemb->pembimbing_satu) ? 'disabled' : '' }}>
                                <option value="">Pilih Dosen Pembimbing 1</option>
                                @foreach ($dosen as $r)
                                    <option value="{{ $r->id }}"
                                        {{ $r->id == $pemb->pembimbing_satu ? 'selected' : '' }}>
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="nDospem1Error"></span>
                        </div>
                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Pembimbing 2</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Pilih Pembimbing 1"></i>
                            </label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Pilih Dosen Pembimbing 2" name="dospem2" id="dospem2"
                                {{ isset($pemb->pembimbing_dua) ? 'disabled' : '' }}>
                                <option value="">Pilih Dosen Pembimbing 2</option>
                                @foreach ($dosen as $r)
                                    <option value="{{ $r->id }}"
                                        {{ $r->id == $pemb->pembimbing_dua ? 'selected' : '' }}>
                                        {{ $r->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="nDospem2Error"></span>
                        </div>
                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Judul Proposal</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Judul Skripsi yang ingin di ajukan"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" id="judul_proposal"
                                name="judul_proposal" placeholder="Judul Skripsi" value="{{ $pemb->judul_skripsi }}"
                                readonly />

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
                            <button type="button" onclick="simpan()" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <center>
            <h1>Anda Sudah Mendaftar, Silahkan Lihat Jadwal!</h1>
        </center>
    @endif
    <script>
        function simpan() {
            $.ajax({
                url: "{{ route('proposal.store') }}",
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#form').trigger("reset");
                        $('#modal-form').modal('hide');
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            window.location.href = "{{ route('proposal.tambah') }}";
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, response) {
                    swal({
                        title: 'Masukkan File Proposal!!',
                        type: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    });
                }
            })
        }
    </script>

@endsection
