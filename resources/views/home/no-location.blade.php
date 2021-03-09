@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="section-center">
                        <img src="{{URL::asset('resources/assets/images/Icon material-location-on.png')}}" class="img-fluid" alt="">
                        <h3>لم تحدد عنوان بعد</h3>
                        <a href="{{url('/location')}}" class="btn btn-primary">حدد عنوانك</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection