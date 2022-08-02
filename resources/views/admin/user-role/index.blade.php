@extends('backend.template')
@section('halaman-sekarang', 'Manajemen User')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-sm btn-danger" onclick="tambah()"><i class="fas fa-plus"></i>Tambah
                            Role</button>
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


    @include('admin.user-role.modal')


    <script type="text/javascript">
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('userrole.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'serial_user',
                        name: 'serial_user'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        function tambah() {
            typeSave = 'tambah';
            $('#id').val('');
            $('#form').trigger("reset");
            $('.help-block').empty();
            $('#modal-form').modal('show');
            $('.modal-title').text('Tambah Data Ruangan');
            $('#foto-sebelumnya').hide();
            $('#foto-preview').empty();
        }

        function simpan() {
            var url;
            var id = $('#id').val();
            if (typeSave == 'tambah') {
                url = "{{ route('role.simpan') }}";
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
                        $('#modal-role').modal('hide');
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
    </script>



@endsection
