<!-- DataTables -->
<?php echo $this->Html->script('plugins/datatables/jquery.dataTables.min.js'); ?><?php echo $this->Html->script('plugins/datatables/dataTables.bootstrap.min.js'); ?>
<div class="box-header">
  <h2 class="box-title"><?php echo __('Lista De '.'Orders'); ?></h2>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id=<?php echo 'tabla'.'Orders'; ?> class="table table-bordered table-hover">
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
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $order['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
  </table>

	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Página {:page} de {:pages}, Mostrando {:current} registros de {:count} total, comenzando en registro {:start}, terminando en {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

	<div class="actions">
		<h3><?php echo __('Acciones'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Order'), array('action' => 'add')); ?></li>
		</ul>
	</div>

</div>
<!-- /.box-body -->

<script type="text/javascript">
$(document).ready(function() {
	
		<?php 
			echo '$(\'#tabla'.'Orders\').DataTable({
				\'paging\'       : false,
				\'lengthChange\' : false,
				\'searching\'    : false,
				\'ordering\'     : false,
				\'info\'         : false,
				\'autoWidth\'    : false
			});';
		?>
});  
</script>