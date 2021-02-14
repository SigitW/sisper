@extends('common.master')
@section('content')
<style>

</style>
<script>

</script>
<h5>Barang</h5>
<hr/>
<div class="row no-gutters">
    <div class="col-md-3"><button class="btn btn-dark full show-btn" id="btn-filter"><i class="fa fa-filter"></i> <span id="label-btn-filter">Filter Pencarian<span></button></div>
    <div class="col-md-3"><button class="btn btn-light full" id="btn-barang"><i class="fa fa-briefcase"></i> Barang</button></div>
    <div class="col-md-3"><button class="btn btn-light full" id="btn-varian"><i class="fa fa-briefcase"></i> Varian Barang</button></div>
    <div class="col-md-3"><button class="btn btn-light full" id="btn-pembelian"><i class="fa fa-download"></i> Pembelian Barang</button></div>
</div>
<br/>
<div id="panel-form-pencarian" style="display: none">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label for="" class="label">Nama</label>
                <input type="text" name="" id="nama-barang" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label">Vendor</label>
                <input type="text" name="" id="nama-vendor" class="form-control">
            </div>
            <button class="btn btn-sm btn-dark" id="btn-search"><i class="fa fa-search"></i> Search</button>
            <button class="btn btn-sm btn-light" id="btn-hide"><i class="fa fa-arrow-up"></i> Sembunyikan Pencarian</button>
        </div>
    </div>
</div>
<br/>

<div id="alert-pembelian">
    <div style="font-weight: bold" id="alert-label-pembelian"></div>
    <div id="alert-body-pembelian"></div>
</div>

<table class="table table-striped" id="table-search-detail">
    <thead>
        <td>Nama Beli / Varian</td>
        <td>Nama Jual / Varian</td>
        <td>Vendor</td>
        <td>Margin</td>
        <td>qty</td>
        <td>Harga Beli Terakhir</td>
        <td>Harga Jual</td>
        <td>Ubah Harga</td>
    </thead>
    <tbody id="body-list-barang-detail">

    </tbody>
</table>

{{-- Modal Barang --}}

<div class="modal fade" id="modal-barang" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-briefcase"></i> Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="alert-barang">
                <div style="font-weight: bold" id="alert-label-barang"></div>
                <div id="alert-body-barang"></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="" class="label">Nama Barang</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="" id="search-nama-barang" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button class="btn btn-sm btn-dark" id="btn-search-barang"><i class="fa fa-search"></i> Search</button>
                                <button class="btn btn-sm btn-dark" id="btn-add-barang"><i class="fa fa-plus"></i> Tambah Barang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="table-barang">
                        <thead>
                            <td>Nama Barang Jual</td>
                            <td>Nama Barang Beli</td>
                            <td>Margin Keuntungan (%)</td>
                            <td>Vendor</td>
                            <td>Harga Default</td>
                            <td>Action</td>
                        </thead>
                        <tbody id="body-list-barang">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-barang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="" class="label">Nama Barang Saat Beli</label>
                <input type="text" name="" id="input-add-nama-barang-beli" class="form-control"  value="">
            </div>
            <div class="form-group">
                <label for="" class="label">Nama Barang Saat Jual</label>
                <input type="text" name="" id="input-add-nama-barang-jual" class="form-control"  value="">
            </div>
            <div class="form-group">
                <label for="" class="label">Vendor</label>
                <select name="" id="sel-add-vendor" class="form-control"  value=""></select>
            </div>
            <div class="form-group">
                <label for="" class="label">Harga Default</label>
                <input type="number" name="" id="input-add-harga-default" class="form-control"  value="">
            </div>
            <div class="form-group">
                <label for="" class="label">Margin Keuntungan (%)</label>
                <input type="number" name="" id="input-add-margin" class="form-control" style="width: 50%" alt="Persen"  value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save-add-barang"><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-barang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="" id="edit-id-barang">
            <div class="form-group">
                <label for="" class="label">Nama Barang Saat Beli</label>
                <input type="text" name="" id="input-edit-nama-barang-beli" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label">Nama Barang Saat Jual</label>
                <input type="text" name="" id="input-edit-nama-barang-jual" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label">Vendor</label>
                <select name="" id="sel-edit-vendor" class="form-control" value=""></select>
            </div>
            <div class="form-group">
                <label for="" class="label">Harga Default</label>
                <input type="number" name="" id="input-edit-harga-default"  value=""  class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label">Margin Keuntungan (%)</label>
                <input type="number" name="" id="input-edit-margin" class="form-control" style="width: 50%" alt="Persen"  value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save-edit-barang"  value=""><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>
{{-- END --}}

{{-- Modal Varian --}}
<div class="modal fade" id="modal-varian-barang" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-briefcase"></i> Varian Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="alert-varian">
                <div style="font-weight: bold" id="alert-label-varian"></div>
                <div id="alert-body-varian"></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="" class="label">Nama Barang</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="" id="search-nama-varian" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button class="btn btn-sm btn-dark" id="btn-search-varian"><i class="fa fa-search"></i> Search</button>
                                <button class="btn btn-sm btn-dark" id="btn-add-varian"><i class="fa fa-plus"></i> Tambah Varian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="table-varian">
                        <thead>
                            <td>Nama Barang Jual</td>
                            <td>Nama Barang Beli</td>
                            <td>Varian</td>
                            <td>Action</td>
                        </thead>
                        <tbody id="body-list-varian-barang">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-varian" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Varian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="" class="label">Barang</label>
                <select name="" id="sel-add-barang-varian" class="form-control"  value="">

                </select>
            </div>
            <div class="form-group">
                <label for="" class="label">Varian</label>
                <input type="text" name="" id="input-add-varian" class="form-control"  value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save-add-varian"><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-varian" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Varian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="" id="edit-id-varian">
            <div class="form-group">
                <label for="" class="label">Barang</label>
                <select name="" id="sel-edit-barang-varian" class="form-control"  value=""></select>
            </div>
            <div class="form-group">
                <label for="" class="label">Varian</label>
                <input type="text" name="" id="input-edit-varian" class="form-control"  value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save-edit-varian"><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>

{{-- Modal Pembelian --}}

<div class="modal fade" id="modal-add-pembelian" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-download"></i> Add Pembelian Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="" class="label">Nama Barang</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="" id="search-nama-varian" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button class="btn btn-sm btn-dark" id="btn-search-varian"><i class="fa fa-search"></i> Search</button>
                                <button class="btn btn-sm btn-dark" id="btn-add-varian"><i class="fa fa-plus"></i> Tambah Varian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="table-varian">
                        <thead>
                            <td>Nama </td>
                            <td>Vendor</td>
                            <td align="right">Nett</td>
                            <td align="right">Qty</td>
                            <td align="right">Jumlah</td>
                        </thead>
                        <tbody id="body-list-pembelian-barang">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save-pembelian"><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/trans/barang.js') }}"></script>
<script src="{{ asset('/js/trans/varian.js') }}"></script>
<script src="{{ asset('/js/trans/pembelianbarang.js') }}"></script>

<script>
var urlSearchBarang     = "{{ route('barang.search') }}";
var urlEditBarang       = "{{ route('barang.edit') }}";
var urlSaveEditBarang   = "{{ route('barang.saveEdit') }}";
var urlSaveAddBarang    = "{{ route('barang.saveAdd') }}";
var urlSearchVendor     = "{{ route('barang.searchVendor') }}";

var urlSearchVarian     = "{{ route('varian.search') }}";
var urlEditVarian       = "{{ route('varian.edit') }}";
var urlSaveEditVarian   = "{{ route('varian.saveEdit') }}";
var urlSaveAddVarian    = "{{ route('varian.saveAdd') }}";

var urlSavePembelian    = "{{ route('pembelianbarang.save') }}";
var urlSearchDetail     = "{{ route('barang.searchDetail') }}";

$("#btn-filter").click(function(){
    $("#panel-form-pencarian").show();
});

$("#btn-hide").click(function(){
    $("#panel-form-pencarian").hide();
});

function showAlert(name, data){
    if('error' in data){
        $("#alert-"+name).prop("class","alert alert-danger");
        $("#alert-label-"+name).html("ERROR");
        $("#alert-body-"+name).html(data.error);
        $("#alert-"+name).fadeOut(3000);
    }
    if('success' in data){
        $("#alert-"+name).prop("class","alert alert-success");
        $("#alert-label-"+name).html("SUCCESS");
        $("#alert-body-"+name).html(data.success);
        $("#alert-"+name).fadeOut(3000);
    }
}

$("#btn-search").click(function(){
    var nama = $("#nama-barang").val();
    var vendor = $("#nama-vendor").val();

    $.ajax({
      type:'POST',
      url: urlSearchDetail,
      data:{
          "nama":nama,
          "vendor":vendor
      },
      beforeSend: function() {
           //modalLoading('show');
      },
      success:function(data){
        var listBarang = [];
        $.each(data, function(i, item){
            var data = [item.nama_pembelian +" / "+ item.varian, item.nama +" / "+item.varian, item.nama_vendor, item.margin + "%", item.qty, item.harga_beli, item.harga_jual,
            "<button class=\"btn btn-sm btn-dark\" onclick=\"showEditHarga(\'"+item.id+"\')\"><i class=\"fa fa-edit\"></i></button>"
            ];
            listBarang.push(data);
        });

        $('#table-search-detail').DataTable({
            destroy:true,
            data: listBarang
        });
      }
   });
});


</script>
@endsection
