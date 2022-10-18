@extends('template/blank')
@section('content')
<div class="container">
  <div class="row mt-2">
    <div class="col">
      @if (Session::get('success'))
          <div class="my-4">
            <p class="alert alert-success">{{Session::get('success')}}</p>
          </div>
      @endif
      @if (Session::get('error'))
          <div class="my-4">
            <p class="alert alert-danger">{{Session::get('error')}}</p>
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
        <div class="card-header text-center">Form Pendaftaran Masjid</div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">
                Nama Masjid
              </label>
              <input type="text" class="form-control" name="nama_masjid">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Alamat Masjid
              </label>
              <input type="text" class="form-control" name="alamat">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                No Listrik Masjid
              </label>
              <input type="number" class="form-control" name="no_listrik">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Gambar Masjid
              </label>
              <input type="file" class="form-control" name="gambar">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Nama Pengurus
              </label>
              <input type="text" class="form-control" name="nama_pengurus">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">
                Nomor HP Pengurus
              </label>
              <input type="number" class="form-control" name="no_pengurus">
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection