<div class="branches view">
    <h2><?php echo __('Branch'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Due Date'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['due_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['phone']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Access'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['access']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Manager'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['manager']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Rfc'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['rfc']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Street'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['street']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Suburb'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['suburb']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Postcode'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['postcode']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('City'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['city']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('State'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['State']['name'], array('controller' => 'states', 'action' => 'view', $branch['State']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Country'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['Country']['name'], array('controller' => 'countries', 'action' => 'view', $branch['Country']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['User']['id'], array('controller' => 'users', 'action' => 'view', $branch['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Jewelrystore'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['Jewelrystore']['name'], array('controller' => 'jewelrystores', 'action' => 'view', $branch['Jewelrystore']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $branch['CreatedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($branch['Branch']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $branch['ModifiedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo $this->Html->link($branch['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $branch['Status']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Branch'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Branch'), array('action' => 'delete', $branch['Branch']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branch['Branch']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Jewelrystores'), array('controller' => 'jewelrystores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Jewelrystore'), array('controller' => 'jewelrystores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Devices'); ?></h3>
    <?php if (!empty($branch['Device'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Branch Id'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Created User Id'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Modified User Id'); ?></th>
                <th><?php echo __('Status Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($branch['Device'] as $device): ?>
                <tr>
                    <td><?php echo $device['id']; ?></td>
                    <td><?php echo $device['name']; ?></td>
                    <td><?php echo $device['branch_id']; ?></td>
                    <td><?php echo $device['created']; ?></td>
                    <td><?php echo $device['created_user_id']; ?></td>
                    <td><?php echo $device['modified']; ?></td>
                    <td><?php echo $device['modified_user_id']; ?></td>
                    <td><?php echo $device['status_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'devices', 'action' => 'view', $device['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'devices', 'action' => 'edit', $device['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'devices', 'action' => 'delete', $device['id']), array('confirm' => __('Are you sure you want to delete # %s?', $device['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Orders'); ?></h3>
    <?php if (!empty($branch['Order'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Customer Name'); ?></th>
                <th><?php echo __('Customer Email'); ?></th>
                <th><?php echo __('Customer Phone'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th><?php echo __('Payment Url'); ?></th>
                <th><?php echo __('Received By'); ?></th>
                <th><?php echo __('Estimated Delivery Date'); ?></th>
                <th><?php echo __('Quote Id'); ?></th>
                <th><?php echo __('Branch Id'); ?></th>
                <th><?php echo __('Payments Type Id'); ?></th>
                <th><?php echo __('Orders Phase Id'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Created User Id'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Modified User Id'); ?></th>
                <th><?php echo __('Status Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($branch['Order'] as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['customer_name']; ?></td>
                    <td><?php echo $order['customer_email']; ?></td>
                    <td><?php echo $order['customer_phone']; ?></td>
                    <td><?php echo $order['comments']; ?></td>
                    <td><?php echo $order['payment_url']; ?></td>
                    <td><?php echo $order['received_by']; ?></td>
                    <td><?php echo $order['estimated_delivery_date']; ?></td>
                    <td><?php echo $order['quote_id']; ?></td>
                    <td><?php echo $order['branch_id']; ?></td>
                    <td><?php echo $order['payments_type_id']; ?></td>
                    <td><?php echo $order['orders_phase_id']; ?></td>
                    <td><?php echo $order['created']; ?></td>
                    <td><?php echo $order['created_user_id']; ?></td>
                    <td><?php echo $order['modified']; ?></td>
                    <td><?php echo $order['modified_user_id']; ?></td>
                    <td><?php echo $order['status_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Quotes'); ?></h3>
    <?php if (!empty($branch['Quote'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Customer Name'); ?></th>
                <th><?php echo __('Customer Email'); ?></th>
                <th><?php echo __('Customer Phone'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th><?php echo __('Branch Id'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Created User Id'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Modified User Id'); ?></th>
                <th><?php echo __('Status Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($branch['Quote'] as $quote): ?>
                <tr>
                    <td><?php echo $quote['id']; ?></td>
                    <td><?php echo $quote['customer_name']; ?></td>
                    <td><?php echo $quote['customer_email']; ?></td>
                    <td><?php echo $quote['customer_phone']; ?></td>
                    <td><?php echo $quote['comments']; ?></td>
                    <td><?php echo $quote['branch_id']; ?></td>
                    <td><?php echo $quote['created']; ?></td>
                    <td><?php echo $quote['created_user_id']; ?></td>
                    <td><?php echo $quote['modified']; ?></td>
                    <td><?php echo $quote['modified_user_id']; ?></td>
                    <td><?php echo $quote['status_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'quotes', 'action' => 'view', $quote['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'quotes', 'action' => 'edit', $quote['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quotes', 'action' => 'delete', $quote['id']), array('confirm' => __('Are you sure you want to delete # %s?', $quote['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
