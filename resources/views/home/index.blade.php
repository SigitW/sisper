@extends('common.master')
@section('content')
<hr>
<div class="detail-panel">
    <div class="alert alert-success" style="text-align: center;">
        Selamat Datang Pada System Informasi Stok Dan Keuangan ByMelys.id
    </div>
    <hr/>
</div>
<br/>
<script>
    $("#btn-menu").click(function(){
        $("#modal-menu").modal('show');
    });
</script>
@endsection

