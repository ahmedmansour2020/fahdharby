@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 


            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-be" >
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-lb">
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-gn" >
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="last-order">
                            <h3>اخر الطلبات</h3>
                        </div>
                    </div>
                    @foreach($order_items as $item)
                    <div class="col-12 box-lastOrder">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="row">
                                        <h4 class="col-4">رقم الطلب</h4>
                                        <p class="col-8">{{$item->order_id}}</p>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-4">اسم العميل</h4>
                                        <p class="col-8">{{$item->user}}</p>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-4">المنتج</h4>
                                        <p class="col-8">{{$item->product}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="row">
                                        <h4 class="col-4">تاريخ الطلب</h4>
                                        <p class="col-8">{{date('Y-m-d',strtotime($item->created_at))}}</p>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-4">الكمية</h4>
                                        <p class="col-8">{{$item->qty}}</p>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-4">الإجمالي</h4>
                                        <p class="col-8">{{$item->total}} $</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        <div class="text-center page_navigation" dir="ltr">{{$order_items->links()}}</div>
            </div>

    @endsection
    @section('page_js')
    <script>
    $(document).ready(function(){

        $('.page_navigation span').each(function(e){
            $(this).addClass('mx-5')
            $(this).text($(this).text().replace('Next',''))
            $(this).text($(this).text().replace('Previous',''))
        })
        $('.page_navigation a').each(function(e){
            $(this).text($(this).text().replace('Next',''))
            $(this).text($(this).text().replace('Previous',''))
        })
    })
        </script>
        @endsection

