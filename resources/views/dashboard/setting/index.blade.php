@extends('.dashboard.layouts.master', ['title' => 'تنظیمات سیستم'])

@section('headerScripts')
<link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
<style>
  a,
  span {
    font-family: byekan !important;
  }
</style>
@stop

@section('content')


<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-tools">
          <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
                <i class="flaticon-share m--hide"></i>
                تنظیمات اصلی سایت
              </a>
            </li>
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" aria-selected="false">
                لوگو و تصاویر
              </a>
            </li>

            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab" aria-selected="false">
                اسلایدر
              </a>
            </li>
          </ul>
        </div>

      </div>
      <div class="tab-content">
        <div class="tab-pane active show" id="m_user_profile_tab_1">
          <form action="{{ route('setting.update', $settings->id) }}" method="POST" class="m-form m-form--fit m-form--label-align-right">
            @csrf
            @method('PUT')
            <div class="m-portlet__body">

              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">نام کامل سایت</label>
                <div class="col-7">
                  <input class="form-control m-input" type="text" name="name" value="{{ $settings->name }}">
                </div>
              </div>

              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">آدرس سایت</label>
                <div class="col-7">
                  <input class="form-control m-input" type="text" name="url" value="{{ $settings->url }}">
                </div>
              </div>

              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">عنوان سایت</label>
                <div class="col-7">
                  <input class="form-control m-input" type="text" name="title" value="{{ $settings->title }}">
                </div>
              </div>

              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">توضیحات سایت</label>
                <div class="col-7">
                  <input class="form-control m-input" type="text" name="description" value="{{ $settings->description }}">
                </div>
              </div>
              <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">درباره سایت</label>
                <div class="col-7">
                  <input class="form-control m-input" type="text" name="about" value="{{ $settings->about }}">
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
          <form action="{{ route('setting.update', $settings->id) }}" method="POST" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <br>
            <div class="container">
              <div class="row">
                <div class="col-sm-2 imgUp">
                  <div class="imagePreview"></div>
                  <label class="btn btn-primary">
                    Upload <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden" name="logo">
                  </label>
                </div><!-- col-2 -->
                <!--   <i class="fa fa-plus imgAdd"></i> -->
              </div><!-- row -->
            </div><!-- container -->

            <button type="submit" class="btn btn-success ml- mb-2">ارسال</button>

          </form>
        </div>
        <div class="tab-pane" id="m_user_profile_tab_3">
          {{--  {{ dd($slide['0']) }}  --}}
          <form action="{{ route('slide.update', $slide['0']->id) }}" method="post" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
              @csrf
              @method('PUT')
               <div class="m-portlet__body">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        اسلایدر شماره یک
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="form-group m-form__group row">

                        <label for="example-text-input" class="col-form-label col-sm-3">تصویر پروفایل</label>
                        <div class="col-md-7 col-sm-3">
                          <input type="file" name="slide_path1" class="custom-file-input" id="avatar">
                          <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">عنوان</label>
        
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title1" value="{{ $slide[0]->title }}" required autofocus>
        
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">توضیحات</label>
        
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="description1" value="{{ $slide[0]->description }}" required autofocus>
        
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">لینک</label>
        
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="url1" value="{{ $slide[0]->url }}" required autofocus>
        
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">رنگ دکمه</label>
        
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="button_color1" value="{{ $slide[0]->button_color }}" required autofocus>
        
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        اسلایدر شماره دو
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                                <div class="form-group m-form__group row">
          
                                  <label for="example-text-input" class="col-form-label col-sm-3">تصویر پروفایل</label>
                                  <div class="col-md-7 col-sm-3">
                                    <input type="file" name="slide_path2" class="custom-file-input" id="avatar">
                                    <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                                  </div>
                                </div>
                                <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">عنوان</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title2" value="{{ $slide[1]->title }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">توضیحات</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="description2" value="{{ $slide[1]->description }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">لینک</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="url2" value="{{ $slide[1]->url }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">رنگ دکمه</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="button_color2" value="{{ $slide[1]->button_color }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        اسلایدر شماره سه
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                                <div class="form-group m-form__group row">
          
                                  <label for="example-text-input" class="col-form-label col-sm-3">تصویر پروفایل</label>
                                  <div class="col-md-7 col-sm-3">
                                    <input type="file" name="slide_path3" class="custom-file-input" id="avatar">
                                    <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                                  </div>
                                </div>
                                <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">عنوان</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title3" value="{{ $slide[2]->title }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">توضیحات</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="description3" value="{{ $slide[2]->description }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">لینک</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="url3" value="{{ $slide[2]->url }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">رنگ دکمه</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="button_color3" value="{{ $slide[2]->button_color }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        اسلایدر شماره چهار
                      </button>
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                                <div class="form-group m-form__group row">
          
                                  <label for="example-text-input" class="col-form-label col-sm-3">تصویر پروفایل</label>
                                  <div class="col-md-7 col-sm-3">
                                    <input type="file" name="slide_path4" class="custom-file-input" id="avatar">
                                    <label class="custom-file-label" for="avatar">جهت انتخاب فایل کلیک کنید</label>
                                  </div>
                                </div>
                                <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">عنوان</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title4" value="{{ $slide[3]->title }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">توضیحات</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="description4" value="{{ $slide[3]->description }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">لینک</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="url4" value="{{ $slide[3]->url }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label text-md-right">رنگ دکمه</label>
                  
                                      <div class="col-md-7">
                                          <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="button_color4" value="{{ $slide[3]->button_color }}" required autofocus>
                  
                                          @if ($errors->has('title'))
                                              <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                  </div>
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
<script src="/admin/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>
<!--end::Page Scripts -->



<script>
  $(".imgAdd").click(function() {
    $(this).closest(".row").find('.imgAdd').before(
      '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
      );
  });
  $(document).on("click", "i.del", function() {
    $(this).parent().remove();
  });
  $(function() {
    $(document).on("change", ".uploadFile", function() {
      var uploadFile = $(this);
      var files = !!this.files ? this.files : [];
      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

      if (/^image/.test(files[0].type)) { // only image file
        var reader = new FileReader(); // instance of the FileReader
        reader.readAsDataURL(files[0]); // read the local file

        reader.onloadend = function() { // set image data as background of div
          //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
          uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
        }
      }

    });
  });
</script>
@stop
