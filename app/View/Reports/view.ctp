<div class="reports view">
<h2><?php echo __('Report'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($report['Report']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Company']['name'], array('controller' => 'companies', 'action' => 'view', $report['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jobcenter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Jobcenter']['name'], array('controller' => 'jobcenters', 'action' => 'view', $report['Jobcenter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Law Code'); ?></dt>
		<dd>
			<?php echo h($report['Report']['law_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Law Name'); ?></dt>
		<dd>
			<?php echo h($report['Report']['law_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verifier Name'); ?></dt>
		<dd>
			<?php echo h($report['Report']['verifier_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verification Date'); ?></dt>
		<dd>
			<?php echo h($report['Report']['verification_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Results Date Valid'); ?></dt>
		<dd>
			<?php echo h($report['Report']['results_date_valid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issued Place'); ?></dt>
		<dd>
			<?php echo h($report['Report']['issued_place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issued Date'); ?></dt>
		<dd>
			<?php echo h($report['Report']['issued_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SCTPS Number'); ?></dt>
		<dd>
			<?php echo h($report['Report']['SCTPS_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
			<?php echo h($report['Report']['method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result Category'); ?></dt>
		<dd>
			<?php echo h($report['Report']['result_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result Domain'); ?></dt>
		<dd>
			<?php echo h($report['Report']['result_domain']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result Dimension'); ?></dt>
		<dd>
			<?php echo h($report['Report']['result_dimension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($report['Report']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($report['Report']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $report['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report'), array('action' => 'edit', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report'), array('action' => 'delete', $report['Report']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $report['Report']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcenters'), array('controller' => 'jobcenters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcenter'), array('controller' => 'jobcenters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
