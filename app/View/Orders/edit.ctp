<?php
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edición de registro<small>Edición de registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>
            <?php echo $this->Html->link("Pedidos", array("action" => "index")); ?>
        </li>
        <li class="active">Edición</li>
    </ol>    
</section>

<section class="content">
    <div class="row">
        <!-- center column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Editando pedido #<?php echo $this->request->data['Order']['id']; ?></h3>            </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Order', array('class' => 'form-horizontal')); ?>
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>
                <div class="form-group">
                    <label for="customer_name" class="col-sm-2 control-label">Cliente</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_name', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_email" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_email', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_phone" class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_phone', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments" class="col-sm-2 control-label">Comentarios</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('comments', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="services" class="col-sm-2 control-label">Servicios</label>
                    <div class="col-sm-6 required">
                        <?php
                        // CORREGIR QUE VENGA DEL CONTROLADOR
                        $options = array('5' => 'Diseño', '6' => 'Impresión', '7' => 'Manufactura');
                        $selected = array(5, 6, 7);
                        ?>
                        <?php echo $this->Form->input('services', array('type' => 'select', 'multiple' => 'checkbox', 'class' => 'multiple-chb', 'label' => false, 'options' => $options, 'selected' => $selected)); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payments_type_id" class="col-sm-2 control-label">Forma de pago</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('payments_type_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment_url" class="col-sm-2 control-label">Pago</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('payment_url', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="orders_phase_id" class="col-sm-2 control-label">Status del pedido</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('orders_phase_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estimated_delivery_date" class="col-sm-2 control-label">F. estimada de entrega</label>
                    <div class="col-sm-6 required">
                        <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <?php echo $this->Form->input('estimated_delivery_date', array('type' => 'text', 'class' => 'form-control pull-right', 'label' => false)); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="received_by" class="col-sm-2 control-label">Recibido por</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('received_by', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quote_id" class="col-sm-2 control-label">Cotización</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('quote_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="branch_id" class="col-sm-2 control-label">Sucursal</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('branch_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_id" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('status_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => '/index'), array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
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
        $('#OrderStatusId').select2();
        $('#OrderBranchId').select2();
        $('#OrderOrdersPhaseId').select2();
        $('#OrderPaymentsTypeId').select2();

        //Date picker
        $('#OrderEstimatedDeliveryDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>