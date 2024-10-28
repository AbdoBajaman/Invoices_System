<?php $__env->startSection('css'); ?>
<!--- Internal Fontawesome css-->
<link href="<?php echo e(URL::asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
<!---Ionicons css-->
<link href="<?php echo e(URL::asset('assets/plugins/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
<!---Internal Typicons css-->
<link href="<?php echo e(URL::asset('assets/plugins/typicons.font/typicons.css')); ?>" rel="stylesheet">
<!---Internal Feather css-->
<link href="<?php echo e(URL::asset('assets/plugins/feather/feather.css')); ?>" rel="stylesheet">
<!---Internal Falg-icons css-->
<link href="<?php echo e(URL::asset('assets/plugins/flag-icon-css/css/flag-icon.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">
			<img src="<?php echo e(URL::asset('assets/img/media/500.png')); ?>" class="error-page" alt="error">
            <h1>عذراً! حدث خطأ ما.</h1>
            <p>نحن نعمل على حل المشكلة. يرجى المحاولة لاحقاً.</p>
            <a class="btn btn-outline-danger" href="HomePage">العودة للصفحة الرئيسيه</a>
		</div>
		<!-- /Main-error-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/500.blade.php ENDPATH**/ ?>