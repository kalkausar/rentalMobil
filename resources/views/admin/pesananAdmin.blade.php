@extends('admin.templateAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pesanan
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
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Pemesan</th>
                  <th scope="col">Email Pemesan</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Tanggal Mulai</th>
                  <th scope="col">Tanggal Berakhir</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php($i=0)
                @foreach ($manages as $manage)
                @php($i++)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$manage->name}}</td>
                  <td>{{$manage->email}}</td>
                  <td>{{$manage->nama}}</td>
                  <td>{{$manage->date1}}</td>
                  <td>{{$manage->date2}}</td>
                  <td>
                    <?php
                    $harga="Rp. ".number_format($manage->harga,2,',','.');
                    echo $harga;
                    ?>
                  </td>
                  <td><a class="label label-primary" href="/viewPesanan/{{$manage->id}}">View</a></td>
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
