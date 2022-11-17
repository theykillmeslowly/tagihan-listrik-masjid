@extends('template/blank')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mt-3">
        <div class="card mt-5 text-center shadow">
          <div class="card-body">
            <div>
              <p style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">APA ITU Sedekah Listrik Masjid?</p>
              <p>
                Sedekah Listrik Masjid adalah sebuah platform untuk mengecek apakah sebuah masjid sudah melakukan pembayaran tagihan listrik.
              </p>
              <p>
                Dan sebuah wadah untuk melakukan donasi ke masjid yang membutuhkan biaya untuk membayar tagihan listrik.
              </p>
            </div>
            <div class="m-3 text-center">
              <div>
                <div>
                  <p style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">IKUTI Sedekah Listrik Masjid</p>
                  <p>
                    <a href="" class="btn btn-primary">
                      <i class="fa-brands fa-facebook"></i> Follow
                    </a>
                    <a href="" class="btn btn-danger">
                      <i class="fa-brands fa-youtube"></i> Youtube
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="m-2 text-center">
          <div class="card-body">
            <div>
              <p style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">MASJID YANG BELUM DIBAYAR</p>
            </div>
            <div class="row">
              @foreach ($data as $masjid)
              <div class="col-lg-6">
                <div class="card shadow-lg m-2 text-center" >
                  <img src="{{asset($masjid->gambar)}}" class="card-img-top img-thumbnail img-fluid img-responsive" style="height:400px; width:400px; object-fit: cover;">
                  <div class="card-body">
                    <span class="card-title">{{Str::limit($masjid->nama_masjid, 30)}}</span>
                    <hr/>
                    <div class="card-text">
                      <span style="font-size:15px;">Nomor Meteran</span>
                      <p style="font-size:12px">{{$masjid->no_listrik}}</p>
                      <span style="font-size:15px;">Alamat</span>
                      <p style="font-size:12px">{{Str::limit($masjid->alamat, 60)}}</p>
                    </div>
                    <a href="/cek-tagihan/{{$masjid->id}}" class="btn btn-primary">Cek Tagihan</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection