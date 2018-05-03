<div class="quotesDetails view">
<h2><?php echo __('Quotes Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Number'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['part_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotesDetail['Quote']['id'], array('controller' => 'quotes', 'action' => 'view', $quotesDetail['Quote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotesDetail['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $quotesDetail['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quotesDetail['QuotesDetail']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotesDetail['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $quotesDetail['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotesDetail['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $quotesDetail['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quotes Detail'), array('action' => 'edit', $quotesDetail['QuotesDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quotes Detail'), array('action' => 'delete', $quotesDetail['QuotesDetail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $quotesDetail['QuotesDetail']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quotes Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
