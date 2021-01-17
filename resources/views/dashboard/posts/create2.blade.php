@extends('.dashboard.layouts.master',  ['title' => 'افزودن پست'])

@section('headerScripts')
    <link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <style>
        .types {
            padding: 2em;
            color: #fff;
            display: none;
        }
    </style>
@stop

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!--Begin::Main Portlet-->
            <div class="m-portlet">
                <!--begin: Portlet Head-->
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                افزودن پست جدید
                                <small class="iranyekan">مقاله - پادکست - دوره آموزشی</small>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" data-toggle="m-tooltip"
                                   class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left"
                                   data-width="auto" title="Get help with filling up this form">
                                    <i class="flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end: Portlet Head-->

                <!--begin: Form Wizard-->
                <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">

                    <!--begin: Message container -->
                    <div class="m-portlet__padding-x">
                        <!-- Here you can put a message or alert -->
                    </div>
                    <!--end: Message container -->

                    <!--begin: Form Wizard Head -->
                    <div class="m-wizard__head m-portlet__padding-x">
                        <!--begin: Form Wizard Progress -->
                        <div class="m-wizard__progress">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end: Form Wizard Progress -->

                        <!--begin: Form Wizard Nav -->
                        <div class="m-wizard__nav">
                            <div class="m-wizard__steps">
                                <div class="m-wizard__step m-wizard__step--current"
                                     m-wizard-target="m_wizard_form_step_1">
                                    <div class="m-wizard__step-info">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><span>1</span></span>
                                        </a>
                                        <div class="m-wizard__step-line">
                                            <span></span>
                                        </div>
                                        <div class="m-wizard__step-label">
                                            توضیحات اصلی
                                        </div>
                                    </div>
                                </div>
                                <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                    <div class="m-wizard__step-info">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><span>2</span></span>
                                        </a>
                                        <div class="m-wizard__step-line">
                                            <span></span>
                                        </div>
                                        <div class="m-wizard__step-label">
                                            نوع انتشار
                                        </div>

                                    </div>
                                </div>
                                <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                    <div class="m-wizard__step-info">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><span>3</span></span>
                                        </a>
                                        <div class="m-wizard__step-line">
                                            <span></span>
                                        </div>
                                        <div class="m-wizard__step-label">
                                            تصویر و ضمیمه
                                        </div>
                                    </div>
                                </div>
                                <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
                                    <div class="m-wizard__step-info">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><span>4</span></span>
                                        </a>
                                        <div class="m-wizard__step-line">
                                            <span></span>
                                        </div>
                                        <div class="m-wizard__step-label">
                                            متن
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Nav -->
                    </div>
                    <!--end: Form Wizard Head -->

                    <!--begin: Form Wizard Form-->
                    <div class="m-wizard__form">
                        <!--
                            1) Use m-form--label-align-left class to alight the form input lables to the right
                            2) Use m-form--state class to highlight input control borders on form validation
                        -->

                        <form action="{{ route('post.store')  }}" method="post" enctype="multipart/form-data"
                              class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                        @csrf
                        <!--begin: Form Body -->
                            <div class="m-portlet__body">

                                <!--begin: Form Wizard Step 1-->
                                <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                    <div class="row">
                                        <div class="col-xl-8 offset-xl-2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">توضیحات اصلی</h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* نوع پست: </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select  class="form-control m-select2" id="m_select2_3"
                                                                name="type">
                                                            <option value="article">مقاله</option>
                                                            <option value="podcast">پادکست</option>
                                                            <option value="course">دوره آموزشی</option>
                                                            <option value="news">اخبار</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>


                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* عنوان پست:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="title" class="form-control m-input"
                                                               placeholder="عنوان پست را وارد نمایید"
                                                               value="{{ old('title') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* دسته بندی:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control m-select2" id="m_select2_1" name="category">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* توضیحات:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <textarea name="description"
                                                                  class="form-control m-input iranyekan" id="" cols="30"
                                                                  placeholder="توضیحات پست را وارد نمایید"
                                                                  rows="10">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                    <div class="row">
                                        <div class="col-xl-8 offset-xl-2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">تاریخ و نحوه انتشار</h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* زمان
                                                            انتشار:</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="published_at"
                                                                   value="{{ old('published_at') }}"
                                                                   class="form-control m-input" readonly=""
                                                                   placeholder="تاریخ و زمان انتشار را وارد نمایید"
                                                                   id="m_datetimepicker_2">
                                                            <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                    class="la la-calendar-check-o glyphicon-th"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="col-xl-4 col-lg-4 col-form-label">* ارسال در های اجتماعی:</label>
                                                        <input data-switch="true" type="checkbox" name="telegram" checked="checked" data-on-text="فعال" data-handle-width="50" data-off-text="غیرفعال" data-on-color="success">
                                                    </div>
                                                </div>






                                                <div style="display: none" class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="col-xl-4 col-lg-4 col-form-label">* تگ ها:</label>
                                                        <select class="form-control m-select2" id="m_select2_11" multiple
                                                                name="tags[]"></select>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 3-->
                                <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                    <div class="row">
                                        <div class="col-xl-8 offset-xl-2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">تصویر و فایل ضمیمه</h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* تصویر پست:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input  type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="image">
                                                        <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                                                    </div>
                                                </div>


                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* فایل ضمیمه:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input  type="file" name="attachment" value="{{ old('attachment') }}" class="custom-file-input" id="attachment">
                                                        <label class="custom-file-label" for="attachment">انتخاب فایل</label>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 3-->

                                <!--begin: Form Wizard Step 4-->
                                <div class="m-wizard__form-step" id="m_wizard_form_step_4">
                                    <div class="row">
                                        <div class="col-xl-8 offset-xl-2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">متن پست</h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">* متن پست:</label>
                                                        <textarea style="direction: rtl"  {{ old('body') }} id="body" name="body"
                                                                  rows="18"></textarea>                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 4-->

                            </div>
                            <!--end: Form Body -->

                            <!--begin: Form Actions -->
                            <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-4 m--align-left">
                                            <button class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                                    data-wizard-action="prev">
											<span>
												<i class="la la-arrow-left"></i>&nbsp;&nbsp;
												<span>مرحله قبل</span>
											</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-4 m--align-right">
                                            <button class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                                    data-wizard-action="next">
											<span>
												<i class="la la-arrow-left"></i>
												<span>مرحله بعد</span>&nbsp;&nbsp;
											</span>
                                            </button>
                                            <button type="submit" class="btn btn-success m-btn m-btn--custom m-btn--icon">ثبت پست جدید</button>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Form Actions -->
                        </form>
                    </div>
                    <!--end: Form Wizard Form-->
                </div>
                <!--end: Form Wizard-->
            </div>
            <!--End::Main Portlet-->
        </div>

    </div>



@stop


@section('footerScripts')

    <!--begin::Page Vendors -->
    <script src="/admin/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="/admin/assets/demo/default/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js"
            type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js"
            type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/wizard/wizard.js" type="text/javascript"></script>


    <!--end::Page Scripts -->
    <script>

        $(function() {
            $('#m_select2_3').change(function(){
                $('.types').hide();
                $('#' + $(this).val()).show();
            });
        });



        CKEDITOR.replace('body', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='

        });
        CKEDITOR.config.contentsLangDirection = 'rtl';
        CKEDITOR.config.width = 800
        CKEDITOR.config.height = 400
    </script>
@stop