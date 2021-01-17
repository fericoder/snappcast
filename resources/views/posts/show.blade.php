@extends('layouts.master')

@section('title')
    <title>{{ $settings->title }} | {{ $post->title }}</title>
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')




    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>{{ $settings->title }} | {{  $post->type === "podcast" ? "پادکست" : '' }} {{  $post->type === "article" ? "مقاله" : '' }}</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">
                    @if ($post->type == 'article')
                        @include('posts.partials.article')
                    @elseif ($post->type == 'podcast')
                        @include('posts.partials.podcast')
                    @endif

                    @include('layouts.partials.comments', ['comments' => $post->comments])

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

