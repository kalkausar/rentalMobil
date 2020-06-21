@extends('admin.templateAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Slider
    </h1>
    @if(\Session::has('alert'))
        <br>
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
        @endif
        @if(\Session::has('alert-success'))
        <br>
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Slider</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Manage Slider</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <a class="btn btn-success" href="admin/createSlider" role="button"><i class="fa fa-plus-circle" style="margin-right:5%"></i>Tambah Slider</a>
            <h3>Daftar Slider</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama Slider</th>
                  <th scope="col">Gambar Slider</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($i=0)
                @foreach ($manages as $manage)
                @php($i++)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$manage->slider_name}}</td>
                  <td> <img src="{{$manage->slider_image}}" alt="img_slider" width="70px"> </td>
                  <td>{{$manage->slider_text}}</td>
                  <td><span class="label label-default">Aktif</span></td>
                  <td>
                    <a class="label label-primary" href="/admin/{{$manage->id}}">Edit</a>
                    <form class="" action="/deleteslider/{{$manage->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                  <td><button class="btn btn-block btn-danger btn-xs" style="width:50%;" type="submit" name="name">Delete</button></td>
                  </td>
                </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- ./box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.row -->


@endsection
