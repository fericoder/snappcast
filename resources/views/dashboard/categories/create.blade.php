@extends('.dashboard.layouts.master',  ['title' => 'افزودن دسته بندی'])

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
                                افزودن دسته بندی جدید
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">عنوان:</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control m-input"
                                       placeholder="عنوان دسته بندی را وارد نمایید">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">شاخه اصلی:</label>
                            <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_2" name="parent_id">
                                    <option value="0">ندارد - شاخه اصلی است</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{  $category->parent_id === 0 ? "اصلی" : $category->parent->title }} > {{ $category->title }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">ثبت دسته بندی جدید</button>
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
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/summernote.js" type="text/javascript"></script>
    <script src="/admin/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>

    <!--end::Page Scripts -->

@stop