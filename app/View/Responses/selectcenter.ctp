<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo __('Iniciar evaluacion'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Responses",array("action"=>"/index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
			<?php echo __('Seleccione un centro de trabajo'); ?>
		    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
				<th>id</th>
				<th>company_id</th>
				<th>name</th>
				<th>address_street</th>
				<th>address_num_ext</th>
				<th>address_city</th>
				<th>state_id</th>
				<th>main_activity</th>
				<th>rfc</th>
				<th>telephone</th>
				<th>no_employees</th>
				<th class="actions"><?php echo 'acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobcenters as $jobcenter): ?>
			<tr>
				<td><?php echo h($jobcenter['Jobcenter']['id']); ?></td>
				<td><?php echo h($jobcenter['Company']['name']); ?></td>
				<td>
					<?php echo $this->Html->link($jobcenter['Jobcenter']['name'], array('action' => 'startevaluation', $jobcenter['Jobcenter']['id'])); ?>
				</td>
				
				<td><?php echo h($jobcenter['Jobcenter']['address_street']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['address_num_ext']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['address_city']); ?></td>
				<td><?php echo h($jobcenter['State']['name']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['main_activity']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['rfc']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['telephone']); ?></td>
				<td><?php echo h($jobcenter['Jobcenter']['no_employees']); ?></td>
				<td class="actions" style="text-align:center">
					<?php echo $this->Html->link('',array('action'=>'startevaluation',$jobcenter['Jobcenter']['id']),array('class'=>'fa fa-play-circle fa-lg')); ?>
					&nbsp;&nbsp;
				</td>
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