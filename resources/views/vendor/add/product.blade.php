@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

        <div class="col-sm-12 col-lg-9 mt-5">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="section-search-product">
                <h4>{{$title}}</h4>
                
              </div>
            </div>
            
            <div class="col-sm-8 mx-auto">
              
              <div class="form-product">
                      @if($action=='add')
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" id="form">
                            @else
                            <form action="{{route('product.update',$saved->id)}}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @endif
                                @csrf

                                <div class="form-group row pl-4">
                                    <div class="col-lg-6">
                                        <select name="main_category" id="main_category" class="w-100">
                                            <option value="" disabled selected>فئة السلعة الرئيسية</option>
                                            @foreach($main_categories as $category)
                                            <option value="{{$category->id}}" @if($action=='update' ) @if($category->
                                                id==$saved->main_category) selected @endif @endif>{{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="sub_category" id="sub_category" class="w-100">
                                            <option value="" disabled selected>فئة السلعة الفرعية</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="select-group ">
                                    <select name="brand_id" id="brand_id">
                                        <option value="" disabled selected>العلامة التجارية</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @if($action=='update' ) @if($brand->
                                            id==$saved->brand_id) selected @endif @endif>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" name="name_ar" id="name_ar" placeholder="اسم السلعة"
                                    value="{{$action=='update'?$saved->name_ar:''}}">

                                <div class="box-choose-img">
                                    <h4>صور السلعة</h4>
                                    <div class="input-images"></div>
                                </div>
                                <div class="details-products">
                                    <h4>تفاصيل السلعة</h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <input type="number" name="qty" id="qty"
                                                value="{{$action=='update'?$saved->qty:''}}" placeholder="الكمية">

                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <input type="number" name="price" id="price"
                                                value="{{$action=='update'?$saved->price:''}}" placeholder="السعر">

                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <input type="number" name="duration" id="duration"
                                                value="{{$action=='update'?$saved->duration:''}}"
                                                placeholder="مدة تجهيز السلعة">

                                        </div>

                                    </div>
                                    <textarea type="text" name="description_ar" id="description_ar"
                                        placeholder="ملاحظات">{{$action=='update'?$saved->description_ar:''}}</textarea>

                                </div>
                                <button type="submit" class="btn-add-product">أضف المنتج</button>
                            </form>

                    </div>
                </div>


            </div>
        </div>

@section('page_js')

<script>
var type = "{{$action=='update' ? 1:0}}";
var sub_category = "{{$action=='update'?$saved->sub_category:''}}";
var sub_categories = [];
@foreach($sub_categories as $category)
sub_categories.push({
    'id': '{{$category->id}}',
    'name': '{{$category->name}}',
    'parent_id': '{{$category->parent_id}}',
})
@endforeach
var images = [];
@if($action == 'update')
@foreach($images as $image)
images.push({
    'id': '{{$image->id}}',
    'src': '{{ url("/uploaded/".$image->name) }}'
})
@endforeach
@endif
</script>
<script type="text/javascript" src="{{asset('resources/plugins/uploadmultiimage/dist/image-uploader.min.js')}}">
</script>
<script src="{{asset('resources/assets/js/content/imageupload.js')}}"></script>

<script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/product.js')}}"></script>
@endsection
@endsection