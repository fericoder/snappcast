@extends('.dashboard.layouts.master',  ['title' => 'صفحه اصلی'])

@section('headerScripts')

@stop

@section('content')
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <a href="{{ route('post.index') }}">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    تعداد پست ها
                                </h4><br>
                                <span class="m-widget24__desc">
				            منتشر شده و منتشر نشده
				        </span>
                                <span class="m-widget24__stats m--font-brand byekan">
				            {{ $postsCount }}
				        </span>
                            </div>
                        </div>
                    </a>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <a href="{{ route('post.index') }}">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    تعداد دوره های آموزشی
                                </h4><br>
                                <span class="m-widget24__desc byekan">
				            منتشر شده و منتشر نشده
				        </span>
                                <span class="m-widget24__stats m--font-info">
                            ۳
				        </span>
                                <div class="m--space-10"></div>
                            </div>
                        </div>
                    </a>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد پادکست های صوتی
                            </h4><br>
                            <span class="m-widget24__desc byekan">
				            منتشر شده و منتشر نشده
				        </span>
                            <span class="m-widget24__stats m--font-danger byekan">
                                1
				        </span>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد پادکست های تصویری
                            </h4><br>
                            <span class="m-widget24__desc">
				            منتشر شده و منتشر نشده
				        </span>
                            <span class="m-widget24__stats m--font-success byekan">
                                    1
				        </span>
                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">


        </div>
    </div>

@stop


@section('footerScripts')

@stop