@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

<div class="col-sm-12 col-lg-9 mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="section-search-product">
                <h4>{{--$title--}}</h4>

            </div>
        </div>

        <div class="col-sm-8 mx-auto">

            <div class="form-product">
                @if($action=='add')
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{route('category.update',$saved->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf


                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="text" name="name_ar" class="w-100" 
                                value="{{$action=='update'?$saved->name_ar:''}}"
                                placeholder="اسم الفئة"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                        <textarea type="text" cols="50"
                            name="description_ar">{{$action=='update'?$saved->description_ar:''}}</textarea>
                        </div>
                        <div class="upload-image">
                            <input type="file" name="image">
                            <button type="button" id="remove">X</button>
                        </div>
                        

                        <div class="form-group">
                        <select name="parent_id" class="w-100">
                            <option value="">اختر صنف</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($action=='update' ) @if($category->
                                id==$saved->parent_id)
                                selected @endif @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <br>
                        <button type="submit">حفظ</button>
                    </form>

            </div>
        </div>


    </div>
</div>

@section('page_js')
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/category.js')}}"></script>
@endsection
@endsection