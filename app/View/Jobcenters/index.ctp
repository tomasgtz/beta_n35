<link rel="stylesheet" type="text/css" href="js/datatables/css/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="js/datatables/css/buttons.dataTables.min.css">

<script src="js/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="js/datatables/js/dataTables.buttons.min.js"></script>
<script src="js/datatables/js/buttons.flash.min.js"></script> 

<script src="js/datatables/js/buttons.html5.min.js"></script>
<script src="js/datatables/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Lista de Centros de Trabajo'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Centros de trabajo",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
<?php  if( $showAddButton === true ) echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo",array("action"=>"/add"),array("class"=>"btn btn-primary","escape"=>false)); ?>                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                                                <th>id</th>
                                                                <th>Empresa</th>
                                                                <th>Nombre del centro de trabajo</th>
                                                                <th>Direccion</th>
                                                                <th>Actividad principal</th>
                                                                <th>RFC</th>
                                                                <th>Telefono</th>
                                                                <th>Numero de empleados</th>
                                                                <th>Fecha Creado</th>
                                                                <th>Fecha Modificado</th>
                                                                <th>Estado</th>
                                                                <th class="actions"><?php echo 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobcenters as $jobcenter): ?>
<tr>
		<td><?php echo h($jobcenter['Jobcenter']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($jobcenter['Company']['name'], array('controller' => 'companies', 'action' => 'view', $jobcenter['Company']['id'])); ?>
		</td>
		<td><?php echo h($jobcenter['Jobcenter']['name']); ?></td>
		<td>
			<?php echo h($jobcenter['Jobcenter']['address_street']); ?>
			<?php echo h($jobcenter['Jobcenter']['address_num_ext']); ?>
			<?php echo h($jobcenter['Jobcenter']['address_num_int']); ?>
			<?php echo h($jobcenter['Jobcenter']['address_zip']); ?>
			<?php echo h($jobcenter['Jobcenter']['address_col']); ?>
			<?php echo h($jobcenter['Jobcenter']['address_city']); ?>

			<?php echo h($jobcenter['State']['name']); ?>
		
			
		</td>
		<td><?php echo h($jobcenter['Jobcenter']['main_activity']); ?></td>
		<td><?php echo h($jobcenter['Jobcenter']['rfc']); ?></td>
		<td><?php echo h($jobcenter['Jobcenter']['telephone']); ?></td>
		<td><?php echo h($jobcenter['Jobcenter']['no_employees']); ?></td>
		<td><?php echo h($jobcenter['Jobcenter']['created']); ?></td>
		<td><?php echo h($jobcenter['Jobcenter']['modified']); ?></td>
		<td> <?php echo h($jobcenter['Status']['text']); ?> </td>
                            
		<td class="actions" style="text-align:center">
<?php echo $this->Html->link('',array('action'=>'edit',$jobcenter['Jobcenter']['id']),array('class'=>'fa fa-edit fa-lg')); ?>
&nbsp;&nbsp;
<?php echo $this->Html->link('',array('controller'=>'Responses', 'action'=>'startevaluation',$jobcenter['Jobcenter']['id']),array('class'=>'fa fa-play-circle fa-lg')); ?>
&nbsp;&nbsp;
<?php echo $this->Html->link('',array('controller'=>'Reports', 'action'=>'get',$jobcenter['Jobcenter']['id']),array('class'=>'fa fa-file-text fa-lg')); ?>

<?php if( $showAddButton === true ) { ?>
&nbsp;&nbsp;
<?php echo $this->Form->postLink('',array('action'=>'delete',$jobcenter['Jobcenter']['id']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', $jobcenter['Jobcenter']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?> 

<?php } ?>
</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
<script>
$(document).ready(function() {
  var table = $('#table1').DataTable({
      dom: 'Blftip',
      buttons: [{
          extend: 'excel',
          filename: 'Jobcenters',
          exportOptions: {
              format: {
                  body: function(data, row, col) {
                      var s = '<p>' + data + '</p>';
                      return $(s).text();
                  }
              }

          }
      }]
  });
});
</script>