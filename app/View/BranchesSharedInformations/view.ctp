<div class="branchesSharedInformations view">
<h2><?php echo __('Branches Shared Information'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text1'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['text1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesSharedInformation['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $branchesSharedInformation['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesSharedInformation['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $branchesSharedInformation['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branchesSharedInformation['BranchesSharedInformation']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesSharedInformation['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $branchesSharedInformation['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesSharedInformation['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $branchesSharedInformation['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branches Shared Information'), array('action' => 'edit', $branchesSharedInformation['BranchesSharedInformation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branches Shared Information'), array('action' => 'delete', $branchesSharedInformation['BranchesSharedInformation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branchesSharedInformation['BranchesSharedInformation']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches Shared Informations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branches Shared Information'), array('action' => 'add')); ?> </li>
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
