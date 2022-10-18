@extends('admin/blank')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="m-2">
        <a href="/admin/bantuan/tambah" class="btn btn-primary">Tambah</a>
      </div>
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
          <table id="masjid" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th width=20%>Aksi</th>
                </tr>
            </thead>
            <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($data as $item)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$item->judul}}</td>
                    <td><p>{!!Str::limit($item->konten, 100)!!}</p></td>
                    <td class="text-center">
                      <a href="/admin/bantuan/edit/{{$item->id}}" class="btn btn-primary">
                        <i class="fa fa-pencil-alt"></i>
                      </a>
                      <a href="/admin/bantuan/hapus/{{$item->id}}" class="btn btn-danger">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                    </td>
                    @php
                        $no += 1;
                    @endphp
                  </tr>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection