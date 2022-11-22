@extends('template/blank2')
@section('content')
<div class="container">
  <div class="row mt-5 justify-content-center">
    <div class="col-6">
      <div>
        @if (Session::get('error'))
        <p class="alert alert-danger"> {{ Session::get('error') }}</p>
        @endif
      </div>
      <div class="card">
        <div class="card-header text-center bg-primary text-light">Login Administrator</div>
        <div class="card-body">
          <form action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 text-center">
              <button class="btn btn-primary">Masuk</button>
              <a href="/" class="btn btn-outline-primary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection