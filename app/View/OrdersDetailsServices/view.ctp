<div class="ordersDetailsServices view">
<h2><?php echo __('Orders Details Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordersDetailsService['OrdersDetailsService']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetailsService['Service']['name'], array('controller' => 'services', 'action' => 'view', $ordersDetailsService['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orders Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetailsService['OrdersDetail']['id'], array('controller' => 'orders_details', 'action' => 'view', $ordersDetailsService['OrdersDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ordersDetailsService['OrdersDetailsService']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetailsService['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $ordersDetailsService['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ordersDetailsService['OrdersDetailsService']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetailsService['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $ordersDetailsService['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersDetailsService['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $ordersDetailsService['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orders Details Service'), array('action' => 'edit', $ordersDetailsService['OrdersDetailsService']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orders Details Service'), array('action' => 'delete', $ordersDetailsService['OrdersDetailsService']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ordersDetailsService['OrdersDetailsService']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Details Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Details Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Details'), array('controller' => 'orders_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Detail'), array('controller' => 'orders_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
