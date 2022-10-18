@extends('template/blank')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card my-3">
        <div class="card-body">
          <div class="row">
            @foreach ($data as $masjid)
            <div class="col-lg-3">
              <div class="card m-2 text-center" style="height: 500px;">
                <img src="{{$masjid->gambar}}" class="card-img-top img-thumbnail img-fluid img-responsive" style="height:300px; width:100%px; object-fit: cover;">
                <div class="card-body">
                  <span class="card-title">{{Str::limit($masjid->nama_masjid, 30)}}</span>
                  <hr/>
                  <div class="card-text">
                    <span style="font-size:15px;">Nomor Meteran</span>
                    <p style="font-size:12px">{{$masjid->no_listrik}}</p>
                    <span style="font-size:15px;">Alamat</span>
                    <p style="font-size:12px">{{Str::limit($masjid->alamat, 50)}}</p>
                  </div>
                  <a href="#" class="btn btn-primary">Cek Tagihan</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <div class="text-muted align-right">
      <p>
        Total Masjid : {{ $data->total() }} <br/>
      </p>
      <?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }
      ?>
      <span>
        <a href="?page={{$data->currentPage()-1}}" class="btn btn-primary <?php echo ($page == 1) ? 'disabled':''?>"><<</a>
      </span>
      @for ($i = 1; $i < $data->lastPage() + 1; $i++)
          <span>
            <a href="?page={{$i}}" class="btn btn-<?php echo ($page == $i) ? '':'primary';?>">{{$i}}</a>
          </span>
      @endfor
      <span>
        <a href="?page={{$data->currentPage()+1}}" class="btn btn-primary <?php echo ($page == $data->lastPage()) ? 'disabled':''?>">>></a>
      </span>
    </div>
  </div>
</div>
@endsection