@extends('backend.template')
@section('halaman-sekarang','Manajemen Role')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <button class="btn btn-sm btn-danger" onclick="tambah()"><i class="fas fa-plus"></i>Tambah User</button>
                </div>
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Role</th>>
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

@include('admin.role.modal.index')

<script type="text/javascript">
    $(document).ready(function(){
        var typeSave;
      table = $('#example2').DataTable({
        processing : true,
        serverside : true,
        ajax : "{{ route('role.index') }}",
        columns: [
        {data: 'DT_RowIndex', name:'DT_RowIndex'},
        {data: 'name', name:'name'},
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
		$('.modal-title').text('Tambah Data Role');
	}


    function get(id) {
            typeSave = 'update';
            $.ajax({
                url: "{{ url('admin/edit-role') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="nama_role"]').val(data.name);
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Data Role');
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
        }

    function simpan() {
            var url;
            var id = $('#id').val();
            if (typeSave == 'tambah') {
                url = "{{ route('role.simpan') }}";
            } else {
                url = "{{ url('admin/update-role') }}" + "/" + id;
            }
            $.ajax({
                url: url,
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#form').trigger("reset");
                        $('#modal-form').modal('hide');
                        swal({
                            title: 'Berhasil',
                            type: 'success',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                        }).then(function() {
                            reload();
                        });
                    }
                },
                error: function(response) {
                    $('#nRoleError').text(response.responseJSON.errors.nama_role);
                }
            });
        }

        function reload() {
            table.ajax.reload(null, false);
        }

        function hapus(id) {
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
                    url: "{{ url('admin/hapus-role') }}" + "/" + id,
                    type: "get",
                    dataType: "JSON",
                    success: function() {
                        swal({
                            title: 'Berhasil',
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


</script>



@endsection
