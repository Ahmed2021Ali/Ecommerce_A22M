

<div class="social-login">
    <button class="loginBtn loginBtn--facebook">
        <a href="{{ route('socialite.login',['provider'=>'facebook']) }}" aria-label="تسجيل الدخول بواسطة الفيسبوك">
            <span class="icon"> </span> تسجيل الدخول بواسطة الفيسبوك &nbsp; <i class="fab fa-facebook-f"></i>
        </a>
    </button>
    <button class="loginBtn loginBtn--google">
        <a href="{{ route('socialite.login',['provider'=>'google']) }}" aria-label="تسجيل الدخول بواسطة حساب جوجل">
            <span class="icon"> </span> تسجيل الدخول بواسطة حساب جوجل &nbsp; <i class="fab fa-google"></i>
        </a>
    </button>
</div>
