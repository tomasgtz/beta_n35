<?php 
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edición de registro<small>Edición de registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Pagos de sucursales",array("controller"=>"BranchesPayments", "action"=>"index")); ?></li>
        <li class="active">Edición</li>    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Editando pago de Sucursal #<?php echo $this->request->data['BranchesPayment']['id']; ?></h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('BranchesPayment',array('class' => 'form-horizontal')); ?>
            <?php echo $this->Form->input('id',array('class' => 'form-control', 'label' => false)); ?>
                            <div class="form-group">
                                <label for="payment_date" class="col-sm-2 control-label">Fecha del pago</label>
				<div class="col-sm-6 required">
				     <div class="input-group date">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?php echo $this->Form->input('payment_date',array('type' => 'text', 'class' => 'form-control pull-right', 'label' => false)); ?>
                                     </div>
				</div>
                            </div>
                            <div class="form-group">
                                <label for="ammount" class="col-sm-2 control-label">Monto</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('ammount',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="branch_id" class="col-sm-2 control-label">Sucursal</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('branch_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="status_id" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('status_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>                <!-- /.box-body -->
              <div class="box-footer">
<?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar',array('action' => '/index'),array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              </div>
              <!-- /.box-footer -->
            <?php echo $this->Form->end(); ?>          </div>
          <!-- /.box -->
        </div>
        <!--/.col (center) -->
      </div>
      <!-- /.row -->
    </section>

<script type="text/javascript">
    $(document).ready(function () {
        //Initialize Select2 Elements
	$('#BranchesPaymentStatusId').select2();
	$('#BranchesPaymentBranchId').select2();


	//Date picker
        $('#BranchesPaymentPaymentDate').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true
        });
    });
</script>