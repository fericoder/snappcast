@extends('.dashboard.layouts.master',  ['title' => 'محتوی دوره آموزشی'])

@section('headerScripts')

    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">&#160;  افزودن سرفصل جدید<span style="color: #5867dd">  {{ $course->title }}  </span></h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('course.addSection') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">عنوان:</label>
                            <input type="text" name="title" class="form-control" placeholder="مثال: فصل اول - آشنایی" id="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">ترتیب:</label>
                            <input type="number" name="order" class="form-control" id="order">
                        </div>
                        <input style="display: none" hidden type="text" name="course_id" class="form-control" value="{{ $course->id }}" id="course_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" class="btn btn-success">افزودن</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--end::Modal-->




    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">&#160;  افزودن قسمت جدید<span style="color: #5867dd">  {{ $course->title }}  </span></h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('course.addEpisode') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">نام سرفصل:</label>
                            <select style="width: 100%" class="form-control m-select2" id="m_select2_1" name="section_id">
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">عنوان:</label>
                            <input type="text" name="title" placeholder="آموزش تگ a" class="form-control" id="title">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">حجم (مگابایت):</label>
                            <input type="text" name="fileSize" placeholder="88" class="form-control" id="fileSize">
                        </div>


                        <div class="form-group">
                            <label for="message-text" class="form-control-label">مدت زمان:</label>
                            <input type="text" name="time" placeholder="00:23:40" class="form-control" id="time">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">نوع:</label>
                            <select style="width: 100%" class="form-control m-select2" id="m_select2_2" name="type">
                                <option value="cash">پولی</option>
                                <option value="رایگان">رایگان</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">ترتیب:</label>
                            <input type="number" name="order" class="form-control" id="order">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">توضیحات:</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>




                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">آپلود فایل</label>
                            <div class="col-7">
                                <input type="file" name="file" class="custom-file-input" id="file">
                                <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                            </div>
                        </div>


                        <input style="display: none" hidden type="text" name="course_id" class="form-control" value="{{ $course->id }}" id="course_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" class="btn btn-success">افزودن</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--end::Modal-->




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
                                سرفصل های دوره آموزشی &#160;
                                <span style="color: #5867dd">  {{ $course->title }}  </span>
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
                            <div class="col-xl-4 order-1 order-xl-2 m--align-left">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#m_modal_1"> افزودن سرفصل جدید
                                </button>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1" data-field="id">ردیف</th>
                            <th title="Field #2" data-field="order">ترتیب</th>
                            <th title="Field #3" data-field="title">عنوان سرفصل</th>
                            <th title="Field #5" data-field="cretedDate">تاریخ ایجاد</th>
                            <th title="Field #6" data-field="Actions">تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($course->sections as $section)
                            <tr>
                                <td>{{ $section->id  }}</td>
                                <td>{{ $section->order  }}</td>
                                <td>{{ $section->title  }}</td>
                                <td>{{ jdate($section->created_at)  }}</td>
                                <td>
                                    <a href=""
                                       data-id="{{$section->id}}"
                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button"
                                       title="View "> <i style="color: darkred" class="fa fa-times"></i> </a>

                                    <a href="{{ route('course.edit', $section->id ) }}"
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









    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                قسمت های دوره آموزشی &#160;
                                <span style="color: #5867dd">  {{ $course->title }}  </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">

                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-left">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#m_modal_2"> افزودن قسمت جدید
                                </button>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->


                    <table style="font-family: iranyekan" class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>نام سرفصل</th>
                            <th>عنوان</th>
                            <th>حجم</th>
                            <th>مدت زمان</th>
                            <th>نوع</th>
                            <th>تعداد دانلود</th>
                            <th>ترتیب</th>
                            <th>ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($course->episodes as $episode)
                            <tr>
                                <td>{{ $episode->course->title }}</td>
                                <td>{{ $episode->title }}</td>
                                <td>{{ $episode->size }}</td>
                                <td>{{ $episode->time }}</td>
                                <td>{{ $episode->type }}</td>
                                <td>{{ $episode->downloadCount }}</td>
                                <td>{{ $episode->order }}</td>
                                <td>1</td>
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
                function () {
                    $.ajax({
                        type: "post",
                        url: "{{url('dashboard/course/section/delete')}}",
                        data: {id: id},
                        success: function (data) {
                            var url = "<?php echo url()->previous(); ?>";
                            location.href = url;
                        }
                    });
                });
        });

    </script>
    <!--begin::Page Vendors -->
    <script src="/admin/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js"
            type="text/javascript"></script>

    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js"
            type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js"
            type="text/javascript"></script>

    <!--begin::Page Vendors -->
    <script src="/admin/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="/admin/assets/demo/default/custom/crud/datatables/basic/scrollable.js" type="text/javascript"></script>
    <!--end::Page Scripts -->

    <!--end::Page Scripts -->

@stop