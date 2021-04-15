@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

<div class="col-sm-12 col-lg-9 mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="section-search-product">
                <h4>المنتجات</h4>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="tab-content" id="pills-tabContent">

                <div class="product-details table-responsive">
                    <table class="table-management w-100" id="products_offers">
                        <thead>
                            <tr>
                                <th>الصورة</th>
                                <th>العنوان</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>إضافة عرض</th>
                                <th>قائمة عروض المنتج</th>
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


@endsection
@section('page_js')
<script>
    var add_offer="{{route('add_offer')}}";
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/products.js')}}"></script>
<script src="{{asset('resources/assets/js/content/remove.js')}}"></script>
@endsection