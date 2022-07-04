<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('menu.index')); ?>" class="btn btn-primary btn-sm">View All</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('menu.update', $menu->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PATCH')); ?>

                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Menu of </label>
                                <div class="col-sm-8">
                                    <select name="menu_of" id="" disabled class="form-control js-example-basic-single">
                                        <option value="admin" <?php echo e($menu->menu_of=='admin'?'selected':''); ?>>Admin</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(Str::lower($role->name)); ?>" <?php echo e($menu->menu_of==Str::lower($role->name)?'selected':''); ?>><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="general" <?php echo e($menu->menu_of=='general'?'selected':''); ?>>General</option>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('role')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Parent Menu </label>
                                <div class="col-sm-8">
                                    <select name="parent_id" disabled id="" class="form-control js-example-basic-single">
                                        <option value="" selected>Select parent</option>
                                        <?php $__currentLoopData = $parent_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p_menu->id); ?>" <?php echo e($menu->id==$p_menu->id?'selected':''); ?>><?php echo e($p_menu->menu); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('parent_id')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="icon" value="<?php echo e($menu->icon); ?>" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>">
                                    <span style="color: red"><?php echo e($errors->first('icon')); ?></span>
                                    <a href="https://fontawesome.com/v4/icons/" target="_blank" class="btn btn-success">Choose Icon</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Label <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="label" value="<?php echo e($menu->label); ?>" placeholder="Enter label e.g All Users">
                                    <span style="color: red"><?php echo e($errors->first('label')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Menu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" disabled name="menu" value="<?php echo e($menu->menu); ?>" placeholder="Enter Menu e.g user">
                                    <span style="color: red"><?php echo e($errors->first('menu')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mauth_crud\resources\views/admin/menus/edit.blade.php ENDPATH**/ ?>