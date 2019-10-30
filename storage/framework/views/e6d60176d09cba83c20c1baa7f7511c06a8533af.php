<?php $__env->startSection('title', 'Planos Nobre'); ?>

<head>

    <link rel="stylesheet" href="<?php echo e(asset('css/vendedorGrupoNobre.css')); ?>">

</head>

<?php $__env->startSection('content'); ?>



    <a href="<?php echo e(route('vendas')); ?>">
        <div class="col-md-6">
            <!-- Bar chart -->
            <div class="box-body">
                <canvas id="bar-chart" style="height: 300px;"></canvas>
            </div>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script type="text/javascript">
        var ctx = document.getElementById('bar-chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['<?php echo e($extmesinicio); ?>', '<?php echo e($extmesmeio); ?>', '<?php echo e($extmeshoje); ?>'],
                datasets: [{
                    label: 'Quantidade de Vendas',
                    backgroundColor: '#009DAE',
                    borderColor: '#009DAE',
                    data: [<?php echo e($contador3); ?>, <?php echo e($contador2); ?>, <?php echo e($contador1); ?>],
                }
                ]
            },
        });
    </script>

    <div class="container" style="width: 100%; height: 100%; display: flex; flex-direction: column">

    <!-- Card Vendas
    <a href="<?php echo e(route('pagamentos')); ?>">
    	<div class="card">
			<div style=" padding-top: 5px; color: white; margin:0 auto; width:90%; display: flex; justify-content: space-between; ">
			  <div>Qtd. Pagamentos: n</div>
			  <div>Qtd. Clientes: n</div>
			</div>

			<div style=" padding-top:20px; color: white;margin-left: 20px; width:100%; display: flex;  flex-direction: row">
				<div class="circulo">
					<div align="center" style=" margin-top: 22px">
			  			<span class="fas fa-dollar-sign fa-2x" ></span>
			  		</div>
			    </div>
			    <div style="padding-left: 25px; font-size:35px">R$ 100,00</div>
			</div>

			<div style="color:white; margin:0 auto; font-size: 20px">Agosto 2019</div>
		</div>
	</a>

	Card Planos
	<a href="<?php echo e(route('planos')); ?>">
		<div class="card" style="margin-top: 40px ">
			<div style=" padding-top:45px; color: white;margin-left: 20px; width:100%; display: flex; flex-direction: row;  color: white">
				<div class="circulo">
					<div align="center" style=" margin-top: 20px">
			  			<span class="fas fa-list-alt fa-2x"></span>
			  		</div>
			    </div>

				<div style="padding-left: 35px; font-size: 35px">Planos</div>
		    </div>
		</div>
	</a>
	-->

        <!--Inicio teste-->


        <a href="<?php echo e(route('pagamentos')); ?>">
            <div class="info-box bg-gray"
                 style=" width: 90%; height: 15%; margin: 10% auto; text-align: center; font-family: Arial">
                <div style=" display: flex; flex-direction: row; width:100%; height: 100%">
				<span class="info-box-icon"
                      style="height: 100%; display: flex; align-items: center; justify-content: center;">
					<div>
						<i class="ion-cash" style="color: #333333"></i>
					</div>
				</span>


                    <div
                        style=" display: flex; flex-direction: column; justify-content: space-between; width:90%; height: 85%; margin-top: 2%; margin-left:2px; color: #333333">
                        <div
                            style="display: flex; flex-direction: row; justify-content: space-between; width: 95%; padding-left: 2%">
                            <span class="info-box-text" style="	font-size: 1.3vh">Qtd. Pagamentos: 25</span>
                            <span class="info-box-text" style="font-size: 1.3vh">Qtd. Clientes: 20</span>
                        </div>

                        <div>
                            <span class="info-box-number"
                                  style=" font-size: 3vh"><?php echo e(number_format($resultadofinal,"2")); ?></span>

                            <div class="progress" style="width: 100%; margin-left: 2px">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>

                        <div>
				  		<span class="progress-description" style="font-size: 2vh">
				        	<?php echo e($extmesmeio); ?>

				      	</span>
                        </div>
                    </div>
                </div>

                <div class="small-box-footer"
                     style="background-color: #c6cbd3; width: 100%; height: 12%; ;display: flex; justify-content: center; align-items: center; font-size: 1.5vh">
                    Mais informações
                    <i class="fa fa-arrow-circle-right" style="padding-left: 2%; color: #333333"></i>
                </div>
            </div>
        </a>

        <a href="<?php echo e(route('planos')); ?>">
            <div class="info-box bg-gray"
                 style=" width: 90%; height: 15%; margin: 20 auto; text-align: center; font-family: Arial">
                <div style=" display: flex; flex-direction: row; width:100%; height: 100%">
				<span class="info-box-icon"
                      style="height: 100%; display: flex; align-items: center; justify-content: center;">
					<div>
						<i class="ion-briefcase" style="color: #333333"></i>
					</div>
				</span>

                    <div
                        style=" display: flex; flex-direction: column; justify-content: center; width:90%; height: 90%; margin-top: 2%; margin-left:2px">
                        <div style="color: #333333">
                            <span class="info-box-number" style=" font-size: 3vh">Planos</span>

                            <div class="progress" style="width: 100%; margin-left: 0.5px">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="small-box-footer"
                     style="background-color: #c6cbd3; width: 100%; height: 12%; ;display: flex; justify-content: center; align-items: center; font-size: 1.5vh">
                    Mais informações
                    <i class="fa fa-arrow-circle-right" style="padding-left: 2%; color: #333333"></i>
                </div>
            </div>
        </a>
        <!--fim teste-->
    </div


<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\suporte.GRUPONOBRE\Desktop\vendedor\resources\views/home.blade.php ENDPATH**/ ?>