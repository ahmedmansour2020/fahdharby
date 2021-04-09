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

                <form action="{{route('image.main')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                            <input type="hidden" name="product" value="{{$product->id}}">
                        <table class="table">
                            @foreach($images as $image)
                                <tr>
                                    <td><img src="{{asset('uploaded/'.$image->name)}}" height="100" width="100" ></td>
                                    <td><input type="radio" name="main" value="{{$image->id}}" @if($image->main==1) checked @endif></td>
                                </tr>
                            @endforeach
                        </table>
                        <button type="submit" class="btn-add-product">حفظ</button>
                    </form>
               
            </div>
        </div>


    </div>
</div>

@section('page_js')
@endsection
@endsection
