@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content')
<?php
$total=0;
?>
<div class="container">
    <div class="row mt-5">
        @if(count($products)>0)
        <div class="col-sm-12 col-md-12 col-lg-8">
            @foreach($products as $product)
            <?php
            $total+=$product->price*$product->cart_qty;
            ?>
            <input type="hidden" class="products_rates" value="{{$product->id}}">
            <div class="product-details">
                <div class="container-image-detailsProduct border mb-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <img src="{{ $product->image }}" class="img-fluid" style="width: 30%; margin-left: 20px"
                                alt="">
                            <div class="d-inline-block title-products">
                                <h3 dir="rtl">{{$product->name}}
                                    @if($product->old_price!=null)
                                    (<del style="font-size:20px">{{$product->old_price}}$</del> <b
                                        class="text-success">{{$product->price}}$</b>)
                                    @endif
                                </h3>

                                <span id="cart_price_{{$product->cart_id}}">
                                    @if($product->cart_qty==1)
                                    {{$product->price}}$
                                    @else
                                    {{$product->price*$product->cart_qty}}$
                                    <span style="font-size: 14px;">(سعر القطعة الواحدة {{$product->price}}$)</span>
                                    @endif
                                </span>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-4">
                            <form action="">
                                <label for="" class="d-block"><strong>الكمية</strong></label>
                                <select data-price="{{$product->price}}" data-id="{{$product->cart_id}}"
                                    class="change_cart_qty" style="width: 60px;
                                    border-radius: 5px;
                                    height: 38px;">
                                    @for($i=1;$i<$product->qty/3;$i++)
                                        <option @if($product->cart_qty==$i) selected @endif>{{$i}}</option>
                                        @endfor
                                </select>
                            </form>
                        </div>
                        <div class="col-12">

                            <table dir="rtl">
                                <tbody>
                                    <tr>
                                        <td>الحالة</td>
                                        <td>:</td>
                                        <td>جديد</td>
                                    </tr>
                                    <tr>
                                        <td>البائع</td>
                                        <td>:</td>
                                        <td>{{$product->supplier}}</td>
                                    </tr>
                                    <tr>
                                        <td>التقييم</td>
                                        <td>:</td>
                                        <td>
                                            <input type="hidden" id="rate_star_{{$product->id}}"
                                                value="{{$product->reviews_stars}}">
                                            <div class="text-primary d-inline-block">
                                                <i class="far fa-star rate_star_{{$product->id}}"></i>
                                                <i class="far fa-star rate_star_{{$product->id}}"></i>
                                                <i class="far fa-star rate_star_{{$product->id}}"></i>
                                                <i class="far fa-star rate_star_{{$product->id}}"></i>
                                                <i class="far fa-star rate_star_{{$product->id}}"></i>
                                            </div>
                                            <span class="amount-comments">{{$product->reviews}} تعليق</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>مكان الشحن</td>
                                        <td>:</td>
                                        <td>السعودية جدة</td>
                                    </tr>
                                    <tr>
                                        <td>مدة التوصيل</td>
                                        <td>:</td>
                                        <td>{{$product->duration}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row w-100">
                        <div class="col-12">
                            <hr>
                            <a class="btn bg-white border border-dark p-2 px-3"
                                href="{{route('remove_from_cart',$product->cart_id)}}">
                                <i class="fa fa-trash"></i>
                                إزالة من سلة المشتريات</a>
                        </div>
                    </div>

                </div>


            </div>

            @endforeach

        </div>


        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="last-price border p-3">
                <h3>السعر النهائي</h3>
                <p id="total_price">{{$total}}$</p>
            </div>
            <a href="{{route('checkout')}}" class="btn btn-primary w-100 py-3">إتمام عملية الشراء</a>

            <input type="text" id="promocode" name="promocode" class="mt-4 p-2" placeholder="أدخل كوبون الخصم">
            <button class="btn btn-primary mr-4" type="button" id="send_code">إضافة</button>
            <div id="message">
            </div>

            <div class="buttons-remove mt-4">

                <button class="btn bg-white border border-dark p-2 px-3 mr-3" type="button">رجوع</button>

            </div>

        </div>
        @else
        <h2>سلة المشتريات فارغة</h2>
        @endif


    </div>
</div>

@endsection
@section('page_js')
<script>
var change_cart_qty = "{{route('change_cart_qty')}}";
var add_promocode = "{{route('add_promocode')}}";
</script>
<script src="{{asset('resources/assets/js/content/rate.js')}}"></script>
<script src="{{asset('resources/assets/js/content/cart.js')}}"></script>
@endsection