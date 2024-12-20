@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Jadwal Seminar Hasil')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <a href="{{ route('semhas.lihatJadwal') }}" class="btn btn-primary btn-sm">Lihat Jadwal</a>
                    </div>

                </div>

                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Judul Skripsi</th>
                                <th>Status Skripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('kaprodi.semhas.modal-info')
    @include('kaprodi.semhas.buat-jadwal')

    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('jadwalsemhas.index') }}",
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
                        data: 'judul_skripsi',
                        name: 'judul_skripsi'
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

        function getJadwal(id) {
            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/semhas/buat-jadwal') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[id="nama_lengkap"]').text(data.nama_lengkap);
                    $('[id="nim"]').text(data.nim);
                    $('[id="dospem1"]').text(data.pembimbing_satu);
                    $('[id="dospem2"]').text(data.pembimbing_dua);
                    $('[id="judul_proposal"]').text(data.judul_proposal);
                    $('#modal_jadwal_semhas').modal('show');
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


        function get(id) {
            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/semhas/edit/') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[id="nama_lengkap"]').text(data.nama_lengkap);
                    $('[id="nim"]').text(data.nim);
                    $('[id="dospem1"]').text(data.pembimbing_satu);
                    $('[id="dospem2"]').text(data.pembimbing_dua);
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

        function simpanJadwal() {
            var id = $('#id').val();
            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/semhas/simpan-jadwal/') }}" + "/" + id,
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#form').trigger("reset");
                    $('#modal_jadwal_semhas').modal('hide');
                    swal({
                        title: 'Berhasil',
                        type: 'success',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    }).then(function() {
                        reload();
                    });
                },
                error: function(response) {
                    $('#nTanggalSidangError').text(response.responseJSON.errors.tanggal_sidang);
                    $('#nWaktuMulaiError').text(response.responseJSON.errors.waktu_mulai);
                    $('#nWaktuSelesaiError').text(response.responseJSON.errors.waktu_selesai);
                    $('#nKetuaSidangError').text(response.responseJSON.errors.ketua_sidang);
                    $('#nPenguji1Error').text(response.responseJSON.errors.penguji_1);
                    $('#nPenguji2Error').text(response.responseJSON.errors.penguji_2);
                }
            });

        }

        function reload() {
            table.ajax.reload(null, false);
        }
    </script>

@endsection
