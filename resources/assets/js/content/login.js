$(document).ready(function() {
    $('.login').on('click', function() {

        $.dialog({
            columnClass: 'col-md-9',
            title: false,
            content: ` 
               <div class="col-12">

            <form action="${login_url}" method="POST"> 
            ${csrf}
            <div class="card border-0">
                        <div class="card-header  bg-transparent border-0">
                        
                            <h2 class="text-center">تسجيل الدخول</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            
                                <input type="email" name="email" class="w-100" placeholder="البريد الألكتروني">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="w-100" placeholder=" كلمة المرور">
                            </div>
                            <button type="submit" class="btn btn-primary">أنشئ حسابك</button>

                            <div class="register text-center">
                                <p> هل ليس لديك حساب ! <a href="{{route('register')}}">أنشئ حساب</a> </p>
                            </div>
                            
                        </div>
                    </div>

                
            </form>
        </div>`,
        });
    })

})