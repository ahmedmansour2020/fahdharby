@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

@if($action=='add')
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12 col-lg-3">

          @include("vendor.layout.navbar-right-vendor")

      </div>
      <div class="col-sm-12 col-lg-9 mt-5">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="section-search-product">
                <h4>أضف منتج جديد</h4>

            </div>
        </div>

        <div class="col-sm-8 mx-auto">

        <div class="form-product">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @else
                <form action="{{route('product.update',$saved->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
    
                <div class="form-group">
                  <select name="main_category" id="main_category" >
                    <option value="" disabled selected>فئة السلعة الرئيسية</option>
                    <option value="" >فئة السلعة الرئيسية</option>
                    @foreach($main_categories as $category)
                    <option value="{{$category->id}}" @if($action=='update') @if($category->id==$saved->main_category) selected @endif @endif>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <select name="sub_category" id="sub_category" >
                    <option value="" disabled selected>فئة السلعة الرئيسية</option>
                    <option value="" >فئة السلعة الرئيسية</option>
                  </select>
                </div>

              <div class="select-group">
                <select name="brand_id" >
                  <option value="" disabled selected>النوع</option>
                  <option value="" >النوع</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}" @if($action=='update') @if($brand->id==$saved->brand_id) selected @endif @endif>{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>      
              <input type="text" name="name_ar" placeholder="اسم السلعة" value="{{$action=='update'?$saved->name_ar:''}}">
              
              <div class="box-choose-img">
                <input type="text" placeholder="صورة السلعة">
                <input type="file" class=" choose-img" name="images[]" multiple>

                {{-- <input type="file" class="choose-img" name="images[]" multiple> --}}
              </div>
              <div class="details-products">
                <h4>تفاصيل السلعة</h4>
                <div class="row">
                  <div class="col-sm-12 col-md-4">
                    <input type="number" name="qty" value="{{$action=='update'?$saved->qty:''}}" placeholder="الكمية">
  
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <input type="number" name="price" value="{{$action=='update'?$saved->price:''}}" placeholder="السعر">
  
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <input type="number" name="" placeholder="مدة تجهيز السلعة">
  
                  </div>

                </div>
                <textarea type="text" name="description_ar" placeholder="ملاحظات" >{{$action=='update'?$saved->description_ar:''}}</textarea>




              </div>
              <button type="submit" class="btn-add-product" >أضف المنتج</button>
            </form>
          
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
@section('page_js')

<script>
var type="{{$action=='update' ? 1:0}}";
var sub_category="{{$action=='update'?$saved->sub_category:''}}";
var sub_categories=[];
@foreach($sub_categories as $category)
sub_categories.push({
    'id':'{{$category->id}}',
    'name':'{{$category->name}}',
    'parent_id':'{{$category->parent_id}}',
})
@endforeach
</script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/product.js')}}"></script>
@endsection
@endsection