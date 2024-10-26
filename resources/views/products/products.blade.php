@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    قائمه المنتجات-فاتورتك
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">أعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    المنتجات</span>
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
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
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
{{-- @foreach ($sections as $s)

{{$s->section_name}}
@endforeach --}}
    @if ($errors->any())
        <div id="alert_success" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" id="alert_success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger" id="alert_success">
            {{ session('delete') }}
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">

<<<<<<< HEAD
                @can('اضافة منتج')
=======
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-newspaper"
                        data-toggle="modal" href="#modaldemo8">اضافه منتج</a>
                </div>
<<<<<<< HEAD
                @endcan

=======
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
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
                                    <th class="border-bottom-0">اسم المنتج</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                    <th class="border-bottom-0"> العمليات</th>






                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $products)
                                    <tr>
                                        <td class="">{{ $loop->iteration }}</td>
                                        <td class="">{{ $products->product_name }}</td>
                                        <td class="">{{ $products->sections->section_name }}</td>
                                        <td class=""> {{ $products->description }}</td>

                                        <td class=''>
<<<<<<< HEAD

                                            @can('تعديل منتج')
                                            <a class=" btn btn-outline-warning " data-effect="effect-scale"
                                            data-id="{{ $products->id }}"
                                            data-product_name="{{ $products->product_name }}"
                                            data-description="{{ $products->description }}"
                                            data-section_name="{{ $products->sections->section_name }}"
                                            data-toggle="modal" href="#exampleModal2" title="تعديل">تعديل</a>
                                            @endcan

                                            @can('حذف منتج')
=======
                                            <a class=" btn btn-outline-warning " data-effect="effect-scale"
                                                data-id="{{ $products->id }}"
                                                data-product_name="{{ $products->product_name }}"
                                                data-description="{{ $products->description }}"
                                                data-section_name="{{ $products->sections->section_name }}"
                                                data-toggle="modal" href="#exampleModal2" title="تعديل">تعديل</a>
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
                                            <form id="delete-form-{{$products->id}}" action="{{route('products.destroy',$products->id)}}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('{{$products->id}}','{{$products->product_name}}')"
                                                    title="حذف">حذف
                                                </button>
                                            </form>
<<<<<<< HEAD
                                            @endcan

=======
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
                                        </td>






                                    </tr>
                                @endforeach

                                {{-- @foreach ($sections as $section)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $section->section_name }}</td>
                                                    <td>{{ $section->description }}</td>
                                                    <td>{{ $section->created_by }}</td>
                                                    <td class=''>
                                                        <a class="modal-effect btn  btn-warning" data-effect="effect-scale"
                                                            data-id="{{ $section->id }}"
                                                            data-section_name="{{ $section->section_name }}"
                                                            data-description="{{ $section->description }}" data-toggle="modal"
                                                            href="#exampleModal2" title="تعديل">تعديل</a>
                                                        <form id="delete-form-{{ $section->id }}"
                                                            action="{{ route('sections.destroy', $section->id) }}" method="POST"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                            onclick="confirmDelete('{{ $section->id }}', '{{ $section->section_name }}')" title="حذف">حذف
                                                        </button>
                                                        </form>
                                                    </td>


                                                </tr>
                                            @endforeach --}}



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

        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافه منتج</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج</label>
                                <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>


                            <label class="mr-2 my-1" for="exampleInputEmail1">اسم القسم</label>
                            <select required class="form-control" name="section_name" id="section_name">
                                <option value="" disabled>اختر القسم</option>

                                @foreach ($sections as $section) {{-- Use a singular variable to avoid confusion --}}
                                    <option value="{{ $section->section_name  ?? 'لايوجد'}}">
                                        {{ $section->section_name ?? 'لا يوجد' }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- @error('party_id')
                                    <div class="text-danger"> ادخل اسم</div>
                                @enderror --}}

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">ملاحظات:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('products.update', 1) }}" method="post" autocomplete="off">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label">اسم المنتج:</label>
                                <input class="form-control" name="product_name" id="product_name" type="text">
                            </div>
                            <label class="mr-2 my-1" for="exampleInputEmail1">اسم القسم</label>

                            <select required class="form-control" name="section_name" id="section_name">
                            <option value="" disabled>اختر القسم</option>
                            @foreach ($sections as $sections)
                                <option value="{{ $sections->section_name }}">
                                    {{ $sections->section_name }}
                                </option>
                            @endforeach

                        </select>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">ملاحظات:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->


    <!-- row closed -->


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

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var product_name = button.data('product_name');
            var description = button.data('description');
            var section_name = button.data('section_name');
            var modal = $(this); // The modal that is being shown

            // Update the modal's content with the extracted data
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #product_name').val(product_name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #section_name').val(section_name);
        });
    </script>
    <script>
        function confirmDelete(productId, productName) {
            event.preventDefault();

            Swal.fire({
                title: "هل انت متأكد من حذف القسم " +
                    `<span class="text-danger font-weight-bold">${productName || 'لا يوجد'}</span>؟`,
                text: 'لن تتمكن من التراجع عن هذا الإجراء!',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#737f9e',
                confirmButtonText: 'نعم، احذفه!',
                cancelButtonText: 'إلغاء',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId)
<<<<<<< HEAD
                        .submit();
=======
                        .submit(); 
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
                }
            });
        }
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('alert_success');
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('hidealert');

                    setTimeout(() => {
                        alert.classList.add('displaynone');
                    }, 1000);
                }, 3000);
            }
        });
    </script> --}}
@endsection
