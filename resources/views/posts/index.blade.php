@extends('layouts.master')

@section('title')
    <title>اسنپ کست | مقالات</title>
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')
    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>مقالات اسنپ کست</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">

                    @foreach ($posts as $post)

                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="box_grid wow animated" style="visibility: visible;">
                                <figure class="block-reveal">
                                    <div class="block-horizzontal"></div>
                                    <a href="/posts/{{ $post->slug  }}"><img
                                                src="{{ $post->images['325,215']  }}"
                                                class="img-fluid"
                                                alt="{{ $post->title  }}"></a>
                                    {{--<div class="price">$54</div>--}}
                                    <div class="preview"><span>مشاهده جزییات</span></div>
                                </figure>
                                <div class="wrapper">
                                    <small>توسط: {{ $post->user->fullName  }} -</small>
                                    <small style="margin-bottom: 10px">{{ jdate($post->published_at)->format('%d %B %Y') }}</small>
                                    <h3 style="margin-top: 8px;">{{ $post->title  }}</h3>
                                    <p style="margin-bottom: 0px">{{ \Illuminate\Support\Str::limit($post->description, 40)  }}</p>
                                </div>
                                <ul>
                                    <li></li>
                                    {{--<li><i class="icon_person"></i>{{ $post->user->fullName  }} توسط: </li>--}}
                                    <li><a href="/posts/{{ $post->slug  }}">مشاهده مطلب</a></li>
                                </ul>
                            </div>
                        </div>

                @endforeach

                {{ $posts->links() }}
                <!-- /pagination -->

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

