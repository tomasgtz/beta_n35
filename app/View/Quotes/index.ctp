<!-- DataTables -->
<?php echo $this->Html->script('plugins/datatables/jquery.dataTables.min.js'); ?><?php echo $this->Html->script('plugins/datatables/dataTables.bootstrap.min.js'); ?>
<div class="box-header">
  <h2 class="box-title"><?php echo __('Lista De '.'Quotes'); ?></h2>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id=<?php echo 'tabla'.'Quotes'; ?> class="table table-bordered table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_name'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_email'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($quotes as $quote): ?>
	<tr>
		<td><?php echo h($quote['Quote']['id']); ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['customer_name']); ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['customer_email']); ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['customer_phone']); ?>&nbsp;</td>
		<td><?php echo h($quote['Quote']['comments']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quote['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $quote['Branch']['id'])); ?>
		</td>
		<td><?php echo h($quote['Quote']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quote['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $quote['CreatedUser']['id'])); ?>
		</td>
		<td><?php echo h($quote['Quote']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quote['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $quote['ModifiedUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($quote['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $quote['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $quote['Quote']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('Nuevo Quote'), array('action' => 'add')); ?></li>
		</ul>
	</div>

</div>
<!-- /.box-body -->

<script type="text/javascript">
$(document).ready(function() {
	
		<?php 
			echo '$(\'#tabla'.'Quotes\').DataTable({
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