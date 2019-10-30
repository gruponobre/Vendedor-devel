<?php $__env->startSection('title', 'Planos Nobre'); ?>

<head>
    <link rel='manifest' href='/manifest.json'>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">

</head>

<?php $__env->startSection('content'); ?>

    <!-- Gráfico de vendas -->
    <div style="width: auto">
        <div style="display:flex; flex-direction: row; justify-content: space-between; width: 60%; margin: 0 auto">
            <strong style="margin-left: 15px"><?php echo e($contadormesinicio); ?></strong>
            <strong><?php echo e($contadormespassado); ?></strong>
            <strong><?php echo e($contadormesatual); ?></strong>
        </div>
        <a href="<?php echo e(route('vendas')); ?>">
            <div class="col-md-6">
                <!-- Bar chart -->
                <div class="box-body">
                    <canvas id="bar-chart" style="height: 300px;"></canvas>
                </div>
            </div>
        </a>
    </div>

    <!-- Card de comissão -->
    <div class="container" style="width: 100%; height: 40%; display: flex; flex-direction: column">
        <a href="<?php echo e(route('pagamentos')); ?>">
            <div class="info-box bg-gray"
                 style=" width: 90%; height: 27%; margin: 10% auto; text-align: center; font-family: Arial">
                <div style=" display: flex; flex-direction: row; width:100%; height: 100%">
    				<span class="info-box-icon" style="height: 100%; display: flex; align-items: center; justify-content: center;">
						<div >
                            <i class="glyphicon glyphicon-usd fa-xs" style="color: #333333"></i>
                        </div>
    				</span>


                    <div style=" display: flex; flex-direction: column; justify-content: space-between; width:90%;  margin-top: 2%; margin-left:2px; color: #333333">
                        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 95%; padding-left: 2%">
                            <span style="	font-size: 1.3vh">Pagamentos: <?php echo e($countpagamentos); ?></span>
                            <span style="font-size: 1.3vh">Beneficiários: <?php echo e($countclientes); ?></span>
                        </div>

                        <div>
                            <span class="info-box-number"
                                  style=" font-size: 3vh"><?php echo e('R$'. number_format($resultadofinal,"2")); ?></span>

                            <div class="progress" style="width: 100%; margin-left: 2px">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>

                        <div>
    				  		<span class="progress-description" style="font-size: 1.7vh">
    				        	<?php echo e($extmeshoje); ?> <?php echo e($numanohoje); ?>

    				      	</span>
                        </div>
                    </div>
                </div>

                <div class="small-box-footer" style="background-color: #c6cbd3; width: 100%; height: 12%; ;display: flex; justify-content: center; align-items: center; font-size: 1.3vh">
                    <span style="color: #595959"> Mais informações</span>
                    <i class="fa fa-arrow-circle-right" style="padding-left: 2%; color: #333333"></i>
                </div>
            </div>
        </a>
        <!-- Card de campanha -->
        <a href="<?php echo e(route('planos')); ?>">
            <div class="info-box bg-gray" style=" width: 90%; height:25%; margin: 20 auto; text-align: center; font-family: Arial">
                <div style=" display: flex; flex-direction: row; width:100%; height: 100%">
    				<span class="info-box-icon" style="height: 100%; display: flex; align-items: center; justify-content: center;">
    					<div>
    						<i class="ion-clipboard fa-xs" style="color: #333333"></i>
    					</div>
    				</span>

                    <div style=" display: flex; flex-direction: column; justify-content: center; width:90%; margin-top: 2%; margin-left:2px">
                        <div style="color: #333333">
                            <span class="info-box-number" style=" font-size: 3vh">Campanha</span>

                            <div class="progress" style="width: 100%; margin-left: 0.5px">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="small-box-footer"
                     style="background-color: #c6cbd3; width: 100%; height: 12%; ;display: flex; justify-content: center; align-items: center; font-size: 1.3vh">
                    <span style="color: #595959"> Mais informações</span>
                    <i class="fa fa-arrow-circle-right" style="padding-left: 2%; color: #333333"></i>
                </div>
            </div>
        </a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script type="text/javascript">

    var ctx = document.getElementById('bar-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['<?php echo e($extmesinicio); ?>', '<?php echo e($extmespassado); ?>', '<?php echo e($extmeshoje); ?>'],
            datasets: [{
                label: ['Quantidade de Vendas'],
                backgroundColor: '#009DAE',
                borderColor: '#009DAE',
                data: [<?php echo e($contadormesinicio); ?>, <?php echo e($contadormespassado); ?>, <?php echo e($contadormesatual); ?>],
            }]
        },

        options: {
            legend: {
                display: false
            },

            tooltips: {
                callbacks: {
                   label: function(tooltipItem) {
                          return tooltipItem.yLabel;
                    }
                }
            }
        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/vendedor.app.gruponobre.com/resources/views/home.blade.php ENDPATH**/ ?>