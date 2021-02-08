@extends('common.master')
@section('content')
<style>
    .card-panel{
        width: 100%;
        height: 200px;
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: gray 1px 1px 5px;
    }
    .nilai{
        margin-top: 20px;
        font-size: 50px;
    }
</style>
<h5>Kas</h5>
<div class="row">
    <div class="col-md-4">
        <div class="card-panel">
            <div>Total Kas</div>
            <div class="nilai">500.000<div>
        </div>
    </div>
</div>
{{-- <table class="table table-bordered">
    <thead>
        <td>Total Kas</td>
    </thead>
</table> --}}
@endsection
