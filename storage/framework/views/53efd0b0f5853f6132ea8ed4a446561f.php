<?php $__env->startSection('css'); ?>
    <!---Internal  Prism css-->
    <link href="<?php echo e(URL::asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="<?php echo e(URL::asset('assets/plugins/inputtags/inputtags.css')); ?>" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="<?php echo e(URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    تفاصيل فاتورة
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <?php if(session()->has('Add')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('Add')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    

    <?php if(session()->has('delete')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('delete')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>



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
                                                            <td><?php echo e($invoices->invoice_number); ?></td>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <td><?php echo e($invoices->invoice_date); ?></td>
                                                            <th scope="row">تاريخ الاستحقاق</th>
                                                            <td><?php echo e($invoices->due_date); ?></td>
                                                            <th scope="row">القسم</th>
                                                            <td><?php echo e($invoices->sections->section_name); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">المنتج</th>
                                                            <td><?php echo e($invoices->product); ?></td>
                                                            <th scope="row">مبلغ التحصيل</th>
                                                            <td><?php echo e($invoices->Amount_collection); ?></td>
                                                            <th scope="row">مبلغ العمولة</th>
                                                            <td><?php echo e($invoices->Amount_Commission); ?></td>
                                                            <th scope="row">الخصم</th>
                                                            <td><?php echo e($invoices->discount); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">نسبة ضريبة القيمة المضافة</th>
                                                            <td><?php echo e($invoices->rate_tax); ?></td>
                                                            <th scope="row">قيمة ضريبة القيمة المضافة</th>
                                                            <td><?php echo e($invoices->value_tax); ?></td>
                                                            <th scope="row">الاجمالي شامل الضريبة</th>
                                                            <td><?php echo e($invoices->total); ?></td>

                                                            <th scope="row">حاله الدفع الحاليه</th>


                                                            <?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($loop->last): ?>
                                                                    <td>
                                                                        <?php if($detail->Value_Status == 1): ?>
                                                                            <span
                                                                                class="badge badge-pill badge-success"><?php echo e($detail->Status); ?></span>
                                                                        <?php elseif($detail->Value_Status == 2): ?>
                                                                            <span
                                                                                class="badge badge-pill badge-danger"><?php echo e($detail->Status); ?></span>
                                                                        <?php else: ?>
                                                                            <span
                                                                                class="badge badge-pill badge-warning"><?php echo e($detail->Status); ?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                        </tr>


                                                        
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

                                                        
                                                        <?php if(isset($invoice_details) && $details_count == 1): ?>
                                                            <?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>

                                                                    <td><?php echo e($invoice_details->invoice_number); ?></td>

                                                                    <?php if($invoice_details->Value_Status == 1): ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-success"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                    <?php elseif($invoice_details->Value_Status == 2): ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                    <td><?php echo e(number_format($invoice_details->invoices->Amount_collection, 2)); ?>

                                                                    </td>
                                                                    <td><?php echo e(number_format($invoice_details->payed_value, 2)); ?>

                                                                    </td>
                                                                    <td
                                                                        class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                        <?php echo e(number_format($invoice_details->invoices->Amount_collection - $invoice_details->payed_value, 2)); ?>

                                                                    </td>
                                                                    </td>
                                                                    <td><?php echo e($invoice_details->Payment_Date ?? 'لم تتم'); ?>

                                                                    </td>
                                                                    <td><?php echo e($invoice_details->note ?? 'لا يوجد'); ?></td>
                                                                    <td><?php echo e($invoice_details->created_at); ?></td>
                                                                    <td><?php echo e($invoice_details->user); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php
                                                                $total_payed_value = 0; // Initialize a variable to keep track of the cumulative payed value
                                                            ?>
                                                            <?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php

                                                                    $total_payed_value += $invoice_details->payed_value;
                                                                    $remaining =
                                                                        $invoice_details->invoices->Amount_collection -
                                                                        $total_payed_value;
                                                                ?>
                                                                <tr>
                                                                    
                                                                    <td><?php echo e($invoice_details->invoice_number); ?></td>


                                                                    <?php if($invoice_details->Value_Status == 1): ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-success"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                        
                                                                    <?php elseif($invoice_details->Value_Status == 2): ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-danger"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td><span
                                                                                class="badge badge-pill badge-warning"><?php echo e($invoice_details->Status); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                    <td><?php echo e(number_format($invoice_details->invoices->Amount_collection, 2)); ?>

                                                                    </td>
                                                                    <td><?php echo e(number_format($invoice_details->payed_value, 2)); ?>

                                                                    </td>

                                                                    <?php if($invoice_details->Value_Status == 1): ?>
                                                                        <td
                                                                            class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                            <?php echo e(number_format($invoice_details->invoices->Amount_collection - $invoice_details->payed_value, 2)); ?>

                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td
                                                                            class="bg-warning text-dark font-weight-bold p-3 rounded">
                                                                            <?php echo e(number_format($remaining, 2)); ?>

                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <td><?php echo e($invoice_details->Payment_Date ?? 'لم يتم الدفع'); ?>

                                                                    </td>
                                                                    <td><?php echo e($invoice_details->note ?? 'لا يوجد'); ?></td>
                                                                    <td><?php echo e($invoice_details->created_at); ?></td>
                                                                    <td><?php echo e($invoice_details->user); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>

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
                                                    <form method="post" action="<?php echo e(route('invoice_attachment.store')); ?>"
                                                        enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="file_name" required>
                                                            <input type="hidden" id="customFile" name="invoice_number"
                                                                value="<?php echo e($invoices->invoice_number); ?>">
                                                            <input type="hidden" id="invoice_id" name="invoice_id"
                                                                value="<?php echo e($invoices->id); ?>">
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
                                                            
                                                            
                                                            <?php $i++; ?>
                                                            <?php if($attachment_count >= 1): ?>
                                                                <?php $__currentLoopData = $invoice_attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($loop->iteration); ?></td>
                                                                        <td><?php echo e($attachment->File_Name ?? 'لا يوجد '); ?></td>
                                                                        <td><?php echo e($attachment->created_by ?? 'مجهول'); ?></td>
                                                                        <td><?php echo e($attachment->created_at ?? 'غير محدد'); ?>

                                                                        </td>
                                                                        <td colspan="2">
                                                                            <a class="btn btn-outline-success btn-sm"
                                                                                href="<?php echo e(route('invoice_attachment.view_file', [$invoices->invoice_number, $attachment->File_Name ?? '1'])); ?>"
                                                                                role="button" target='_blank'>
                                                                                <i class="fas fa-eye"></i>&nbsp; عرض
                                                                            </a>

                                                                            <a class="btn btn-outline-info btn-sm"
                                                                                href="<?php echo e(route('invoice_attachment.DownloadFile', [$invoices->invoice_number, $attachment->File_Name ?? '1'])); ?>"
                                                                                role="button">
                                                                                <i class="fas fa-download"></i>&nbsp; تحميل
                                                                            </a>

                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="<?php echo e($attachment->File_Name ?? '1'); ?>"
                                                                                data-invoice_number="<?php echo e($attachment->invoice_number); ?>"
                                                                                data-file_id="<?php echo e($attachment->id); ?>"
                                                                                data-target="#delete_file">حذف
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td><?php echo e($i); ?></td>
                                                                    <td><?php echo e($invoice_attachments->File_Name ?? 'غير معروف'); ?>

                                                                    </td>
                                                                    <td><?php echo e($invoice_attachments->created_by ?? 'مجهول'); ?>

                                                                    </td>
                                                                    <td><?php echo e($invoice_attachments->created_at ?? 'غير محدد'); ?>

                                                                </tr>

                                                            <?php endif; ?>

                                                            
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
                <form action="<?php echo e(route('invoice_attachment.destroy', 1)); ?>" method="post">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!--Internal  Datepicker js -->
    <script src="<?php echo e(URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')); ?>"></script>
    <!-- Internal Select2 js-->
    <script src="<?php echo e(URL::asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="<?php echo e(URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <!-- Internal Input tags js-->
    <script src="<?php echo e(URL::asset('assets/plugins/inputtags/inputtags.js')); ?>"></script>
    <!--- Tabs JS-->
    <script src="<?php echo e(URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/tabs.js')); ?>"></script>
    <!--Internal  Clipboard js-->
    <script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.js')); ?>"></script>
    <!-- Internal Prism js-->
    <script src="<?php echo e(URL::asset('assets/plugins/prism/prism.js')); ?>"></script>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/Invoices/invoice_details.blade.php ENDPATH**/ ?>