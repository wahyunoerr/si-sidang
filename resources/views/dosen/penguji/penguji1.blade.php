@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Skripsi')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <a href="{{ route('pengpro2.index') }}" class="btn btn-warning btn-sm">Penguji 2</a>
                    </div>
                    <div class="d-flex my-8">
                        <a href="{{ route('ket_sidang.index') }}" class="btn btn-warning btn-sm">Ketua Sidang</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tanggal Sidang</th>
                                <th>Judul Proposal</th>
                                <th>Penguji 1</th>
                                <th>Status Lulus</th>
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

    @include('dosen.penguji.info1')
    @include('dosen.penguji.catrevisi1')


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('pengpro1.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'tanggal_sidang',
                        name: 'tanggal_sidang'
                    },
                    {
                        data: 'judul_proposal',
                        name: 'judul_proposal'
                    },
                    {
                        data: 'penguji1',
                        name: 'penguji1'
                    },
                    {
                        data: 'status_lulus',
                        name: 'status_lulus',
                        orderable: false,
                        searchable: false
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

        function getInfo(id) {
            $.ajax({
                url: "{{ url('/penguji/manajemen-penguji/info') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[id="nama_lengkap"]').text(data.nama_lengkap);
                    $('[id="nim"]').text(data.nim);
                    $('[id="dospem1"]').text(data.pembimbing_satu);
                    $('[id="dospem2"]').text(data.pembimbing_dua);
                    $('[id="judul_proposal"]').text(data.judul_proposal);
                    $('[id="tanggal_sidang"]').text(data.tanggal_sidang);
                    $('[id="ketua_sidang"]').text(data.ketuasidang);
                    $('[id="penguji_1"]').text(data.penguji1);
                    $('[id="penguji_2"]').text(data.penguji2);
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


        function updatePenguji1(id) {
            swal({
                title: 'Yakin? Data tidak bisa diubah',
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
                    url: "{{ url('/penguji/manajemen-penguji/update-status-proposal') }}" + "/" + id,
                    type: "POST",
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
                    }
                })
            })
        }

        function catRevisi(id) {
            $.ajax({
                url: "{{ url('/penguji/manajemen-penguji/edit-revisi1') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="catatan_revisi"]').val(data.catatan_revisi);
                    $('#modal_revisi1').modal('show');
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

        function simpanRevisi1() {
            var id = $('#id').val();
            $.ajax({
                url: "{{ url('penguji/manajemen-penguji/simpanRevisi1') }}" + "/" + id,
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#form').trigger("reset");
                    $('#modal_revisi1').modal('hide');
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
                    $('#nRevisi1Error').text(response.responseJSON.errors.catatan_revisi);
                }
            });

        }


        function reload() {
            table.ajax.reload(null, false);
        }

        $(document).ready(function() {
            CKEDITOR.replace('catatan_revisi');
        })
    </script>


@endsection
