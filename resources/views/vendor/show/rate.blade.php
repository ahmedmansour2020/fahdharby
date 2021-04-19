@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 


        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="section-search-product">
                        <h4>التقييمات</h4>

                    </div>
                </div>
            </div>
            @foreach($rates as $rate)
            <div class="box-rate">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="box-right">
                            <img class="review-avatar" @if($rate->avatar!=null) src="{{asset('uploaded/'.$rate->avatar)}}" @endif alt="">
                            <span class="name-user">{{$rate->user}}</span>
                            <div class="date_rate">
                                <span class="date-rating-user">{{date('d/m/Y',strtotime($rate->created_at))}}</span>
                                <div class="d-inline-block text-primary">
                                <i class="@if($rate->rate>=1) fa @else far @endif fa-star"></i>
                                <i class="@if($rate->rate>=2) fa @else far @endif fa-star"></i>
                                <i class="@if($rate->rate>=3) fa @else far @endif fa-star"></i>
                                <i class="@if($rate->rate>=4) fa @else far @endif fa-star"></i>
                                <i class="@if($rate->rate>=5) fa @else far @endif fa-star"></i>
                            </div>
                            </div>
                            <p>{{$rate->review}}</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="box-left">
                            <form action="{{route('change_status_review',$rate->id)}}" method="post">
                            @method('PUT')    
                            @csrf
                            <button type="submit" class="btn @if($rate->status==1) btn-danger @else btn-success @endif">
                                @if($rate->status==1)
                                <i class="fa fa-ban"></i> 
                                حجب التعليق 
                                @else
                                <i class="fa fa-check"></i> 
                                إظهار التعليق
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>



@endsection