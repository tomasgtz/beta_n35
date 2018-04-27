<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Name'); ?></dt>
		<dd>
			<?php echo h($order['Order']['customer_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Email'); ?></dt>
		<dd>
			<?php echo h($order['Order']['customer_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Phone'); ?></dt>
		<dd>
			<?php echo h($order['Order']['customer_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($order['Order']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Url'); ?></dt>
		<dd>
			<?php echo h($order['Order']['payment_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($order['Order']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estimated Delivery Date'); ?></dt>
		<dd>
			<?php echo h($order['Order']['estimated_delivery_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Quote']['id'], array('controller' => 'quotes', 'action' => 'view', $order['Quote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $order['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payments Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['PaymentsType']['name'], array('controller' => 'payments_types', 'action' => 'view', $order['PaymentsType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orders Phase'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['OrdersPhase']['name'], array('controller' => 'orders_phases', 'action' => 'view', $order['OrdersPhase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $order['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $order['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $order['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments Types'), array('controller' => 'payments_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payments Type'), array('controller' => 'payments_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Phases'), array('controller' => 'orders_phases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Phase'), array('controller' => 'orders_phases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
