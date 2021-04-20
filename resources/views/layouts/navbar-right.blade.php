<aside class="navbar-right">
    <div class="sidebar">
        <nav class="mt-2">
            <a href="{{route('orders')}}" class="link-sub-nav {{(request()->segment(1) == 'orders') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/shopping-bag.png')}}" alt=""> الطلبيات

                </div>
            </a>
            <a href="{{route('location')}}" class="link-sub-nav {{(request()->segment(1) == 'location') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/location.png')}}" alt=""> العنوان

                </div>
            </a>
            <a href="{{route('pay')}}" class="link-sub-nav {{(request()->segment(1) == 'pay') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/Group 351.png')}}" alt=""> عمليات الدفع

                </div>
            </a>
            <a href="{{route('wallet')}}" class="link-sub-nav {{(request()->segment(1) == 'wallet') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/money.png')}}" alt=""> الرصيد

                </div>
            </a>
            <a href="{{route('product-return')}}" class="link-sub-nav {{(request()->segment(1) == 'product-return') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/return.png')}}" alt=""> الإرجاع

                </div>
            </a>
            <a href="#" class="link-sub-nav">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/ic_lock_24px.png')}}" alt=""> طلبات الضمان

                </div>
            </a>
            <!-- <a href="#" class="link-sub-nav">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/Icon material-favorite.png')}}" alt=""> المفضلة

                </div>
            </a> -->
            <a href="#" class="link-sub-nav">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/ic_record_voice_over_24px.png')}}" alt=""> حسابي

                </div>
            </a>
            <!-- <a href="#" class="link-sub-nav">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/Icon feather-log-out.png')}}" alt=""> تسجيل الخروج

                </div>
            </a> -->
        </nav>
    </div>
    
</aside>