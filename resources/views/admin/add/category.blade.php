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
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{route('category.update',$saved->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @endif
                        @csrf


                        <label>الاسم</label>
                        <input type="text" name="name_ar" value="{{$action=='update'?$saved->name_ar:''}}">
                        <br>
                        <label>الوصف</label>
                        <textarea type="text"
                            name="description_ar">{{$action=='update'?$saved->description_ar:''}}</textarea>
                        <br>
                        <label>الصورة</label>
                        <input type="file" name="image">
                        <button type="button" id="remove">X</button>
                        <br>
                        <label>متفرع من</label>
                        <select name="parent_id">
                            <option value="">اختر صنف</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($action=='update' ) @if($category->
                                id==$saved->parent_id)
                                selected @endif @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
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