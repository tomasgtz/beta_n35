<div class="quotes view">
    <h2><?php echo __('Quote'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Customer Name'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['customer_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Customer Email'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['customer_email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Customer Phone'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['customer_phone']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Comments'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['comments']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Branch'); ?></dt>
        <dd>
            <?php echo $this->Html->link($quote['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $quote['Branch']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($quote['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $quote['CreatedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($quote['Quote']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($quote['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $quote['ModifiedUser']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo $this->Html->link($quote['Status']['text'], array('controller' => 'statuses', 'action' => 'view', $quote['Status']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Quote'), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Quote'), array('action' => 'delete', $quote['Quote']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $quote['Quote']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Created Users'), array('controller' => 'created_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'created_users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Modified Users'), array('controller' => 'modified_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Modified User'), array('controller' => 'modified_users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Orders'); ?></h3>
    <?php if (!empty($quote['Order'])): ?>
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
            <?php foreach ($quote['Order'] as $order): ?>
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
