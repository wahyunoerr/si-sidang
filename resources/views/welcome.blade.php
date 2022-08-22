<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary btn-sm">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-info btn-sm">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            </div>

            <div class="mt-8 bg-white light:bg-light-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <td>Tanggal Sidang</td>
                                    <td>Waktu Mulai</td>
                                    <td>Waktu Selesai</td>
                                    <td>Judul Proposal</td>
                                    <td>Penguji 1</td>
                                    <td>Penguji 2</td>
                                    <td>Ketua Sidang</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</body>

</html>
