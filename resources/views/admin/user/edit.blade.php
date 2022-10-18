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
          <form action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" value="{{$data->name}}" name="name">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" value="{{$data->username}}" name="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label for="conf_password" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" name="conf_password">
            </div>
            <div class="mb-3">
              <span class="text-muted">*) Kosongkan jika tidak ingin mengganti password</span>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">Edit</button>
              <a class="btn btn-primary" href="/admin/user/">Kembali</a>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection