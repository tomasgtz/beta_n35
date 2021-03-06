<link rel="stylesheet" type="text/css" href="js/datatables/css/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="js/datatables/css/buttons.dataTables.min.css">

<script src="js/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="js/datatables/js/dataTables.buttons.min.js"></script>
<script src="js/datatables/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Lista de Preguntas'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Preguntas",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
<?php echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo",array("action"=>"/add"),array("class"=>"btn btn-primary","escape"=>false)); ?>                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                                                <th>id</th>
                                                                <th>Numero</th>
                                                                <th>Texto</th>
                                                                <th>Tipo de cuestionario</th>
                                                                <th>Categoria</th>
                                                                <th>Dominio</th>
                                                                <th>Dimension</th>
                                                                <th>Siempre</th>
                                                                <th>Casi siempre</th>
                                                                <th>Algunas veces</th>
                                                                <th>Casi nunca</th>
                                                                <th>Nunca</th>
                                                                <th>F. creado</th>
                                                                <th>F. modificado</th>
                                                                <th>Estatus</th>
                                                                <th class="actions"><?php echo 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($questions as $question): ?>
<tr>
		<td><?php echo h($question['Question']['id']); ?></td>
		<td><?php echo h($question['Question']['number']); ?></td>
		<td><?php echo h($question['Question']['text']); ?></td>
		<td><?php echo h($question['Question']['querstionary_type']); ?></td>
		<td><?php echo h($question['Question']['category']); ?></td>
		<td><?php echo h($question['Question']['domain']); ?></td>
		<td><?php echo h($question['Question']['dimension']); ?></td>
		<td><?php echo h($question['Question']['r_always']); ?></td>
		<td><?php echo h($question['Question']['r_almost_always']); ?></td>
		<td><?php echo h($question['Question']['r_sometimes']); ?></td>
		<td><?php echo h($question['Question']['r_almost_never']); ?></td>
		<td><?php echo h($question['Question']['r_never']); ?></td>
		<td><?php echo h($question['Question']['created']); ?></td>
		<td><?php echo h($question['Question']['modified']); ?></td>
		<td>
			<?php echo $this->Html->link($question['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $question['Status']['id'])); ?>
		</td>
                            <td class="actions" style="text-align:center">
<?php echo $this->Html->link('',array('action'=>'edit',$question['Question']['id']),array('class'=>'fa fa-edit fa-lg')); ?>
&nbsp;&nbsp;
<?php echo $this->Form->postLink('',array('action'=>'delete',$question['Question']['id']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', $question['Question']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>                            </td>
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
          filename: 'Questions',
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