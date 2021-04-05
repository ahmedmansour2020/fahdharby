<div class="container-navbar-right">
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="home-page">
      <img src="{{URL::asset('resources/assets/images/icon-home.png')}}" alt="">
      
      <a href="#">الرئيسية</a>
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
        <a href="{{ route('orders-dashboard') }}" class="accordion-body">ادارة العلامات التجارية</a>
        <a href="{{ route('payments') }}" class="accordion-body">اضافة العلامات التجارية</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          <img src="{{URL::asset('resources/assets/images/Path 164.png')}}" alt=""> مركز الموافقة
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <a href="#" class="accordion-body">مستخدمين</a>
        <a href="#" class="accordion-body">منتاجات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
          <img src="{{URL::asset('resources/assets/images/Icon awesome-dollar-sign.png')}}" alt=""> الأعدادات
        </button>
      </h2>

      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
        <a href="#" class="accordion-body">اعدادات الصفحة الرئيسية</a>
        <a href="#" class="accordion-body">اعدادات الموقع</a>
      </div>

    </div>
    
  </div>
</div>
