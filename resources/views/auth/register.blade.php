@extends('backend.index')
@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain"
            style="background-image: url('backend/media/illustrations/sketchy-1/14.png')">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="form" method="POST" novalidate="novalidate" id="kt_sign_up_form"
                        enctype="multipart/form-data">
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <a href="{{ route('login') }}" class="mb-12">
                                <img src="{{ asset('backend/media/logos/logo-umri.png') }}" class="h-200px mb-5"
                                    alt="">
                            </a>
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Buat Akun</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Sudah Punya Akun?
                                <a href="{{ route('login') }}" class="link-primary fw-bolder">Login Disini</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="fv-row mb-6">
                                <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
                                <input class="form-control form-control-lg form-control-solid" id="name" type="text"
                                    placeholder="Nama Lengkap" name="name" autocomplete="name" autofocus required />
                                <span class="text-danger" id="nNameError"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="fv-row mb-6">
                                <label class="form-label fw-bolder text-dark fs-6">Username</label>
                                <input class="form-control form-control-lg form-control-solid" id="username" type="text"
                                    placeholder="Username" name="username" autocomplete="username" required />
                                <span class="text-danger" id="nUsernameError"></span>
                            </div>
                            <!--end::Col-->
                        </div>


                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="fv-row mb-6">
                                <label class="form-label fw-bolder text-dark fs-6">NIM</label>
                                <input class="form-control form-control-lg form-control-solid" id="serial_user"
                                    type="text" placeholder="NIM" name="serial_user" autocomplete="serial_user"
                                    required />
                                <span class="text-danger" id="nSerialUserError"></span>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="fv-row mb-6">
                                <label class="form-label fw-bolder text-dark fs-6">No Telepon</label>
                                <input class="form-control form-control-lg form-control-solid" id="no_telp" type="text"
                                    placeholder="No Telepon" name="no_telp" autocomplete="no_telp" required />
                                <span class="text-danger" id="nNoTelpError"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" id="email" type="email"
                                placeholder="Email" name="email" autocomplete="email" required />
                            <span class="text-danger" id="nEmailError"></span>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" id="password"
                                        type="password" placeholder="Password" name="password"
                                        autocomplete="new-password" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <span class="text-danger" id="nPasswordError"></span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                            <input class="form-control form-control-lg form-control-solid" id="password-confirm"
                                type="password" placeholder="Konfirmasi Password" name="password_confirmation" required
                                autocomplete="new-password">
                            <span class="text-danger" id="nPassConfError"></span>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" onclick="simpan()" class="btn btn-lg btn-primary">Registrasi
                                <span class="indicator-progress">Tunggu Sebentar
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    </div>


    <script type="text/javascript">
        function simpan() {
            $.ajax({
                url: "{{ route('register') }}",
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    }).then(function() {
                        window.location.href = "{{ url('/home') }}";
                    });
                },
                error: function(response) {
                    $('#nNameError').text(response.responseJSON.errors.name);
                    $('#nUsernameError').text(response.responseJSON.errors.username);
                    $('#nSerialUserError').text(response.responseJSON.errors.serial_user);
                    $('#nNoTelpError').text(response.responseJSON.errors.no_telp);
                    $('#nEmailError').text(response.responseJSON.errors.email);
                    $('#nPasswordError').text(response.responseJSON.errors.password);
                    $('#nPassConfError').text(response.responseJSON.errors.password_confirmation);
                }
            });
        }
    </script>
    <script src="{{ asset('backend/js/custom/authentication/sign-up/general.js') }}"></script>
@endsection
