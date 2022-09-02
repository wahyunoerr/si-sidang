@extends('backend.template')
@section('halaman-sekarang', 'Daftar Sidang Proposal')
@section('content')


    @if ($data->status_proposal == 1)
        <div class="row g-5 g-xl-8">
            <div class="col-xl-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Form Pendaftaran</h3>
                        <div class="card-toolbar">
                            <form id="form" class="form" enctype="multipart/form-data" method="POST">
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
                                <span class="required">Dosen Pembimbing 1</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Jika belum di isi silahkan isi nama anda"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" id="pembimbing_satu"
                                name="pembimbing_satu" placeholder="Masukkan Nama Lengkap" value="{{ $user->pemb_1 }}"
                                readonly />
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
                                name="pembimbing_dua" placeholder="Masukkan Nama Lengkap" value="{{ $user->pemb_2 }}"
                                readonly />
                        </div>
                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Judul Skripsi</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Judul Skripsi yang ingin di ajukan"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" id="judul_skripsi"
                                name="judul_proposal" placeholder="Judul Skripsi" value="{{ $data->judul_skripsi }}"
                                readonly />

                        </div>

                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">File Skripsi</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Judul Skripsi yang ingin di ajukan"></i>
                            </label>
                            <!--end::Label-->
                            <input type="file" class="form-control form-control-solid" id="file_skripsi"
                                name="file_skripsi" />
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
    @elseif ($data->status_proposal == 2)
        <table class="table">
            <thead>
                <th>Nama Mahasiswa</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($data2 as $d2)
                    <td>{{ $d2->nama_lengkap }}</td>
                    <td><a href="{{ route('revisi.index', $data->id) }}" class="btn btn-primary btn-sm">Revisi Skripsi</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    @elseif($semhas->nama_lengkap == Auth::user()->name)
        <center>
            <h1>Anda Sudah Daftar,
                Silahkan Check Jadwal
            </h1>
        </center>
    @else
    @endif



    <script>
        function simpan() {
            $.ajax({
                url: "{{ route('semhas.store') }}",
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
                            window.location.href = "{{ route('sidangsemhas.index') }}";
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: 'Terjadi Kesalahan',
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
