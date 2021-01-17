<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ali Rahmani | RIECO">

    {!! SEO::generate() !!}

    <!-- Favicons-->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="/css/css.css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/vendors.css" rel="stylesheet">
    <link href="/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/admin/assets/vendors/base/sweetalert.css" rel="stylesheet" type="text/css"/>

    <!-- MODERNIZR SLIDER -->
    <script src="/js/modernizr_slider.js"></script>
    <style>
        .modal-backdrop {
            z-index: -1;
        {{--  margin-top: 500px;  --}}
}
        .modal-content{
            top: 50px
        }
    </style>

    @yield('pageHeaderScripts')
    <style>
            .modal-backdrop {
                z-index: -1;
              }
              .modal-content{
                  top: 50px
              }
    </style>
</head>

<body>
        <div style="" class="modal fade" id="courseReques" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header" style="flex-direction: row-reverse;">
                   <h5 class="modal-title text-right" id="courseReques">درخواست آموزش جدید</h5>
                   <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="{{ route('course_request.store')  }}" method="post">
                       @csrf
                       <label for="message-text" class="form-control-label iranyekan">دسته بندی دوره موردنظر</label>

                       <div class="form-group">
                            <select class="form-control m-select2" name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{  $category->parent_id === 0 ? "اصلی" : $category->parent->title }} > {{ $category->title }} </option>
                                    @endforeach
                                  </select> 
                           <label for="message-text" class="form-control-label iranyekan">متن  دوره مورد نظر</label>
                           <textarea class="form-control iranyekan" name="body"
                                     id="comment"></textarea>
                       </div>
               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">ثبت</button>
               </div>
               </form>
           </div>
       </div>
   </div>
   <!--end::Modal-->
<div id="page">
    <header class="header menu_2">
        <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
        <div id="logo">
            <a href="/"><img src="{{ asset($settings->logo) }}" style="    padding-right: 15px;" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu">
            <li><a href="#0" class="search-overlay-menu-btn"><span style="opacity: 0">جستجو</span></a></li>
            @auth()
                <li class="hidden_tablet"><a style="direction: ltr" href="{{ route('index.index') }}" class="btn_1 rounded">{{ Auth::user()->fullName }} خوش آمدید ؛ جهت ورود به داشبورد کلیک کنید </a></li>
            @endauth
            @guest()
                <li class="hidden_tablet"><a href="/register" class="btn_1 rounded">عضویت در {{ $settings->title }}</a></li>
                <li class="hidden_tablet"><a href="{{ route('index.index') }}" class="btn_1 rounded">ورود به داشبورد {{ $settings->title }}</a></li>
            @endguest
        </ul>
        <!-- /top_menu -->
        <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu">
            <ul>
                <li><span><a data-toggle="modal" data-target="#courseReques" style="cursor: pointer;" target="_parent">درخواست آموزش</a></span></li>
                
                
                <li style="display: none"><span><a href="/" target="_parent">تماس با ما</a></span></li>
                <li style="display: none" ><span><a href="/" target="_parent">درباره {{ $settings->title }}</a></span></li>
                <li style="display: none"><span><a href="/" target="_parent">آرشیو استانداردها</a></span></li>

                <li style="display: none"><span><a href="#0">دوره های آموزشی</a></span>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->id }}" >{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><span><a href="#0">پادکست</a></span>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->id }}" >{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><span><a href="/teachers">معرفی مدرسین</a></span>
                    
                </li>

                <li><span><a href="#0">مقالات</a></span>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->id }}" >{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><span><a href="#0">دوره های آموزشی</a></span>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->id }}" >{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><span><a href="/" target="_parent">صفحه نخست</a></span></li>
            </ul>
        </nav>
        <!-- Search Menu -->
        <div class="search-overlay-menu">
            <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
            <form role="search" id="searchform" action="/search" method="post">
                @csrf
                <input style="direction: rtl;font-family: iranyekan;text-align: right;padding-right: 50px;" name="keyword" value="" type="search" placeholder="عبارت مورد نظر را وارد نمایید ..." />
                <button style="background-color: #c14645;    margin-top: 100px;" type="submit" id="submit" class="btn_1 rounded"> جستجو</button>
                <button type="submit"><i class="icon_search"></i></button>
            </form>
        </div><!-- End Search Menu -->
    </header>
    <!-- /header -->

    @yield('content')

    <footer style="direction: rtl;text-align: right" >
        <div style="    padding-bottom: 20px!important;" class="container margin_120_95">
            <div class="row">
                <div  class="col-lg-5 col-md-12 p-r-5">
                    <p><img src="{{ asset($settings->logo) }}"  data-retina="true" alt=""></p>
                    <p>{{ $settings->description }}</p>
                    <div style="" class="follow_us">
                        <ul>
                            <li style="font-family: iranyekan" >مارا دنبال کنید:</li>
                            <li><a href="tg://resolve?domain=snappcast_ir"><span class="socicon-telegram"></span></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/snappcast.ir/"><span class="socicon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5>لینک ها</h5>
                    <ul class="links">
                        <li><a href="">قوانین و شرایط استفاده</a></li>
                        <li><a href="">همکاری با اسنپ کست</a></li>
                        <li><a href="">شیوه های خرید و پرداخت</a></li>
                        <li><a data-toggle="modal" data-target="#courseReques" >درخواست آموزش</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>با ما در ارتباط باشید</h5>
                    <ul class="contacts">
                        <li><a href="mailto:Info@SnappCast.ir"><i style="  padding-left: 10px;  float: right;" class="ti-email"></i> Info@SnappCast.ir</a></li>
                        <br><li style="font-family: iranyekan"><i style="  padding-left: 10px;  float: right;" class="  socicon-telegram"><a href="tg://resolve?domain=snappcastSup"></i>آیدی پشتیبانی تلگرام: SnappCastSup@</a></li>
                    </ul>

                    <div style="display: none;" id="newsletter">
                        <h6 style="font-family: iranyekan" >عضویت در خبرنامه {{$settings->title}}</h6>
                        <div id="message-newsletter"></div>
                        <form method="post" action="" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input style="font-family: iranyekan" type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="آدرس ایمیل">
                                <input style="font-family: iranyekan" type="submit" value="عضویت" id="submit-newsletter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/row-->
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div style="font-family: iranyekan" id="copy">© کلیه حقوق برای {{$settings->title}} محفوظ است.</div>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->
</div>
<!-- page -->

<!-- COMMON SCRIPTS -->
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/common_scripts.js"></script>
<script src="/js/main.js"></script>
<script src="/assets/validate.js"></script>

<!-- FlexSlider -->
<script defer src="/js/jquery.flexslider.js"></script>
<script>
    $(window).load(function() {
        $('#carousel_slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 280,
            itemMargin: 25,
            asNavFor: '#slider'
        });
        $('#carousel_slider ul.slides li').on('mouseover', function() {
            $(this).trigger('click');
        });
        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel_slider",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>
<script src="/admin/assets/vendors/base/sweetalert.min.js" type="text/javascript"></script>
@include('sweet::alert')

@yield('pageFooterScripts')

</body>

</html>