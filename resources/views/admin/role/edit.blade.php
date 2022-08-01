@extends('backend.template')
@section('halaman-sekarang','Manajemen Role')
@section('content')




<div class="row g-5 g-xl-8">
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Role</h3>
        <div class="card-toolbar">
            <button type="submit" class="btn btn-sm btn-primary">
                Update
            </button>
        </div>
    </div>
    <div class="card-body">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Nama Role</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Silahkan tulis nama lengkap kamu"></i>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" id="nama_role"  name="nama_role" placeholder="Masukkan Nama Role" value="{{ $data->name }}"/>
        <span class="text-danger" id="nRoleError"></span>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>


<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Assign Permission</h3>
        <div class="card-toolbar">
            <form action="" method="POST">
            <button type="button" class="btn btn-sm btn-primary">
                Update
            </button>
        </div>
    </div>
    <div class="card-body">
        <label class="required fs-6 fw-bold mb-3">Assign Role</label>
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Assign Permission" name="target_assign">
            <option value="">Assign Permission</option>
            @foreach ( $data2 as $per)
            <option value="{{ $per->id }}">{{ $per->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="card-footer">
        Footer
    </div>
    </form>
</div>
</div>




@endsection
