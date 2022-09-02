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
                            @foreach ( $sk as $pemb_1 )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemb_1->nama_lengkap}}</td>
                                <td>{{ $pemb_1->nim}}</td>
                                <td>{{ $pemb_1->judul_skripsi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <script>
        function reload() {
            table.ajax.reload(null, false);
        }
    </script>

@endsection
