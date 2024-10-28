<?php $__env->startSection('title'); ?>
    لوحة التحكم - برنامج الفواتير
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--  Owl-carousel css-->
    <link href="<?php echo e(URL::asset('assets/plugins/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet" />
    <!-- Maps css -->
    <link href="<?php echo e(URL::asset('assets/plugins/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بعودتك</h2>
                <p class="mg-b-0">نظام - فاتورتك</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">تقييمات العملاء</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">المبيعات</label>
                <h5>563,275</h5>
            </div>

        </div>
    </div>
    <!-- /breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">اجمالي الفواتير</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    <?php echo e(number_format(\App\Models\invoices::sum('Total'), 2)); ?>

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7"><?php echo e(\App\Models\invoices::count()); ?></p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    <?php
                                        $count_all = \App\Models\invoices::count();
                                        // echo $count_all;
                                        if ($count_all == 0) {
                                            echo $x = 0;
                                        } else {
                                            echo $x = (($count_all / $count_all) * 100) .'%';
                                        }

                                    ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير الغير مدفوعة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-20 font-weight-bold mb-1 text-white">

                                    <?php echo e(number_format(\App\Models\invoices::where('Value_Status', 2)->sum('Total'), 2)); ?>


                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">
                                    <?php echo e(\App\Models\invoices::where('Value_Status', 2)->count()); ?>

                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">

                                    <?php
                                        $count_all = \App\Models\invoices::count();
                                        $count_invoices2 = \App\Models\invoices::where('Value_Status', 2)->count();

                                        if ($count_invoices2 == 0) {
                                            echo $count_invoices2 = 0;
                                        } else {
                                            echo $count_invoices2 = ($count_invoices2 / $count_all) * 100 .'%';
                                        }
                                    ?>

                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير المدفوعة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    <?php echo e(number_format(\App\Models\invoices::where('value_status', 1)->sum('total'), 2)); ?>


                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    <?php echo e(\App\Models\invoices::where('value_status', 1)->count()); ?>

                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    <?php
                                        $count_all = \App\Models\invoices::count();
                                        $count_invoices1 = \App\Models\invoices::where('value_status', 1)->count();

                                        if ($count_invoices1 == 0) {
                                            echo $count_invoices1 = 0;
                                        } else {
                                            echo $count_invoices1 = ($count_invoices1 / $count_all) * 100 .'%';
                                        }
                                    ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير المدفوعة جزئيا</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    <?php echo e(number_format(\App\Models\invoices::where('value_status', 3)->sum('total'), 2)); ?>


                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    <?php echo e(\App\Models\invoices::where('value_status', 3)->count()); ?>

                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    <?php
                                        $count_all = \App\Models\invoices::count();
                                        $count_invoices1 = \App\Models\invoices::where('value_status', 1)->count();

                                        if ($count_invoices1 == 0) {
                                            echo $count_invoices1 = 0;
                                        } else {
                                            echo $count_invoices1 = ($count_invoices1 / $count_all) * 100 .'%';
                                        }
                                    ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="card card-dashboard-map-one" style="width: 100%; height: 488px">
                        <label class="main-content-label">نسبة احصائية الفواتير</label>
                        <div class="card-body" style="width: 100%; height: 100%">
                            <canvas id="myLineChart" style="width: 100%; height: 100%;"></canvas>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one" style="width: 100%; ">
                <label class="main-content-label">نسبة احصائية الفواتير</label>
                <div class="" style="width: 100%; ">
                    <canvas id="myChart" style="width: 100%; "></canvas>
                </div>
            </div>
        </div>

    </div>
    <div>
    </div>
    <!-- row closed -->
    </div>
    </div>
    <!-- Container closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!--Internal  Chart.bundle js -->
    <script src="<?php echo e(URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>
    <!-- Moment js -->
    <script src="<?php echo e(URL::asset('assets/plugins/raphael/raphael.min.js')); ?>"></script>
    <!--Internal  Flot js-->
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/dashboard.sampledata.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/chart.flot.sampledata.js')); ?>"></script>
    <!--Internal Apexchart js-->
    <script src="<?php echo e(URL::asset('assets/js/apexcharts.js')); ?>"></script>
    <!-- Internal Map -->
    <script src="<?php echo e(URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/modal-popup.js')); ?>"></script>
    <!--Internal  index js -->
    <script src="<?php echo e(URL::asset('assets/js/index.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/jquery.vmap.sampledata.js')); ?>"></script>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['الفواتير المدفوعة', 'الفواتير الغير مدفوعة', 'الفواتير المدفوعة جزئيا',
                    'اجمالي الفواتير'
                ],
                datasets: [{
                    label: 'احصائيات الفواتير',
                    data: [<?php echo e($nspainvoices1); ?>, <?php echo e($nspainvoices2); ?>, <?php echo e($nspainvoices3); ?>,
                        <?php echo e($count_all); ?>

                    ],
                    backgroundColor: ['#81b214', '#ec5858', '#ff9642', '#0683e4'],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                // console.log('this is contenxt')
                                //context.label this names فواتير مدفوعه  وغيرها

                                //this value
                                console.log(context.raw);
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    label += context.raw + '%';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });






        //sections and products chart


        const s = document.getElementById('myLineChart');

        new Chart(s, {
            type: 'bar', // Change to 'line' for a line chart
            data: {
                labels: [
                    <?php $__currentLoopData = $sectionProductCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        '<?php echo e($section['section_name']); ?>',
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ], // Section names
                datasets: [{
                    label: 'عدد المنتجات لكل عميل',
                    data: [
                        <?php $__currentLoopData = $sectionProductCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($section['product_count']); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ], // Product counts per section
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Transparent background for the line
                    borderColor: 'rgba(75, 192, 192, 1)', // Line color
                    borderWidth: 1,
                    fill: false, // Prevent the line from being filled below the curve
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true, // Ensures the Y-axis starts from zero
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    if (context.raw < 2) {
                                        label += context.raw + ' منتج';

                                    } else {
                                        label += context.raw + 'منتجات';

                                    }
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/home.blade.php ENDPATH**/ ?>