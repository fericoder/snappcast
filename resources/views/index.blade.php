@extends('layouts.master')

@section('title')
    <title>{{ $settings->name }}</title>
@stop

@section('pageHeaderScripts')
@stop



@section('content')
    <main>
        <section class="slider">
            <div id="slider" class="flexslider">
                <ul class="slides">



                    <li>
                        <img src="{{ $slides[3]->slide_path['1475,800']  }}" alt="">
                        <div class="meta">
                            <h1 style="color: white; direction: rtl" class="meta-caption">{{ $slides[3]->title }}</h1>
                            <div class="info">
                                <p>{{ $slides[3]->description }}</p>
                            </div>
                            <a href="{{ $slides[3]->url  }}" class="btn-{{ $slides[3]->button_color }}">جهت ورود کلیک کنید</a>
                        </div>
                    </li>

                    <li>
                        <img src="{{ $slides[2]->slide_path['1475,800']  }}" alt="">
                        <div class="meta">
                            <h1 style="color: white; direction: rtl" class="meta-caption">{{ $slides[2]->title }}</h1>
                            <div class="info">
                                <br><br><p style="padding-left: 200px;" > {{ $slides[2]->description }} </p>
                            </div>
                            <a href="{{ $slides[2]->url  }}" class="btn-{{ $slides[2]->button_color }}">جهت ورود کلیک کنید</a>
                        </div>
                    </li>

                    <li>
                        <img src="{{ $slides[1]->slide_path['1475,800']  }}" alt="">
                        <div class="meta">
                            <h1 style="color: white;direction: rtl" class="meta-caption">{{ $slides[1]->title }}</h1>
                            <div class="info">
                                <p>{{ $slides[1]->description }} </p>
                            </div>
                            <a href="{{ $slides[1]->url  }}" class="btn-{{ $slides[1]->button_color }}">جهت ورود کلیک کنید</a>
                        </div>
                    </li>

                    <li>
                        <img src="{{ $slides[0]->slide_path['1475,800']  }}" alt="">
                        <div class="meta">
                            <h1 style="color: white; direction: rtl" class="meta-caption">{{ $slides[0]->title }}</h1>
                            <div class="info">
                                <p>{{ $slides[0]->description }}</p>
                            </div>
                            <a href="{{ $slides[0]->url }}" class="btn-{{ $slides[0]->button_color }}">جهت ورود کلیک کنید</a>
                        </div>
                    </li>

                </ul>
                <div id="icon_drag_mobile"></div>
            </div>
            <div id="carousel_slider_wp">
                <div id="carousel_slider" class="flexslider">
                    <ul class="slides">


                        <li>
                            <img src="{{ $slides[3]->slide_path['400,200']  }}" alt="">
                            <div class="caption">
                                <h3 style="direction: rtl" class="caption-title">{{ $slides[3]->title }}</h3>
                                <small style="left: -10px;">جهت ورود کلیک کنید</small>
                            </div>
                        </li>

                        <li>
                            <img src="{{ $slides[2]->slide_path['400,200']  }}" alt="">
                            <div class="caption">
                                <h3 style="direction: rtl" class="caption-title">{{ $slides[2]->title }}</h3>
                                <small style="left: -10px;">جهت ورود کلیک کنید</small>
                            </div>
                        </li>

                        <li>
                            <img src="{{ $slides[1]->slide_path['400,200']  }}" alt="">
                            <div class="caption">
                                <h3 style="direction: rtl" class="caption-title">{{ $slides[1]->title }}</h3>
                                <small style="left: -10px;direction: rtl">جهت ورود کلیک کنید</small>
                            </div>
                        </li>

                        <li>
                            <img src="{{ $slides[0]->slide_path['400,200']  }}" alt="">
                            <div class="caption">
                                <h3 style="direction: rtl" class="caption-title">{{ $slides[0]->title }}</h3>
                                <small style="left: -10px;">جهت ورود کلیک کنید</small>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <!-- /slider -->

        <div  class="container-fluid margin_120_0">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>دوره های آموزشی {{ $settings->title }}</h2>
                <p>در این قیمت میتوانید دوره های آموزشی تولید شده توسط  تیم {{ $settings->title }} را مشاهده فرمایید.</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">


            @foreach ($courses as $course)
                    <div class="item">
                        <div class="box_grid">
                            <figure>
                                <a style="display: none" href="#0" class="wish_bt"></a>
                                <a href="{{ route('courses.show',[$course->id,$course->slug]) }}">
                                    <div class="preview"><span>مشاهده دوره آموزشی</span></div>
                                    {{--  <img src="{{ $course->images['239,215'] }}" class="img-fluid" alt=""></a>  --}}
                                @if ($course->type == 'free')
                                    <div class="price"> رایگان! </div>
                                @endif

                                @if ($course->type == 'cost')
                                    <div class="price"> {{ $course->price }} هزار تومان</div>
                                @endif

                            </figure>
                            <div class="wrapper">
                                <small>{{ $course->category->title }}</small>
                                <h3>{{ $course->title }}</h3>
                                {{--<p>{!! \Illuminate\Support\Str::limit($course->body, 150) !!}</p>--}}
                                <div style="display: none;" class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    <small>(145)</small>
                                </div>
                            </div>
                            <ul>

                                <li><i class="icon_clock_alt"></i><span style="font-family: BYekan">{{ implode(':', str_split($course->episodes->sum('timeClear'), 2) ) }} </span></li>
                                <li><i class="icon-cart"></i><span style="font-family: BYekan">{{ $course->users->count() }}</span></li>
                                <li><a href="{{ route('courses.show',[$course->id,$course->slug]) }}">مشاهده دوره </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /item -->
            @endforeach







            </div>
            <!-- /carousel -->
            <div class="container">
                <p class="btn_home_align"><a href="courses-grid.html" class="btn_1 rounded colorChanger">مشاهده تمامی
                        دوره های آموزشی اسنپ کست</a></p>
            </div>
            <!-- /container -->
            <hr>
        </div>
        <!-- /container -->

        <div class="container margin_30_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>گام های آموزشی</h2>
                <p>لیست دسته بندی های آموزشی بهمراه قدم های یادگیری برای موفقیت در هر فیلد</p>
            </div>
            <div class="row">


               @foreach ($posts->where('type', 'podcast') as $post)
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="{{ route('posts.show',[$post->id,$post->slug]) }}" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="{{ $post->images['350,234'] }}" class="img-fluid" alt="{{ $post->title  }}">
                                <div class="info">
                                    <small><i class="ti-layers"></i> {{ $post->category->title}} </small>
                                    <h3 class="podcast-title">{{ $post->title  }}</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
               @endforeach



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>آخرین مقالات {{ $settings->title }}</h2>
                    <p> با کلیک برروی گزینه مشاهده تمامی مقالات میتوانید وارد صفحه مقالات شوید.</p>
                </div>
                <div class="row">
                    @foreach ($posts->where('type', 'article') as $post)
                        <!-- /box_news -->
                            <div class="col-lg-6 col-xs-12">
                            <a class="box_news" href="{{ route('posts.show',[$post->id,$post->slug]) }}">
                                <figure><img src="{{ $post->images['250,167'] }}" alt="{{ $post->title }}">
                                    <figcaption><strong>{{ jdate($post->published_at)->format('%d') }}</strong>{{ jdate($post->published_at)->format('%B') }}</figcaption>
                                </figure>
                                <ul>
                                    <li>{{ $post->user->fullName }}</li>
                                    <li style="font-family: byekan" >{{ jdate($post->published_at)->format('%d %B %Y') }}</li>
                                </ul>
                                <h4 id="box-caption" >{{ $post->title }}</h4>
                                <p  id="box-caption" > {{ $post->description }}</p>
                            </a>
                        </div>
                            <!-- /box_news -->
                        @endforeach
                </div>
                <!-- /row -->
                <p class="btn_home_align"><a href="{{ route('index.posts.index')  }}" class="btn_1 rounded">مشاهده تمامی مقالات</a></p>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->

        <div style="display: none;" class="call_section">
            <div class="container clearfix">
                {{--<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">--}}
                    {{--<div class="block-reveal">--}}
                        {{--<div class="block-vertical"></div>--}}
                        {{--<div class="box_1">--}}
                            {{--<h3 style="text-align: center; font-family: BYekan"> عضویت در باشگاه اسنپ کست</h3><br>--}}
                            {{--<p style="direction: rtl;text-align: justify">با عضویت در باشگاه اسنپ کست با عضویت در--}}
                                {{--باشگاه اسنپ کست با عضویت در باشگاه اسنپ کست با عضویت در باشگاه اسنپ کست با عضویت--}}
                                {{--در باشگاه اسنپ کست با عضویت در باشگاه اسنپ کست .</p>--}}
                            {{--<p style="text-align: center;"><a style="background-color: #FFC107;color: #333;" href="#0"--}}
                                                              {{--class="btn_1 rounded "">عضویت</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-md-12  wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <img style="width: 900px" src="img/1634.jpg" alt="">
                            <p style="text-align: center;">

                                <a style="background-color: #FFC107;color: #333;" href="#0"
                                                              class="btn_1 rounded "">عضویت</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!--/call_section-->
    </main>
    <!-- /main -->
@stop




@section('pageFooterScripts')
    <script>
        // $( document ).ready(function() {
        // 	setInterval(function() {
        // 		$('.colorChanger').animate( { backgroundColor: '#3f9fff' }, 600)
        // 				.animate( { backgroundColor: '#C04848' }, 200);
        // 	}, 1000);
        //
        // });

    </script>
@stop

