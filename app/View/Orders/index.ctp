<!-- DataTables -->
<!-- styles -->
<?php echo $this->Html->css('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?><!-- scripts -->
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?><?php echo $this->Html->script('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Lista de '.'Orders'); ?>        <small><?php echo __('Lista de '.'Orders'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php 
                        $button = '<i class="fa fa-plus-square"></i>&nbsp;Nuevo registro';
                        $action = array("action" => "/add");
                        $option1 = array("class" => "btn btn-primary", "escape" => false);
                        echo $this->Html->link($button, $action, $option1);
                    ?>
                                        </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('customer_name'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('customer_email'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('customer_phone'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('comments'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('payment_url'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('received_by'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('estimated_delivery_date'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('quote_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('branch_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('payments_type_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('orders_phase_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created_user_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified_user_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('status_id'); ?></th>
                                                                <th class="actions"><?php echo __('Acciones'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['customer_name']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['customer_email']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['customer_phone']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['comments']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['payment_url']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['received_by']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['estimated_delivery_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Quote']['id'], array('controller' => 'quotes', 'action' => 'view', $order['Quote']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $order['Branch']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['PaymentsType']['name'], array('controller' => 'payments_types', 'action' => 'view', $order['PaymentsType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrdersPhase']['name'], array('controller' => 'orders_phases', 'action' => 'view', $order['OrdersPhase']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $order['CreatedUser']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $order['ModifiedUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $order['Status']['id'])); ?>
		</td>
<td class="actions" style="text-align:center">
<?php echo $this->Html->link("<i class='fa fa-edit'></i>" , array('action' => 'edit', $order['Order']['id']),array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>&nbsp;
<?php echo $this->Form->postLink("<i class='fa fa-trash-o'></i>", array('action' => 'delete', $order['Order']['id']),array('confirm' => __('Esta seguro de eliminar la dirección # %s?', $order['Order']['id']), 'class' => 'btn btn-danger btn-xs', 'escape' => false)); ?></td>
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
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>