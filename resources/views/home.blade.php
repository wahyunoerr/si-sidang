@extends('backend.template')
@section('halaman-sekarang', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-4">
                        <div class="fs-3 fw-bold align-items-sm-center justify-content-center py-5">
                            <h1>JADWAL SIDANG</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Sidang</th>
                            <th>Nama Mahasiswa</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu </th>
                            <th>Judul Proposal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tanggal_sidang }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->waktu_mulai }}</td>
                                <td>{{ $d->waktu_selesai }}</td>
                                <td>{{ $d->judul_proposal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
