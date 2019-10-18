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
        <?php echo __('Lista de '.'Reports'); ?>        <small><?php echo __('Lista de '.'Reports'); ?></small>
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
                    <h3 class="box-title">
<?php echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo",array("action"=>"/add"),array("class"=>"btn btn-primary","escape"=>false)); ?>                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                                                <th>id</th>
                                                                <th>company_id</th>
                                                                <th>jobcenter_id</th>
                                                                <th>law_code</th>
                                                                <th>law_name</th>
                                                                <th>verifier_name</th>
                                                                <th>verification_date</th>
                                                                <th>results_date_valid</th>
                                                                <th>issued_place</th>
                                                                <th>issued_date</th>
                                                                <th>SCTPS_number</th>
                                                                <th>method</th>
                                                                <th>result_category</th>
                                                                <th>result_domain</th>
                                                                <th>result_dimension</th>
                                                                <th>created</th>
                                                                <th>modified</th>
                                                                <th>status_id</th>
                                                                <th class="actions"><?php echo 'acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reports as $report): ?>
<tr>
		<td><?php echo h($report['Report']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($report['Company']['name'], array('controller' => 'companies', 'action' => 'view', $report['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($report['Jobcenter']['name'], array('controller' => 'jobcenters', 'action' => 'view', $report['Jobcenter']['id'])); ?>
		</td>
		<td><?php echo h($report['Report']['law_code']); ?></td>
		<td><?php echo h($report['Report']['law_name']); ?></td>
		<td><?php echo h($report['Report']['verifier_name']); ?></td>
		<td><?php echo h($report['Report']['verification_date']); ?></td>
		<td><?php echo h($report['Report']['results_date_valid']); ?></td>
		<td><?php echo h($report['Report']['issued_place']); ?></td>
		<td><?php echo h($report['Report']['issued_date']); ?></td>
		<td><?php echo h($report['Report']['SCTPS_number']); ?></td>
		<td><?php echo h($report['Report']['method']); ?></td>
		<td><?php echo h($report['Report']['result_category']); ?></td>
		<td><?php echo h($report['Report']['result_domain']); ?></td>
		<td><?php echo h($report['Report']['result_dimension']); ?></td>
		<td><?php echo h($report['Report']['created']); ?></td>
		<td><?php echo h($report['Report']['modified']); ?></td>
		<td>
			<?php echo $this->Html->link($report['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $report['Status']['id'])); ?>
		</td>
                            <td class="actions" style="text-align:center">
<?php echo $this->Html->link('',array('action'=>'edit',$report['Report']['id']),array('class'=>'fa fa-edit fa-lg')); ?>
&nbsp;&nbsp;
<?php echo $this->Form->postLink('',array('action'=>'delete',$report['Report']['id']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', $report['Report']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>                            </td>
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
          filename: 'Reports',
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