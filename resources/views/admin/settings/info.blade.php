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

                    <form action="{{route('info.save')}}" method="post" enctype="multipart/form-data">

                        @csrf


                        <div class="form-group row pl-4">
                            <div class="col-lg-12">
                                <label>أقصى مدة لتجهيز المنتج</label>
                                <input class="number" type="text" name="duration_number" value="{{isset($duration_number)?$duration_number->value:''}}">

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
$('.number').on('keyup change paste', function(){
    var value = $.trim($(this).val()).replace(/\D/g, '');
        $(this).val(value)
})
</script>
@endsection
@endsection
