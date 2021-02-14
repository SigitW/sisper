
var listpembelian = [];
function savePembelian(){

    var arrData = [];
    var arrDetail = [];
    for (i=0; i < listpembelian.length; i++){
        kode_rekening_id = $("#tb-kode-rekening-id-"+i).val();
        jumlah           = $("#tb-jumlah-"+i).val();
        nama             = $("#tb-nama-"+i).val();
        posisi           = $("#tb-posisi-"+i).val();
        id_vendor        = $("#tb-vendor-"+i).val();
        id_item          = $("#tb-item-"+i).val();
        trans_id         = $("#tb-trans-"+i).val();
        qty              = $("#tb-qty-"+i).val();
        harga            = $("#tb-harga-"+i).val();
        arrData.push({ "kode_rekening_id":kode_rekening_id, "jumlah":jumlah, "nama":nama, "posisi":posisi, "id_vendor":id_vendor, "id_item":id_item, "trans_id":trans_id});
        arrDetail.push({ "harga":harga, "qty":qty});

    }

    // var stData = JSON.stringify(arrData);
    // console.log(stData);
    console.log(arrData);

    $.ajax({
        type:'POST',
        url:urlSavePembelian,
        data: {
            "data":arrData
        },
        success:function(data){
            showAlert("pembelian", data);
            $("#modal-add-pembelian").modal('hide');
        }
    });
}

function savePembelian(){

    var arrData = [];
    var arrDetail = [];
    for (i=0; i < listpembelian.length; i++){
        kode_rekening_id = $("#tb-kode-rekening-id-"+i).val();
        jumlah           = $("#tb-jumlah-"+i).val();
        nama             = $("#tb-nama-"+i).val();
        posisi           = $("#tb-posisi-"+i).val();
        id_vendor        = $("#tb-vendor-"+i).val();
        id_item          = $("#tb-item-"+i).val();
        trans_id         = $("#tb-trans-"+i).val();
        qty              = $("#tb-qty-"+i).val();
        harga            = $("#tb-harga-"+i).val();
        arrData.push({ "kode_rekening_id":kode_rekening_id, "jumlah":jumlah, "nama":nama, "posisi":posisi, "id_vendor":id_vendor, "id_item":id_item, "trans_id":trans_id});
        arrDetail.push({ "harga":harga, "qty":qty});

    }

    // var stData = JSON.stringify(arrData);
    // console.log(stData);
    console.log(arrData);

    $.ajax({
        type:'POST',
        url:urlSavePembelian,
        data: {
            "data":arrData,
            "detail":arrDetail
        },
        success:function(data){
            showAlert("pembelian", data);
            $("#modal-add-pembelian").modal('hide');
        }
    });
}

$("#btn-pembelian").click(function(){
    listpembelian = [];
    $("#modal-add-pembelian").modal('show');
    listpembelian.push({
        "nama": "Kas <input type='hidden' id='tb-nama-0' value='Kas'> <input type='hidden' value='' id='tb-item-0'> <input type='hidden' id='tb-trans-0' value='1'>",
        "vendor": "<input type='hidden' id='tb-vendor-0' value='0'> <input type='hidden' id='tb-id-0' value='1'>",
        "harga": "5000 <input type='hidden' id='tb-harga-0' value='5000'>",
        "qty": "1 <input type='hidden' id='tb-qty-0' value='1'>",
        "jumlah" : "0  <input type='hidden' id='tb-jumlah-0' value='5000'> <input type='hidden' id='tb-posisi-0' value='K'> <input type='hidden' id='tb-kode-rekening-id-0' value='1'>"
    });
    listpembelian.push({
        "nama": "Croco Bag <input type='hidden' id='tb-nama-1' value='Croco Bag'> <input type='hidden' value='1' id='tb-item-1'> <input type='hidden' id='tb-trans-1' value='1'>",
        "vendor": "Shifa Bag  <input type='hidden' id='tb-vendor-1' value='1'>  <input type='hidden' id='tb-id-1' value='2'>",
        "harga": "2500 <input type='hidden' id='tb-harga-1' value='2500'>",
        "qty": "2 <input type='hidden' id='tb-qty-1' value='2'>",
        "jumlah" : "5000  <input type='hidden' id='tb-jumlah-1' value='5000'> <input type='hidden' id='tb-posisi-1' value='D'> <input type='hidden' id='tb-kode-rekening-id-1' value='2'>"
    });

    var str = "";
    $.each(listpembelian, function(i, item){
        str += "<tr>"+
        "<td>"+item.nama+"</td>"+
        "<td>"+item.vendor+"</td>"+
        "<td align='right'>"+item.harga+"</td>"+
        "<td align='right'>"+item.qty+"</td>"+
        "<td align='right'>"+item.jumlah+"</td>"+
        "</tr>";
    });

    $("#body-list-pembelian-barang").html(str);
});

$("#btn-save-pembelian").click(function(){
    savePembelian();
});
