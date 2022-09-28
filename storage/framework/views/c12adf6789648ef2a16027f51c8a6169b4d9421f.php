<?php $__env->startSection('title', 'Show Product'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Product</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("product.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table"><tr><th>Image</th><td><?php if($model->image): ?><img style="border-radius: 50%;" src="<?php echo e(asset("public/admin/images/products")); ?>/<?php echo e($model->image); ?>" width="50px" height="50px" alt=""><?php else: ?><img style="border-radius: 50%;" src="<?php echo e(asset("public/default.png")); ?>" width="50px" height="50px" alt=""><?php endif; ?></td></tr><tr><th width="250px">Name</th><td><?php echo $model->name; ?></td></tr><tr><th width="250px">Price</th><td><?php echo $model->price; ?></td></tr><tr><th>Date</th><td><?php echo e(date("d, M-Y", strtotime($model->date))); ?></td></tr><tr><th>Status</th><td><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?></td></tr></table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauth_crud\resources\views/products/show.blade.php ENDPATH**/ ?>