@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Skripsi')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Judul Skripsi</th>
                                <th>Status Proposal</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('kaprodi.proposal.modal-info')
    @include('kaprodi.proposal.buat-jadwal')

    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ url('kaprodi/manajemen-jadwal/proposal') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'judul_proposal',
                        name: 'judul_proposal'
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
                url: "{{ url('/kaprodi/manajemen-jadwal/proposal/edit') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[id="nama_lengkap"]').text(data.nama_lengkap);
                    $('[id="nim"]').text(data.nim);
                    $('[id="dospem1"]').text(data.pembimbing_satu);
                    $('[id="dospem2"]').text(data.pembimbing_dua);
                    $('[id="judul_proposal"]').text(data.judul_proposal);
                    $('[id="thn_lulus"]').text(data.tahun_lulus);
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


        function buatJadwal(id) {
            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/proposal/edit') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="waktuMulai"]').text(data.waktu_mulai);
                    $('[name="waktuSelesai"]').text(data.waktu_selesai);
                    $('[name="tanggal"]').text(data.tanggal);
                    $('#modal-jadwal').modal('show');
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

        function simpanJadwal() {
            var id = $('#id').val();
            var url = "{{ url('/kaprodi/manajemen-jadwal/proposal/update') }}" + "/" + id
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
