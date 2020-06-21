<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cetak Kwitansi/{{$manages[0]->name}}/{{$manages[0]->produk_id}}</title>

    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font: 12pt "Arial";
        height: 297mm;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .no-margin {
        margin: 0px;
        display: flex;
    }

    hr {
        background-color: black;
        height: 1px;
    }


    hr.besar {
        border: 2px solid black;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" style="margin-left:95%" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-success my-2 my-sm-0" onclick="printContent('cetak_pdf')">Print</button>
            </form>
        </div>
    </nav>

    <div id="cetak_pdf">

        <div class="row mt-2">
            <div class="col-auto my-auto">
                <img src="{{url('cssUser/images/logo.jpg')}}" alt="" style="width:350px;">
            </div>
            <div class="col mx-2 my-auto">
                <h4 style="font-family: arial"><b>RENTAL MOBIL</b></h4>
                <p>
                    Jl. Margonda Raya No.100 <br>
                    Depok <br>
                    Phone/Fax : 021-800011 <br>
                    WA : +62 813-1198-8780 <br>
                    email : herdi@gmail.com
                </p>
            </div>
            <div class="col-auto my-auto mr-4">
                <h1 style="font-family: arial black">KWITANSI</h1>
                <hr class="my-0 mr-0" width="100%" align="left">
                <h1 style="font-family: arial black">RECEIPT</h1>
                <br>
                <div class="row" style=>
                    <div class="col-auto">
                        No <br>
                        <hr class="my-0 mr-0" width="100%" height="2px" align="left">
                        <i>Number</i>
                    </div>
                    <div class="col-auto my-auto">
                        : <b style="border-bottom: 2px dotted">KW-{{$manages[0]->id}}</b>
                    </div>
                </div>
            </div>

        </div>


        <div class="border border-dark mx-4 py-3 mt-2">
            <div class="mx-2">
                <div class="row">
                    <div class="col-auto" style="width: 170px">
                        Sudah Terima Dari <br>
                        <hr class="my-0 mr-0" width="100%" height="2px" align="left">
                        <i>Received From</i>
                    </div>
                    <div class="col my-auto">
                        : <b style="font-size:24px">{{$manages[0]->name}}</b>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-auto" style="width: 170px">
                        Banyak Uang <br>
                        <hr class="my-0 mr-0" width="100%" height="2px" align="left">
                        <i>In Payment Of</i>
                    </div>
                    <div class="col my-auto">
                        : <i style="font-size:20px">{{$manages[0]->terbilang}} Rupiah</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="border border-dark mx-4" style="height: 100px">
            <div class="mx-2">
                <div class="row" style="margin-top:20px">
                    <div class="col-auto" style="width: 170px">
                        Untuk Pembayaran <br>
                        <hr class="my-0 mr-0" width="100%" height="2px" align="left">
                        <i>Received From</i>
                    </div>
                    <div class="col my-auto">
                        : <span style="font-size:20px">Penyewaan Unit</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <hr class="ml-4 besar" width="50%" align="left">
                <div class="ml-4" width="50%" align="left">
                    <b style="font-size:40px">Rp. {{number_format($manages[0]->harga,2)}}</b>
                </div>
                <hr class="ml-4 besar" width="50%" align="left">
            </div>
            <div class="col-auto mx-4" style="text-align: right">
                <div style="margin-bottom: 150px;">
                    <span style="font-size:20px">Depok, <?php echo date("d-m-Y");?></span>
                </div>
            </div>
        </div>
        <div class="row" style="width:150px; margin-left: 75%;">
            <div class="col">
                <div class="text-center">
                    <span style="font-size:25px">HERDI</span>
                    <hr class="my-0 mr-0" width="100%" height="2px">
                    <span style="font-size:25px">DIREKTUR</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
