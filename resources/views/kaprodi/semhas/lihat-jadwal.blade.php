@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Jadwal Seminar Hasil')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <a href="{{ route('sempro.printJadwal') }}" class="btn btn-info btn-sm">Print Jadwal</a>
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
                ajax: "{{ url('/kaprodi/manajemen-jadwal/semhas/lihat-jadwal') }}",
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
    </script>
@endsection
