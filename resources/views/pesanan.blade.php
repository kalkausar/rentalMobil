@extends('template')
@section('content')
<div class="site-section bg-light">

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Daftar Pesanan</h2>
                <p class="color-black-opacity-5">Silahkan Upload Bukti Bayar Pesanan</p>
            </div>
        </div>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Start</th>
                    <th scope="col">Finish</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                @php($i=0)
                @foreach ($manages as $m)
                @php($i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$m->nama}}</td>
                    <td>{{$m->date1}}</td>
                    <td>{{$m->date2}}</td>
                    <td>{{$m->harga}}</td>
                    @if($m->status==0)
                    <td>Belum Bayar</td>
                    <td> <a href="/upload/{{$m->id}}">Upload Bukti Bayar</a> </td>
                    @elseif($m->status==1)
                    <td>Booking</td>
                    <td></td>
                    @elseif($m->status==2)
                    <td>Konfirmasi</td>
                    <td><a href="/kwitansi/{{$m->id}}">Invoice</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
