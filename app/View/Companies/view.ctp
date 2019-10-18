<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Employees'); ?></dt>
		<dd>
			<?php echo h($company['Company']['no_employees']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Jobcenters'); ?></dt>
		<dd>
			<?php echo h($company['Company']['no_jobcenters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rfc'); ?></dt>
		<dd>
			<?php echo h($company['Company']['rfc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($company['Company']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($company['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $company['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcenters'), array('controller' => 'jobcenters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcenter'), array('controller' => 'jobcenters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Jobcenters'); ?></h3>
	<?php if (!empty($company['Jobcenter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address Street'); ?></th>
		<th><?php echo __('Address Num Ext'); ?></th>
		<th><?php echo __('Address Num Int'); ?></th>
		<th><?php echo __('Address Zip'); ?></th>
		<th><?php echo __('Address Col'); ?></th>
		<th><?php echo __('Address City'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Main Activity'); ?></th>
		<th><?php echo __('Rfc'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('No Employees'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Jobcenter'] as $jobcenter): ?>
		<tr>
			<td><?php echo $jobcenter['id']; ?></td>
			<td><?php echo $jobcenter['company_id']; ?></td>
			<td><?php echo $jobcenter['name']; ?></td>
			<td><?php echo $jobcenter['address_street']; ?></td>
			<td><?php echo $jobcenter['address_num_ext']; ?></td>
			<td><?php echo $jobcenter['address_num_int']; ?></td>
			<td><?php echo $jobcenter['address_zip']; ?></td>
			<td><?php echo $jobcenter['address_col']; ?></td>
			<td><?php echo $jobcenter['address_city']; ?></td>
			<td><?php echo $jobcenter['state_id']; ?></td>
			<td><?php echo $jobcenter['main_activity']; ?></td>
			<td><?php echo $jobcenter['rfc']; ?></td>
			<td><?php echo $jobcenter['telephone']; ?></td>
			<td><?php echo $jobcenter['no_employees']; ?></td>
			<td><?php echo $jobcenter['created']; ?></td>
			<td><?php echo $jobcenter['modified']; ?></td>
			<td><?php echo $jobcenter['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jobcenters', 'action' => 'view', $jobcenter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'jobcenters', 'action' => 'edit', $jobcenter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'jobcenters', 'action' => 'delete', $jobcenter['id']), array('confirm' => __('Are you sure you want to delete # %s?', $jobcenter['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Jobcenter'), array('controller' => 'jobcenters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($company['Report'])): ?>
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
	<?php foreach ($company['Report'] as $report): ?>
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
