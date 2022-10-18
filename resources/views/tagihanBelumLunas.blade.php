@extends('template/blank')
@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div>
              <a href="/daftar-masjid" class="btn btn-primary">Kembali</a>
            </div>
            <div class="text-center">
              <div>
                <img src="{{asset($data->gambar)}}" class="card-img-top img-thumbnail img-fluid img-responsive" style="height:300px; width:300px; object-fit: cover;">
              </div>
              <div>
                <span style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">{{$data->nama_masjid}}</span>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Alamat : {{ $data->alamat }}</label>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">No Listrik : {{ $data->no_listrik }}</label>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Pengurus Masjid : {{ $data->nama_pengurus }}</label>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">No. HP Pengurus : {{ $data->no_pengurus }}</label>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Status Tagihan: <h5>@if ($data->status == 'belum_lunas') Belum Lunas @endif</h5></label>
              </div>
              <div class="mb-3">
                <a href="https://www.sepulsa.com/transaction/pln?type=postpaid" class="btn btn-primary" target="_blank">Bayar Tagihan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection