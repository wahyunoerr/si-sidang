@extends('backend.template')
@section('halaman-sekarang', 'Manajemen User Edit')
@section('content')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Role</h3>
                    <div class="card-toolbar">
                        <form id="form-user" enctype="multipart/form-data" method="POST">
                            <a href="{{ route('userrole.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama User</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Silahkan tulis nama lengkap kamu"></i>
                        </label>
                        <input type="text" class="form form-control form-control-solid" name="name" id="user"
                            value="{{ $data->name }}">
                    </div>

                    <div class="col-md-12 fv-row">
                        <div class="pt-4"></div>
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Role</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Silahkan tulis nama lengkap kamu"></i>
                        </label>
                        <div class="mt-4 p-2">
                            @foreach ($role as $r)
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <label>{{ Form::checkbox('role[]', $r->id, in_array($r->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                        {{ $r->name }}</label>
                                </label>
                            @endforeach
                            <span class="text-danger" id="nRoleError"></span>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="simpanRole()" class="btn btn-sm btn-primary">
                    Update
                </button>
                </form>
            </div>
        </div>


    </div>


    <script>
        function simpanUser() {
            $.ajax({
                url: "{{ route('role.update', $role->id) }}",
                type: "POST",
                data: new FormData($('#form-role')[0]),
                dataType: "JSON",
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
                        })
                        .then(function(e) {
                            window.location.reload();
                        })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: 'Terjadi kesalahan',
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
