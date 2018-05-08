<div class="branchesBanners view">
<h2><?php echo __('Branches Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Banner'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['url_banner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text1'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['text1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text2'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['text2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text3'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['text3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesBanner['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $branchesBanner['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesBanner['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $branchesBanner['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branchesBanner['BranchesBanner']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesBanner['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $branchesBanner['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branchesBanner['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $branchesBanner['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branches Banner'), array('action' => 'edit', $branchesBanner['BranchesBanner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branches Banner'), array('action' => 'delete', $branchesBanner['BranchesBanner']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branchesBanner['BranchesBanner']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branches Banner'), array('action' => 'add')); ?> </li>
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
