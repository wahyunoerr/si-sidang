@extends('backend.template')
@section('halaman-sekarang','Manajemen Permission')
@section('content')




<div class="row g-5 g-xl-8">
<div class="col-xl-6">
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Permission</h3>
        <div class="card-toolbar">
            <form id="form-permission" enctype="multipart/form-data" method="POST">
            <button type="button" onclick="simpanPermission()" class="btn btn-sm btn-primary">
                Update
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12 fv-row">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Permission</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silahkan ubah permission"></i>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" id="nama_role"  name="nama_role" placeholder="Masukkan Nama Role" value="{{ $data->name }}"/>
        <span class="text-danger" id="nPermissionError"></span>
        </div>

        <div class="col-md-12 fv-row">
         <div class="pt-4"></div>
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Role</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Role yang tersedia"></i>
        </label>
            <div class="mt-4 p-2">
            @if($data->roles)
            @foreach ($data->roles as $role )
            <div class="pt-4"></div>
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusRole()">{{ $role->name }}</button>
            @endforeach
            @endif
            </div>
        </div>
    </div>
</form>
</div>
</div>
<div class="col-xl-6">
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title align-items-start flex-column">Assign Role</h3>
        <div class="card-toolbar">
            <form id="form-role" method="POST">
            <button type="button" name="role" onclick="simpanRole()" class="btn btn-sm btn-primary">
                Assign
            </button>
        </div>
    </div>
    <div class="card-body">
        <label class="required fs-6 fw-bold mb-3">Assign Role</label>
        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silahkan assign role kamu"></i>
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Assign Role" name="role">
            <option value="">Assign role</option>
            @foreach ( $data2 as $r)
            <option value="{{ $r->name }}">{{ $r->name }}</option>
            @endforeach
        </select>
    </div>
    </form>
</div>
</div>


</div>


<script>
    function simpanPermission(){
      $.ajax({
        url : "{{ route('permission.update', $data->id) }}",
        type : "POST",
        data: new FormData($('#form-permission')[0]),
        dataType: "JSON",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
          swal({
            title: 'Berhasil',
            type: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          })
          .then(function(e){
            window.location.reload();
          })
        },
        error: function (jqXHR, textStatus, errorThrown){
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

    function simpanRole(){
      $.ajax({
        url : "{{ route('permission.role', $data->id) }}",
        type : "POST",
        data: new FormData($('#form-role')[0]),
        dataType: "JSON",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
          if (response.status == 2) {
            swal({
            title: 'Role Sudah Dipilih',
            type: 'error',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          });
        }
          else{
            swal({
            title: 'Berhasil',
            type: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          })
          .then(function(e){
           window.location.reload();
          })
          }
        },
        error: function (jqXHR, textStatus, errorThrown){
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

    function hapusRole(id) {
            swal({
                title: 'Apakah kamu yakin?',
                type: 'warning',
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                buttons: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('hapus.role', [$data->id, $role->id]) }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(response) {
                      if (response.status == 2) {
            swal({
            title: 'Data sisa 1, Role Tidak bisa dihapus!',
            type: 'error',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          });
        }
          else{
            swal({
            title: 'Berhasil',
            type: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          })
          .then(function(e){
           window.location.reload();
          })
          }
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
                });
            }), function(dismiss) {
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Batal',
                        type: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    })
                }
            };
        }
</script>




@endsection
