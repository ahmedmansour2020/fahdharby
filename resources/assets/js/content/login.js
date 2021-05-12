$(document).ready(function() {
    $(document).on('click', '.login', function(e) {
        e.preventDefault();
        $('.jconfirm-closeIcon').click();
        $.dialog({
            columnClass: 'col-md-6',
            title: false,
            content: ` 
               <div class="col-12">

            <form action="${login_url}" method="POST"> 
            ${csrf}
            <div class="card border-0 m-1">
                        <div class="card-header  bg-transparent border-0">
                            <h2 class="text-center text-primary">تسجيل الدخول</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            
                                <input type="email" name="email" class="w-100" placeholder="البريد الألكتروني">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="w-100" placeholder=" كلمة المرور">
                            </div>
                            <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                            <p class="or">او</p>
                            <div class="social-form-register text-center mb-0" dir="ltr">
                              <!-- <a href="#" class="btn btn-info"><i class="fab fa-microsoft"></i></a> -->
                                <a href="${google_url}" class="btn btn-danger"><i class="fab fa-google"></i></a>
                              <!--  <a href="#" class="btn btn-info"><i class="fab fa-twitter"></i></a> -->
                                <a href="${facebook_url}" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <div class="register text-center mt-5">
                                <p> هل ليس لديك حساب ! <a class="register-modal" href="#">أنشئ حساب</a> </p>
                            </div>
                            
                        </div>
                    </div>

                
            </form>
        </div>`,

        });
    })

    $(document).on('click', '.register-modal', function(e) {
        e.preventDefault();
        $('.jconfirm-closeIcon').click();
        $.dialog({
            columnClass: 'col-md-5',
            title: false,
            content: ` 
               <div class="col-12 p-4">
            <div class="card border-0 ">
                        <div class="card-header  bg-transparent border-0">
                            <h2 class="text-center text-primary">إنشاء حساب جديد</h2>
                        </div>
                        <div class="card-body">
                         <p class="text-center">الرجاء تحديد نوع الحساب</p>
                         <div class="row">
                         <div class="col-6">
                         <a href="#" class="btn btn-block btn-primary register-user">مشتري</a>
                         </div>
                         <div class="col-6">
                         <a href="${register_vendor_url}" class="btn btn-block btn-outline-primary">تاجر</a>
                         </div>
                         </div>
                        </div>
                    </div>
        </div>`,

        });
    });

    $(document).on('click', '.register-user', function(e) {
        e.preventDefault();
        $('.jconfirm-closeIcon').click();


        $.dialog({
            columnClass: 'col-md-7',
            title: false,
            content: `<div class="row">
            <div class="col-12">
            <form action="${register_url}" class="form-login" method="POST">
            ${csrf}
                <div class="card p-0 m-0 w-100  h-100">
                    <div class="card-header">
                        <h3 class="text-primary">تسجيل الدخول كمستخدم جديد</h3>
                    </div>
                    <div class="card-body h-100">
                        <div class="form-group">
                            <input type="text" class="w-100" name="name" placeholder="اسم المستخدم" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="w-100" name="email" placeholder="البريد الألكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="w-100" name="password" placeholder=" كلمة المرور" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="w-100" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="group-radio">
                                    <input type="radio" name="gender" value="1" checked>
                                    <label for="gender">ذكر</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="group-radio">
                                    <input type="radio" name="gender" value="2">
                                    <label for="gender">أنثى</label>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="3">
                        </div>
                        <button type="submit" class="btn btn-primary mt-0">أنشئ حسابك</button>
                        <p class="or">او</p>
                        <div class="social-form-register text-center mb-0" dir="ltr">
                           <!-- <a href="#" class="btn btn-info"><i class="fab fa-microsoft"></i></a> -->
                            <a href="${google_url}" class="btn btn-danger"><i class="fab fa-google"></i></a>
                           <!-- <a href="#" class="btn btn-info"><i class="fab fa-twitter"></i></a> -->
                            <a href="${facebook_url}" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="register-login text-center">
                            <p> هل لديك حساب بالفعل ! <a href="#" class="login">سجل الان</a> </p>
                        </div>
    
                    </div>
                </div>
            </form>
        </div>
        </div>
        `,

        });
    });
})