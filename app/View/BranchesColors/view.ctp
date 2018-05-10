<div class="branchesColors view">
<h2><?php echo __('Branches Color'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Logo'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['url_logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text1'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['text1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color1'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['color1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text2'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['text2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color2'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['color2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text3'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['text3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color3'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['color3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesColor['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $branchesColor['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesColor['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $branchesColor['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branchesColor['BranchesColor']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesColor['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $branchesColor['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesColor['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $branchesColor['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branches Color'), array('action' => 'edit', $branchesColor['BranchesColor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branches Color'), array('action' => 'delete', $branchesColor['BranchesColor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branchesColor['BranchesColor']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches Colors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branches Color'), array('action' => 'add')); ?> </li>
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
