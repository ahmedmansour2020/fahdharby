@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

<div class="col-sm-12 col-lg-9 mt-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success w-100 text-center">
        {{ $message }}
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if ($message = Session::get('alert'))
    <div class="alert alert-danger w-100 text-center">
        {{ $message }}
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="section-search-product">
                <h4>{{$title}}</h4>

            </div>
        </div>

        <div class="col-sm-8 mx-auto">

            <div class="form-product">

                <div class="form-group row pl-4">
                    @if($action=="add")
                    <form action="{{route('save_slider')}}" method="post" enctype="multipart/form-data">
                        @else
                        <form action="{{route('update_slider',$saved->id)}}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @endif
                            @csrf

                            <div class="upload-image">
                                <label for="file-upload">
                                    <div class="container-image">
                                        <img src="{{$action=='update'?$saved->image:asset('resources/assets/img/upload-img.png')}}"
                                            id="image_preview_container" data-id="{{$action=='update'?$saved->id:''}}">
                                    </div>
                                </label>
                                <div class="text-upload-image">
                                    <input class="file-upload" name="image" id="image" type="file" accept="image/*" />

                                </div>
                                <button type="button" id="remove"><i class="fa fa-times"></i></button>
                            </div>


                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <textarea name="content" class="form-control"
                                        placeholder="إضافة محتوى">{{$action=="update"?$saved->content:""}}</textarea>
                                </div>
                            </div>


                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <input type="text" name="url" class="w-100"
                                        value="{{$action=='update'?$saved->url:''}}" placeholder="URL">
                                </div>
                            </div>
                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <input type="text" name="button_title" class="w-100"
                                        value="{{$action=='update'?$saved->button_title:''}}" placeholder="عنوان الزر">
                                </div>
                            </div>
                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <label>لون المحتوى</label>
                                    <input type="color" name="color" class="w-100"
                                        value="{{$action=='update'?$saved->color:'#333333'}}">
                                </div>
                            </div>
                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <label>لون الزر</label>
                                    <input type="color" name="button_color" class="w-100"
                                        value="{{$action=='update'?$saved->button_color:'#333333'}}">
                                </div>
                            </div>
                            <div class="form-group row pl-4">
                                <div class="col-lg-12">
                                    <label>لون الخط بداخل الزر</label>
                                        <select class="form-control" name="button_font">
                                            <option value="text-light" @if($action=='update') @if($saved->button_font=='text-light') selected @endif @endif>أبيض</option>
                                            <option value="text-dark" @if($action=='update') @if($saved->button_font=='text-dark') selected @endif @endif>أسود</option>
                                            <option value="text-success" @if($action=='update') @if($saved->button_font=='text-success') selected @endif @endif>أخضر</option>
                                            <option value="text-danger" @if($action=='update') @if($saved->button_font=='text-danger') selected @endif @endif>أحمر</option>
                                            <option value="text-primary" @if($action=='update') @if($saved->button_font=='text-primary') selected @endif @endif>أزرق</option>
                                            <option value="text-warning" @if($action=='update') @if($saved->button_font=='text-warning') selected @endif @endif>ذهبي</option>
                                        </select>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn-add-product">حفظ</button>




                        </form>
                </div>



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
<script src="{{asset('resources/assets/js/content/slider.js')}}"></script>
@endsection
@endsection