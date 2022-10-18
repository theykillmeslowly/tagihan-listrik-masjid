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
              <label for="name" class="form-label">Judul</label>
              <input type="text" class="form-control" value="{{$data->judul}}" name="judul">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Konten</label>
              <textarea name="konten" id="konten" cols="30" rows="10" class="form-control">{{$data->konten}}</textarea>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">Edit</button>
              <a class="btn btn-primary" href="/admin/bantuan/">Kembali</a>

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