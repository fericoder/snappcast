@extends('.dashboard.layouts.master',  ['title' => 'ویرایش پست'])

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
                                ویرایش پست: {{ $post->title }}
                            </h3>
                        </div>
                    </div>
                    <a target="_blank" href="{{ route('posts.show',[$post->id,$post->slug]) }}"><button style="margin-top: 20px;" type="submit" class="btn btn-sm btn-primary">مشاهده پست</button></a>
                </div>
                <!--begin::Form-->
                <form action="{{ route('post.update', $post->id)  }}" method="POST" enctype="multipart/form-data"
                      class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">عنوان پست:</label>
                            <div class="col-lg-6">
                                <input type="text" name="title" {{ old('title') }} class="form-control m-input"
                                       value="{{ $post->title }}">
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">توضیحات پست:</label>
                            <div class="col-lg-6">
                                <input type="text" name="description"
                                       {{ old('description') }} class="form-control m-input"
                                       value="{{ $post->description }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">دسته بندی:</label>
                            <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_1" name="category">
                                    @foreach ($categories as $category)
                                        <option {{ $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->title }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">زمان انتشار:</label>
                            <div class="col-lg-6">
                                <div class="input-group date">
                                    <input type="text" name="published_at" class="form-control m-input" readonly=""
                                           value="{{ $post->published_at }}" id="m_datetimepicker_2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i
                                                    class="la la-calendar-check-o glyphicon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">ارسال در های اجتماعی:</label>
                            <div class="col-lg-6">
                                <div class="m-checkbox-list">

                                    <label class="m-checkbox">
                                        <input data-switch="true" type="checkbox" name="telegram" checked="checked" data-on-text="فعال" data-handle-width="50" data-off-text="غیرفعال" data-on-color="success">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div style="display: none" class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">تگ ها</label>
                            <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_11" multiple
                                        name="tags[]"></select>
                            </div>
                        </div>
                        <!--end::Form-->


                        <!--begin::Form-->
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">تصویر پست</label>
                            <div class="col-lg-6">
                                <input  type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="customFile">انتخاب فایل</label>
                            </div>
                        </div>
                        <!--end::Form-->


                        <!--begin::Form-->
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">فایل ضمیمه</label>
                            <div class="col-lg-6">
                                <input  type="file" name="attachment" class="custom-file-input" id="attachment">
                                <label class="custom-file-label" for="attachment">انتخاب فایل</label>
                            </div>
                        </div>
                        <!--end::Form-->


                        <!--begin::Form-->
                        <div class="m-form__group m-form__group--last form-group row">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">متن پست</label>
                                <div class="col-lg-10">
                                    <textarea style="direction: rtl"  {{ old('body') }} id="body" name="body"
                                              rows="18">{{ $post->body }}"</textarea>
                                </div>
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