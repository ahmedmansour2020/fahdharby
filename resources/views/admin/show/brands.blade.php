<script>
var admin_site="{{route('admin')}}";
var home_site="{{route('home')}}";
</script>
<a href="{{route('brand.create')}}">اضافة</a>
<table border="1" cellspacing="1" id="brands">
<thead>
<tr>
<th>#</th>
<th>الاسم</th>
<th>url</th>
<th>الصورة</th>
<th>تعديل</th>
<th>حذف</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/brands.js')}}"></script>