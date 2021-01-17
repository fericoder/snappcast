@extends('layouts.master')

@section('title')
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')
	<main>
		<section id="hero_in" class="general start_bg_zoom">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp animated"><span></span>مدرسین مجموعه اسنپ کست</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_120_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>مدرسین اسنپ کست</h2>
				<p>لیستی از بهترین و مجرب ترین مدرس ها</p>
			</div>
			<div id="carousel" class="owl-carousel owl-theme owl-loaded owl-drag">
				
@foreach ($teachers as $teacher)
<a href="/teachers/{{ $teacher->id  }}" target="_blank">
<img src="{{ $teacher->avatar }}" alt="" width="300px" height="300px">	
</a>
	@endforeach

	<div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div>
</div>

	</div>
</div>
			<!-- /carousel -->
		</div>
		<!--/container-->
	</main>
	<!--/main-->
	

	@stop





	@section('pageFooterScripts')
	@stop
	