<?php $__env->startSection('css'); ?>
       <!-- Internal Data table css -->
       <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
       <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
       <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(URL::asset('assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet">
       <!--Internal   Notify -->
       <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/alerts.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
قائمه الفواتير المدفوعه
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير المدفوعه</span>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                                <a class="btn btn-outline-primary btn-block" href="<?php echo e(route('invoices.create')); ?>">اضافه فاتوره</a>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">رقم الفاتوره</th>
                                                

                                                <th class="border-bottom-0">القسم</th>
                                                <th class="border-bottom-0">المنتج</th>
                                                
                                                <th class="border-bottom-0"> الحاله</th>

                                                <th class="border-bottom-0">العمليات</th>

                                                






                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($invoices->invoice_number); ?></td>
                                                    

                                                    <td><?php echo e($invoices->sections->section_name); ?></td>
                                                    <td><?php echo e($invoices->product); ?></td>
                                                    
                                                    <td>
                                                        <?php if($invoices->value_status == 2): ?>
                                                            <span class="text-danger">
                                                                <?php echo e($invoices->status); ?>


                                                            </span>
                                                        <?php elseif($invoices->value_status == 1): ?>
                                                            <i class="text-success">
                                                                <?php echo e($invoices->status); ?>


                                                            </i>
                                                        <?php else: ?>
                                                            
                                                            <i class="text-warning">
                                                                <?php echo e($invoices->status); ?>


                                                            </i>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button aria-expanded="false" aria-haspopup="true"
                                                                class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                            <div class="dropdown-menu tx-13">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('تعديل الفاتورة')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('invoices.edit', $invoices->id)); ?>">
                                                                        <i class="fas fa-edit text-warning"></i> &nbsp;&nbsp;تعديل
                                                                        الفاتورة</a>
                                                                <?php endif; ?>

                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('عرض تفاصيل الفاتورة')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('invoice_details.show', $invoices->id ?? '1')); ?>">
                                                                        <i class="fas fa-info text-info"></i>&nbsp;&nbsp; &nbsp;تفاصيل
                                                                        الفاتورة</a>
                                                                <?php endif; ?>


                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('حذف الفاتورة')): ?>
                                                                    <a class="dropdown-item" href=""
                                                                        data-invoice_id="<?php echo e($invoices->id); ?>" data-toggle="modal"
                                                                        data-target="#delete_invoice"><i
                                                                            class="text-danger fas fa-trash-alt"></i>
                                                                        &nbsp;&nbsp;حذف
                                                                        الفاتورة</a>
                                                                <?php endif; ?>



                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('تغير حالة الدفع')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('status_show', $invoices->id)); ?>"><i
                                                                            class=" text-success fas
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                                        حالة
                                                                        الدفع</a>
                                                                <?php endif; ?>


                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ارشفة الفاتورة')): ?>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-invoice_id="<?php echo e($invoices->id); ?>" data-toggle="modal"
                                                                        data-target="#Transfer_invoices"><i
                                                                            class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل
                                                                        الي
                                                                        الارشيف</a>
                                                                <?php endif; ?>


                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('طباعة الفاتورة')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('print_invoice', $invoices->id)); ?>"><i
                                                                            class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                                        الفاتورة
                                                                    </a>
                                                                <?php endif; ?>

                                                            </div>
                                                        </div>

                                                    </td>




                                                    
                                                    

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="<?php echo e(route('invoices.destroy', 'test')); ?>" method="post">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من عملية الحذف ؟
                            <input type="hidden" name="invoice_id" id="invoice_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ارشفه الفاتورة -->
            <div class="modal fade" id="Transfer_invoices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ارشفه الفاتورة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="<?php echo e(route('invoices.destroy', 'test')); ?>" method="post">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من ارشفه الفاتوره ؟
                            <input type="hidden" name="invoice_id" id="invoice_id" value="">
                            <input type="hidden" name="page_id" id="page_id" value="2">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-success">تاكيد</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Internal Data tables -->
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!--Internal  Datatable js -->
    <script src="<?php echo e(URL::asset('assets/js/table-data.js')); ?>"></script>
    <!--Internal  Notify js -->
    <script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/Invoices/payed_invoices.blade.php ENDPATH**/ ?>