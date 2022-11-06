@extends('backend.template')
@section('halaman-sekarang', 'Daftar Kerja Praktek')
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
                            <span class="required">Pembimbing Kerja Praktek</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Pilih Pembimbing Kerja Praktek"></i>
                        </label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Pilih Dosen Pembimbing" name="dospemkp"
                            id="dospemkp"
                            {{ isset($datakp->pembimbing) ? 'disabled' : '' }}>
                            <option value="">Pilih
                            Dosen Pembimbing Kerja Praktek</option>
                            @foreach ($user as $r)
                                <option value="{{ $r->id }}"
                                    {{ isset($datakp->pembimbing) && $r->id == $datakp->pembimbing ? 'selected' : '' }}>
                                    {{ $r->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="nDospemKPError"></span>
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Judul Kerja Praktek</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Judul Kerja Praktek"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" id="judul" name="judul"
                            placeholder="Judul Kerja Praktek"
                            @isset($datakp)
                        value="{{ $datakp->judul_kp }}"
                        @endisset />
                        <span class="text-danger" id="nJudulError"></span>
                    </div>

                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">File Kerja Praktek</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="File Kerja Praktek"></i>
                        </label>
                        <!--end::Label-->
                        <input type="file" class="form-control form-control-solid" id="file_kp" name="file_kp" accept=".pdf,.docx,.doc"/>
                        <span class="text-danger" id="nFileKPError"></span>
                    </div>

                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Bukti Transaksi</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Bukti Transaksi"></i>
                        </label>
                        <!--end::Label-->
                        <input type="file" class="form-control form-control-solid" id="foto_transaksi"
                            name="foto_transaksi" accept=".png, .jpg, .jpeg" />
                        <span class="text-danger" id="nFotoError"></span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src="#" alt="preview image" style="max-height: 250px;">
                    </div>

                    <div class="text-center">
                        <button type="button" onclick="simpankp()" class="btn btn-sm btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        function simpankp() {
            $.ajax({
                url: "{{ route('daftarkp.simpankp') }}",
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(datakp) {
                    if (datakp.status == true) {
                        $('#form').trigger("reset");
                        $('#modal-form').modal('hide');
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            window.location.href = "{{ route('daftarkp.index') }}";
                        });
                    }
                },
                error: function(response) {
                    $('#nDospemKPError').text(responseJSON.errors.dospemkp);
                    $('#nFotoError').text(responseJSON.errors.foto_transaksi);
                    $('#nJudulError').text(responseJSON.errors.judul);
                    $('#nFileKPError').text(responseJSON.errors.file_kp);
                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#foto_transaksi').change(function() {
            readURL(this);
        });
    </script>

@endsection
