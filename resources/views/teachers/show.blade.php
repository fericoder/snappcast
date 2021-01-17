@extends('layouts.master')

@section('title')
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')
		<main style="transform: none;">
			<section id="hero_in" class="general start_bg_zoom">
				<div class="wrapper">
					<div class="container">
						<h1 class="fadeInUp animated"><span></span>مشخصات استاد {{ $teacher->user($teacher->user_id)->fullName }}</h1>
					</div>
				</div>
			</section>
			<!--/hero_in-->
			<div class="container margin_60_35" style="transform: none;">
				<div class="row" style="transform: none;">
					<aside class="col-lg-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						
					<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: relative; transform: none;"><div class="profile">
							<figure><img src="{{ $teacher->user($teacher->user_id)->avatar }}" alt="Teacher" class="rounded-circle img-thumbnail w-100 h-100"></figure>
							<ul class="social_teacher">
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-email"></i></a></li>
							</ul>
							<ul>
								<li style="font-family:Byekan;font-size:16px">نام و نام خانوادگی :<span class="p-1" >{{ $teacher->user($teacher->user_id)->fullName }}</span> </li>
								<li style="font-family:Byekan;font-size:16px">ساعات دوره ها :<span class="p-1 " style="font-family:Byekan;font-size:16px">@if($course == null) 0 @else {{implode(str_split($course->episodes()->get()->sum('timeClear'),2),":")}} @endif</span></li>
								<li style="font-family:Byekan;font-size:16px">تعداد دوره ها :<span class="p-1" style="font-family:Byekan;font-size:16px">{{ $courseCount }}</span></li>
							</ul>
						</div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 265px; height: 476px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></aside>
					<!--/aside -->
					<div class="col-lg-8">
						<div class="box_teacher">
							<div class="indent_title_in">
								<i class="pe-7s-user" style="position:relative!important"></i>
								<h3>معرفی کلی</h3>
							</div>
							<div class="wrapper_indent">
								<p>{{ $teacher->introduction }}</p>
								<h5>مهارت ها و مدارک </h5>
								<p>{{ $teacher->credentials }}
									</p>
								<!-- End row-->
							</div>
							<!--wrapper_indent -->
							<hr class="styled_2">
							<div class="indent_title_in">
								<i class="pe-7s-display1" style="position:relative!important"></i>
								<h3>دوره های این مدرس</h3>
							</div>
							<div class="wrapper_indent">
								<p>در زیر میتوانید لیست دوره های این مدرس را مشاهده بفرمایید</p>
									<table class="table table-striped add_bottom_30 col-lg-12">
										<thead>
											<tr>
												<th>دسته بندی</th>
												<th>نام دوره</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($courses as $courseItme)
											<tr>
												<td><a href="../category/{{ $courseItme->category()->first()->id }}">{{ $courseItme->category()->first()->title }}</a></td>
												<td><a href="../courses/{{ $courseItme->slug }}">{{ $courseItme->title }}</a></td>
											</tr>
											@endforeach

										</tbody>
									</table>
							</div>
							<!--wrapper_indent -->
						</div>
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</main>

@stop





@section('pageFooterScripts')
@stop
