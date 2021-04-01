<div class="container-navbar-right">
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="home-page">
      <img src="{{URL::asset('resources/assets/images/icon-home.png')}}" alt="">
      
      <a href="{{route('home-vendor')}}">الرئيسية</a>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">

        
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <img src="{{URL::asset('resources/assets/images/shipping.png')}}" alt=""> السلع والعروض
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('management') }}" class="accordion-body">إدارة السلع والمنتجات</a>
        <a href="{{ route('product.create') }}" class="accordion-body ">إضافة منتجات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          <img src="{{URL::asset('resources/assets/images/sale-tag.png')}}" alt=""> المبيعات
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('orders-dashboard') }}" class="accordion-body">الطلبات</a>
        <a href="{{ route('payments') }}" class="accordion-body">المدفوعات المتكررة</a>
        <a href="{{ route('return-requests') }}" class="accordion-body">إرجاع الطلبات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          <img src="{{URL::asset('resources/assets/images/Path 164.png')}}" alt=""> ما بعد الطلبات
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('complaints-department') }}" class="accordion-body">إدارة الشكاوي</a>
        <a href="{{ route('rate') }}" class="accordion-body">التقييمات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
          <img src="{{URL::asset('resources/assets/images/Icon awesome-dollar-sign.png')}}" alt=""> المالية
        </button>
      </h2>
      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
        <a href="{{ route('financial-account') }}" class="accordion-body">ملخص الحساب المالي</a>
        <a href="#" class="accordion-body">سحب الرصيد</a>
        <a href="{{ route('complaints-withdraw-money') }}" class="accordion-body">حالة عمليات السحب</a>
        <a href="#" class="accordion-body">التعويضات</a>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
          <img src="{{URL::asset('resources/assets/images/Group 880.png')}}" alt=""> الاشتراك
        </button>
      </h2>
      <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
        <a href="#" class="accordion-body">نوع الاشتراك</a>
      </div>
    </div>
    
  </div>
</div>
