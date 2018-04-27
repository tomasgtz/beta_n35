<div class="countries view">
<h2><?php echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso Code 2'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iso Code 3'); ?></dt>
		<dd>
			<?php echo h($country['Country']['iso_code_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($country['Country']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($country['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $country['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($country['Country']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($country['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $country['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($country['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $country['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $country['Country']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jewelry Stores'), array('controller' => 'jewelry_stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jewelry Store'), array('controller' => 'jewelry_stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Branches'); ?></h3>
	<?php if (!empty($country['Branch'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Access'); ?></th>
		<th><?php echo __('Manager'); ?></th>
		<th><?php echo __('Rfc'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Suburb'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Jewelrystore Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['Branch'] as $branch): ?>
		<tr>
			<td><?php echo $branch['id']; ?></td>
			<td><?php echo $branch['name']; ?></td>
			<td><?php echo $branch['due_date']; ?></td>
			<td><?php echo $branch['phone']; ?></td>
			<td><?php echo $branch['access']; ?></td>
			<td><?php echo $branch['manager']; ?></td>
			<td><?php echo $branch['rfc']; ?></td>
			<td><?php echo $branch['street']; ?></td>
			<td><?php echo $branch['suburb']; ?></td>
			<td><?php echo $branch['postcode']; ?></td>
			<td><?php echo $branch['city']; ?></td>
			<td><?php echo $branch['state_id']; ?></td>
			<td><?php echo $branch['country_id']; ?></td>
			<td><?php echo $branch['user_id']; ?></td>
			<td><?php echo $branch['jewelrystore_id']; ?></td>
			<td><?php echo $branch['created']; ?></td>
			<td><?php echo $branch['created_user_id']; ?></td>
			<td><?php echo $branch['modified']; ?></td>
			<td><?php echo $branch['modified_user_id']; ?></td>
			<td><?php echo $branch['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'branches', 'action' => 'view', $branch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'branches', 'action' => 'edit', $branch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'branches', 'action' => 'delete', $branch['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branch['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Jewelry Stores'); ?></h3>
	<?php if (!empty($country['JewelryStore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Manager'); ?></th>
		<th><?php echo __('Rfc'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Suburb'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['JewelryStore'] as $jewelryStore): ?>
		<tr>
			<td><?php echo $jewelryStore['id']; ?></td>
			<td><?php echo $jewelryStore['name']; ?></td>
			<td><?php echo $jewelryStore['email']; ?></td>
			<td><?php echo $jewelryStore['phone']; ?></td>
			<td><?php echo $jewelryStore['manager']; ?></td>
			<td><?php echo $jewelryStore['rfc']; ?></td>
			<td><?php echo $jewelryStore['street']; ?></td>
			<td><?php echo $jewelryStore['suburb']; ?></td>
			<td><?php echo $jewelryStore['postcode']; ?></td>
			<td><?php echo $jewelryStore['city']; ?></td>
			<td><?php echo $jewelryStore['state_id']; ?></td>
			<td><?php echo $jewelryStore['country_id']; ?></td>
			<td><?php echo $jewelryStore['created']; ?></td>
			<td><?php echo $jewelryStore['created_user_id']; ?></td>
			<td><?php echo $jewelryStore['modified']; ?></td>
			<td><?php echo $jewelryStore['modified_user_id']; ?></td>
			<td><?php echo $jewelryStore['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jewelry_stores', 'action' => 'view', $jewelryStore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'jewelry_stores', 'action' => 'edit', $jewelryStore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'jewelry_stores', 'action' => 'delete', $jewelryStore['id']), array('confirm' => __('Are you sure you want to delete # %s?', $jewelryStore['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Jewelry Store'), array('controller' => 'jewelry_stores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related States'); ?></h3>
	<?php if (!empty($country['State'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Iso Code 3'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['State'] as $state): ?>
		<tr>
			<td><?php echo $state['id']; ?></td>
			<td><?php echo $state['name']; ?></td>
			<td><?php echo $state['iso_code_3']; ?></td>
			<td><?php echo $state['country_id']; ?></td>
			<td><?php echo $state['created']; ?></td>
			<td><?php echo $state['created_user_id']; ?></td>
			<td><?php echo $state['modified']; ?></td>
			<td><?php echo $state['modified_user_id']; ?></td>
			<td><?php echo $state['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'states', 'action' => 'view', $state['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'states', 'action' => 'edit', $state['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'states', 'action' => 'delete', $state['id']), array('confirm' => __('Are you sure you want to delete # %s?', $state['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
