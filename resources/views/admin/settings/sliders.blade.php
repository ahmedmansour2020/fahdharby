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
        <div>
        <a href="{{route('create.slider')}}" class="btn btn-primary">إضافة جديد</a>
        </div>
        <div class="col-sm-12 mx-auto">

            <div class="form-product">

                <div class="form-group row pl-4">
                    <div class="table-responsive">
                        <table class="table w-100 text-center" id="sliders">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>المحتوى</th>
                                    <th>تفعيل</th>
                                    <th>تعديل|حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>


    </div>
</div>

@section('page_js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/assets/js/content/sliders.js')}}"></script>
<script src="{{asset('resources/assets/js/content/remove.js')}}"></script>
@endsection
@endsection