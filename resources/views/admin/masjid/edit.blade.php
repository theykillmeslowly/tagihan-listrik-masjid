@extends('admin/blank')
@section('content')
<div class="container">
  <div class="row mt-2">
    <div class="col">
      @if (Session::get('error'))
      <div>
        <p class="alert alert-danger">{{Session::get('error')}}</p>
      </div>
      @endif
      @if (Session::get('success'))
      <div>
        <p class="alert alert-success">{{Session::get('success')}}</p>
      </div>
      @endif
      @if (count($errors) > 0)
      <div class="my-4">
        @foreach ($errors->all() as $item)
            <p class="alert alert-danger">{{$item}}</p>
        @endforeach
      </div>
      @endif
      <div class="card">
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">
                Nama Masjid
              </label>
              <input type="text" class="form-control" value="{{$data->nama_masjid}}" name="nama_masjid">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Alamat Masjid
              </label>
              <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                No Listrik Masjid
              </label>
              <input type="number" class="form-control" value="{{$data->no_listrik}}" name="no_listrik">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Gambar Masjid
              </label>
              <div class="mb-2">
                <img src="{{asset($data->gambar)}}" class="card-img-top img-thumbnail img-fluid img-responsive" style="height:200px; width:200px; object-fit: cover;" alt="">
              </div>
              <input type="file" class="form-control" name="gambar">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Nama Pengurus
              </label>
              <input type="text" class="form-control" value="{{$data->nama_pengurus}}" name="nama_pengurus">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Nomor HP Pengurus
              </label>
              <input type="number" class="form-control" value="{{$data->no_pengurus}}" name="no_pengurus">
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="lunas"  @if($data->status == 'lunas'): checked @endif>
                <label class="form-check-label" for="status">
                  Lunas
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="belum_lunas" @if($data->status == 'belum_lunas'): checked @endif>
                <label class="form-check-label" for="status">
                  Belum Lunas
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="tampil" class="form-label">Tampil</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tampil" id="tampil" value="ya"  @if($data->tampil == 'ya'): checked @endif>
                <label class="form-check-label" for="tampil">
                  Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tampil" id="tampil" value="tidak" @if($data->tampil == 'tidak'): checked @endif>
                <label class="form-check-label" for="tampil">
                  Tidak
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">Edit</button>
              <a href="/admin/masjid/" class="btn btn-primary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor
          .create( document.querySelector( '#konten' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endsection