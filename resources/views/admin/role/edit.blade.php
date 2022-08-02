@extends('backend.template')
@section('halaman-sekarang','Manajemen Role')
@section('content')




<div class="row g-5 g-xl-8">
<div class="col-xl-6">
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Role</h3>
        <div class="card-toolbar">
            <form id="form-role" enctype="multipart/form-data" method="POST">
            <button type="button" onclick="simpanRole()" class="btn btn-sm btn-primary">
                Update
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12 fv-row">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Nama Role</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silahkan tulis nama lengkap kamu"></i>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" id="nama_role"  name="nama_role" placeholder="Masukkan Nama Role" value="{{ $data->name }}"/>
        <span class="text-danger" id="nRoleError"></span>
        </div>

        <div class="col-md-12 fv-row">
         <div class="pt-4"></div>
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Role Permission</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silahkan tulis nama lengkap kamu"></i>
        </label>
            <div class="mt-4 p-2">
            @if($data->permissions)
            @foreach ($data->permissions as $role_permission )
            <div class="pt-4"></div>
            <input type="hidden" value="" name="id" id="id">
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusPermission()">{{ $role_permission->name }}</button>    
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
        <h3 class="card-title align-items-start flex-column">Assign Permission</h3>
        <div class="card-toolbar">
            <form id="form-permission" method="POST">
            <button type="button" onclick="simpanPermission()" class="btn btn-sm btn-primary">
                Update
            </button>
        </div>
    </div>
    <div class="card-body">
        <label class="required fs-6 fw-bold mb-3">Assign Permission</label>
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Assign Permission" name="permission">
            <option value="">Assign Permission</option>
            @foreach ( $data2 as $per)
            <option value="{{ $per->name }}">{{ $per->name }}</option>
            @endforeach
        </select>
    </div>
    </form>
</div>
</div>


</div>


<script>
    function simpanRole(){
      $.ajax({
        url : "{{ route('role.update', $data->id) }}",
        type : "POST",
        data: new FormData($('#form-role')[0]),
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
           e.preventDefault();
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

    function simpanPermission(){
      $.ajax({
        url : "{{ route('role.permission', $data->id) }}",
        type : "POST",
        data: new FormData($('#form-permission')[0]),
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
           e.preventDefault();
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

    function hapusPermission(id) {
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
                    url: "{{ url('/admin/hapus-permission') }}" + "/" + id,
                    type: "get",
                    dataType: "JSON",
                    success: function() {
                        swal({
                            title: 'Pe',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            reload();
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
                });
            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Batal',
                        type: 'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    })
                }
            });
        }
</script>




@endsection
