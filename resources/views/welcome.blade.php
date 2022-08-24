@include('backend.head')

<body class="antialiased">
    <div class="">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary btn-sm">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Jadwal Sidang Kerja Praktek</h1>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table id="tabeljadwal" class="table table-striped-columns">
                        <thead>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>Nama Mahasiswa</td>
                                <td>Nama Mahasiswa</td>
                                <td>NIM</td>
                                <td>Tanggal Sidang</td>
                                <td>Waktu Mulai</td>
                                <td>Waktu Selesai</td>
                                <td>Ruangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                <td>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                <td>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>GA.01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Jadwal Sidang Proposal</h1>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table id="example2" class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal Sidang</td>
                                <td>Nama Mahasiswa</td>
                                <td>Waktu Mulai</td>
                                <td>Waktu Selesai</td>
                                <td>Ruangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td><a href="#" class="btn btn-info btn-sm">{{ $loop->iteration }}</a></td>
                                    <td><a href="#" class="btn btn-info btn-sm">{{ $d->tanggal_sidang }}</a>
                                    </td>
                                    <td><a href="#" class="btn btn-info btn-sm">{{ $d->nama_lengkap }}</a>
                                    </td>
                                    <td><a href="#" class="btn btn-info btn-sm">{{ $d->waktu_mulai }}</a></td>
                                    <td><a href="#" class="btn btn-info btn-sm">{{ $d->waktu_selesai }}</a>
                                    </td>
                                    <td><a href="#" class="btn btn-info btn-sm">GA.01</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex my-8">
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Jadwal Sidang Seminar Hasil</h1>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>Tanggal Sidang</td>
                                <td>Waktu Mulai</td>
                                <td>Waktu Selesai</td>
                                <td>Ruangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>aa</td>
                                <td>GA.01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/costum/widgets.js') }}"></script>
</body>

</html>
