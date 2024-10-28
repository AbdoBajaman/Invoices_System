<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">صفحة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الملف الشخصي</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="<?php echo e(auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('assets/img/faces/6.jpg')); ?>">
											<a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name"><?php echo e(auth()->user()->name); ?></h5>
												<p class="main-profile-name-text"><?php echo e(auth()->user()->roles_name[0]); ?></p>
											</div>
										</div>
										<h6>بايو</h6>
										<div class="main-profile-bio">
											السرور الذي يواجهه بعقلانية ولكن لأنه يسعى وراء عواقب مؤلمة للغاية. يحدث في بعض الحالات أن الجهد والألم يمكن أن يجلب له بعض السرور العظيم. <a href="">المزيد</a>
										</div><!-- السيرة الذاتية -->
										<div class="row">
											<div class="col-md-4 col mb20">
												<h5>947</h5>
												<h6 class="text-small text-muted mb-0">المتابعون</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>583</h5>
												<h6 class="text-small text-muted mb-0">التغريدات</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>48</h5>
												<h6 class="text-small text-muted mb-0">المنشورات</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">التواصل الاجتماعي</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>قيت اب</span> <a href="https://github.com/AbdoBajaman/">عبدالرحمن باجعمان</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>تويتر</span> <a href="https://x.com/Rendezv76729287">عبدالرحمن باجعمان</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>لينكد ان</span> <a href="https://www.linkedin.com/in/%D8%B9%D8%A8%D8%AF%D8%A7%D9%84%D8%B1%D8%AD%D9%85%D9%86-%D8%B9%D8%A8%D8%AF%D8%A7%D9%84%D9%84%D9%87-1ab97b302/">عبدالرحمن باجعمان</a>
												</div>
											</div>

										</div>
										<hr class="mg-y-30">
										<h6>المهارات</h6>
										<div class="skill-bar mb-4 clearfix mt-3">
											<span>HTML5 / CSS3</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<!--شريط المهارات-->
										<div class="skill-bar mb-4 clearfix">
											<span>JavaScript</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<div class="skill-bar mb-4 clearfix">
											<span>Jquery</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<!--شريط المهارات-->
										<div class="skill-bar mb-4 clearfix">
											<span>Bootstrap</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<div class="skill-bar clearfix">
											<span>Tailwind</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<!--شريط المهارات-->
										<div class="skill-bar clearfix">
											<span>PHP</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<div class="skill-bar clearfix">
											<span>Mysql</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<div class="skill-bar mb-4 clearfix">
											<span>Node.js</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>
										<div class="skill-bar clearfix">
											<span>Wordpress</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
											</div>
										</div>

										<!--شريط المهارات-->
									</div><!-- نظرة عامة على الملف الشخصي -->
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">الطلبات</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>زيادة</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-paypal text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">الإيرادات</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>زيادة</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">المنتجات المباعة</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>زيادة</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true">
												<span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span>
												<span class="hidden-xs">عني</span>
											</a>
										</li>
										<li class="">
											<a href="#profile" data-toggle="tab" aria-expanded="false">
												<span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span>
												<span class="hidden-xs">المعرض</span>
											</a>
										</li>
										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false">
												<span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span>
												<span class="hidden-xs">الإعدادات</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase mb-3">السيرة الذاتية</h4>
										<p class="m-b-5">
											مرحبًا، أنا بيتي كروزر. لقد كان نصًا نموذجيًا في هذه الصناعة منذ القرن الخامس عشر.
											حين أخذت مطبعة غير معروفة مجموعة من الأحرف.

										</p>
										<div class="m-t-30">
											<h4 class="tx-15 text-uppercase mt-3">الخبرة</h4>
											<div class="p-t-10">
												<h5 class="text-primary m-b-5 tx-14">المصمم الرئيسي / المطور</h5>
												<p class="">DevBJ</p>
												<p><b>2010-2015</b></p>
												<p class="text-muted tx-13 m-b-0">
													Lorem Ipsum هو نص نموذجي في صناعة الطباعة منذ القرن الخامس عشر.
													أخذ مطبع غير معروف عينة من النصوص وقام بخلطها لإنشاء كتاب نموذجي.
												</p>
											</div>
											<hr>
											<div class="">
												<h5 class="text-primary m-b-5 tx-14">مصمم الجرافيك الأول</h5>
												<p class="">DevBJ</p>
												<p><b>2007-2009</b></p>
												<p class="text-muted tx-13 mb-0">
													Lorem Ipsum هو نص نموذج ي يعود للقرن الخامس عشر. تم استخدامه في الطباعة بشكل واسع لإنشاء كتب عينة.
												</p>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="profile">
										<div class="row">
											<div class="col-sm-4">
												<div class="border p-1 card thumb">
													<a href="#" class="image-popup" title="Screenshot-2">
														<img src="<?php echo e(URL::asset('assets/img/photos/7.jpg')); ?>" class="thumb-img" alt="work-thumbnail">
													</a>
													<h4 class="text-center tx-14 mt-3 mb-0">صورة المعرض</h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>التصوير</small></p>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="border p-1 card thumb">
													<a href="#" class="image-popup" title="Screenshot-2">
														<img src="<?php echo e(URL::asset('assets/img/photos/8.jpg')); ?>" class="thumb-img" alt="work-thumbnail">
													</a>
													<h4 class="text-center tx-14 mt-3 mb-0">صورة المعرض</h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>التصوير</small></p>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="border p-1 card thumb">
													<a href="#" class="image-popup" title="Screenshot-2">
														<img src="<?php echo e(URL::asset('assets/img/photos/9.jpg')); ?>" class="thumb-img" alt="work-thumbnail">
													</a>
													<h4 class="text-center tx-14 mt-3 mb-0">صورة المعرض</h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>التصوير</small></p>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="border p-1 card thumb mb-xl-0">
													<a href="#" class="image-popup" title="Screenshot-2">
														<img src="<?php echo e(URL::asset('assets/img/photos/10.jpg')); ?>" class="thumb-img" alt="work-thumbnail">
													</a>
													<h4 class="text-center tx-14 mt-3 mb-0">صورة المعرض</h4>
													<div class="ga-border"></div>
													<p class="text-muted text-center"><small>التصوير</small></p>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="settings">
										<form role="form">
											<div class="form-group">
												<label for="FullName">الاسم الكامل</label>
												<input type="text" value="عبدالرحمن عبدالله باجعمان" id="FullName" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">البريد الإلكتروني</label>
												<input type="email" value="abdo99669@gmail.com" id="Email" class="form-control">
											</div>
											<div class="form-group">
												<label for="Username">اسم المستخدم</label>
												<input type="text" value="عبدالرحمن" id="Username" class="form-control">
											</div>
											
											<div class="form-group">
												<label for="AboutMe">عني</label>
												<textarea id="AboutMe" class="form-control">مهندس برمجيات</textarea>
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">حفظ</button>
										</form>
									</div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Invoice_System\resources\views/profile.blade.php ENDPATH**/ ?>