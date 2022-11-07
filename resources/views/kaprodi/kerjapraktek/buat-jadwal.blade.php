<!--begin:Form-->
<form id="form" class="form" enctype="multipart/form-data" method="POST">
    <input type="hidden" id="id" name="id" value="">
    <!--begin::Heading-->
    <div class="mb-13 text-center">
        <!--begin::Title-->
        <h1 class="mb-3">Atur Jadwal</h1>
        <!--end::Title-->
        <!--begin::Description-->
        <div class="text-muted fw-bold fs-5">Jika sudah mengatur jadwal silahkan ke halaman lihat jadwal
        </div>
        <!--end::Description-->
    </div>
    <!--end::Heading-->
    <!--begin::Input group-->
    <div class="row g-9 mb-8">
        <!--begin::Col-->
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Tanggal Sidang</label>
            <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control form-control-solid">
            <span class="text-danger" id="nTanggalSidangError"></span>
        </div>
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Waktu Mulai Sidang</label>
            <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control form-control-solid">
            <span class="text-danger" id="nWaktuMulaiError"></span>
        </div>
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Waktu Selesai Sidang</label>
            <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control form-control-solid">
            <span class="text-danger" id="nWaktuSelesaiError"></span>
        </div>
    </div>

    <div class="row g-9 mb-8">
        <!--begin::Col-->
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Penguji 1</label>
            <select name="penguji_1" id="penguji_1" class="form-select form-select-solid" data-control="select2"
                data-hide-search="true">
                @foreach ($dosen as $d)
                    @if ($data->pembimbing != $d->id )
                        <option value="{{ $d->id }}">{{ $d->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            <span class="text-danger" id="nPenguji1Error"></span>
        </div>
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Penguji 2</label>
            <select name="penguji_2" id="penguji_2" class="form-control form-control-solid" data-control="select2"
                data-hide-search="true">
                @foreach ($dosen as $d)
                    @if ($data->pembimbing != $d->id)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endif
                @endforeach
            </select>
            <span class="text-danger" id="nPenguji2Error"></span>
        </div>
        <div class="col-md-4 fv-row">
            <label class="required fs-6 fw-bold mb-2">Ketua Sidang</label>
            <select name="ketua_sidang" id="ketua_sidang" class="form-control form-control-solid">
                @foreach ($dosen as $d)               
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select>
            <span class="text-danger" id="nKetuaSidangError"></span>
        </div>
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" id="kt_modal_new_target_submit" onclick="simpanJadwal()" class="btn btn-primary">
            <span class="indicator-label">Simpan</span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end:Form-->
