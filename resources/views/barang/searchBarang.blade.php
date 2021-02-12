@extends('common.master')
@section('content')
<style>

</style>
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
    </thead>
    <tbody id="body-list-barang">

    </tbody>
</table>
<script>
$("#btn-filter").click(function(){
    $("#panel-form-pencarian").show();
});
$("#btn-hide").click(function(){
    $("#panel-form-pencarian").hide();
});
</script>
@endsection
