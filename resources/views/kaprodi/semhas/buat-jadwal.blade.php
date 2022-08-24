<div class="modal fade" id="modal_jadwal_semhas" tabindex="-1" aria-hidden="true">
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
                <form id="form" class="form" action="#" method="POST">
                    <input type="hidden" id="id" name="id" value="">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Atur Jadwal</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Jika sudah melakukan pembayaran silahkan
                            mendaftar.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Tanggal Sidang</label>
                            <input type="date" name="tanggal_sidang" id="tanggal_sidang"
                                class="form-control form-control-solid">
                            <span class="text-danger" id="nTanggalSidangError"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Waktu Mulai Sidang</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai"
                                class="form-control form-control-solid">
                            <span class="text-danger" id="nWaktuMulaiError"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Waktu Selesai Sidang</label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai"
                                class="form-control form-control-solid">
                            <span class="text-danger" id="nWaktuSelesaiError"></span>
                        </div>
                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Penguji 1</label>
                            <select name="penguji_1" id="penguji_1" class="form-control form-control-solid">
                                @foreach ($dosen as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="nPenguji1Error"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Penguji 2</label>
                            <select name="penguji_2" id="penguji_2" class="form-control form-control-solid">
                                @foreach ($dosen as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
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
                        <button type="button" id="kt_modal_new_target_submit" onclick="simpanJadwal()"
                            class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
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
