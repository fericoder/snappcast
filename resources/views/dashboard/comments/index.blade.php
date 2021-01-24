@extends('.dashboard.layouts.master',  ['title' => 'لیست پست ها'])

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
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد تمامی کامنت ها
                            </h4><br>
                            <span class="m-widget24__desc">
				             تایید شده و تایید نشده
				        </span>
                            <span class="m-widget24__stats m--font-brand">
				            {{ $comments->count() }}
				        </span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد کامنت های تایید شده
                            </h4><br>
                            <span class="m-widget24__desc">
				            کامنت های تایید شده
				        </span>
                            <span class="m-widget24__stats m--font-brand">
				            {{ $comments->where('approved', '1')->count() }}
				        </span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                تعداد کامنت های تایید نشده
                            </h4><br>
                            <span class="m-widget24__desc">
				            کامنت های تایید نشده
				        </span>
                            <span class="m-widget24__stats m--font-info">
				            {{ $comments->where('approved', '0')->count() }}
				        </span>
                            <div class="m--space-10"></div>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
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
                                لیست نظرات
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
                            <th title="Field #2" data-field="Owner">نام پست</th>
                            <th title="Field #3" data-field="Contact">ایجاد کننده</th>
                            <th title="Field #4" data-field="CarMake">متن نظر</th>
                            <th title="Field #5" data-field="CarModel">تاریخ انتشار</th>
                            <th title="Field #5" data-field="status">وضعیت</th>
                            <th title="Field #9" data-field="Actions">تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            @if ($comment->commentable_type == "App\Post")
                                <tr>
                                    <td>{{ $comment->id  }}</td>
                                    <td> <a target="_blank" href="{{ route('posts.show',[$comment->commentable->id,$comment->commentable->slug]) }}">{{ $comment->commentable->title  }}</a></td>
                                    <td>{{ $comment->user->fullName  }}</td>
                                    <td>{{ $comment->comment  }}</td>
                                    <td>{{ jdate($comment->created_at)  }}</td>
                                    <td>{{ $comment->approved == 1 ? 'تایید شده' : 'تایید نشده'}}</td>
                                    <td>
                                            <a href="#"
                                            data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button"
                                            title="View "> <i style="color: darkred" class="fa fa-times"></i> </a>
                
                                        <a href=""
                                        data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button"
                                        title="View "> <i style="color: darkred" class="fa fa-times"></i> </a>
                                        
                                        @if($comment->approved == 0)
                                            <a href="{{ route('comment.approve',[ $comment->id,  $comment->commentable]) }}"
                                               class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                               title="View "> <i style="color: green;" class="fa fa-check"></i> </a>
                                        @endif

                                      

                                    </td>
                                </tr>
                                
                            @endif
                          

                            @if ($comment->commentable_type == "App\Course")

                                <tr>
                                    <td>{{ $comment->id  }}</td>
                                    <td> <a target="_blank" href="{{ route('courses.show',[$comment->commentable->id,$comment->commentable->slug]) }}">{{ $comment->commentable->title  }}</a></td>
                                    <td>{{ $comment->user->fullName  }}</td>
                                    <td>{{ $comment->comment  }}</td>
                                    <td>{{ jdate($comment->created_at)  }}</td>
                                    <td>{{ $comment->approved == 1 ? 'تایید شده' : 'تایید نشده'}}</td>
                                    <td>
                                            <a data-toggle="modal" data-target="#m_modal_{{ $comment->id }}"
                                            class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                            title="View"> 
                                            <i style="color: #19b5fe" class="fa fa-reply">
                                                
                                            </i>
                                         </a>
                                        @if($comment->approved == 0)
                                            <a href="{{ route('comment.approve',[ $comment->id,  $comment->commentable]) }}"
                                               class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                               title="View "> <i style="color: #03c9a9;" class="fa fa-check"></i> </a>
                                        @endif

                                        <a href=""
                                           data-id="{{$comment->id}}" data-commentable="{{ $comment->commentable->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill button"
                                           title="View "> <i style="color: #db0a5b" class="fa fa-times"></i> </a>

                                    </td>
                                </tr>
                            @endif
                            <!--begin::Modal-->
                <div style="" class="modal fade" id="m_modal_{{ $comment->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">پاسخ به نظر</h5>
                                <button style="font-family:LineAwesome!important" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/comment/answer" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label iranyekan">متن
                                            پاسخ:</label>
                                        <textarea class="form-control iranyekan" name="comment"
                                                  id="comment"></textarea>
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="commentable_id"
                                               value="{{ $comment->commentable->id }}">
                                        <input type="hidden" name="commentable_type"
                                               value="{{ get_class($comment->commentable) }}">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Modal-->


                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>

{{--  {{ dd($comments->commentable) }}  --}}

            

            <div id="comments">
                <h5>نظرات کاربران اسنپ کست:</h5>
            </div>




        </div>
    </div>

@stop


@section('footerScripts')
    <script>
        $(document).on('click', '.button', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var commentable = $(this).data('commentable');
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
                        type: "POST",
                        url: "{{url('dashboard/comment/delete')}}",
                        data: {id:id, commentable:commentable},
                        success: function (data) {
                            var url = "<?php echo url()->previous(); ?>";
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