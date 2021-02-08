<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bymelysid.store</title>
    <link rel="apple-touch-icon" href="{{asset('images/')}}/nav.png">
    <link rel="shortcut icon" href="{{asset('images/')}}/nav.png">
    <link rel="icon" href="{{asset('images/')}}/nav.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .bg-nav{
            background-image: linear-gradient(to right, #046878 , #469dba);
            color:#FFF;
        }
        .bg-nav a{
            color: #FFF;
        }
        .form-inline a{
            font-size: 15px;
        }

        .siswa-panel{
            -webkit-box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            -moz-box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            padding: 30px;
        }
        .siswa-panel img{
            display:block;
            margin:auto;
        }

        .data-siswa-panel{
            padding-top:30px;
            padding-right: 30px;
            padding-left: 30px;
        }

        .detail-panel{
            -webkit-box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            -moz-box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            box-shadow: 0px 0px 14px 1px rgba(204,204,204,0.5);
            padding: 30px;
        }

        .label-clip{
            background-color: darkgray;
            color: #FFF;
            padding: 5px;
            border-radius: 5px;
            width: fit-content;
        }

        .copyclip:hover{
            cursor: pointer;
        }

        .box-menu{
            color: white;
            padding: 10px;
            background-image: linear-gradient(to right, #046878 , #469dba);
            width: 100%;
            height: 120px;
            text-align: center;
        }
        .box-menu:hover{
            cursor: pointer;
            color: white;
            background-image: linear-gradient(to right, #046878 , #064d64);
        }
        .menu-logo{
            margin-top: 20px;
        }
        .menu-name{
            font-size: 13px;
            margin-top: 10px;
        }
        .line-label{
            width: 50%;
            float: left;
        }
    </style>
    <script>

    </script>
</head>
<body>
    <!-- As a link -->
    <nav class="navbar bg-nav" style="font-size:14px;">
        <div class="container">
            <a class="navbar-brand" href="/home"><strong>Bymelys.id</strong> <span style="font-size:14px">Sistem Informasi</span></a>
            <span href="#" style="text-decoration: none; cursor: pointer;" id="btn-menu"><i class="fa fa-bars"></i> Menu</span>
        </div>

    </nav>
    <br>

    <script>
        function toUrl(url){
            window.location.href = url;
        }

        $("#btn-menu").click(function(){
            $("#modal-menu").modal('show');
        });

    </script>

    <div class="container">
        <hr>
        <div class="detail-panel">
            @yield('content')
        </div>
        <br/>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-menu">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body-menu">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="box-menu" onclick="toUrl('/dashboard')">
                                    <div class="menu-logo"><i class="fa fa-chart-line"></i></div>
                                    <div class="menu-name">Dashboard & Laporan</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-menu" onclick="toUrl('/barang')">
                                    <div class="menu-logo"><i class="fa fa-briefcase"></i></div>
                                    <div class="menu-name">Barang</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-menu" onclick="toUrl('/kas')">
                                    <div class="menu-logo"><i class="fa fa-file"></i></div>
                                    <div class="menu-name">Kas</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box-menu" onclick="toUrl('/generate')">
                                    <div class="menu-logo"><i class="fa fa-align-left"></i></div>
                                    <div class="menu-name">Generate Form</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box-menu" id="verifikasi" onclick="toUrl('/verifikasi')">
                                    <div class="menu-logo"><i class="fa fa-edit"></i></div>
                                    <div class="menu-name">Verifikasi Pembelian</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box-menu" onclick="toUrl('/pengiriman')">
                                    <div class="menu-logo"><i class="fa fa-truck"></i></div>
                                    <div class="menu-name">Verifikasi Pengiriman</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

