<?php $__env->startSection('titulo'); ?>
    Tendencias
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <?php if (isset($component)) { $__componentOriginal00fa8af295fc1af9e68d7d311d812473 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00fa8af295fc1af9e68d7d311d812473 = $attributes; } ?>
<?php $component = App\View\Components\ListarPost::resolve(['publicaciones' => $publicaciones] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('listar-post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ListarPost::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal00fa8af295fc1af9e68d7d311d812473)): ?>
<?php $attributes = $__attributesOriginal00fa8af295fc1af9e68d7d311d812473; ?>
<?php unset($__attributesOriginal00fa8af295fc1af9e68d7d311d812473); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00fa8af295fc1af9e68d7d311d812473)): ?>
<?php $component = $__componentOriginal00fa8af295fc1af9e68d7d311d812473; ?>
<?php unset($__componentOriginal00fa8af295fc1af9e68d7d311d812473); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/usuarios/home.blade.php ENDPATH**/ ?>