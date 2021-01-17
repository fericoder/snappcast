@extends('.dashboard.layouts.master',  ['title' => 'پروفایل کاربری'])

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
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                پروفایل کاربری
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{ $user->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">{{ $user->fullName }}</span>
                                <a href="#" class="m-card-profile__email m-link">{{ $user->email }}</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
                                        <i class="flaticon-share m--hide"></i>
                                        ویرایش پروفایل
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" aria-selected="false">
                                        تغییر رمز عبور
                                    </a>
                                </li>

                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab" aria-selected="false">
                                        تغییر تصویر پروفایل
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                            <form action="/dashboard/profile" method="post" class="m-form m-form--fit m-form--label-align-right">
                                @csrf
                                <div class="m-portlet__body">


                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">اطلاعات شخصی</h3>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">نام</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">نام خانوادگی</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="family" value="{{ $user->family }}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">آدرس ایمیل</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" disabled type="text" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">شماره موبایل</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="phoneNumber" value="{{ $user->phoneNumber }}">
                                        </div>
                                    </div>




                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-success m-btn m-btn--air m-btn--custom">ثبت تغییرات</button>&nbsp;&nbsp;

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_user_profile_tab_2">
                            <form action="/dashboard/profile/password" method="post" class="m-form m-form--fit m-form--label-align-right">
                                @csrf
                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">اطلاعات امنیتی</h3>
                                        </div>
                                    </div>


                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">رمز عبور جدید</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password" name="password_confirmation"  ">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">تایید رمز عبور </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password" name="password"  ">
                                        </div>
                                    </div>


                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-success m-btn m-btn--air m-btn--custom">ثبت تغییرات</button>&nbsp;&nbsp;

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_user_profile_tab_3">
                            <form action="/dashboard/profile/avatar" method="post" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
                                @csrf
                                <div class="m-portlet__body">


                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">اطلاعات شخصی</h3>
                                        </div>
                                    </div>


                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">تصویر پروفایل</label>
                                        <div class="col-7">
                                                <input type="file" name="avatar" class="custom-file-input" id="avatar">
                                                <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                                        </div>
                                    </div>




                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-success m-btn m-btn--air m-btn--custom">ثبت تغییرات</button>&nbsp;&nbsp;

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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