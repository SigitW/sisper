
$("#btn-varian").click(function(){
    $('#table-varian-barang').DataTable({
            destroy:true,
            data: null
    });
    $("#modal-varian-barang").modal('show');
});

$("#btn-add-varian").click(function(){
    $("#modal-add-varian")
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();

    $("#modal-add-varian").modal('show');
    selBarang("add", "barang-varian");
});

$("#btn-search-varian").click(function(){
    searchVarian();
});

// transaksi
$("#btn-save-add-varian").click(function(e){

   e.preventDefault();

   var varian       = $("#input-add-varian").val();
   var id_barang    = $("#sel-add-barang-varian").val();
   var nama_barang  = $("#sel-add-barang-varian option:selected").text();

   $.ajax({
      type:'POST',
      url:urlSaveAddVarian,
      data:{
          "varian":varian,
          "id_barang":id_barang,
      },
      beforeSend: function() {
           //modalLoading('show');
      },
      success:function(data){

           var name = "varian";
           $("#modal-add-varian").modal('hide');
           console.log(data);
           showAlert(name, data);
           $("#search-nama-varian").val(nama_barang);
           searchVarian();
      }
   });
});

function searchVarian(){
    var namaBarang = $("#search-nama-varian").val();
    $.ajax({
      type:'POST',
      url: urlSearchVarian,
      data:{
          "nama":namaBarang
      },
      beforeSend: function() {
           //modalLoading('show');
      },
      success:function(data){
        var listBarang = [];
        $.each(data, function(i, item){
            var data = [item.nama, item.nama_pembelian, item.varian,
            "<button class=\"btn btn-sm btn-dark\" onclick=\"showEditVarian(\'"+item.id+"\')\"><i class=\"fa fa-edit\"></i></button>"
            ];
            listBarang.push(data);
        });

        $('#table-varian').DataTable({
            destroy:true,
            data: listBarang
        });
      }
   });
}

function showEditVarian(id){
    $("#modal-edit-varian").modal('show');
    selBarang("edit", "barang-varian");

    $("#modal-edit-varian")
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();

    $.ajax({
        type:'POST',
        url:urlEditVarian,
        data:{
          "id":id
        },
        success:function(data){
            data = data[0];
            console.log(data);
            $("#input-edit-varian").val(data.varian);
            $("#sel-edit-barang-varian").val(data.id_barang);
            $("#edit-id-varian").val(data.id);
        }
    });
}


$("#btn-save-edit-varian").click(function(){
    saveEditVarian();
});

function saveEditVarian(){
    var varian          = $("#input-edit-varian").val();
    var id_barang       = $("#sel-edit-barang-varian option:selected").val();
    var nama_barang     = $("#sel-edit-barang-varian option:selected").text();
    var id              = $("#edit-id-varian").val();

    $.ajax({
        type:'POST',
        url:urlSaveEditVarian,
        data:{
          "id":id,
          "varian":varian,
          "id_barang":id_barang
        },
        success:function(data){
            showAlert("varian", data);
            $("#modal-edit-varian").modal('hide');
            $("#search-nama-varian").val(nama_barang);
            searchVarian();
        }
    });
}


function selBarang(modul, namamenu){

    $.ajax({
        type:'POST',
        url:urlSearchBarang,
        data:{
          "nama": null,
        },
        success:function(data){
            var str = ""
            $.each(data, function(i, item){
                str += '<option value="'+ item.id +'">'+ item.nama +'</option>';
            });
            $("#sel-"+modul+"-"+namamenu).html(str);
        }
    });

}
