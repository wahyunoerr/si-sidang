@extends('backend.template')
@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="float-right">
            {{-- <a href="{{ route('prestasi.index') }}" class="btn btn-warning btn-sm">Kembali</a> --}}
          </div>
        </div>
        <div class="card-body">
  
          <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="form" action="{{ route('', $data->id) }}" class="form" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="id" name="id" value="">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Atur Jadwal</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Jika sudah mengatur jadwal silahkan ke halaman lihat jadwal
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Tanggal Sidang</label>
                            <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control form-control-solid" value="{{ $data->tanggal_sidang }}">
                            <span class="text-danger" id="nTanggalSidangError"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Waktu Mulai Sidang</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control form-control-solid" value="{{ $data->waktu_mulai }}">
                            <span class="text-danger" id="nWaktuMulaiError"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Waktu Selesai Sidang</label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control form-control-solid" value="{{ $data->waktu_selesai }}">
                            <span class="text-danger" id="nWaktuSelesaiError"></span>
                        </div>
                    </div>
                
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Penguji 1</label>
                            <select name="penguji_1" id="penguji_1" class="form-select form-select-solid" data-control="select2"
                                data-hide-search="true">
                                @foreach ($dosen as $d)
                                    @if ($data->pembimbing_satu != $d->id && $data->pembimbing_dua  != $d->id)
                                        <option value="{{ $d->id }}">{{ $d->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="nPenguji1Error"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Penguji 2</label>
                            <select name="penguji_2" id="penguji_2" class="form-control form-control-solid" data-control="select2"
                                data-hide-search="true">
                                @foreach ($dosen as $d)
                                    @if ($data->pembimbing_satu != $d->id && $data->pembimbing_dua != $d->id)
                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="nPenguji2Error"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Ketua Sidang</label>
                            <select name="ketua_sidang" id="ketua_sidang" class="form-control form-control-solid">
                                @foreach ($dosen as $d)
                                    @if ($data->pembimbing_satu != $d->name && $data->pembimbing_dua != $d->name)
                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="nKetuaSidangError"></span>
                        </div>
                    </div>
                
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" id="kt_modal_new_target_submit" onclick="simpanJadwal()" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>


  <script>
     function simpanJadwal(){
      $.ajax({
        url : "{{ route('jadwalskripsi.update', $data->id) }}",
        type : "POST",
        data: new FormData($('#form')[0]),
        dataType: "JSON",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
          swal({
            title: 'Berhasil',
            type: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          })
          .then(function(){
            window.location.href = "{{ url('/kaprodi/manajemen-jadwal/proposal/lihat-jadwal') }}";
          })
        },
        error: function (jqXHR, textStatus, errorThrown){
          swal({
            title: 'Terjadi kesalahan',
            type: 'error',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          });
        }
      })
    }
  </script>



@endsection
