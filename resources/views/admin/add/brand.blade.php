@if($action=='add')
<form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
@else
<form action="{{route('brand.update',$saved->id)}}" method="post" enctype="multipart/form-data">
@method('PUT')
@endif
@csrf


<label>الاسم</label>
<input type="text" name="name_ar" value="{{$action=='update'?$saved->name_ar:''}}">
<br>
<label>URL</label>
<input type="text" name="url" value="{{$action=='update'?$saved->url:''}}">
<br>

<label>الصورة</label>
<input type="file" name="image">
<button type="button" id="remove">X</button>
<br>

<button type="submit" >حفظ</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/category.js')}}"></script>