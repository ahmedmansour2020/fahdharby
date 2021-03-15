@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-3">

            @include("vendor.layout.navbar-right-vendor")

        </div>
        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection