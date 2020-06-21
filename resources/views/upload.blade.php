@extends('template')
@section('content')
<div class="site-section bg-light">

    <div class="container text-center">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Upload Bukti Bayar</h2>
                <p class="color-black-opacity-5">Silahkan Upload Bukti Bayar Pesanan</p>
            </div>
        </div>
        <form action="/upload/{{$manages->id}}/update" enctype="multipart/form-data" method="post">
          {{csrf_field()}}
          <div class="row form-group">
              <div class="col-md-12">
                <input type="hidden" name="id" value="{{$manages->id}}">
                <input type="file" accept="image/jpeg,image/tiff,image/x-png" id="tes" name="tes">
              </div>
          </div> <br> <br>
          <input type="hidden" name="_method" value="put">
          <button class="btn btn-primary" type="submit" id="">Submit</a></button>
        </form>
    </div>

</div>
@endsection
