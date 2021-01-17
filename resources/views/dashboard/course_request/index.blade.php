@extends('.dashboard.layouts.master',  ['title' => 'لیست دسته بندی ها'])

@section('headerScripts')
    <link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <style>
        a, span {
            font-family: byekan !important;
        }
    </style>
@stop

@section('content')


    <div class="row">
        <div class="col-xl-12">

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                لیست درخواست های آموزش
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
                           
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1" data-field="CourseRequestID">ردیف</th>
                            <th title="Field #2" data-field="Owner">نام کاربر</th>
                            <th title="Field #3" data-field="Category">دسته اصلی</th>
                            <th title="Field #4" data-field="Body">متن درخواست</th>
                            <th title="Field #5" data-field="Date">تاریخ ایجاد</th>
                            <th title="Field #6" data-field="Actions">تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($course_requests as $course_request)

                            <tr>
                                <td>{{ $course_request->id  }}</td>
                                <td>{{ $course_request->user->fullName  }}</td>
                                <td>{{ $course_request->category->title  }}</td>
                                <td>{{ $course_request->body  }}</td>
                                <td style="direction: ltr!important;" >{{ jdate($course_request->created_at) }}</td>
                                <td>
                                    <form action="{{ url('dashboard/course_request', ['id' => $course_request->id]) }}" method="POST">
                                        <input class="portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" type="submit" value="حذف" />
                                        {{ method_field('DELETE') }}
                                        @csrf()
                                    </form>
                                </td>
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

    <!--begin::Page Scripts -->
    <script src="/admin/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js"
            type="text/javascript"></script>
    <!--end::Page Scripts -->

@stop