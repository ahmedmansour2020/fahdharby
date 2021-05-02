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
                <form action="{{ route('coupone.store') }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('coupone.update', $saved->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
            @endif
            @csrf


                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="text" name="code" class="w-100" required
                                value="{{$action=='update'?$saved->code:''}}"
                                placeholder="ادخل الكود"
                                >
                            </div>
                        </div>
                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="number" name="value" class="w-100" required
                                value="{{$action=='update'?$saved->value:''}}"
                                placeholder="ادخل قيمة الكود"
                                >
                            </div>
                        </div>
                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="number" name="minimum" class="w-100" required
                                value="{{$action=='update'?$saved->minimum:''}}"
                                placeholder="ادخل الحد الأدنى من قيمة الطلب لتنفيذ العرض"
                                >
                            </div>
                        </div>
                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="date" name="start" class="w-100" required
                                value="{{$action=='update'?$saved->start:''}}"
                                placeholder="ساري من"
                                >
                            </div>
                        </div>
                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <input type="date" name="end" class="w-100" required
                                value="{{$action=='update'?$saved->end:''}}"
                                placeholder="ساري حتى"
                                >
                            </div>
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
<script src="{{asset('resources/assets/js/content/promocode.js')}}"></script>
@endsection
@endsection