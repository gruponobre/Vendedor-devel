<?php $__env->startSection('title', 'Planos Nobre'); ?>

<head>

    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>" rel="stylesheet"/>

</head>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; height: 115px">
            <!-- Input data -->
            <div style="display: flex; flex-direction: column">
                <div
                    style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; height: 50%">
                    <div class="form-group">
                        <form class="form-horizontal" method="get" action="<?php echo e(route('vendas')); ?>" name="form" id="form">
                            <!--Primeiro Box de Data -->
                            <label><b>Data inicial: </b></label>
                            <div class="input-group date" style="width: 95%">
                                <div class="input-group-addon">
                                    <span class="far fa-calendar-alt"></span>
                                </div>
                                <input type="text" onchange="onChange()" class="form-control" id="data" name="data"
                                       style="background-color: white" readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <!--Segundo Box de Data -->
                        <label><b>Data final: </b></label>
                        <div class="input-group date" style="width: 95%">
                            <div class="input-group-addon">
                                <span class="far fa-calendar-alt"></span>
                            </div>
                            <input type="text" class="form-control" onchange="onChange()" id="data_final"
                                   name="data_final" style="background-color: white" readonly>
                        </div>
                    </div>
                </div>
                <!-- Botão consulta -->
                </form>
            </div>

            <!-- Box da direita QTD Clientes-->
            <div style="width: 27%; height: 50px; text-align: center;">
                <div class="boxcount" style="width: 100%">
                    <span style="font-size: 80%"> Qtd Clientes: </span> <br>
                    <b style="font-size: 4vw"><?php echo e($count); ?></b>
                </div>
            </div>
        </div>
    </div>

    <div>     <!-- Tabela com dados -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Beneficiário</th>
                        <th scope="col">Admissão</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $findPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pessoa->codibene); ?></td>
                            <td><?php echo e($pessoa->nomebene); ?></td>
                            <td><?php echo e(date('d/m/Y',strtotime($pessoa->dataadmi))); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.pt-BR.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>" charset="UTF-8"></script>
    <script src="moment.js"></script>
    <script type="text/javascript">
        $('#data').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
        });

        $('#data_final').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
        });

        function onChange() {
            var data = document.getElementById('data').value;
            var data_final = document.getElementById('data_final').value;
            if (data != "" && data_final != "") {
                document.getElementById('form').submit();
            }
        }


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\suporte.GRUPONOBRE\Desktop\vendedor\resources\views/vendas.blade.php ENDPATH**/ ?>