@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Skripsi')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <a href="{{ route('dospem2.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i>
                            Pembimbing 2</a>
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

    <script>
        $(document).ready(function() {
            table = $('#example2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('dospem1.index') }}",
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
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        })


        function update(id) {
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
                    url: "{{ url('/admin/bimbingan-skripsi-dospem1/update') }}" + "/" + id,
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


        function reload() {
            table.ajax.reload(null, false);
        }
    </script>

@endsection
