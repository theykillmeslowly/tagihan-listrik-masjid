@extends('template/blank')
@section('content')
<div class="container">
  <div class="row mt-5 justify-content-center">
    <div>
      @if (Session::get('error'))
      <span class="alert alert-danger"></span>
      @endif
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header text-center">Login Administrator</div>
        <div class="card-body">
          <form action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password">
            </div>
            <div class="mb-3 text-center">
              <button class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection