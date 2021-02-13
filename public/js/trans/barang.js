$("#btn-filter").click(function(){
    $("#panel-form-pencarian").show();
});

$("#btn-hide").click(function(){
    $("#panel-form-pencarian").hide();
});

$("#btn-barang").click(function(){
    $('#table-barang').DataTable({
            destroy:true,
            data: null
    });
    $("#modal-barang").modal('show');
});

$("#btn-add-barang").click(function(){
    $("#modal-edit-barang")
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();

    $("#modal-add-barang").modal('show');
});

$("#btn-search-barang").click(function(){
    searchBarang();
});

// transaksi
$("#btn-save-add-barang").click(function(e){

   e.preventDefault();

   var namabeli = $("#input-add-nama-barang-beli").val();
   var namajual = $("#input-add-nama-barang-jual").val();
   var vendor   = $("#sel-add-vendor").val();
   var harga    = $("#input-add-harga-default").val();
   var margin   = $("#input-add-margin").val();

   $.ajax({
      type:'POST',
      url:urlSaveAddBarang,
      data:{
          "nama_pembelian":namabeli,
          "nama":namajual,
          "id_vendor":vendor,
          "harga_default":harga,
          "margin":margin
      },
      beforeSend: function() {
           //modalLoading('show');
      },
      success:function(data){

           var name = "barang";
           $("#modal-add-barang").modal('hide');
           console.log(data);
           showAlert(name, data);
           $("#search-nama-barang").val(namajual);
           searchBarang();
      }
   });
});

function searchBarang(){
    var namaBarang = $("#search-nama-barang").val();
    $.ajax({
      type:'POST',
      url: urlSearchBarang,
      data:{
          "nama":namaBarang
      },
      beforeSend: function() {
           //modalLoading('show');
      },
      success:function(data){
        var listBarang = [];
        $.each(data, function(i, item){
            var data = [item.nama, item.nama_pembelian, item.margin, "", item.harga_default,
            "<button class=\"btn btn-sm btn-dark\" onclick=\"showEdit(\'"+item.id+"\')\"><i class=\"fa fa-edit\"></i></button>"
            ];
            listBarang.push(data);
        });

        $('#table-barang').DataTable({
            destroy:true,
            data: listBarang
        });
      }
   });
}

function showEdit(id){
    $("#modal-edit-barang").modal('show');

    $("#modal-edit-barang")
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();

    $.ajax({
        type:'POST',
        url:urlEditBarang,
        data:{
          "id":id
        },
        success:function(data){
            data = data[0];
            $("#input-edit-nama-barang-beli").val(data.nama_pembelian);
            $("#input-edit-nama-barang-jual").val(data.nama);
            $("#sel-edit-vendor").val(data.id_vendor);
            $("#input-edit-harga-default").val(data.harga_default);
            $("#input-edit-margin").val(data.margin);
            $("#edit-id-barang").val(data.id);
        }
    });
}


$("#btn-save-edit-barang").click(function(){
    saveEditBarang();
});

function saveEditBarang(){
    var namabeli = $("#input-edit-nama-barang-beli").val();
    var namajual = $("#input-edit-nama-barang-jual").val();
    var vendor   = $("#sel-edit-vendor").val();
    var harga    = $("#input-edit-harga-default").val();
    var margin   = $("#input-edit-margin").val();
    var id       = $("#edit-id-barang").val();
    $.ajax({
        type:'POST',
        url:urlSaveEditBarang,
        data:{
          "id":id,
          "nama_pembelian":namabeli,
          "nama":namajual,
          "id_vendor":vendor,
          "harga_default":harga,
          "margin":margin
        },
        success:function(data){
            showAlert("barang", data);
            $("#modal-edit-barang").modal('hide');
            $("#search-nama-barang").val(namajual);
            searchBarang();
        }
    });
}
