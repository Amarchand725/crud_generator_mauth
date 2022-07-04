<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $__env->yieldContent('title'); ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="csrf-token" id="token" content="<?php echo e(csrf_token()); ?>" />

        <!--css-->
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/font-awesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/ionicons.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/datepicker3.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/all.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/select2.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/dataTables.bootstrap.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/jquery.fancybox.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/AdminLTE.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/_all-skins.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/summernote.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/magnific-popup.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/style.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/toastr.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/custome.css')); ?>">
		<?php echo $__env->yieldPushContent('css'); ?>
	</head>

	<body class="hold-transition fixed skin-blue sidebar-mini">
		<div class="wrapper">
			<!--header-->
			<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!--sidebar-->
			<?php echo $__env->make('layouts.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--main content-->
			<div class="content-wrapper">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
		</div>
	</body>

	<!-- Script -->
	<script src="<?php echo e(asset('public/admin/js/jquery-2.2.4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/select2.full.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jscolor.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.date.extensions.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.extensions.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/bootstrap-datepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/icheck.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/fastclick.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.sparkline.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.slimscroll.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.fancybox.pack.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/app.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/summernote.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.magnific-popup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/tinymce/tinymce.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/jquery.validate.min.js')); ?>"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?php echo e(asset('public/admin/js/toastr.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/js/search.js')); ?>"></script>

	<?php echo $__env->yieldPushContent('js'); ?>

    <script>
        <?php if(Session::has('message')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("<?php echo e(session('message')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</html>
<?php /**PATH C:\xampp\htdocs\mauth_crud\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>