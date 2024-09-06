@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل فاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- @if (session('delete'))
    <div class="alert alert-danger" id="alert_success">
        {{ session('delete') }}
    </div>
@endif --}}

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الفاتورة</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">رقم الفاتورة</th>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <td>{{ $invoices->invoice_date }}</td>
                                                            <th scope="row">تاريخ الاستحقاق</th>
                                                            <td>{{ $invoices->due_date }}</td>
                                                            <th scope="row">القسم</th>
                                                            <td>{{ $invoices->sections->section_name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">المنتج</th>
                                                            <td>{{ $invoices->product }}</td>
                                                            <th scope="row">مبلغ التحصيل</th>
                                                            <td>{{ $invoices->Amount_collection }}</td>
                                                            <th scope="row">مبلغ العمولة</th>
                                                            <td>{{ $invoices->Amount_Commission }}</td>
                                                            <th scope="row">الخصم</th>
                                                            <td>{{ $invoices->discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">نسبة ضريبة القيمة المضافة</th>
                                                            <td>{{ $invoices->rate_tax }}</td>
                                                            <th scope="row">قيمة ضريبة القيمة المضافة</th>
                                                            <td>{{ $invoices->value_tax }}</td>
                                                            <th scope="row">الاجمالي شامل الضريبة</th>
                                                            <td>{{ $invoices->total }}</td>

                                                            <th scope="row">حاله الدفع الحاليه</th>


                                                            @foreach ($invoice_details as $key => $detail)
                                                                @if ($loop->last)
                                                                    <td>
                                                                        @if ($detail->Value_Status == 1)
                                                                            <span
                                                                                class="badge badge-pill badge-success">{{ $detail->Status }}</span>
                                                                        @elseif($detail->Value_Status == 2)
                                                                            <span
                                                                                class="badge badge-pill badge-danger">{{ $detail->Status }}</span>
                                                                        @else
                                                                            <span
                                                                                class="badge badge-pill badge-warning">{{ $detail->Status }}</span>
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                            @endforeach



                                                        </tr>


                                                        {{-- <tr>
                                                            <th scope="row">نسبة الضريبة</th>
                                                            <td>{{ $invoices->Rate_VAT }}</td>
                                                            <th scope="row">قيمة الضريبة</th>
                                                            <td>{{ $invoices->Value_VAT }}</td>
                                                            <th scope="row">الاجمالي مع الضريبة</th>
                                                            <td>{{ $invoices->Total }}</td>
                                                            <th scope="row">الحالة الحالية</th>

                                                            @if ($invoices->Value_Status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @elseif($invoices->Value_Status == 2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">ملاحظات</th>
                                                            <td>{{ $invoices->note }}</td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            {{-- <th>#</th> --}}
                                                            <th>رقم الفاتورة</th>


                                                            <th>حالة الدفع</th>

                                                            <th>مبلغ التحصيل</th>
                                                            <th>المبلغ المدفوع</th>
                                                            <th>المبتقي</th>

                                                            <th>تاريخ الدفع </th>
                                                            <th>ملاحظات</th>
                                                            <th>تاريخ الاضافة </th>
                                                            <th>المستخدم</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        {{-- {{$invoice_details}} --}}
                                                        @if (isset($invoice_details) && $details_count == 1)
                                                            @foreach ($invoice_details as $invoice_details)
                                                                <tr>

                                                                    <td>{{ $invoice_details->invoice_number }}</td>

                                                                    @if ($invoice_details->Value_Status == 1)
                                                                        <td><span
                                                                                class="badge badge-pill badge-success">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                    @elseif($invoice_details->Value_Status == 2)
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                    @endif
                                                                    <td>{{ number_format($invoice_details->invoices->Amount_collection, 2) }}
                                                                    </td>
                                                                    <td>{{ number_format($invoice_details->payed_value, 2) }}
                                                                    </td>
                                                                    <td
                                                                        class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                        {{ number_format($invoice_details->invoices->Amount_collection - $invoice_details->payed_value, 2) }}
                                                                    </td>
                                                                    </td>
                                                                    <td>{{ $invoice_details->Payment_Date ?? 'لم تتم' }}
                                                                    </td>
                                                                    <td>{{ $invoice_details->note ?? 'لا يوجد' }}</td>
                                                                    <td>{{ $invoice_details->created_at }}</td>
                                                                    <td>{{ $invoice_details->user }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            @php
                                                                $total_payed_value = 0; // Initialize a variable to keep track of the cumulative payed value
                                                            @endphp
                                                            @foreach ($invoice_details as $invoice_details)
                                                                @php

                                                                    $total_payed_value += $invoice_details->payed_value;
                                                                    $remaining =
                                                                        $invoice_details->invoices->Amount_collection -
                                                                        $total_payed_value;
                                                                @endphp
                                                                <tr>
                                                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                                                    <td>{{ $invoice_details->invoice_number }}</td>


                                                                    @if ($invoice_details->Value_Status == 1)
                                                                        <td><span
                                                                                class="badge badge-pill badge-success">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                        {{-- @elseif ($remaining <= 0)
                                                                    <td><span
                                                                        class="badge badge-pill badge-success">مدفوعة</span>
                                                                   </td> --}}
                                                                    @elseif($invoice_details->Value_Status == 2)
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning">{{ $invoice_details->Status }}</span>
                                                                        </td>
                                                                    @endif
                                                                    <td>{{ number_format($invoice_details->invoices->Amount_collection, 2) }}
                                                                    </td>
                                                                    <td>{{ number_format($invoice_details->payed_value, 2) }}
                                                                    </td>

                                                                    @if ($invoice_details->Value_Status == 1)
                                                                        <td
                                                                            class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                            {{ number_format($invoice_details->invoices->Amount_collection - $invoice_details->payed_value, 2) }}
                                                                        </td>
                                                                    @else
                                                                        <td
                                                                            class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                            {{ number_format($remaining, 2) }}
                                                                        </td>
                                                                    @endif

                                                                    <td>{{ $invoice_details->Payment_Date ?? 'لم يتم الدفع' }}
                                                                    </td>
                                                                    <td>{{ $invoice_details->note ?? 'لا يوجد' }}</td>
                                                                    <td>{{ $invoice_details->created_at }}</td>
                                                                    <td>{{ $invoice_details->user }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة مرفقات</h5>
                                                    <form method="post" action="{{ route('invoice_attachment.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="file_name" required>
                                                            <input type="hidden" id="customFile" name="invoice_number"
                                                                value="{{ $invoices->invoice_number }}">
                                                            <input type="hidden" id="invoice_id" name="invoice_id"
                                                                value="{{ $invoices->id }}">
                                                            <label class="custom-file-label" for="customFile">حدد
                                                                المرفق</label>
                                                        </div><br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                            name="uploadedFile">تاكيد</button>
                                                    </form>
                                                </div>

                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            {{-- <h1>asas</h1>
                                                            {{$invoice_attachments->count()}} --}}
                                                            {{-- @foreach ($attachments as $attachment) --}}
                                                            <?php $i++; ?>
                                                            @if ($attachment_count >= 1)
                                                                @foreach ($invoice_attachments as $attachment)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $attachment->File_Name ?? 'لا يوجد ' }}</td>
                                                                        <td>{{ $attachment->created_by ?? 'مجهول' }}</td>
                                                                        <td>{{ $attachment->created_at ?? 'غير محدد' }}
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <a class="btn btn-outline-success btn-sm"
                                                                                href="{{ route('invoice_attachment.view_file', [$invoices->invoice_number, $attachment->File_Name ?? '1']) }}"
                                                                                role="button" target='_blank'>
                                                                                <i class="fas fa-eye"></i>&nbsp; عرض
                                                                            </a>

                                                                            <a class="btn btn-outline-info btn-sm"
                                                                                href="{{ route('invoice_attachment.DownloadFile', [$invoices->invoice_number, $attachment->File_Name ?? '1']) }}"
                                                                                role="button">
                                                                                <i class="fas fa-download"></i>&nbsp; تحميل
                                                                            </a>

                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->File_Name ?? '1' }}"
                                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                                data-file_id="{{ $attachment->id }}"
                                                                                data-target="#delete_file">حذف
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $invoice_attachments->File_Name ?? 'غير معروف' }}
                                                                    </td>
                                                                    <td>{{ $invoice_attachments->created_by ?? 'مجهول' }}
                                                                    </td>
                                                                    <td>{{ $invoice_attachments->created_at ?? 'غير محدد' }}
                                                                </tr>

                                                            @endif

                                                            {{-- @endforeach --}}
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('invoice_attachment.destroy', 1) }}" method="post">

                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="file_id" id="file_id" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_id = button.data('file_id')
            var file_name = button.data('file_name')


            var invoice_number = button.data('invoice_number')

            var modal = $(this)

            modal.find('.modal-body #file_id').val(file_id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
