<div class="hidden">

    <form method="POST" action="{{route('logout')}}">
        @csrf
        <button id="logout" class=""></button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script src="{{ asset('resources/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('resources/assets/js/content/add_to_cart.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
var login_url = "{{route('login')}}";
var register_url = "{{route('register')}}";
var csrf = '@csrf'

var facebook_url="{{route('login.facebook')}}";
var google_url="{{route('login.google')}}";
</script>
<script src="{{ asset('resources/assets/js/content/login.js') }}"></script>
<script src="{{ asset('resources/assets/js/content/logout.js') }}"></script>
<script>
// $('.owl-carousel').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,
//     responsive:{
//         0:{
//             items:1
//         },
//         600:{
//             items:3
//         },
//         1000:{
//             items:5
//         }
//     }
// })
var owl = $('.owl-home');
owl.owlCarousel({
    items: 5,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
            loop: false
        }
    }

});
var username=$('#ahmed').text().trim();

if(username.length>10){
    $('#ahmed').text(username.substr(0,10)+"...")
}else{
    $('#ahmed').text(username)
}
</script>