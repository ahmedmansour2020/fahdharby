@if($action=='add')
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
@else
<form action="{{route('product.update',$saved->id)}}" method="post" enctype="multipart/form-data">
@method('PUT')
@endif
@csrf


<label>الاسم</label>
<input type="text" name="name_ar" value="{{$action=='update'?$saved->name_ar:''}}">
<br>
<label>الوصف</label>
<textarea type="text" name="description_ar" >{{$action=='update'?$saved->description_ar:''}}</textarea>
<br>
<label>السعر</label>
<input type="number" name="price" value="{{$action=='update'?$saved->price:''}}">
<br>
<label>الكمية</label>
<input type="number" name="qty" value="{{$action=='update'?$saved->qty:''}}">
<br>
<label>الصور</label>
<input type="file" name="images[]" multiple>
<br>
<label>الماركة</label>
<select name="brand_id" >
<option value="">اختر ماركة</option>
@foreach($brands as $brand)
<option value="{{$brand->id}}" @if($action=='update') @if($brand->id==$saved->brand_id) selected @endif @endif>{{$brand->name}}</option>
@endforeach
</select>
<br>
<label>الصنف الرئيسي</label>
<select name="main_category" id="main_category" >
<option value="">اختر صنف</option>
@foreach($main_categories as $category)
<option value="{{$category->id}}" @if($action=='update') @if($category->id==$saved->main_category) selected @endif @endif>{{$category->name}}</option>
@endforeach
</select>
<br>
<label>الصنف الفرعي</label>
<select name="sub_category" id="sub_category" >
</select>
<br>
<button type="submit" >حفظ</button>
</form>
<script>
var type="{{$action=='update' ? 1:0}}";
var sub_category="{{$action=='update'?$saved->sub_category:''}}";
var sub_categories=[];
@foreach($sub_categories as $category)
sub_categories.push({
    'id':'{{$category->id}}',
    'name':'{{$category->name}}',
    'parent_id':'{{$category->parent_id}}',
})
@endforeach
</script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/product.js')}}"></script>