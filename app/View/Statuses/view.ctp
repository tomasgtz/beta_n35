<div class="statuses view">
<h2><?php echo __('Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($status['Status']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($status['Status']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($status['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $status['CreatedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($status['Status']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($status['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $status['ModifiedUser']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $status['Status']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcenters'), array('controller' => 'jobcenters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcenter'), array('controller' => 'jobcenters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lists'), array('controller' => 'lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New List'), array('controller' => 'lists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lists Elements'), array('controller' => 'lists_elements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lists Element'), array('controller' => 'lists_elements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Companies'); ?></h3>
	<?php if (!empty($status['Company'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('No Employees'); ?></th>
		<th><?php echo __('No Jobcenters'); ?></th>
		<th><?php echo __('Rfc'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Company'] as $company): ?>
		<tr>
			<td><?php echo $company['id']; ?></td>
			<td><?php echo $company['name']; ?></td>
			<td><?php echo $company['no_employees']; ?></td>
			<td><?php echo $company['no_jobcenters']; ?></td>
			<td><?php echo $company['rfc']; ?></td>
			<td><?php echo $company['telephone']; ?></td>
			<td><?php echo $company['created']; ?></td>
			<td><?php echo $company['modified']; ?></td>
			<td><?php echo $company['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'companies', 'action' => 'view', $company['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'companies', 'action' => 'edit', $company['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'companies', 'action' => 'delete', $company['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Jobcenters'); ?></h3>
	<?php if (!empty($status['Jobcenter'])): ?>
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
	<?php foreach ($status['Jobcenter'] as $jobcenter): ?>
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
	<h3><?php echo __('Related Lists'); ?></h3>
	<?php if (!empty($status['List'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['List'] as $list): ?>
		<tr>
			<td><?php echo $list['id']; ?></td>
			<td><?php echo $list['name']; ?></td>
			<td><?php echo $list['created']; ?></td>
			<td><?php echo $list['created_user_id']; ?></td>
			<td><?php echo $list['modified']; ?></td>
			<td><?php echo $list['modified_user_id']; ?></td>
			<td><?php echo $list['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lists', 'action' => 'view', $list['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lists', 'action' => 'edit', $list['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lists', 'action' => 'delete', $list['id']), array('confirm' => __('Are you sure you want to delete # %s?', $list['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New List'), array('controller' => 'lists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Lists Elements'); ?></h3>
	<?php if (!empty($status['ListsElement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('List Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['ListsElement'] as $listsElement): ?>
		<tr>
			<td><?php echo $listsElement['id']; ?></td>
			<td><?php echo $listsElement['name']; ?></td>
			<td><?php echo $listsElement['list_id']; ?></td>
			<td><?php echo $listsElement['created']; ?></td>
			<td><?php echo $listsElement['created_user_id']; ?></td>
			<td><?php echo $listsElement['modified']; ?></td>
			<td><?php echo $listsElement['modified_user_id']; ?></td>
			<td><?php echo $listsElement['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lists_elements', 'action' => 'view', $listsElement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lists_elements', 'action' => 'edit', $listsElement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lists_elements', 'action' => 'delete', $listsElement['id']), array('confirm' => __('Are you sure you want to delete # %s?', $listsElement['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lists Element'), array('controller' => 'lists_elements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($status['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Querstionary Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['text']; ?></td>
			<td><?php echo $question['querstionary_type']; ?></td>
			<td><?php echo $question['created']; ?></td>
			<td><?php echo $question['modified']; ?></td>
			<td><?php echo $question['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), array('confirm' => __('Are you sure you want to delete # %s?', $question['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($status['Report'])): ?>
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
	<?php foreach ($status['Report'] as $report): ?>
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
<div class="related">
	<h3><?php echo __('Related Responses'); ?></h3>
	<?php if (!empty($status['Response'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Response Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Response'] as $response): ?>
		<tr>
			<td><?php echo $response['id']; ?></td>
			<td><?php echo $response['question_id']; ?></td>
			<td><?php echo $response['response_value']; ?></td>
			<td><?php echo $response['created']; ?></td>
			<td><?php echo $response['modified']; ?></td>
			<td><?php echo $response['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'responses', 'action' => 'view', $response['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'responses', 'action' => 'edit', $response['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'responses', 'action' => 'delete', $response['id']), array('confirm' => __('Are you sure you want to delete # %s?', $response['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Roles'); ?></h3>
	<?php if (!empty($status['Role'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('List Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Role'] as $role): ?>
		<tr>
			<td><?php echo $role['id']; ?></td>
			<td><?php echo $role['name']; ?></td>
			<td><?php echo $role['list_id']; ?></td>
			<td><?php echo $role['created']; ?></td>
			<td><?php echo $role['created_user_id']; ?></td>
			<td><?php echo $role['modified']; ?></td>
			<td><?php echo $role['modified_user_id']; ?></td>
			<td><?php echo $role['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'roles', 'action' => 'view', $role['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'roles', 'action' => 'edit', $role['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'roles', 'action' => 'delete', $role['id']), array('confirm' => __('Are you sure you want to delete # %s?', $role['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related States'); ?></h3>
	<?php if (!empty($status['State'])): ?>
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
	<?php foreach ($status['State'] as $state): ?>
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
<div class="related">
	<h3><?php echo __('Related Statuses'); ?></h3>
	<?php if (!empty($status['Status'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Status'] as $status): ?>
		<tr>
			<td><?php echo $status['id']; ?></td>
			<td><?php echo $status['text']; ?></td>
			<td><?php echo $status['created']; ?></td>
			<td><?php echo $status['created_user_id']; ?></td>
			<td><?php echo $status['modified']; ?></td>
			<td><?php echo $status['modified_user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'statuses', 'action' => 'view', $status['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'statuses', 'action' => 'edit', $status['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'statuses', 'action' => 'delete', $status['id']), array('confirm' => __('Are you sure you want to delete # %s?', $status['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($status['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Reset Password Token'); ?></th>
		<th><?php echo __('Token Created At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['status_id']; ?></td>
			<td><?php echo $user['reset_password_token']; ?></td>
			<td><?php echo $user['token_created_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
