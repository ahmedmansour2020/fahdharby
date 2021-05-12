<?php
use App\Http\Controllers\UserController;?>
@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('home')
<?php
$home = true;

?>
@endsection
@section('content')

<div class="container search-results-content">
    <div class="row ">
        @foreach($products as $product)
        <div class="col-12 single-item">
            <div class="row">
                <div class="col-sm-12 col-lg-3 text-center col-image">
                    <a href="{{route('product-details',$product->id)}}" class="img-bucket"><img
                            src="{{$product->image}}" alt=""></a>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <a href="{{route('product-details',$product->id)}}" class="title-product">
                        <h2 class="itemTitle">
                            {{$product->name}}

                        </h2>
                    </a>
                    <div class="content-products pr-3 mt-3">
                        <p>{!!$product->description!!}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 buy">
                    <ul class="list-blocks list-unstyled px-0 mt-3">
                        <li>
                            <div class="price-inline">
                                @if($product->old_price!=null)
                                <h4 class="text-primary">{{$product->price}} $</h4>
                                <h6><del>{{$product->old_price}} $</del></h6>
                                @else
                                <h4 class="text-primary">{{$product->price}} $</h4>
                                @endif
                            </div>
                        </li>
                        <li>
                            <a href="{{route('product-details',$product->id)}}"
                                class="button btn btn-primary view-product-details mt-4">انقر هنا للمزيد من
                                المعلومات</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
<div class="text-center page_navigation" dir="ltr">
    {{$products->links()}}
</div>



@endsection
@section('page_js')
<script>
$(document).ready(function() {

    $('.page_navigation span').each(function(e) {
        $(this).addClass('mx-5')
        $(this).text($(this).text().replace('Next', ''))
        $(this).text($(this).text().replace('Previous', ''))
    })
    $('.page_navigation a').each(function(e) {
        $(this).text($(this).text().replace('Next', ''))
        $(this).text($(this).text().replace('Previous', ''))
    })
})
</script>
@endsection