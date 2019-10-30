<?php $__env->startSection('adminlte_css'); ?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/iCheck/square/blue.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/css/auth.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">
</head>

<?php echo $__env->yieldContent('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Planos Nobre'); ?>

<?php $__env->startSection('body_class', 'login-page'); ?>

<?php $__env->startSection('body'); ?>

<div>
    <!-- Logo -->
    <div align="center" style="margin-top:90px; flex-direction:row; align-items: center">
        <img src="<?php echo e(asset ('images/planosnobre.png')); ?>" alt="Plano Nobre" height="18%" width="28%"><br>
        <span style="font-size: 240%;color:#00529c">PLANOS</span>
        <span style="font-size: 240%; color: #003366; font-weight: 900">NOBRE</span>
    </div>

    <!-- Select de empresa/banco de dados-->
    <form action="<?php echo e(url(config('adminlte.login_url', 'login'))); ?>" method="post">
        <?php echo csrf_field(); ?>

    <div style="margin-bottom:20px; display: flex; flex-direction: row;
        justify-content: center; align-items: center">
        <select name='banco' class="form-control" style="width: 27%; margin-top: 10%; background-color: #dddddd">
            <option value="DATASCF">Plasa</option>
            <option value="DATA1ETH">Ethernus</option>
            <option value="DATA1MNB">Mis Nobre</option>
        </select>
    </div>

    
    <div style="width: 50%; margin: 0 auto">
        <!-- CPF Input -->
        <div class="form-group has-feedback <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
            <div>
                <input type="text" name="cpffunc" id="cpf" class="form-control" value="<?php echo e(old('username')); ?>"
                placeholder="Digite o seu CPF">
            </div>

            <?php if($errors->has('username')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('username')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

         <!-- Data de nascimento Input -->
        <div class="form-group has-feedback <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <div class="form-group">
                <div class="input-group date" style="width: 100%">
                    <input type="text" class="form-control" id="data"
                    name="data" placeholder="Data de nascimento" style="background-color: white" >
                                <!--<div class="input-group-addon">
                                    <span class="far fa-calendar-alt"></span>
                                </div>-->
                </div>
            </div>

            <?php if($errors->has('password')): ?>
                <span align="center" class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>  
    </div>
    
    <!-- Botão submit -->            
    <div style="width: 25%; margin: 0 auto;">
        <button type="submit"
        class="btn btn-secondary btn-block btn-flat">Entrar
        </button>
    </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>

<script src="<?php echo e(asset('vendor/adminlte/plugins/iCheck/icheck.min.js')); ?>"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
    });

    $("#data").mask("99/99/9999");

</script>

<?php echo $__env->yieldContent('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/vendedor.develapp.gruponobre.com/resources/views/vendor/adminlte/login.blade.php ENDPATH**/ ?>