@extends('template/blank')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card m-3">
          <div class="card-body text-center bg-primary text-light rounded shadow-md">
            <span style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">BANTUAN</span>
          </div>
        </div>
        @foreach ($data as $bantuan)
          <div class="m-3">
            <a href="/bantuan/{{$bantuan->id}}" class="nav-link">{{$bantuan->judul}}</a>
          </div>
          <hr>
        @endforeach
      </div>
      <div class="col-lg-8">
        <div class="card m-3">
          <div class="card-body rounded shadow-md">
            <div id="bayar-tagihan">
              <div class="text-center m-2" style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">
                {{ $data[0]->judul }}
              </div>
              <div class="text-center" style="font-size: 12px;">
                <span class="text-muted">Author : {{ $data[0]->author }}</span>
              </div>
              <div>
                {!! $data[0]->konten !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection