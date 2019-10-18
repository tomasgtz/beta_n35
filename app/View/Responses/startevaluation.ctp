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
        <?php echo __('Evaluacion No. ' . h($interview_no) . ' de ' . h($no_evaluations)); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Responses",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<?php echo $this->Form->create('Response',array('class' => 'form-horizontal', 'url' => 'add')); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;                   </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
				<th>No</th>
				<th>Pregunta</th>
				<th>Respuesta</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($questions as $question): ?>
<tr>
		
		<td><?php echo h($question['Question']['number']); ?></td>
		<td><?php echo h($question['Question']['text']); ?></td>

		<td>
			<?php 
				$attributes = array('legend' => false, 'class' => 'radio-inline', 'value' => '5');
				$options = array(1 => 'Siempre', 2 => 'Casi siempre', 3 => 'Algunas veces', 4 => 'Casi nunca', 5 => 'Nunca');
				echo $this->Form->radio('q_' . $question['Question']['id'], $options, $attributes );
			?>
		</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
		    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php 

	echo $this->Form->hidden('jobcenter_id', array('value' => $jobcenter_id)); 
	echo $this->Form->hidden('no_interview', array('value' => $interview_no));
	echo $this->Form->end(); 
?>


<style>
label {
padding: 15px !important;
}
</style>