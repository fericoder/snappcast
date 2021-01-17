@extends('.dashboard.layouts.master',  ['title' => 'لیست دوره های آموزشی'])

@section('headerScripts')
    <link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <style>
        a, span {
            font-family: byekan !important;
        }
    </style>
@stop

@section('content')

    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد دوره های آموزشی
                            </h4><br>
                            <span class="m-widget24__desc">
				            منتشر شده و منتشر نشده
				        </span>
                            <span class="m-widget24__stats m--font-brand">
				            {{ $courses->count() }}
				        </span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                دوره های آموزشی منتشر شده
                            </h4><br>
                            <span class="m-widget24__desc">
				            دوره های آموزشیی انتشار یافته
				        </span>
                            <span class="m-widget24__stats m--font-info">
				            {{ $courses->where('published_at', '<',  \Carbon\Carbon::now())->count()  }}

				        </span>
                            <div class="m--space-10"></div>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                دوره های آموزشی منتشر نشده
                            </h4><br>
                            <span class="m-widget24__desc">
				            دوره های آموزشیی زمانبندی شده
				        </span>
                            <span class="m-widget24__stats m--font-danger">
				            {{ $courses->where('published_at', '>',  \Carbon\Carbon::now())->count()  }}
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
                                تاریخ آخرین پست
                            </h4><br>
                            <span class="m-widget24__desc">
				            آخرین دوره آموزشی قابل انتشار
				        </span>
                            <br><br><span style="direction: ltr" class="m-widget24__stats m--font-success">
                                {{ $courses->sortByDesc('published_at')->pluck('published_at')->first() }}

				        </span>
                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                لیست دوره های آموزشی
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">


                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input" placeholder="جستجو ..."
                                                   id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ route('course.create')  }}"
                                   class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="flaticon-file-1"></i>
							<span>دوره آموزشی جدید</span>
						</span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1" data-field="OrderID">ردیف</th>
                            <th title="Field #2" data-field="Owner">عنوان</th>
                            <th title="Field #3" data-field="Contact">ایجاد کننده</th>
                            <th title="Field #4" data-field="CarMake">تاریخ ایجاد</th>
                            <th title="Field #5" data-field="CarModel">تاریخ انتشار</th>
                            <th title="Field #7" data-field="DepositPaid">تعداد نمایش</th>
                            <th title="Field #8" data-field="OrderDate">تعداد نظرات</th>
                            <th title="Field #9" data-field="Actions">تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id  }}</td>
                                <td> <a href="{{ route('course.show', $course->id) }}"> {{ $course->title  }}</a></td>
                                <td>{{ $course->user_id  }}</td>
                                <td>{{ jdate($course->created_at)  }}</td>
                                <td>{{ jdate($course->published_at)  }}</td>
                                <td>{{ $course->viewCount  }}</td>
                                <td>{{ $course->commnetCount  }}</td>
                                <td>
                                    <a href=""
                                       data-id="{{$course->id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button"
                                       title="View "> <i style="color: darkred" class="fa fa-times"></i> </a>

                                    <a href="{{ route('course.edit', $course->id ) }}"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                       title="View "> <i style="color: green" class="la la-edit"></i> </a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>


        </div>
    </div>

@stop


@section('footerScripts')
        <script>
        $(document).on('click', '.button', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "آیا مطمئن هستید؟",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "بله",
                    cancelButtonText: "خیر",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "post",
                        url: "{{url('dashboard/course/delete')}}",
                        data: {id:id},
                        success: function (data) {
                            var url = document.location.origin + "/dashboard/course";
                            location.href = url;
                        }
                    });
                });
        });

        </script>
    <!--begin::Page Scripts -->
    <script src="/admin/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js"
            type="text/javascript"></script>
    <!--end::Page Scripts -->

@stop