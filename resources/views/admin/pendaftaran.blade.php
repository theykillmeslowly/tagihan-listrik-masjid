@extends('admin/blank')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table id="masjid" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Masjid</th>
                    <th width=30%>Alamat</th>
                    <th>Gambar</th>
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
                    <td>{{$item->nama_masjid}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>
                      <img src="{{$item->gambar}}" class="card-img-top img-thumbnail img-fluid img-responsive" style="height:200px; width:200px; object-fit: cover;" alt="">
                    </td>
                    <td class="text-center">
                      <a href="{{$item->id}}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="edit/{{$item->id}}" class="btn btn-warning">
                        <i class="fa fa-pencil-alt"></i>
                      </a>
                      <a href="hapus/{{$item->id}}" class="btn btn-danger">
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