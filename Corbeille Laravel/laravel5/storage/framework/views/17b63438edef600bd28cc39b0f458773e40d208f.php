<?php $__env->startSection('titre'); ?>
Bonjour
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
voilà 1234 bonjour
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>