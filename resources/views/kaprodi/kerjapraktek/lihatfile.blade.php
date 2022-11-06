@extends('backend.template')
@section('halaman-sekarang', 'Manajemen Skripsi')
@section('content')

    <style>
        .pdfobject-container {
            height: 30rem;
            border: 1rem solid rgba(0, 0, 0, .1);
        }
    </style>

    <h4>Preview File :</h4>
    <div id="pdf-lihat"></div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>

    <script>
        PDFObject.embed("{{ route('kp.lihat', $data->id) }}", "#pdf-lihat");
    </script>

@endsection
