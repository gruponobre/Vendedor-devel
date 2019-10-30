<?php $__env->startSection('title', 'Planos Nobre'); ?>

<head>

    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">

</head>

<?php $__env->startSection('content'); ?>
    <!-- Imagens do Plano -->
    <div>
	    <div>
	        <img src="images/tabela1.png" alt="Planos Nobre" class="img-responsive">
	    </div>
	    <div>
	        <img src="images/tabela2.png" alt="Planos Nobre" class="img-responsive">
	    </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/vendedor.app.gruponobre.com/resources/views/planos.blade.php ENDPATH**/ ?>