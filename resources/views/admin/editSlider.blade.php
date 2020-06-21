@extends('admin.templateAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-car"></i> Produk</a></li>
      <li class="active">Edit Slider</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Slider Page</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- text input -->
            <form class="" action="/admin/{{$manages->id}}/edit" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Gambar Produk</label> <br>
                <img src="{!!$manages->slider_image!!}" style="width:50%;height:50%" alt="photo">
              </div>
              <div class="form-group">
                <label>Nama Slider</label>
                <input type="text" class="form-control" name=slider_name id=slider_name value="{{$manages->slider_name}}" placeholder="Ex: Mitsubishi Expander">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Teks Slider</label>
                <textarea class="form-control" rows="3" name=slider_text id=slider_text placeholder="Deskripsi produk">{{$manages->slider_text}}</textarea>
              </div>
              <input type="hidden" name="_method" value="put">
              <button class="btn btn-primary" type="submit" id="">Save</a></button>
            </form>
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
