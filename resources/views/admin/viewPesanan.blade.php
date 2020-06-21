@extends('admin.templateAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Produk
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
      <li class="active">Pesanan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Manage Pesanan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <h3>Daftar Pesanan</h3>
            <div class="row">
              <div class="col-lg-6">
                <label>Nama Pemesan</label> <br>
                <p>{{$manages[0]->name}}</p>
                <br>
                <label>Tanggal Mulai</label> <br>
                <p>{{$manages[0]->date1}}</p>
                <br>
                <label>Tanggal Berakhir</label> <br>
                <p>{{$manages[0]->date2}}</p>
                <br>
                <label>Jenis Rental</label> <br>
                @if($manages[0]->jenis==0)
                <p>Lepas Kunci</p>
                @elseif($manages[0]->jenis==1)
                <p>Dengan Supir</p>
                @endif
                <br>
                <label>Total Harga</label> <br>
                <p><?php
                $harga="Rp. ".number_format($manages[0]->harga,2,',','.');
                echo $harga;
                ?></p>
                <form class="" action="/viewPesanan/{{$manages[0]->id}}/approve" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="put">
                  <button class="btn btn-primary" type="submit" id="">Approve</a></button>
                </form>
              </div>
              <div class="col-lg-6">
                <img src="{{url($manages[0]->bukti)}}" alt="bukti_img" width="100%">
              </div>

            </div>

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
