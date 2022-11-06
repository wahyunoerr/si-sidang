@extends('backend.template')
@section('halaman-sekarang', 'Pendaftar Skripsi')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <h1>Mahasiswa Yang Sudah Mendaftar Judul Skripsi</h1>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Mahasiswa</th>
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


    @include('admin.pendaftar.getinfo')


    <script type="text/javascript">
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('pd.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
            $('.modal-title').text('Tambah Data Permission');
        }


        function getInfo(id) {
            $.ajax({
                url: "{{ url('/admin/info-pendaftar') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[id="nama_mahasiswa"]').text(data.nama_lengkap);
                    $('[id="nim"]').text(data.nim);
                    $('[id="pembimbing_satu"]').text(data.pemb_1);
                    $('[id="pembimbing_dua"]').text(data.pemb_2);
                    $('[id="judul_skripsi"]').text(data.judul_skripsi);
                    $('#modal-info').modal('show');
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

        function reload() {
            table.ajax.reload(null, false);
        }
    </script>



@endsection
