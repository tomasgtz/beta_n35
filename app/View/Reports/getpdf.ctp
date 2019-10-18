<?php 

App::build(array('Vendor' => array(APP . 'vendors' . DS . 'tcpdf' . DS)));
App::uses('TCPDF', 'Vendor');

App::build(array('Vendor' => array(APP . 'vendors' . DS . 'tcpdf' . DS)));
App::uses('XTCPDF', 'Vendor');

$tcpdf = new XTCPDF();
$textfont = 'freesans';

$tcpdf->SetAuthor("");
$tcpdf->SetAutoPageBreak( true, 30 );
$tcpdf->setHeaderFont(array($textfont,'',10));
$tcpdf->xheadercolor = array(255,255,255);
//$tcpdf->xheadertext = 'Fecha: '. date('Y/m/d',time());
$tcpdf->xfootertext = ' ';

$tcpdf->AddPage();
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'B',10);
//$tcpdf->Cell(10,20,'Nombre de la empresa:', 0, 0);

// more info

ob_start(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Reporte de evaluacion'); ?>
    </h1>
    <table>
    	<tr>
		<th><?php echo __('Nombre del centro de trabajo: '); ?></th>
		<td><?php echo h($jobcenter['Jobcenter']['name']); ?></td>
	</tr>
	<tr>
		<th><?php echo __('RFC del centro de trabajo: '); ?></th>
		<td><?php echo h($jobcenter['Jobcenter']['rfc']); ?></td>
	</tr>
	<tr>
		<th><?php echo __('Domicilio del centro de trabajo: '); ?></th>
		<td><?php echo h($jobcenter['Jobcenter']['address_street'] . ' ' . 
				 $jobcenter['Jobcenter']['address_num_ext'] . ' ' . 
				 $jobcenter['Jobcenter']['address_num_int'] . ' ' . 
				 $jobcenter['Jobcenter']['address_col'] . ' ' .
				 $jobcenter['Jobcenter']['address_city'] . ', ' .
				 $state['State']['name'] . ', Mexico '
				 ); ?></td>
	</tr>
	<tr>
		<th><?php echo __('Telefono del centro de trabajo: '); ?></th>
		<td><?php echo h($jobcenter['Jobcenter']['telephone']); ?></td>
	</tr>
	<tr>
		<th><?php echo __('Actividad del centro de trabajo: '); ?></th>
		<td><?php echo h($jobcenter['Jobcenter']['main_activity']); ?></td>
	</tr>
        
    </table>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    
                </div>
                <!-- /.box-header -->

			<h3>Conteo</h3>
		
			<table id="table1" class="table table-striped table-bordered">
				<thead>
				    <tr>
					<th width="5%">No.</th>
					<th width="55%">Pregunta</th>
					<th width="8%">Siempre</th>
					<th width="8%">Casi<br>siempre</th>
					<th width="8%">Algunas<br>veces</th>
					<th width="8%">Casi<br>nunca</th>
					<th width="8%">Nunca</th>
				    </tr>
				</thead>
				<tbody>
				    <?php foreach ($questions_list as $question): ?>
					<tr>
						<td width="5%"><?php echo h($question['number']); ?></td>
						<td width="55%"><?php echo h($question['question_text']); ?></td>
						<td width="8%"><?php echo h($r_always[ $question['question_id'] ]); ?></td>
						<td width="8%"><?php echo h($r_almost_always[ $question['question_id'] ]); ?></td>
						<td width="8%"><?php echo h($r_sometimes[ $question['question_id'] ]); ?></td>
						<td width="8%"><?php echo h($r_almost_never[ $question['question_id'] ]); ?></td>
						<td width="8%"><?php echo h($r_never[ $question['question_id'] ]); ?></td>

					</tr>
				    <?php endforeach; ?>
				</tbody>
			</table>
<?php 


$html = ob_get_clean();

$tcpdf->writeHTML($html, true, false, true, false, '');
$tcpdf->AddPage();

ob_start();

?>
			<h3>Calificacion final</h3>

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
				

			
			<h3>Calificación por categoría</h3>

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
			

			
			<h3>Calificación por dominio</h3>

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
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php 

$html = ob_get_clean();

$tcpdf->writeHTML($html, true, false, true, false, '');
echo $tcpdf->Output('mi_archivo.pdf', 'D');

die;
?>