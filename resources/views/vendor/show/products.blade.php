<script>
var vendor_site="{{route('vendor')}}";
var home_site="{{route('home')}}";
</script>

<a href="{{route('product.create')}}">اضافة</a>
<table border="1" cellspacing="1" id="products">
<thead>
<tr>
<th>#</th>
<th>الاسم</th>
<th>الصورة</th>
<th>الصنف</th>
<th>الماركة</th>
<th>السعر</th>
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
<script src="{{asset('resources/assets/js/content/products.js')}}"></script>