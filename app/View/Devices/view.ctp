<div class="devices view">
    <h2><?php echo __('Device'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($device['Device']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($device['Device']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Branch'); ?></dt>
        <dd>
            <?php echo $this->Html->link($device['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $device['Branch']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($device['Device']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($device['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $device['CreatedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($device['Device']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($device['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $device['ModifiedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo $this->Html->link($device['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $device['Status']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $device['Device']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?> </li>
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
