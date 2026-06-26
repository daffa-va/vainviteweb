<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($title ?? 'Dashboard'); ?> — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>">
    <?php if (isset($component)) { $__componentOriginal4aabdaabdd0db8fefd0c084440070de0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4aabdaabdd0db8fefd0c084440070de0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.admin.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.admin.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4aabdaabdd0db8fefd0c084440070de0)): ?>
<?php $attributes = $__attributesOriginal4aabdaabdd0db8fefd0c084440070de0; ?>
<?php unset($__attributesOriginal4aabdaabdd0db8fefd0c084440070de0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4aabdaabdd0db8fefd0c084440070de0)): ?>
<?php $component = $__componentOriginal4aabdaabdd0db8fefd0c084440070de0; ?>
<?php unset($__componentOriginal4aabdaabdd0db8fefd0c084440070de0); ?>
<?php endif; ?>
</head>

<body>
    <?php if (isset($component)) { $__componentOriginalf62c2c9e094364d2a1b519ab0aed33a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf62c2c9e094364d2a1b519ab0aed33a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.side-bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.side-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf62c2c9e094364d2a1b519ab0aed33a2)): ?>
<?php $attributes = $__attributesOriginalf62c2c9e094364d2a1b519ab0aed33a2; ?>
<?php unset($__attributesOriginalf62c2c9e094364d2a1b519ab0aed33a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf62c2c9e094364d2a1b519ab0aed33a2)): ?>
<?php $component = $__componentOriginalf62c2c9e094364d2a1b519ab0aed33a2; ?>
<?php unset($__componentOriginalf62c2c9e094364d2a1b519ab0aed33a2); ?>
<?php endif; ?>
    <div class="main">
        <?php if (isset($component)) { $__componentOriginal69fbda73cdc35cb376af2a649fae02b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69fbda73cdc35cb376af2a649fae02b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.admin.top-bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.admin.top-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69fbda73cdc35cb376af2a649fae02b2)): ?>
<?php $attributes = $__attributesOriginal69fbda73cdc35cb376af2a649fae02b2; ?>
<?php unset($__attributesOriginal69fbda73cdc35cb376af2a649fae02b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69fbda73cdc35cb376af2a649fae02b2)): ?>
<?php $component = $__componentOriginal69fbda73cdc35cb376af2a649fae02b2; ?>
<?php unset($__componentOriginal69fbda73cdc35cb376af2a649fae02b2); ?>
<?php endif; ?>
        <?php echo e($slot); ?>

    </div>
    <?php if (isset($component)) { $__componentOriginaldeff204f7f443951c3bcdac042e82f26 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldeff204f7f443951c3bcdac042e82f26 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.admin.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.admin.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldeff204f7f443951c3bcdac042e82f26)): ?>
<?php $attributes = $__attributesOriginaldeff204f7f443951c3bcdac042e82f26; ?>
<?php unset($__attributesOriginaldeff204f7f443951c3bcdac042e82f26); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldeff204f7f443951c3bcdac042e82f26)): ?>
<?php $component = $__componentOriginaldeff204f7f443951c3bcdac042e82f26; ?>
<?php unset($__componentOriginaldeff204f7f443951c3bcdac042e82f26); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\components\layouts\admin.blade.php ENDPATH**/ ?>