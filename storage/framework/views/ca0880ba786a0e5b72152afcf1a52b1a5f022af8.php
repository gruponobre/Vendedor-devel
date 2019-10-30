<?php $__env->startSection('adminlte_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/iCheck/square/blue.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/css/auth.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Planos Nobre'); ?>

<?php $__env->startSection('body_class', 'login-page'); ?>

<?php $__env->startSection('body'); ?>
    <div>

        <div align="center" style="margin-top:200px; margin-bottom:10px">
            <img src="<?php echo e(asset ('images/planosnobre.png')); ?>" alt="Plano Nobre" height="70px" width="350px">
        </div>

        <div class="dropdown">
            <div style="margin-bottom:10px; display: flex; flex-direction: row;
                justify-content: center; align-items: center">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empresa
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        </div>

        <form action="<?php echo e(url(config('adminlte.login_url', 'login'))); ?>" method="post">
        <?php echo csrf_field(); ?>

        <!-- Caixa de user e senha-->
            <div style="width: 50%; margin: 0 auto">
                <div class="form-group ">
                    <div class=" borda">
                        <input type="text" name="login" class="form-control" value="<?php echo e(old('username')); ?>"
                               placeholder="<?php echo e(trans('adminlte::adminlte.email')); ?>" maxlength="11">
                        <!-- Icone envelope!
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        -->

                    </div>
                </div>

                <div class="form-group ">
                    <div class=" borda">
                        <input type="password" name="password" class="form-control" <?php echo e(old('password')); ?>

                               placeholder="<?php echo e(trans('adminlte::adminlte.password')); ?>"maxlength="8">
                        <!-- Icone cadeado!
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        -->

                    </div>
                </div>

            </div>
            <div style="width: 25%; margin: 0 auto;">
                <button type="submit"
                        class="btn btn-secondary btn-block btn-flat"><?php echo e(trans('adminlte::adminlte.sign_in')); ?>

                </button>
            </div>
            <!-- /.col -->
        </form>

        <div class="auth-links" style="text-align:center">
            <a href="#" class="text-center" style="color: gray;">
                <u>Consultar suporte</u>
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('vendor/adminlte/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\suporte.GRUPONOBRE\Desktop\vendedor\resources\views/vendor/adminlte/login.blade.php ENDPATH**/ ?>