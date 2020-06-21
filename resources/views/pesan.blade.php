@extends('template')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-5">

                <form action="/addpesanan" class="p-5 bg-white" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$manages->id}}">

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Tanggal Mulai</label>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <input type="date" name="date1" id="date1" class="form-control">
                            <script type="text/javascript">
                                $(function() {
                                    var dtToday = new Date();

                                    var month = dtToday.getMonth() + 1;
                                    var day = dtToday.getDate();
                                    var year = dtToday.getFullYear();
                                    if (month < 10)
                                        month = '0' + month.toString();
                                    if (day < 10)
                                        day = '0' + day.toString();

                                    var maxDate = year + '-' + month + '-' + day;
                                    // alert(maxDate);
                                    $('#date1').attr('min', maxDate);
                                });
                            </script>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Tanggal Akhir</label>
                            <input type="date" name="date2" id="date2" class="form-control">
                            <script>
                                $(function() {
                                    var dtToday = new Date();

                                    var month = dtToday.getMonth() + 1;
                                    var day = dtToday.getDate();
                                    var year = dtToday.getFullYear();
                                    if (month < 10)
                                        month = '0' + month.toString();
                                    if (day < 10)
                                        day = '0' + day.toString();

                                    var maxDate = year + '-' + month + '-' + day;
                                    // alert(maxDate);
                                    $('#date2').attr('min', maxDate);
                                });
                            </script>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <select name="jenis_rent">
                                <option value="1">Lepas Kunci</option>
                                <option value="2">Dengan Supir</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-5">

                <div class="p-4 mb-3 bg-white">
                    <h4 class="mb-0 font-weight-bold text-center">Detail Produk</h4> <br>
                    <img src="{{url($manages->produk_images)}}" alt="img_pro" width="100%">

                    <p class="mb-0 font-weight-bold">Nama Mobil</p>
                    <p class="mb-4">{{$manages->namaMobil}}</p>

                    <p class="mb-0 font-weight-bold">Bahan Bakar</p>
                    <p class="mb-4">{{$manages->bb}}</p>

                    <p class="mb-0 font-weight-bold">Kapasitas</p>
                    <p class="mb-0">{{$manages->kapasitas}}</p>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
