<div class="modal fade" id="modal-form" tabindex="-1" aria-hidden="true">
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
                <form id="form" class="form" action="#" method="POST" enctype="multipart/form-data">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Tambah Data User</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Hanya Admin yang bisa menambahkan user.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama Lengkap</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Silahkan tulis nama lengkap kamu"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nama Lengkap"
                                id="name" name="name" />
                            <span class="text-danger" id="nNameError"></span>
                        </div>

                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Email</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="email" placeholder="Email Kamu" class="form-control form-control-solid"
                                id="email" name="email" />
                            <span class="text-danger" id="nEmailError"></span>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6 fv-row">
                            <div class="d-flex flex-column mb-8">
                                <label class="fs-6 fw-bold mb-2">NIP/NIM/NIDN</label>
                                <input type="text" class="form-control form-control-solid" name="serial_user"
                                    id="serial_user" placeholder="NIP/NIM/NIDN">
                                <span class="text-danger" id="nSerialUserError"></span>
                            </div>
                        </div>
                        <div class="col-md-6 fv-row">
                            <div class="col-md-6 fv-row">
                                <div class="d-flex flex-column mb-8">
                                    <label class="fs-6 fw-bold mb-2">Username</label>
                                    <input type="text" class="form-control form-control-solid" name="username"
                                        id="username" placeholder="username">
                                    <span class="text-danger" id="nUserNameError"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-9 mb-8">
                        <div class="col-md-6 fv-row">

                            <div class="d-flex flex-column mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Pilih Role</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Silahkan Pilih Permission"></i>
                                </label>
                                <!--begin::Checkbox-->
                                @foreach ($role as $r)
                                    <label class="form-check form-check-custom form-check-solid me-10">
                                        <input type="checkbox" name="role[]" value="{{ $r->id }}" />
                                        <span class="form-check-label fw-bold">{{ $r->name }}</span>
                                    </label>
                                @endforeach
                                <span class="text-danger" id="nRoleError"></span>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <!--end::Checkbox-->

                            </div>
                        </div>

                        <div class="col-md-6 fv-row">
                            <div class="d-flex flex-column mb-8">
                                <label class="fs-6 fw-bold mb-2">No Telepon</label>
                                <input type="text" class="form-control form-control-solid" name="no_telp"
                                    id="no_telp" placeholder="Password">
                                <span class="text-danger" id="nNoTelpError"></span>
                            </div>
                        </div>

                    </div>

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary"
                            onclick="simpan()">
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
