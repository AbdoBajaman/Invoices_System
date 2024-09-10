@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
 <link rel="stylesheet" href="{{ asset('assets/css/alerts.css') }}">
@endsection
@section('title')
قائمه الفواتير المدفوعه جزئياً
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير المدفوعه جزئياً</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                                <a class="btn btn-outline-primary btn-block" href="{{ route('invoices.create') }}">اضافه فاتوره</a>
                            </div>
                            {{-- <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0">Bordered Table</h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
                                            </div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">رقم الفاتوره</th>
                                                {{-- <th class="border-bottom-0">تاريخ الفاتوره</th>
                                                <th class="border-bottom-0">تاريخ الاستحقاق</th> --}}

                                                <th class="border-bottom-0">القسم</th>
                                                <th class="border-bottom-0">المنتج</th>
                                                {{-- <th class="border-bottom-0">الخصم</th>
                                                <th class="border-bottom-0">نسبة الضريبه</th>
                                                <th class="border-bottom-0">فبمه الضريبه</th>
                                                <th class="border-bottom-0"> الاجمالي</th> --}}
                                                <th class="border-bottom-0"> الحاله</th>

                                                <th class="border-bottom-0">العمليات</th>

                                                {{-- <th class="border-bottom-0"> ملاحظات</th> --}}






                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoices)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoices->invoice_number }}</td>
                                                    {{-- <td>{{ $invoicess->invoices_date }}</td>
                                                    <td>{{ $invoicess->due_date }}</td> --}}

                                                    <td>{{ $invoices->sections->section_name }}</td>
                                                    <td>{{ $invoices->product }}</td>
                                                    {{-- <td>{{ $invoicess->discount }}</td>
                                                    <td>{{ $invoicess->rate_tax }}</td>
                                                    <td>{{ $invoicess->value_tax }}</td>
                                                    <td>{{ $invoicess->total }}</td> --}}
                                                    <td>
                                                        @if ($invoices->value_status == 2)
                                                            <span class="text-danger">
                                                                {{ $invoices->status }}

                                                            </span>
                                                        @elseif ($invoices->value_status == 1)
                                                            <i class="text-success">
                                                                {{ $invoices->status }}

                                                            </i>
                                                        @else
                                                            {{-- <i class="fas fa-war text-success"></i> --}}
                                                            <i class="text-warning">
                                                                {{ $invoices->status }}

                                                            </i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button aria-expanded="false" aria-haspopup="true"
                                                                class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                            <div class="dropdown-menu tx-13">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('invoices.edit', $invoices->id) }}">
                                                                    <i class="fas fa-edit text-warning"></i> &nbsp;&nbsp;تعديل
                                                                    الفاتورة</a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('invoice_details.show', $invoices->id ?? '1') }}">
                                                                    <i class="fas fa-info text-info"></i>&nbsp;&nbsp; &nbsp;تفاصيل
                                                                    الفاتورة</a>
                                                                <a class="dropdown-item" href=""
                                                                    data-invoice_id="{{ $invoices->id }}" data-toggle="modal"
                                                                    data-target="#delete_invoice"><i
                                                                        class="text-danger fas fa-trash-alt"></i>
                                                                    &nbsp;&nbsp;حذف
                                                                    الفاتورة</a>

                                                                <a class="dropdown-item" href="{{route('status_show', $invoices->id )}}"><i
                                                                        class=" text-success fas
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                                    حالة
                                                                    الدفع</a>

                                                                <a class="dropdown-item" href="#"
                                                                    data-invoices_id="{{ $invoices->id }}" data-toggle="modal"
                                                                    data-target="#Transfer_invoices"><i
                                                                        class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل
                                                                    الي
                                                                    الارشيف</a>

                                                                <a class="dropdown-item" href=""><i
                                                                        class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                                    الفاتورة
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </td>




                                                    {{-- <td>{{$invoicess->status}}</td> --}}
                                                    {{-- <td>{{ $invoicess->note }}</td> --}}

                                                </tr>
                                            @endforeach


                                        </tbody>
                                        {{-- <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        $('#delete_invoice').on('show.bs.modal', function(event) {
            console.log('de');
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection
