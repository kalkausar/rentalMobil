@extends('admin.templateAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <form action="/addslider" enctype="multipart/form-data" method="post">
  <section class="content-header">
    <h1>
      Tambah Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-car"></i> Slider</a></li>
      <li class="active">Tambah Slider</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Add Slider Page</h3>
            {{csrf_field()}}
          </div>
          <div class="box-body">
            <div class="form-group">
              <label> Image </label> <br>
              <label> <b>*Hanya gambar yang dapat dimasukkan </b> </label> <br>
              <label> <b>*Ukuran Gambar yang dianjurkan 1900x1300 pixel </b> </label> <br>
              <input type="file" accept="image/jpeg,image/tiff,image/x-png" id="tes" name="tes">
            </div>
            <!-- text input -->
            <div class="form-group">
              <label>Nama Slider</label>
              <input type="text" class="form-control" name=slider_name id=slider_name placeholder="Ex: Slider Expander">
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Slider Text</label>
              <textarea class="form-control" rows="3" placeholder="Slider Text" name="slider_text" id="slider_text"></textarea>
            </div>
              <button class="btn btn-primary" type="submit" id="">Submit</a></button>
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
