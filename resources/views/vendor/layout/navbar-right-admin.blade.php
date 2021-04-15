<?php
use App\Http\Controllers\NotificationController;

?>

<div class="container-navbar-right">
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="home-page">
      <img src="{{URL::asset('resources/assets/images/icon-home.png')}}" alt="">

      <a href="{{route('admin')}}">الرئيسية</a>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">


        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <img src="{{URL::asset('resources/assets/images/shipping.png')}}" alt=""> الفئات
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('category.index') }}" class="accordion-body">إدارة الفئات</a>
        <a href="{{ route('category.create') }}" class="accordion-body ">إضافة الفئات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          <img src="{{URL::asset('resources/assets/images/sale-tag.png')}}" alt=""> العلامات التجارية
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('brand.index') }}" class="accordion-body">ادارة العلامات التجارية</a>
        <a href="{{ route('brand.create') }}" class="accordion-body">اضافة العلامات التجارية</a>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading1">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseTwo">
          <img src="{{URL::asset('resources/assets/images/sale-tag.png')}}" alt=""> كوبونات الخصم
        </button>
      </h2>
      <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('promocode.index') }}" class="accordion-body">ادارة كوبونات الخصم</a>
        <a href="{{ route('promocode.create') }}" class="accordion-body">اضافة كوبون خصم</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed nav-approval" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          <img src="{{URL::asset('resources/assets/images/Path 164.png')}}" alt=""> مركز الموافقة <span class="notification" id="notification-all">{{NotificationController::approval_counts()}}</span>
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <a href="#" class="accordion-body nav-approval">مستخدمين <span class="notification" id="notification-users"></span></a>
        <a href="{{route('approval.show','products')}}" class="accordion-body nav-approval">منتجات <span class="notification" id="notification-products">{{NotificationController::products_approval_counts()}}</span></a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
          <i class="fa fa-cogs ml-4"></i>  الأعدادات
        </button>
      </h2>

      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
        <a href="{{route('setting.sliders')}}" class="accordion-body">اعدادات الصفحة الرئيسية</a>
        <a href="{{route('setting.info')}}" class="accordion-body">اعدادات الموقع</a>
      </div>

    </div>

  </div>
</div>
