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
        <?php echo __('Lista de '.'Orders Details Services'); ?>        <small><?php echo __('Lista de '.'Orders Details Services'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Orders Details Services",array("action"=>"/index")); ?></li>
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
                                                                <th>service_id</th>
                                                                <th>orders_detail_id</th>
                                                                <th>created</th>
                                                                <th>created_user_id</th>
                                                                <th>modified</th>
                                                                <th>modified_user_id</th>
                                                                <th>status_id</th>
                                                                <th class="actions"><?php echo 'acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ordersDetailsServices as $ordersDetailsService): ?>
<tr>
		<td><?php echo h($ordersDetailsService['OrdersDetailsService']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($ordersDetailsService['Service']['name'], array('controller' => 'services', 'action' => 'view', $ordersDetailsService['Service']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ordersDetailsService['OrdersDetail']['id'], array('controller' => 'orders_details', 'action' => 'view', $ordersDetailsService['OrdersDetail']['id'])); ?>
		</td>
		<td><?php echo h($ordersDetailsService['OrdersDetailsService']['created']); ?></td>
		<td>
			<?php echo $this->Html->link($ordersDetailsService['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $ordersDetailsService['CreatedUser']['id'])); ?>
		</td>
		<td><?php echo h($ordersDetailsService['OrdersDetailsService']['modified']); ?></td>
		<td>
			<?php echo $this->Html->link($ordersDetailsService['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $ordersDetailsService['ModifiedUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ordersDetailsService['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $ordersDetailsService['Status']['id'])); ?>
		</td>
                            <td class="actions" style="text-align:center">
<?php echo $this->Html->link('',array('action'=>'edit',$ordersDetailsService['OrdersDetailsService']['id']),array('class'=>'fa fa-edit fa-lg')); ?>
&nbsp;&nbsp;
<?php echo $this->Form->postLink('',array('action'=>'delete',$ordersDetailsService['OrdersDetailsService']['id']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', $ordersDetailsService['OrdersDetailsService']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>                            </td>
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
          filename: 'Orders Details Services',
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