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
        @foreach ($data as $item)
          <div class="m-3">
            <a href="/bantuan/{{$item->id}}" class="nav-link">{{$item->judul}}</a>
          </div>
          <hr>
        @endforeach
      </div>
      <div class="col-lg-8">
        <div class="card m-3">
          <div class="card-body rounded shadow-md">
            <div id="bayar-tagihan">
              <div class="text-center m-2" style="font-size: 20px; text-shadow: 2px 2px 2px rgba(0,0,0,0.25);">
                {{ $bantuan->judul }}
              </div>
              <div class="text-center" style="font-size: 12px;">
                <span class="text-muted">Author : {{ $bantuan->author }}</span>
              </div>
              <div>
                {!! $bantuan->konten !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection