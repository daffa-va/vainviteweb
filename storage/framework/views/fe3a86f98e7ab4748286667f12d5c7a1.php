<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand"><span class="brand-text">Va Invite</span></div>
    <nav class="sidebar-menu">
        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.dashboard'),'active' => request()->routeIs('admin.dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.dashboard'))]); ?>
            <span class="icon">
                <i class="fa-solid fa-chart-simple"></i>
            </span> Dashboard
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.order-masuk'),'active' => request()->routeIs('admin.order-masuk')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.order-masuk')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.order-masuk'))]); ?>
            <span class="icon">
                <i class="fa-solid fa-bell"></i>
            </span>
            Order Masuk
            <?php $pendingCount = \App\Models\Order::where('status', 'pending')->count(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendingCount > 0): ?>
                <span class="badge badge-progress" style="margin-left:auto;font-size:0.65rem;padding:1px 8px;"><?php echo e($pendingCount); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.kelola-order'),'active' => request()->routeIs('admin.kelola-order')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.kelola-order')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.kelola-order'))]); ?>
            <span class="icon"><i class="fa-solid fa-box"></i></span>
            Kelola Order
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()?->role === 'admin'): ?>
        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.edit-pricelist'),'active' => request()->routeIs('admin.edit-pricelist')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.edit-pricelist')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.edit-pricelist'))]); ?>
            <span class="icon"><i class="fa-solid fa-tags"></i></span>
            Edit Pricelist
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.activity-logs'),'active' => request()->routeIs('admin.activity-logs')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.activity-logs')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.activity-logs'))]); ?>
            <span class="icon"><i class="fa-solid fa-history"></i></span>
            Activity Logs
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalbad0381f532de8c3446142c121b9bad8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbad0381f532de8c3446142c121b9bad8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.nav-item','data' => ['href' => route('admin.setting'),'active' => request()->routeIs('admin.setting')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.setting')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('admin.setting'))]); ?>
            <span class="icon"><i class="fa-solid fa-gear"></i></span>
            Pengaturan
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $attributes = $__attributesOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__attributesOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbad0381f532de8c3446142c121b9bad8)): ?>
<?php $component = $__componentOriginalbad0381f532de8c3446142c121b9bad8; ?>
<?php unset($__componentOriginalbad0381f532de8c3446142c121b9bad8); ?>
<?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </nav>
    <div class="sidebar-footer">
        <div style="padding:8px 16px;font-size:0.75rem;color:var(--muted);border-bottom:1px solid var(--border);margin-bottom:8px;">
            <i class="fa-solid fa-user"></i> <?php echo e(auth()->user()?->name ?? 'User'); ?>

            <span class="badge badge-progress" style="font-size:0.6rem;margin-left:4px;"><?php echo e(auth()->user()?->role ?? '?'); ?></span>
        </div>
        <form action="<?php echo e(route('admin.logout')); ?>" method="POST" id="logoutForm" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-logout"
                style="background: none; border: none; cursor: pointer; font-family: inherit;">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar
            </button>
        </form>
    </div>
</aside>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\components\shared\admin\side-bar.blade.php ENDPATH**/ ?>