<?php $__env->startSection('title', 'Planos Nobre'); ?>

<head>

    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">

</head>

<?php $__env->startSection('content'); ?>
    <!-- Caixas -->
    <div style="margin-top: 5px">
        <div class="container">
            <div style="width:100%; height:200px; display: flex; flex-direction:column; text-align: center">
                <!-- Caixa maior (Total a receber) -->
                <div class="caixamaior">
                    <div style="width: 100%; height:100% ">
                        <b style="font-size: 100%">Total a Receber</b><br>
                        <b style="font-size: 200%"><?php echo e('R$ '. number_format($resultado, '2')); ?></b>
                    </div>
                </div>

                <!-- Caixas menores -->
                <div style="display: flex; flex-direction:row; justify-content: space-between;  margin-top: 10px; ">
                    <div class="caixamenor">
                        <div style="margin: 0 auto">
                            <b>Qtd Clientes</b><br>
                            <b style="font-size: 210%"><?php echo e($quantidade_De_Clientes); ?></b>
                        </div>
                    </div>

                    <div class="caixamenor">
                        <div style="margin: 0 auto">
                            <b>Qtd Pagamentos</b><br>
                            <b style="font-size: 210%"><?php echo e($beneficiarios_Pagamentos); ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela de dados -->
        <div style="width: 100%; height: 100%">
            <div class="box" style="margin-top: 10px">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody style="font-size: 90%">
                            <tr>
                                <th>Cód</th>
                                <th>Benef.</th>
                                <th>Mensal.</th>
                                <th>Data Pag.</th>
                            </tr>

                            <?php $__currentLoopData = $beneficiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($pessoa->codibene); ?></td>
                                    <td><?php echo e($pessoa->nomebene); ?></td>
                                    <td><?php echo e(date('m/Y',strtotime($pessoa->menspaga))); ?></td>
                                    <td><?php echo e(date('d/m/Y',strtotime($pessoa->datapaga))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\suporte.GRUPONOBRE\Desktop\vendedor\resources\views/pagamentos.blade.php ENDPATH**/ ?>