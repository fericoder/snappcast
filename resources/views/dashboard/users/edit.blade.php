@extends('.dashboard.layouts.master',  ['title' => 'ویرایش کاربر'])

@section('headerScripts')
    <link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                            <h3 class="m-portlet__head-text">
                                ویرایش کاربر: {{ $user->fullName }}
                            </h3>
                        </div>
                    </div>
                    {{--<a target="_blank" href="/users/{{ $user->id }}"><button style="margin-top: 20px;" type="submit" class="btn btn-sm btn-primary">مشاهده کاربر</button></a>--}}
                </div>
                <!--begin::Form-->
                <form action="{{ route('user.update', $user->id)  }}" method="POST" enctype="multipart/form-data"
                      class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">نام:</label>
                            <div class="col-lg-6">
                                <input type="text" name="name"  class="form-control m-input"
                                       value="{{ $user->name }}">
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">نام خانوادگی:</label>
                            <div class="col-lg-6">
                                <input type="text" name="family"
                                        class="form-control m-input"
                                       value="{{ $user->family }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">آدرس ایمیل:</label>
                            <div class="col-lg-6">
                                <input type="text" name="email"
                                       class="form-control m-input"
                                       value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">شماره موبایل:</label>
                            <div class="col-lg-6">
                                <input type="text" name="phoneNumber"
                                       class="form-control m-input"
                                       value="{{ $user->phoneNumber }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">نوع کاربر:</label>
                            <div class="col-lg-6">
                                <select style="width: 100%" class="form-control m-select2" id="m_select2_1" name="role_id[]" multiple>
                                    @foreach ($roles as $role)
                                        <option {{ in_array(trim($role->id) , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $role->id }}"> {{ $role->name }} - {{ $role->label }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>





                        <!--begin::Form-->
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">تصویر آواتار کاربر:</label>
                            <div class="col-lg-6">
                                <input  type="file" name="avatar" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="avatar">انتخاب فایل</label>
                            </div>
                        </div>
                        <!--end::Form-->



                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">ویرایش</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <!--end::Form-->
            </div>
        </div>

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
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
    <script>
        CKEDITOR.replace( 'body', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='

        } );
        CKEDITOR.config.contentsLangDirection='rtl';
        CKEDITOR.config.width = 800
        CKEDITOR.config.height = 400
    </script>
@stop