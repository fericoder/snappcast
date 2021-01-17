@extends('layouts.master')

@section('title')
    <title>اسنپ کست | {{ $course->title }}</title>
@stop

@section('pageHeaderScripts')
    <link href="/css/blog.css" rel="stylesheet">

@stop



@section('content')


        <main style="transform: none;">
            <section id="hero_in" class="courses start_bg_zoom">
                <div class="wrapper">
                    <div class="container">
                        <h1 style="direction: rtl" class="fadeInUp animated"><span></span>{{ $course->title }}</h1>
                    </div>
                </div>
            </section>
            <!--/hero_in-->

            <div class="bg_color_1" style="transform: none; position: relative;">
                <nav class="secondary_nav sticky_horizontal" style="">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#reviews">نظرات</a></li>
                            <li><a href="#lessons" class="active">سرفصل ها</a></li>
                            <li><a href="#description" class="">توضیحات دوره</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="container margin_60_35" style="transform: none;">
                    <div class="row" style="transform: none;">

                        <aside class="col-lg-4" id="sidebar"
                               style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                            <div class="theiaStickySidebar"
                                 style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 925px;">
                                <div class="box_detail">
                                    <figure>
                                        <a href="http://127.0.0.1:8000/storage/upload/2019/7/12/1562930334_video_2019-04-29_20-23-10.mp4"
                                           class="video"><i
                                                    class="arrow_triangle-right"></i><img
                                                    src="{{ $course->images['848,566'] }}" alt=""
                                                    class="img-fluid"><span>مشاهده پیش نمایش دوره</span></a>
                                    </figure>
                                    <div style="font-family: byekan; text-align: center" class="price">
                                        @if ($course->type == 'cost')
                                            {{ $course->price }} هزار تومان
                                        @endif

                                        @if ($course->type == 'free')
                                                رایگان!
                                        @endif


                                    </div>
                                    @auth()
                                        @if ($course->users->contains(Auth::user()))
                                            <a href="" class="btn_1 full-width headColor">دوره خریداری شده است</a>
                                        @else
                                            <a href="/payment/{{ $course->price }}0000/{{ $course->id }}/{{ Auth::user()->id }}"
                                               class="btn_1 full-width headColor">خرید دوره</a>

                                        @endif
                                    @endauth

                                    @guest
                                        <a href="" class="btn_1 full-width headColor">خریداری دوره</a>

                                    @endguest



                                    <br><hr><div id="list_feat">
                                       <p style="font-family: BYekan; margin-bottom: 15px;"> <i class="icon-videocam"></i> تعداد قسمت های دوره: {{ $course->episodesCount }} </p>
                                        <p style="font-family: BYekan;margin-bottom: 15px;"><i class="icon-clock-3"></i> مدت زمان دوره:  {{ implode(':', str_split($course->episodes->sum('timeClear'), 2) ) }}</p>
                                        <p style="font-family: BYekan;margin-bottom: 15px;"><i class="icon-users"></i> تعداد دانشجویان: {{ $course->users->count() }} دانشجو </p>
                                        <p style="margin-bottom: 15px;"><i class="icon-info-circled"></i> وضعیت دوره: درحال برگذاری  <i class=" icon-spin4 animate-spin"></i></p>
                                        <p style="font-family: BYekan;margin-bottom: 15px;"><i class="icon-calendar"></i> تاریخ ایجاد دوره: {{ jdate($course->created_at) }}</p>
                                        <p style="font-family: BYekan;margin-bottom: 15px;"><i class="icon-calendar"></i>  آخرین بروزرسانی: {{ jdate($course->updated_at) }}</p>
                                    </div>


                                    <br><hr><div id="list_feat">
                                        <div style="float: left!important;" class="avatar">
                                            <img src="{{ $course->user->avatar }}" alt="">
                                        </div>
                                        <h3> مدرس: {{ $course->user->fullName }} </h3>
                                        <a href="/teachers/{{ $course->user->id }}"><p>مشاهده اطلاعات مدرس </p></a>
                                    </div>

                                </div>
                                <div class="resize-sensor"
                                     style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                                    <div class="resize-sensor-expand"
                                         style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 390px; height: 2091px;"></div>
                                    </div>
                                    <div class="resize-sensor-shrink"
                                         style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                    </div>
                                </div>
                            </div>
                        </aside>


                        <div class="col-lg-8">

                            <section id="description">
                                <h2>توضیحات دوره</h2><br>
                                <h5>{{ $course->description }}</h5>
                                <p>
                                    {!! $course->body !!}
                                </p>

                                <!-- /row -->
                            </section>
                            <!-- /section -->

                            <section id="lessons">
                                <div class="intro_title">
                                    <h2>محتوی دوره آموزشی</h2>

                                </div>
                                <div id="accordion_lessons" role="tablist" class="add_bottom_45">


                                    @foreach ($course->sections as $section)
                                        <div class="card">
                                            <div class="card-header" role="tab" id="heading{{$section->id}}">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapse{{$section->id}}"
                                                       aria-expanded="true" aria-controls="collapse{{$section->id}}"><i
                                                                class="indicator ti-minus"></i>{{ $section->title }}</a>
                                                </h5>
                                            </div>

                                            <div id="collapse{{$section->id}}" class="collapse show" role="tabpanel"
                                                 aria-labelledby="heading{{$section->id}}"
                                                 data-parent="#accordion_lessons">
                                                <div class="card-body">
                                                    <div class="list_lessons">
                                                        <ul>
                                                            @foreach ($section->episodes as $episode)

                                                                <li><a href="{{ $course->users->contains(Auth::user()) ? url($episode->file) : '' }}" class="{{ $course->users->contains(Auth::user()) ? 'video' : 'cant' }}">{{ $episode->title }}</a>
                                                                    <span style="font-family: Byekan">{{ $episode->time }} | {{ $episode->fileSize }} مگابایت </span>
                                                                    <span><a class="icon-download {{ $course->users->contains(Auth::user()) ? '' : 'cant' }}" target="_blank" href="{{ $course->users->contains(Auth::user()) ? url($episode->file) : '' }}" ></a>|</span>
                                                                </li>
                                                            @endforeach
                                                            {{--<li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /card -->
                                    @endforeach


                                </div>
                                <!-- /accordion -->
                            </section>
                            <!-- /section -->

                            <style>
                                .modal-backdrop {
                                    z-index: -1;
                                }

                            </style>


                        @foreach ($course->comments->where('approved', '1')->where('parent_id', '0') as $comment)

                            <!--begin::Modal-->
                                <div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">پاسخ به نظر</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/comment/answer" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="message-text" class="form-control-label iranyekan">متن
                                                            پاسخ:</label>
                                                        <textarea class="form-control iranyekan" name="comment"
                                                                  id="comment"></textarea>
                                                        <input type="hidden" name="parent_id"
                                                               value="{{ $comment->id }}">
                                                        <input type="hidden" name="commentable_id"
                                                               value="{{ $course->id }}">
                                                        <input type="hidden" name="commentable_type"
                                                               value="{{ get_class($course) }}">
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
                            @endforeach


                            <div id="comments">
                                <h5>نظرات کاربران اسنپ کست:</h5>
                                <ul>

                                    @foreach ($course->comments->where('approved', '1')->where('parent_id', '0') as $comment)
                                        <li>
                                            <div class="avatar">
                                                <img src="{{ $comment->user->avatar }}" alt="">
                                            </div>
                                            <div class="comment_right clearfix w-75 rounded border-1p">
                                                <div class="comment_info">
                                                    {{ $comment->user->fullName }}<span>|</span><span
                                                            style="font-family: byekan">{{ jdate($comment->created_at)->ago() }}</span><span>|</span>
                                                    <a href="#">
                                                        <button type="button" class="btn headColorYellow btn-sm "
                                                                data-toggle="modal"
                                                                data-target="#m_modal_{{ $comment->id }}">پاسخ
                                                        </button>
                                                    </a>

                                                </div>
                                                <p>
                                                    {{ $comment->comment}}
                                                </p>
                                            </div>

                                            @foreach ($course->comments->where('approved', '1')->where('parent_id', $comment->id) as $answer)
                                                <ul class="replied-to">
                                                    <li>
                                                        <div class="avatar">
                                                            <img src="{{ $answer->user->avatar }}" alt="">
                                                        </div>
                                                        <div class="comment_right clearfix rounded border-success border-1pw">
                                                                <div class="comment_info">
                                                                {{ $answer->user->fullName }}<span>|</span><span
                                                                        style="font-family: byekan">{{ jdate($comment->created_at)->ago() }}</span><span>|</span>

                                                            </div>
                                                            <p>
                                                                {{ $answer->comment }}
                                                            </p>
                                                        </div>

                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            @auth
                                @include('layouts.partials.error')
                                <form method="post" action="/comment">
                                    @csrf
                                    <div class="form-group">
            <textarea class="form-control" name="comment" id="comment" rows="6"
                      placeholder="متن نظر را وارد نمایید"></textarea>
                                        <input type="hidden" name="parent_id" value="0">
                                        <input type="hidden" name="commentable_id" value="{{ $course->id }}">
                                        <input type="hidden" name="commentable_type" value="{{ get_class($course) }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="submit2" class="btn_1 headColorYellow text-dark rounded add_bottom_30"> ثبت نظر
                                        </button>
                                    </div>
                                </form>

                            @endauth

                            @guest()
                                <a href="{{ route('login')  }}">
                                    <div class="alert alert-danger">جهت ثبت نظر درسایت باید وارد شوید‌. برای ورود یا
                                        عضویت
                                        اینجا
                                        کلیک کنید.
                                    </div>
                                </a>
                            @endguest


                        </div>
                        <!-- /col -->


                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bg_color_1 -->
        </main>

@stop





@section('pageFooterScripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.cant', function(){
                event.preventDefault();
                swal({
                    type: 'error',
                    title: 'جهت مشاهده دوره باید عضو دوره شوید',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        });
    </script>
@stop

