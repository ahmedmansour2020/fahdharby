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
                @if ($action == 'add')
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('brand.update', $saved->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
            @endif
            @csrf


                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="text" name="name_ar" class="w-100" 
                                value="{{$action=='update'?$saved->name_ar:''}}"
                                placeholder="اسم العلامة التجارية"
                                >
                            </div>
                        </div>
                       
                        <div class="upload-image">
                            <label for="file-upload">
                                <div class="container-image">
                                    <img  src="{{$action=='update'?$saved->image:asset('resources/assets/img/upload-img.png')}}" id="image_preview_container" data-id="{{$action=='update'?$saved->id:''}}">
                                </div>
                            </label>
                            <div class="text-upload-image">
                                <input class="file-upload" name="image" id="image" type="file" accept="image/*"/>
                                
                            </div>
                            <button type="button" id="remove"><i class="fa fa-times"></i></button>
                        </div>
                        

                        
                        <br>
                        <button type="submit" class="btn-add-product">حفظ</button>
                    </form>

            </div>
        </div>


    </div>
</div>

@section('page_js')

<script>
var type="{{$action=='update'?1:0}}"
var img="{{asset('resources/assets/img/upload-img.png')}}";
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/brand.js')}}"></script>
@endsection
@endsection