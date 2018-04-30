<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Alta de registro<small>Alta de registro</small></h1>    
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li>
         <?php echo $this->Html->link("Pedidos",array("controller"=>"Orders", "action"=>"index")); ?>
      </li>
      <li class="active">Nuevo</li>
   </ol>
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Pedido</h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Order',array('class' => 'form-horizontal', 'type'=>'file')); ?>
            
                            <div class="form-group">
                                <label for="customer_name" class="col-sm-2 control-label">Cliente</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_email" class="col-sm-2 control-label">Correo</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_email',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_phone" class="col-sm-2 control-label">Teléfono</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_phone',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="comments" class="col-sm-2 control-label">Comentarios</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('comments',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="payment_url" class="col-sm-2 control-label">Comprobante de Pago</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('payment_url',array('type' => 'file', 'class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
			    <div class="form-group">
                                <label for="quote_id" class="col-sm-2 control-label">Modelo</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('part_number',array('class' => 'form-control', 'label' => false)); ?>
					<?php echo $this->Form->input('quantity',array('type' => 'hidden', 'value' => 1)); ?>
                                    </div>
                            </div>
			    <div class="form-group">
                                <label for="quote_id" class="col-sm-2 control-label">Descripcion</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('description',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="quote_id" class="col-sm-2 control-label">Id de cotización</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('quote_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="branch_id" class="col-sm-2 control-label">Sucursal</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('branch_id',array('class' => 'form-control', 'disabled' => 'disabled', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="payments_type_id" class="col-sm-2 control-label">Tipo de pago</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('payments_type_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <!-- /.box-body -->
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