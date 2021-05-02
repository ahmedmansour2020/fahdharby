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

    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-product" role="tabpanel"
                    aria-labelledby="pills-product-tab">
                    <div class="product-details table-responsive">

                        <table class="table-management products w-100" id="vendor_promocodes">
                            <thead>
                                <tr>
                                  
                                    <th>الكود</th>
                                    <th>القيمة</th>
                                    <th>الحد الأدنى</th>
                                    <th>عدد المستخدمين</th>
                                    <th>ساري من</th>
                                    <th>ساري حتى</th>
                                    <th>الحالة</th>
                                    <th>حالة الموافقة</th>
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
@endsection
@section('page_js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/assets/js/content/promocodes.js')}}"></script>
<script src="{{asset('resources/assets/js/content/remove.js')}}"></script>
@endsection