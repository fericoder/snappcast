<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>{{ $settings->title }} | ورود به داشبورد اختصاصی</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">

<nav id="menu" class="fake_menu"></nav>

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<div id="login">
    <aside>
        <figure>
            <a href="/"><img style="width: 100px;" src="img/loginLogo.png"  data-retina="true" alt=""></a>
        </figure>
        @if ($errors->any())
            <div style="direction: rtl; text-align: right; font-family: iranyekan" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('register')  }}">
            @csrf
            <div class="form-group">
					<span class="input">
					<input name="name" class="input_field" type="text">
						<label class="input_label">
						<span class="input__label-content">نام</span>
					</label>
					</span>

                <span class="input">
					<input name="family" class="input_field" type="text">
						<label class="input_label">
						<span class="input__label-content">نام خانوادگی</span>
					</label>
					</span>

                <span class="input">
					<input name="email" class="input_field" type="email">
						<label class="input_label">
						<span class="input__label-content">آدرس ایمیل</span>
					</label>
					</span>

                <span class="input">
					<input name="phoneNumber" class="input_field" type="text">
						<label class="input_label">
						<span class="input__label-content">شماره موبایل</span>
					</label>
					</span>

                <span class="input">
					<input name="password" class="input_field" type="password" id="password">
						<label class="input_label">
						<span class="input__label-content"> رمز عبور</span>
					</label>
					</span>

                <div id="pass-info" class="clearfix"></div>
            </div>
            <input style="font-family: iranyekan" type="submit" class="btn_1 rounded full-width add_top_30" value="عضویت در {{ $settings->title }}" >

            <div style="direction: rtl;text-align: right" class="text-center add_top_30">حساب کاربری دارید <strong><a
                            href="/login">ورود!</a></strong></div>
        </form>
        <div class="copy"> کلیه حقوق برای {{ $settings->title }} محفوظ است.</div>
    </aside>
</div>
<!-- /login -->

<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts.js"></script>
<script src="js/main.js"></script>
<script src="assets/validate.js"></script>

</body>

</html>