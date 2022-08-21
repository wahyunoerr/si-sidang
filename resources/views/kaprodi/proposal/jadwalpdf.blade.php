<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <img src="https://i0.wp.com/daak.umri.ac.id/wp-content/uploads/2019/01/logo-umri-besar21.jpg?fit=797%2C1024&ssl=1"
            alt="" width="200px" height="200px">
        <br>
        <br>
        <h5>Jadwal Sidang Proposal</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Sidang</th>
                <th>Nama Mahasiswa</th>
                <th>Waktu Mulai</th>
                <th>Waktu </th>
                <th>Judul Proposal</th>
                <th>Ketua Sidang</th>
                <th>Penguji 1</th>
                <th>Penguji 2</th>
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
                    <td>{{ $d->ketuasidang }}</td>
                    <td>{{ $d->penguji1 }}</td>
                    <td>{{ $d->penguji2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
