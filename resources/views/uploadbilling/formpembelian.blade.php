<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eRapSis.</title>
    <link rel="apple-touch-icon" href="{{asset('images/')}}/nav.png">
    <link rel="shortcut icon" href="{{asset('images/')}}/nav.png">
    <link rel="icon" href="{{asset('images/')}}/nav.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
    </style>
    <script>

    </script>
</head>
<body>
    <!-- As a link -->
    <nav class="navbar bg-nav" style="font-size:14px;">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Bymelys.id</strong> <span style="font-size:14px">Customer Billing Confirmation Form</span></a>
        </div>
    </nav>
    <br>
    <div class="container">
        <hr>
        <div class="detail-panel">
            <h4>Pilih Kurir dan Alamat Pengiriman :</h4>
            <div class="form-group">
                <label for="">Kurir : </label>
                <select class="form-control">
                    <option class="jne">JNE</option>
                    <option class="jnt">JNT</option>
                    <option class="pos">POS Indonesia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Penerima : </label>
                <input type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">No. Telp : </label>
                <input type="number" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Alamat : </label>
                <textarea cols="4" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Kode Pos : </label>
                <input type="number" class="form-control"/>
            </div>
            <div class="form-group">
                <button class="btn btn-success" style="width: 100%"><i class="fa fa-check"></i> Submit</button>
            </div>
            <hr/>
        </div>
        <br/>
    </div>


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

        $("#copy-jumlah").click(function(){
            copyToClipBoard('hid-jumlah');
            showLabelCopied('jumlah');
        })

        $("#copy-rek").click(function(){
            copyToClipBoard('hid-rek');
            showLabelCopied('rek');
        })

        function copyToClipBoard(id) {
            /* Get the text field */
            console.log("copyToClipBoard");
            var copyText = document.getElementById(id);

            // /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            // alert("Copied the text: " + copyText.text);
        }

        function showLabelCopied(id){
            $("#label-clip-"+id).show().fadeOut("5000");
        }

    </script>
</body>
</html>
