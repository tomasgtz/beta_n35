<!-- DataTables -->
<!-- styles -->
<?php echo $this->Html->css('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?><!-- scripts -->
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?><?php echo $this->Html->script('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Lista de '.'Countries'); ?>        <small><?php echo __('Lista de '.'Countries'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php 
                        $button = '<i class="fa fa-plus-square"></i>&nbsp;Nuevo registro';
                        $action = array("action" => "/add");
                        $option1 = array("class" => "btn btn-primary", "escape" => false);
                        echo $this->Html->link($button, $action, $option1);
                    ?>
                                        </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('iso_code_2'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('iso_code_3'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('created_user_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('modified_user_id'); ?></th>
                                                                    <th><?php echo $this->Paginator->sort('status_id'); ?></th>
                                                                <th class="actions"><?php echo __('Acciones'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($countries as $country): ?>
	<tr>
		<td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['iso_code_2']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['iso_code_3']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($country['CreatedUser']['id'], array('controller' => 'created_users', 'action' => 'view', $country['CreatedUser']['id'])); ?>
		</td>
		<td><?php echo h($country['Country']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($country['ModifiedUser']['id'], array('controller' => 'modified_users', 'action' => 'view', $country['ModifiedUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($country['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $country['Status']['id'])); ?>
		</td>
<td class="actions" style="text-align:center">
<?php echo $this->Html->link("<i class='fa fa-edit'></i>" , array('action' => 'edit', $country['Country']['id']),array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>&nbsp;
<?php echo $this->Form->postLink("<i class='fa fa-trash-o'></i>", array('action' => 'delete', $country['Country']['id']),array('confirm' => __('Esta seguro de eliminar la dirección # %s?', $country['Country']['id']), 'class' => 'btn btn-danger btn-xs', 'escape' => false)); ?></td>
</tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>