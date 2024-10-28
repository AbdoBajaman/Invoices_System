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

	<body class="main-body bg-primary-transparent">
		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo e(URL::asset('assets/img/loader.svg')); ?>" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		<?php echo $__env->yieldContent('content'); ?>
		<?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
</html>
<?php /**PATH C:\Invoice_System\resources\views/layouts/master2.blade.php ENDPATH**/ ?>