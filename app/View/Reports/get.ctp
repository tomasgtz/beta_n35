<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Reporte'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Reports",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <?php echo $this->Html->link(__('Descargar en PDF'), array('action' => 'getpdf', $this->request->params['pass'][0])); ?>
                </div>
                <!-- /.box-header -->

		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item active">
		    <a class="nav-link active" id="summary-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="summary" aria-expanded="true" aria-selected="true">Conteo</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="global-tab" data-toggle="tab" href="#global" role="tab" aria-controls="global" aria-selected="false">Calificacion final</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="false">Calificación por categoría</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="domain-tab" data-toggle="tab" href="#domain" role="tab" aria-controls="domain" aria-selected="false">Calificación por dominio</a>
		  </li>
		</ul>
		

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active in" id="summary" role="tabpanel" aria-labelledby="summary-tab">

				<div class="box-body table-responsive">
				    <table id="table1" class="table table-striped table-bordered">
					<thead>
					    <tr>
						<th>No.</th>
						<th>Pregunta</th>
						<th>Siempre</th>
						<th>Casi siempre</th>
						<th>Algunas veces</th>
						<th>Casi nunca</th>
						<th>Nunca</th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($questions_list as $question): ?>
						<tr>
							<td><?php echo h($question['number']); ?></td>
							<td><?php echo h($question['question_text']); ?></td>
							<td><?php echo h($r_always[ $question['question_id'] ]); ?></td>
							<td><?php echo h($r_almost_always[ $question['question_id'] ]); ?></td>
							<td><?php echo h($r_sometimes[ $question['question_id'] ]); ?></td>
							<td><?php echo h($r_almost_never[ $question['question_id'] ]); ?></td>
							<td><?php echo h($r_never[ $question['question_id'] ]); ?></td>

						</tr>
					    <?php endforeach; ?>
					</tbody>
				    </table>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="tab-pane fade" id="global" role="tabpanel" aria-labelledby="global-tab">
				<div class="box-body table-responsive">
					<table id="table2" class="table table-striped table-bordered" style="vertical-align: top;">
						<thead>
							<tr>
								<th>Resultado total</th>
								<th>Nivel de riesgo</th>
								<th>Recomendación</th>
							 </tr>
						</thead>
						<tbody>

							<tr>
								<td><?php echo h($total); ?></td>
								<td><?php echo h($total_evaluation_text); ?></td>
								<td style="background-color: <?php echo $total_evaluation_color; ?>;"><?php echo h($risk[$total_evaluation_text]); ?></td>
								
							</tr>
						</tbody>
					</table>
				</div>
				
			</div>
			<div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
				<div class="box-body table-responsive">
					<table id="table2" class="table table-striped table-bordered" style="vertical-align: top;">
						<thead>
							<tr>
								<th>Categoría</th>
								<th class="text-right">Calificación</th>
								<th class="text-center">Nivel de riesgo</th>
							 </tr>
						</thead>
						<tbody>

							<?php foreach ($categories_results as $category_name => $result): ?>
								<tr>
									<td ><?php echo h($category_name); ?></td>
									<td class="text-right"><?php echo h($result['result']); ?></td>
									<td class="text-right" style="background-color: <?php echo $result['color']; ?>;"><?php echo h($result['risk_level']); ?></td>
								</tr>
							<?php endforeach; ?>

								<tr>
									<th>Total</th>
									<th class="text-right"><?php echo h($total); ?></th>
									<th>&nbsp;</th>
								</tr>
						</tbody>
					</table>
				</div>
				
			</div>
			<div class="tab-pane fade" id="domain" role="tabpanel" aria-labelledby="domain-tab">
				<div class="box-body table-responsive">
					<table id="table2" class="table table-striped table-bordered" style="vertical-align: top;">
						<thead>
							<tr>
								<th>Dominio</th>
								<th class="text-right">Calificación</th>
								<th class="text-center">Nivel de riesgo</th>
							 </tr>
						</thead>
						<tbody>

							<?php foreach ($domains_results as $domain_name => $result2): ?>
								<tr>
									<td ><?php echo h($domain_name); ?></td>
									<td class="text-right"><?php echo h($result2['result']); ?></td>
									<td class="text-right" style="background-color: <?php echo $result2['color']; ?>;"><?php echo h($result2['risk_level']); ?></td>
								</tr>
							<?php endforeach; ?>

								<tr>
									<th>Total</th>
									<th class="text-right"><?php echo h($total); ?></th>
									<th>&nbsp;</th>
								</tr>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->