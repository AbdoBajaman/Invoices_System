<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description"
        content="نظام إدارة فواتيرك - يوفر لك إدارة سهلة وفعالة لفواتيرك مع واجهة مستخدم سلسة ومميزة.">
    <meta name="Author" content="مهندس: عبدالرحمن عبدالله باجعمان">
    <meta name="Keywords"
        content="نظام فواتير, إدارة فواتير, برنامج فواتير, فواتير إلكترونية, فواتير العملاء, فواتير المبيعات, إدارة مالية, إدارة الأعمال, تطبيق فواتير, نظام محاسبي, تقارير فواتير, فواتير مصرفية, واجهة مستخدم فواتير" />
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="<?php echo e(URL::asset('assets/img/loader.svg')); ?>" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    <?php echo $__env->make('layouts.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- main-content -->
    <div class="main-content app-content">
        <?php echo $__env->make('layouts.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- container -->
        <div class="container-fluid">
            <?php echo $__env->yieldContent('page-header'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.models', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <script src="<?php echo e(asset('assets/js/alert.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\projectss\Invoice_System\resources\views/layouts/master.blade.php ENDPATH**/ ?>