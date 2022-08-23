<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Form Pendaftaran</h3>
                <div class="card-toolbar">
                    <form id="form" enctype="multipart/form-data" method="POST">
                        <a href="{{ url('/mahasiswa/daftar-sidang') }}" class="btn btn-danger btn-sm">Kembali</a>
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
                    <input type="text" class="form-control form-control-solid" id="nama_lengkap" name="nama_lengkap"
                        placeholder="Masukkan Nama Lengkap" value="{{ Auth::user()->name }}" readonly />
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
                        <span class="required">Judul Proposal</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                            title="Judul Skripsi yang ingin di ajukan"></i>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" id="judul_proposal"
                        name="judul_proposal" placeholder="Judul Skripsi" value="{{ $user->judul_skripsi }}" readonly />

                </div>

                <div class="mb-10">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">File Proposal</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                            title="Judul Skripsi yang ingin di ajukan"></i>
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

<script>
    function simpan() {
        $.ajax({
            url: "{{ route('sidangsempro.store') }}",
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
                        window.location.href = "{{ route('daftarsidang.index') }}";
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: 'Anda Sudah Mendaftar, Silahkan Cek Bagian Jadwal',
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
