<?php $__env->startSection('css'); ?>
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    معاينه طباعة الفاتورة
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة الفاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">فاتورة تحصيل</h1>
                            <div class="billed-from">
                                <h6>شركة باجعمان للفواتير</h6>
                                <p> اليمن-حضرموت-المكلا-بويش-الشارع العام<br>
                                    هاتف:+967734213725-<br>
                                    البريد الإلكتروني: abdo99669@gmail.com</p>
                            </div>
                            <!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">الى</label>
                                <div class="billed-to">
                                    <h6><?php echo e($invoice->sections->section_name); ?></h6>
                                    <p>بويش<br>
                                        الرقم: 324 445-4544<br>
                                        البريد: youremail@companyname.com</p>
                                </div>
                            </div>

                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الفاتورة</label>
                                <p class="invoice-info-row"><span>رقم الفاتورة</span>
                                    <span><?php echo e($invoice->invoice_number); ?></span>
                                </p>
                                <p class="invoice-info-row"><span>تاريخ الاصدار</span>
                                    <span><?php echo e($invoice->invoice_date); ?></span>
                                </p>
                                <p class="invoice-info-row"><span>تاريخ الاستحقاق</span>
                                    <span><?php echo e($invoice->due_date); ?></span>
                                </p>
                                <p class="invoice-info-row"><span>القسم</span>
                                    <span><?php echo e($invoice->sections->section_name); ?></span>
                                </p>
                                <p class="invoice-info-row"><span class="">تاريخ الدفع</span>
                                    <span><?php echo e($invoice_details->Payment_Date ?? $invoice_details->Status); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>

                                        <th class="wd-40p">المنتج</th>
                                        <th class="tx-center">مبلغ التحصيل</th>
                                        
                                        <th class="tx-right">مبلغ العمولة </th>
                                        <th class="tx-right">الاجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="tx-12"><?php echo e($invoice->product); ?></td>
                                        <td class="tx-center"><?php echo e(number_format($invoice->Amount_collection, 2)); ?></td>
                                        
                                        <td class="tx-right">
                                            <?php echo e(number_format($invoice->Amount_Commission, 2)); ?>

                                        </td>
                                        
                                        <?php
                                            $total = $invoice->Amount_collection + $invoice->Amount_Commission;
                                        ?>
                                        <td class="tx-right">
                                            <?php echo e(number_format($total, 2)); ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="6">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13">#</label>

                                            </div><!-- invoice-notes -->
                                        </td>
                                        <td class="tx-right">الاجمالي</td>
                                        <td class="tx-right" colspan="2"> <?php echo e(number_format($total, 2)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">نسبة الضريبة </td>
                                        <td class="tx-right" colspan="2"><?php echo e($invoice->rate_tax); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">قيمة الخصم</td>
                                        <td class="tx-right" colspan="2"> <?php echo e(number_format($invoice->discount, 2)); ?>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="tx-right">اجمالي العموله شامل الضريبه</td>
                                        <td class="tx-right" colspan="2"> <?php echo e(number_format($invoice->total, 2)); ?>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">المبلغ المدفوع</td>
                                        <td class="tx-right" colspan="2">

                                                <?php echo e(number_format($invoice_details->payed_value, 2)); ?>


                                        </td>


                                        
                                    </tr>

                                    <tr>
                                        <td class="tx-right">المتبقي</td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">                                            <?php echo e(number_format($invoice->Amount_collection - $invoice_details->payed_value, 2)); ?>

                                            </h4>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!--Internal  Chart.bundle js -->
    <script src="<?php echo e(URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;

            var originalContents = document.body.innerHTML;


            document.body.innerHTML = printContents;

            window.print();


            document.body.innerHTML = originalContents;


            location.reload();
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/Invoices/print_invoice.blade.php ENDPATH**/ ?>