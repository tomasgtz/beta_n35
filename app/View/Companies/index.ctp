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
        <?php echo __('Lista de Empresas'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Empresas",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
<?php if( $showAddButton === true ) echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo",array("action"=>"/add"),array("class"=>"btn btn-primary","escape"=>false)); ?>                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                                                <th>id</th>
                                                                <th>Razon social</th>
                                                                <th>Numero de empleados</th>
                                                                <th>Numero de centros de trabajo</th>
                                                                <th>RFC</th>
                                                                <th>Telefono</th>
                                                                <th>Fecha Creado</th>
                                                                <th>Fecha Modificado</th>
                                                                <th>Estatus</th>
                                                                <th class="actions"><?php echo 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($companies as $company): ?>
<tr>
		<td><?php echo h($company['Company']['id']); ?></td>
		<td><?php echo h($company['Company']['name']); ?></td>
		<td><?php echo h($company['Company']['no_employees']); ?></td>
		<td><?php echo h($company['Company']['no_jobcenters']); ?></td>
		<td><?php echo h($company['Company']['rfc']); ?></td>
		<td><?php echo h($company['Company']['telephone']); ?></td>
		<td><?php echo h($company['Company']['created']); ?></td>
		<td><?php echo h($company['Company']['modified']); ?></td>
		<td>
			<?php echo $this->Html->link($company['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $company['Status']['id'])); ?>
		</td>
                            <td class="actions" style="text-align:center">
				<?php echo $this->Html->link('',array('action'=>'edit',$company['Company']['id']),array('class'=>'fa fa-edit fa-lg')); ?>
				&nbsp;&nbsp;
				<?php echo $this->Html->link('',array('controller'=> 'Responses', 'action'=>'selectcenter',$company['Company']['id']),array('class'=>'fa fa-list-ol fa-lg')); ?>

				<?php  if ($user['User']['role'] == 'admin') { ?>
					&nbsp;&nbsp;
					<?php echo $this->Form->postLink('',array('action'=>'delete',$company['Company']['id']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', $company['Company']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>                            
					
				<?php  } ?>
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
          filename: 'Companies',
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