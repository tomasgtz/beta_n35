<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Branches'); ?></h3>
	<?php if (!empty($user['Branch'])): ?>
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
	<?php foreach ($user['Branch'] as $branch): ?>
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
