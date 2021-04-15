<?php
use App\Http\Controllers\UserController;
?>
@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="header-sub-category mt-5" @if(isset($main_category)) style="background-image: url('{{$main_category->image}}')" @endif>
                    <h2>{{$title}}</h2>
                </div>
            </div>
            @if(isset($main_category))
            @foreach($sub_categories as $category)
            <div class="col-sm-6 col-md-4">
                <a href="{{route('products',$category->id)}}" class="box-home-category" >
                    <img src="{{$category->image}}" style="max-height:300px" class="img-fluid" alt="">
                    <h3>{{$category->name}}</h3>
                </a>
            </div>
            @endforeach
            @else
            @foreach($categories as $category)
            <div class="col-sm-6 col-md-4">
                <a href="{{route('categories',$category->id)}}" class="box-home-category" >
                    <img src="{{$category->image}}" style="max-height:300px" class="img-fluid" alt="">
                    <h3>{{$category->name}}</h3>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>


    
@endsection