<?php $__env->startSection('adminlte_css'); ?>
    <link rel="stylesheet"
          href="<?php echo e(asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')); ?> ">
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : '')); ?>

<?php $__env->startSection('body'); ?>
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            <?php if(config('adminlte.layout') == 'top-nav'): ?>
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?php echo e(url(config('adminlte.dashboard_url', 'home'))); ?>" class="navbar-brand">
                                <?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?>

                            </a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                <i class="fa fa-bars "></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <?php echo $__env->renderEach('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item'); ?>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    <?php else: ?>


                        <!-- Header Navbar -->
                            <nav class="navbar navbar-static-top" role="navigation" style="background-color: #B6E4F2">
                                <!-- Sidebar toggle button-->
                                <a href="#" class="sidebar-toggle fa5" data-toggle="push-menu" role="button"
                                   style="color:black;">
                                    <span class="sr-only"><?php echo e(trans('adminlte::adminlte.toggle_navigation')); ?></span>
                                </a>
                            <?php endif; ?>
                            <!-- Navbar Right Menu -->

                                <div
                                    style="float:right; width: 70%; display: flex; flex-direction: row; justify-content: space-between;align-items: center">
                                    <!-- Imagem do menu superior(Proporção 5x1) -->
                                    <div>
                                        <img src="images/planosnobre.png" alt="Planos Nobre"
                                             style="width:80%; height:(width/5)">
                                    </div>
                                    <div class="navbar-custom-menu">

                                        <ul class="nav navbar-nav">
                                            <li>
                                                <?php if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<')): ?>
                                                    <a href="<?php echo e(url(config('adminlte.logout_url', 'auth/logout'))); ?>">
                                                        <i class="fa fa-fw fa-power-off"
                                                           style="color:black;"></i> <?php echo e(trans('adminlte::adminlte.log_out')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    >
                                                        <i class="fa fa-fw fa-power-off" style="color:black;"></i>
                                                    </a>
                                                    <form id="logout-form" action="<?php echo e(url(config('adminlte.logout_url', 'auth/logout'))); ?>" method="POST" style="display: none;">
                                                        <?php if(config('adminlte.logout_method')): ?>
                                                            <?php echo e(method_field(config('adminlte.logout_method'))); ?>

                                                        <?php endif; ?>
                                                        <?php echo e(csrf_field()); ?>

                                                    </form>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php if(config('adminlte.layout') == 'top-nav'): ?>
                    </div>
                    <?php endif; ?>
                </nav>
        </header>

    <?php if(config('adminlte.layout') != 'top-nav'): ?>
        <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- Box img do side bar -->
                <img class="profile-user-img img-responsive img-circle" src="images/paisa.jpg"
                     alt="User profile picture">
                <!-- Nome da pessoa -->
                <div style="width:60%; height:100%; margin: 15 auto; text-align: center; font-size: 150%; color: white">
                    <?php echo e(session('nomefunc')); ?>

                </div>
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <?php echo $__env->renderEach('adminlte::partials.menu-item', $adminlte->menu(), 'item'); ?>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
    <?php endif; ?>

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php if(config('adminlte.layout') == 'top-nav'): ?>
                <div class="container">
                <?php endif; ?>

                <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <?php echo $__env->yieldContent('content_header'); ?>
                    </section>

                    <!-- Main content -->
                    <section>

                        <?php echo $__env->yieldContent('content'); ?>

                    </section>
                    <!-- /.content -->
                    <?php if(config('adminlte.layout') == 'top-nav'): ?>
                </div>
                <!-- /.container -->
            <?php endif; ?>
        </div>
        <!-- /.content-wrapper -->

        <?php if (! empty(trim($__env->yieldContent('footer')))): ?>
            <footer class="main-footer">
                <?php echo $__env->yieldContent('footer'); ?>
            </footer>
        <?php endif; ?>

    </div>
    <!-- ./wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\suporte.GRUPONOBRE\Desktop\vendedor\resources\views/vendor/adminlte/page.blade.php ENDPATH**/ ?>