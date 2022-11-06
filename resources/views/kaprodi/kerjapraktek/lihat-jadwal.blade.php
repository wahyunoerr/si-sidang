@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Jadwal Kerja Praktek')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <a href="{{ route('kp.printJadwal') }}" class="btn btn-info btn-sm">Print Jadwal</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ url('/kaprodi/manajemen-jadwal/kerja-praktek/lihat-jadwal') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tanggal_sidang',
                        name: 'tanggal_sidang'
                    },
                    {
                        data: 'waktu_mulai',
                        name: 'waktu_mulai'
                    },
                    {
                        data: 'waktu_selesai',
                        name: 'waktu_selesai'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
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

        function get(id) {
            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/kerja-praktek/edit') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[id="tanggal_sidang"]').val(data.tanggal_sidang);
                    $('[id="waktu_mulai"]').val(data.waktu_mulai);
                    $('[id="waktu_selesai"]').val(data.waktu_selesai);
                    $('[id="nama_lengkap"]').val(data.nama_lengkap);
                    $('[id="penguji_1"]').val(data.penguji_1);
                    $('[id="penguji_1"]').val(data.penguji_2);
                    $('#modal-edit').modal('show');
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
    </script>
@endsection
