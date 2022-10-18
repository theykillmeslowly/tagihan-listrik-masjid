@extends('admin/blank')
@section('content')
<div class="container">
  <div class="row mt-2">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username">
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
              <button class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection