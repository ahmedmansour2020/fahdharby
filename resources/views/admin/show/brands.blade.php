@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

<div class="col-sm-12 col-lg-9 mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="section-search-product">
                <h4>الفئات</h4>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-product" role="tabpanel"
                    aria-labelledby="pills-product-tab">
                    <div class="product-details table-responsive">

                        <table class="table-management products w-100" id="brands">
                            <thead>
                                <tr>
                                  
                                    <th>الاسم</th>
                                    <th>الصورة</th>
                                    <th>تعديل</th>
                                    <th>حذف</th>
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
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/brands.js')}}"></script>
@endsection