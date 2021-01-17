@extends('.dashboard.layouts.master',  ['title' => 'لیست درآمد های شما'])

@section('headerScripts')
    <link href="/admin/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <style>
        a, span {
            font-family: byekan !important;
        }
    </style>
@stop

@section('content')

    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ثبت درخواست واریز </h5>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">مجموع مبلغ قابل واریز:</label>
                            <input type="text" name="amount" value="{{ number_format($incomes->sum('amount')) }} ریال" disabled class="form-control" id="amount">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">نام بانک:</label>
                            <input type="text" name="bankName" placeholder="مثال: سپه" class="form-control" id="bankName">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">شماره کارت:</label>
                            <input type="text" name="cardNumber" placeholder="مثال: ۵۸۹۲۱۰۱۰۱۲۳۴۵۶" class="form-control" id="cardNumber">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">شماره حساب:</label>
                            <input type="text" name="hesabNumber" placeholder="مثال: ۱۶۶۶۶۶۶۶" class="form-control" id="hesabNumber">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">شماره شبا:</label>
                            <input type="text" name="shaba" placeholder="مثال: IR023012030123012301203" class="form-control" id="shaba">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">نام صاحب حساب:</label>
                            <input type="text" name="owner" placeholder="مثال: رضا رضایی" class="form-control" id="owner">
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">ثبت درخواست</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--end::Modal-->



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
				            {{ $incomes->count() }}
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
                                درآمد های پرداخت نشده شما&nbsp;&nbsp;&nbsp;
                                <span>مجموع درآمد پرداخت نشده: {{ number_format($incomes->sum('amount')) }} ریال</span>
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
                                <a style="color: white" data-toggle="modal"
                                   data-target="#m_modal_2"
                                   class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="flaticon-file-1"></i>
							<span>ثبت درخواست واریز</span>
						</span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable"  width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1" data-field="OrderID">ردیف</th>
                            <th title="Field #2" data-field="Owner">عنوان دوره</th>
                            <th title="Field #3" data-field="CarMak1e">تاریخ </th>
                            <th title="Field #4" data-field="CarMak14e">مبلغ </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $income->id  }}</td>
                                <td> <a href="{{ route('course.show', $income->course->id) }}"> {{ $income->course->title  }}</a></td>
                                <td style="direction: rtl!important;">{{ $income->created_at  }}</td>
                                <td style="direction: rtl!important;">{{ number_format($income->amount)  }} ریال </td>

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
                                لیست پرداختی های اسنپ کست به شما&nbsp;&nbsp;&nbsp;
                                <span>مجموع درآمد پرداخت شده تاکنون: {{ number_format($incomes->sum('amount')) }} ریال</span>
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
                                <a style="color: white" data-toggle="modal"
                                   data-target="#m_modal_2"
                                   class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="flaticon-file-1"></i>
							<span>ثبت درخواست واریز</span>
						</span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable2"  width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1" data-field="OrderID">ردیف</th>
                            <th title="Field #2" data-field="Owner">عنوان دوره</th>
                            <th title="Field #3" data-field="CarMak1e">تاریخ </th>
                            <th title="Field #4" data-field="CarMak14e">مبلغ </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $income->id  }}</td>
                                <td> <a href="{{ route('course.show', $income->course->id) }}"> {{ $income->course->title  }}</a></td>
                                <td style="direction: rtl!important;">{{ $income->created_at  }}</td>
                                <td style="direction: rtl!important;">{{ number_format($income->amount)  }} ریال </td>

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

    <script src="/admin/assets/demo/default/custom/crud/metronic-datatable/base/html-table2.js"
            type="text/javascript"></script>
    <!--end::Page Scripts -->

@stop