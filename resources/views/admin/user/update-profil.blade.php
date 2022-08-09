@extends('backend.template')
@section('halaman-sekarang','Pengaturan User')
@section('content')


@include('admin.user.profil-navbar')


<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Profil Lengkap</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="form" action="#" enctype="multipart/form-data" class="form">
            <input type="hidden" value="{{ $data->id }}" name="id" id="id">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image:url('{{asset('backend/media/avatars/blank.png')}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset($data->foto)}}')"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>

                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <span class="text-danger" id="nFotoError"></span>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Username</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Nama Lengkap" value="{{ $data->username }}" readonly/>
                        <span class="text-danger" id="nNamaError"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Lengkap</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Nama Lengkap" value="{{ $data->name }}" />
                        <span class="text-danger" id="nNamaError"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">NIDN/NIM/NIP</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="serial_user" class="form-control form-control-lg form-control-solid" placeholder="NIDN/NIM/NIP" value="{{ $data->serial_user }}" />
                        <span class="text-danger" id="nSerialError"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">No.Telepon</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="No Telepon Harus Aktif"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="tel" name="no_telp" class="form-control form-control-lg form-control-solid" placeholder="Nomor Telepon" value="{{ $data->no_telp }}" />
                        <span class="text-danger" id="nNoTelpError"></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="button" class="btn btn-primary" onclick="simpanProfil()">Simpan</button>
                </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->
<!--begin::Sign-in Method-->
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method" aria-expanded="true" aria-controls="kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Email & Password</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <div id="kt_account_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bolder mb-1">Alamat Email</div>
                    <div class="fw-bold text-gray-600">{{ $data->email }}</div>
                </div>
                <!--end::Label-->
                <!--begin::Edit-->
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_email" class="form" >
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0">
                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Masukkan Email Baru Anda</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Masukkan Email Baru Anda" name="email" value="{{ $data->email }}" />
                                    <span class="text-danger" id="nEmailError"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Password Anda</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password_sekarang" id="confirmemailpassword" placeholder="Masukkan Password Sekarang"/>
                                    <span class="text-danger" id="nPasswordNow"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary" onclick="simpanEmail()">Simpan Perubahan</button>
                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Ganti Email</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bolder mb-1">Password</div>
                    <div class="fw-bold text-gray-600">************</div>
                </div>
                <!--end::Label-->
                <!--begin::Edit-->
                <div id="kt_signin_password_edit" action="{{ route('password.update') }}" class="flex-row-fluid d-none" method="POST">
                    @csrf
                    <!--begin::Form-->
                    <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="pass_lama" class="form-label fs-6 fw-bolder mb-3">Password Lama</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="pass_lama" id="currentpassword" autocomplete="pass_lama" />
                                    <span class="text-danger" id="nPassLama"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="pass_baru" class="form-label fs-6 fw-bolder mb-3">Password Baru</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="pass_baru" id="newpassword" autocomplete="pass_lama" />
                                    <span class="text-danger" id="nPassBaru"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="konf_pass" id="confirmpassword" autocomplete="pass_lama" />
                                    <span class="text-danger" id="nKPassBaru"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Password harus 8 karakter dan menyertakan simbol</div>
                        <div class="d-flex">
                            <button id="kt_password_submit" type="button" onclick="simpanPassword()" class="btn btn-primary me-2 px-6">Simpan Perubahan</button>
                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->
            <!--begin::Notice-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Sign-in Method-->


		<script src="{{ asset('backend/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('backend/js/custom/account/settings/signin-methods.js')}}"></script>
		<script src="{{ asset('backend/js/custom/account/settings/profile-details.js')}}"></script>
		<script src="{{ asset('backend/js/custom/account/settings/deactivate-account.js')}}"></script>
		<script src="{{ asset('backend/js/custom/modals/two-factor-authentication.js')}}"></script>
		<script src="{{ asset('backend/js/custom/widgets.js')}}"></script>
		<script src="{{ asset('backend/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{ asset('backend/js/custom/modals/upgrade-plan.js')}}"></script>

<script type="text/javascript">
      function simpanProfil() {
        var id = $('#id').val();
            $.ajax({
                url: "{{ url('user/update-profil') }}" + "/" + id,
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(response) {
                    $('#nFotoError').text(response.responseJSON.errors.foto);
                    $('#nNamaError').text(response.responseJSON.errors.name);
                    $('#nSerialError').text(response.responseJSON.errors.serial_user);
                    $('#nNoTelpError').text(response.responseJSON.errors.no_telp);
                }
            });
        }




        function simpanEmail() {
            $.ajax({
                url: "{{ route('email.update', $data->id) }}",
                data: new FormData($('#kt_signin_change_email')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(response) {
                  $('#nEmailError').text(response.responseJSON.errors.email);
                    $('#nPasswordNow').text(response.responseJSON.errors.password_sekarang);
                }
            });
        }


        function simpanPassword() {
            $.ajax({
                url: "{{ route('password.update', $data->id) }}",
                data: new FormData($('#kt_signin_change_password')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(response) {
                  $('#nPassLama').text(response.responseJSON.errors.pass_lama);
                    $('#nPassBaru').text(response.responseJSON.errors.pass_baru);
                    $('#nKPassBaru').text(response.responseJSON.errors.konf_pass);
                }
            });
        }

</script>



@endsection
