@extends('backend.template')
@section('halaman-sekarang','Manajemen User')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <button class="btn btn-primary btn-sm" onclick="tambah()"><i class="fas fa-plus"></i>Tambah User</button>
                </div>
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama</th>
                            <th>NIDN/NIM</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('admin.user-role.modal.modal')


<script type="text/javascript">
    $(document).ready(function(){
      table = $('#example2').DataTable({
        processing : true,
        serverside : true,
        ajax : "{{ route('userrole.index') }}",
        columns: [
        {data: 'DT_RowIndex', name:'DT_RowIndex'},
        {data: 'name', name:'name'},
        {data: 'serial_user', name:'serial_user'},
        {data: 'email', name:'email'},
        {data: 'role', name:'role'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'asc']]
      });
    })

    function tambah(){
		typeSave = 'tambah';
		$('#id').val('');
		$('#form').trigger("reset");
		$('.help-block').empty();
		$('#modal-form').modal('show');
		$('.modal-title').text('Tambah Data Ruangan');
		$('#foto-sebelumnya').hide();
		$('#foto-preview').empty();
	}
</script>



@endsection
