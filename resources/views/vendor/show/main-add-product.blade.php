@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 


        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="section-search-product">
                        <h4>تحديد المنتج الذي تريد بيعه </h4>

                    </div>
                </div>
                <form action="">
                    <div class="form-group search-bar">
                        <input type="text" placeholder="اخترالمنتج الذي تريد إضافته">
                        <img src="{{ URL::asset('resources/assets/images/ic_zoom_out_24px.png') }}" alt="">

                    </div>
                    <div class="search-text">
                        <p>ابحث يدويا عن <span style="color: #306EFF">التصنيف</span></p>
                    </div>
                    <div class="bg-white add-product">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>أو يمكنك إضافة منتج جديد</p>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <button type="button">إضافة منتج</button>

                            </div>
                        </div>
                    </div>
                    <div class="bg-white add-product">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <p>اختر قائمة جاهزة من السلع</p>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <button type="button">اختيار</button>

                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            
        </div>



@endsection