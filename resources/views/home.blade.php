@extends('welcome')
@section('content')
    <center>
        <img src="{{ asset('backend/media/logos/logo-umri.png') }}" width="100px" height="100px" alt="">
        <div class="pt-4"></div>
        <h1>JADWAL SIDANG HARI INI</h1>
    </center>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
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
@endsection
