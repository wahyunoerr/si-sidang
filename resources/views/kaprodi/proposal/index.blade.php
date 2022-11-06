@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Jadwal Seminar Proposal')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <a href="{{ route('sempro.lihatJadwal') }}" class="btn btn-primary btn-sm">Lihat Jadwal</a>
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
                                <th>Pembimbing 1</th>
                                <th>Pembimbing 2</th>
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

    <div class="modal fade" id="modal_jadwal_proposal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <input type="hidden" name="id">
                    <div id="menu-jadwal"></div>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->


    @include('kaprodi.proposal.modal-info')

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
                        data: 'dospem1',
                        name: 'dospem1'
                    },
                    {
                        data: 'dospem2',
                        name: 'dospem2'
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
                url: "{{ url('/kaprodi/manajemen-jadwal/proposal/edit') }}" + "/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
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

            $.ajax({
                url: "{{ url('/kaprodi/manajemen-jadwal/proposal/buat-jadwal') }}",
                type: "POST",
                dataType: "html",
                cache: false,
                data: {
                    id: id
                },
                success: function(res) {
                    $('#menu-jadwal').html(res);
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

            $('#modal_jadwal_proposal').modal('show');
        }


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
                url: "{{ url('kaprodi/manajemen-jadwal/proposal/simpan-jadwal') }}" + "/" + id,
                data: new FormData($('#form')[0]),
                type: "POST",
                dataType: 'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#form').trigger("reset");
                    $('#modal_jadwal_proposal').modal('hide');
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
