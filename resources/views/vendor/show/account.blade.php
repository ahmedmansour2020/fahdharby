@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 


        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="section-search-product">
                        <h4>حسابي</h4>
                    </div>
                </div>
                <form action="">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-12">
                                <h3>تفعيل الحساب</h3>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="">
                                    <img src="{{ URL::asset('resources/assets/images/credit-card.png') }}" alt="">
                                     نوع الحساب : 
                                </label>
                                <select name="" id="">
                                    <option value="">حساب فردي</option>
                                    <option value="">حساب شركة</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                
                
            </div>
            
        </div>



@endsection