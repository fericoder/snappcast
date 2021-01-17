<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>{{ $settings->title }} | فراموشی رمز عبور </title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/vendors.css" rel="stylesheet">
    <link href="/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/css/custom.css" rel="stylesheet">

</head>

<body id="login_bg">

<nav id="menu" class="fake_menu"></nav>

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<div id="login">
    <aside>
        <figure>
            <a href="index-2.html"><img src="{{ asset($settings->logo) }}" width="149" height="42" data-retina="true"
                                        alt=""></a>
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

        <form method="POST" action="{{ route('password.email') }}">
            @csrf


            <p>با استفاده از فرم بازیابی کلمه عبور اسنپ کست، یک لینک بازیابی برای ایمیل شما ارسال خواهد شد و با کلیک
                برروی آن لینک میتوانید فرآیند بازیابی رمز را انجام دهید.</p>
            <br>
            <p>لازم به ذکر است آدرس ایمیل وارد شده میبایست با آدرس ایمیل حساب کاربری شما یکسان باشند.</p>
            <div class="form-group row">
                <label style="font-family: BYekan" for="email" class="col-md-4 col-form-label text-md-right">آدرس
                    ایمیل:</label>

                <div class="col-md-6">
                    <input style="width: 200px" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required>

                    {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                </div>
            </div>

            <div class="form-group row mb-0"><br><br>
                <div class="col-md-6 offset-md-6">
                    <center><button type="submit" class="btn btn-primary">
                        ارسال لینک بازیابی
                    </button></center>
                </div>
            </div>
        </form>
        <div class="copy"> کلیه حقوق برای {{ $settings->title }} محفوظ است.</div>
    </aside>
</div>
<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/common_scripts.js"></script>
<script src="/js/main.js"></script>
<script src="/assets/validate.js"></script>

</body>

</html>