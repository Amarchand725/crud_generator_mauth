<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>

            
            <li class="treeview">
                <a href="<?php echo e(route('permission.index')); ?>" class="<?php echo e(request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
            

            <?php $__currentLoopData = menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Auth::guard('admin') || $menu->menu_of=='general'): ?>
                    <li class="treeview id-<?php echo e($menu->id); ?>">
                        <a href="<?php echo e(route(str_replace(' ', '_', strtolower($menu->menu)).'.index')); ?>" class="<?php echo e(request()->is($menu->url) || request()->is($menu->url.'/*')? 'active' : ''); ?>">
                            <?php echo $menu->icon; ?> <span><?php echo e($menu->label); ?></span>
                        </a>
                    </li>
                <?php elseif(Auth::user()->hasRole($menu->menu_of) || $menu->menu_of=='general'): ?>
                    <li class="treeview id-<?php echo e($menu->id); ?>">
                        <a href="<?php echo e(route($menu->url.'.index')); ?>" class="<?php echo e(request()->is($menu->url) || request()->is($menu->menu.'/*')? 'active' : ''); ?>">
                            <i class="fas fa-biking"></i> <span><?php echo e($menu->label); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\mauth_crud\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>