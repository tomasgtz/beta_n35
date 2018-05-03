<div class="ordersDetails view">
<h2><?php echo __('Orders Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Number'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['part_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetail['Order']['id'], array('controller' => 'orders', 'action' => 'view', $ordersDetail['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetail['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $ordersDetail['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ordersDetail['OrdersDetail']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetail['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $ordersDetail['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetail['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $ordersDetail['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orders Detail'), array('action' => 'edit', $ordersDetail['OrdersDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orders Detail'), array('action' => 'delete', $ordersDetail['OrdersDetail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ordersDetail['OrdersDetail']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Services'); ?></h3>
	<?php if (!empty($ordersDetail['Service'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('List Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ordersDetail['Service'] as $service): ?>
		<tr>
			<td><?php echo $service['id']; ?></td>
			<td><?php echo $service['name']; ?></td>
			<td><?php echo $service['list_id']; ?></td>
			<td><?php echo $service['created']; ?></td>
			<td><?php echo $service['created_user_id']; ?></td>
			<td><?php echo $service['modified']; ?></td>
			<td><?php echo $service['modified_user_id']; ?></td>
			<td><?php echo $service['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'services', 'action' => 'view', $service['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'services', 'action' => 'edit', $service['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'services', 'action' => 'delete', $service['id']), array('confirm' => __('Are you sure you want to delete # %s?', $service['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
