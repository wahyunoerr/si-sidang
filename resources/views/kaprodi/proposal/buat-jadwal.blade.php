<div class="modal fade" id="modal-jadwal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form action="#" id="form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id" id="id">
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Waktu Mulai</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Pilih Pembimbing 1"></i>
                        </label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Pilih Waktu" name="waktuMulai" id="waktuMulai">
                            <option value="">Pilih Waktu</option>
                            @foreach ($waktu as $w)
                                <option value="{{ $w->id }}">{{ $w->waktu_mulai }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="nWaktuMulaiError"></span>
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Waktu Selesai</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Pilih Pembimbing 1"></i>
                        </label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Pilih Waktu" name="waktuSelesai" id="waktuSelesai">
                            <option value="">Pilih Waktu</option>
                            @foreach ($waktu as $w)
                                <option value="{{ $w->id }}">{{ $w->waktu_mulai }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="nWaktuSelesaiError"></span>
                    </div>
                    <div class="mb-10">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tanggal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Pilih Pembimbing 1"></i>
                        </label>
                        <input type="date" class="form-control-solid">
                        <span class="text-danger" id="nTanggalError"></span>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" onclick="simpanJadwal()">Simpan</button>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
