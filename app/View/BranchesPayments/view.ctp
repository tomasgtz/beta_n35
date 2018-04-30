<div class="branchesPayments view">
<h2><?php echo __('Branches Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branchesPayment['BranchesPayment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Date'); ?></dt>
		<dd>
			<?php echo h($branchesPayment['BranchesPayment']['payment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ammount'); ?></dt>
		<dd>
			<?php echo h($branchesPayment['BranchesPayment']['ammount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesPayment['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $branchesPayment['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branchesPayment['BranchesPayment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesPayment['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $branchesPayment['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branchesPayment['BranchesPayment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesPayment['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $branchesPayment['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesPayment['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $branchesPayment['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branches Payment'), array('action' => 'edit', $branchesPayment['BranchesPayment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branches Payment'), array('action' => 'delete', $branchesPayment['BranchesPayment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branchesPayment['BranchesPayment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branches Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
