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
            <button class="btn btn-sm btn-success" id="btn-search"><i class="fa fa-search"></i> Search</button>
            <button class="btn btn-sm btn-danger" id="btn-hide"><i class="fa fa-arrow-up"></i> Sembunyikan Pencarian</button>
        </div>
    </div>
</div>
<br/>
<table class="table table-bordered table-striped">
    <thead>
        <td>Nama Beli / Varian</td>
        <td>Nama Jual / Varian</td>
        <td>Vendor</td>
        <td>Margin</td>
        <td>Harga Beli Terakhir</td>
        <td>Harga Jual</td>
        <td>Action</td>
    </thead>
    <tbody id="body-list-barang-detail">

    </tbody>
</table>

<div class="modal fade" id="modal-barang" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Barang</h5>
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
                                <button class="btn btn-sm btn-success" id="btn-search-barang"><i class="fa fa-search"></i> Search</button>
                                <button class="btn btn-sm btn-primary" id="btn-add-barang"><i class="fa fa-plus"></i> Tambah Barang</button>
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
                            <td>Margin Keuntungan</td>
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
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
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
                <label for="" class="label">Margin Keuntungan</label>
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
                <label for="" class="label">Margin Keuntungan</label>
                <input type="number" name="" id="input-edit-margin" class="form-control" style="width: 50%" alt="Persen"  value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save-edit-barang"  value=""><i class="fa fa-check"></i> Save</button>
        </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/trans/barang.js') }}"></script>
<script>
var urlSearchBarang = "{{ route('barang.search') }}";
var urlEditBarang = "{{ route('barang.edit') }}";
var urlSaveEditBarang = "{{ route('barang.saveEdit') }}";
var urlSaveAddBarang = "{{ route('barang.saveAdd') }}";
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
</script>
@endsection
