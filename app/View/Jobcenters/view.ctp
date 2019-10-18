<div class="jobcenters view">
<h2><?php echo __('Jobcenter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobcenter['Company']['name'], array('controller' => 'companies', 'action' => 'view', $jobcenter['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Street'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Num Ext'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_num_ext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Num Int'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_num_int']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Zip'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Col'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_col']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address City'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobcenter['State']['name'], array('controller' => 'states', 'action' => 'view', $jobcenter['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Main Activity'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['main_activity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rfc'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['rfc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Employees'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['no_employees']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($jobcenter['Jobcenter']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobcenter['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $jobcenter['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobcenter'), array('action' => 'edit', $jobcenter['Jobcenter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobcenter'), array('action' => 'delete', $jobcenter['Jobcenter']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $jobcenter['Jobcenter']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcenters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcenter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($jobcenter['Report'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Jobcenter Id'); ?></th>
		<th><?php echo __('Law Code'); ?></th>
		<th><?php echo __('Law Name'); ?></th>
		<th><?php echo __('Verifier Name'); ?></th>
		<th><?php echo __('Verification Date'); ?></th>
		<th><?php echo __('Results Date Valid'); ?></th>
		<th><?php echo __('Issued Place'); ?></th>
		<th><?php echo __('Issued Date'); ?></th>
		<th><?php echo __('SCTPS Number'); ?></th>
		<th><?php echo __('Method'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($jobcenter['Report'] as $report): ?>
		<tr>
			<td><?php echo $report['id']; ?></td>
			<td><?php echo $report['company_id']; ?></td>
			<td><?php echo $report['jobcenter_id']; ?></td>
			<td><?php echo $report['law_code']; ?></td>
			<td><?php echo $report['law_name']; ?></td>
			<td><?php echo $report['verifier_name']; ?></td>
			<td><?php echo $report['verification_date']; ?></td>
			<td><?php echo $report['results_date_valid']; ?></td>
			<td><?php echo $report['issued_place']; ?></td>
			<td><?php echo $report['issued_date']; ?></td>
			<td><?php echo $report['SCTPS_number']; ?></td>
			<td><?php echo $report['method']; ?></td>
			<td><?php echo $report['created']; ?></td>
			<td><?php echo $report['modified']; ?></td>
			<td><?php echo $report['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reports', 'action' => 'view', $report['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reports', 'action' => 'edit', $report['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reports', 'action' => 'delete', $report['id']), array('confirm' => __('Are you sure you want to delete # %s?', $report['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
