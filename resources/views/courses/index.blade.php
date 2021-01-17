@extends('layouts.master')

@section('title')
    <title>اسنپ کست | دوره های آموزشی</title>
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')
    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>دوره های آموزشی اسنپ کست</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">

                @foreach ($courses as $course)
                    <!-- /article -->
                        <article class="blog wow fadeIn">
                            <div class="row no-gutters">

                                <div class="col-lg-7">
                                    <div class="post_info">
                                        <small>{{ jdate($course->published_at)->format('%d %B %Y') }}</small><br><br>
                                        <h3><a href="/courses/{{ $course->slug  }}">{{ $course->title  }}</a></h3>
                                        <p>
                                            {{ str_limit($course->description, 400)  }}
                                        </p>
                                        <ul style="text-align: center" >
                                            <li style="float: left; font-family: byekan"> <div class="thumb">
                                                    <img src="{{ $course->user->avatar  }}" alt="{{ $course->title  }}">
                                                </div> {{ $course->user['fullName']  }} </li>
                                            <li style="font-family: iranyekan" ><a href="/courses/{{ $course->slug  }}"><button style="background-color:#c14645" type="submit" id="submit" class="btn_1 rounded"> مشاهده مطلب</button></a></li>
                                            <li style="font-family: byekan;float: right" ><i class="icon_comment_alt"></i> {{ $course->commnetCount }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <figure>
                                        <a href="/courses/{{ $course->slug  }}"><img  src="{{ $course->images['848,566']  }}" alt="{{ $course->title  }}">
                                            <div class="preview"><span>مشاهده مطلب</span></div>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </article>
                        <!-- /article -->
                    @endforeach

                    {{ $courses->links() }}
                    <!-- /pagination -->

                </div>
                <!-- /col -->


                @include('layouts.partials.aside')

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->


@stop





@section('pageFooterScripts')
@stop

