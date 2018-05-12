







<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edición de registro<small>Edición de registro</small></h1>    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>
            <?php echo $this->Html->link("Pedidos", array("action" => "index")); ?>
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
                    <h3 class="box-title">Edición de Pedido # <?php echo $this->request->data['Order']['id']; ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Order', array('class' => 'form-horizontal', 'type' => 'file')); ?>
                <?php echo $this->Form->input('id',array('class' => 'form-control', 'label' => false)); ?>
                
		        <div class="form-group">
                    <label for="quote_id" class="col-sm-2 control-label">Id de cotización</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('quote_id', array('type' => 'text', 'class' => 'form-control', 'readonly' => 'readonly', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_name" class="col-sm-2 control-label">Cliente</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_name', array( 'class' => 'form-control', 'label' => false)); ?>
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
                    <label for="payment_url" class="col-sm-2 control-label">Comprobante de Pago</label>
                    <div class="col-sm-6 required">

                        <?php
                        if(isset($this->request->data['Order']['payment_url']) && !empty($this->request->data['Order']['payment_url']) ) {
                            echo $this->Html->link('Comprobante de pago', array('controller'=>'Archivos','action'=>'pagos', $this->request->data['Order']['payment_url'])); 
                            echo $this->Form->input('hasFile', array('type'=>'hidden', 'value'=>'1'));
                        } else {

                            echo $this->Form->input('hasFile', array('type'=>'hidden', 'value'=>''));
                        }
                        ?>
                        <?php echo $this->Form->input('payment_url', array('type' => 'file', 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Orders_Detail0PartNumber" class="col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-6 required">
                        <?php 
			echo $this->Form->input('Orders_Detail.0.part_number', array('class' => 'form-control', 'label' => false)); ?>
                        <?php echo $this->Form->input('Orders_Detail.0.id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Orders_Detail0Description" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.description', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0Price" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.price', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0PriceCadcam" class="col-sm-2 control-label">Precio Cadcam</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.price_cadcam', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0Quantity" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.quantity', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payments_type_id" class="col-sm-2 control-label">Tipo de pago</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('payments_type_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="service_id" class="col-sm-2 control-label">Servicio(s)</label>
                    <div class="col-sm-6 required">

                        <?php echo $this->Form->input('Order.services', array('type' => 'select', 'multiple' => 'checkbox', 
			'class' => 'multiple-chb', 'label' => false, 'options' => $services, 'selected' => $selected)); ?>
                    </div>
                </div>

        <div class="form-group">
            <label for="estimated_delivery_date" class="col-sm-2 control-label">Fecha estimada de entrega</label>
            <div class="col-sm-6">
                <?php echo $this->Form->input('estimated_delivery_date', array('type' => 'text', 'disabled'=>'disabled', 'class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="orders_phase_id" class="col-sm-2 control-label">Avance del pedido</label>
            <div class="col-sm-6 required">

                <?php echo $this->Form->input('orders_phase_id', array('disabled'=>'disabled',  'class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="status_id" class="col-sm-2 control-label">Status del registro</label>
            <div class="col-sm-6 required">

                <?php echo $this->Form->input('status_id', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="received_by" class="col-sm-2 control-label">Recibido por</label>
            <div class="col-sm-6">
                <?php echo $this->Form->input('received_by', array('type' => 'text', 'readonly'=>'readonly', 'class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => '/index'), array('class' => 'btn btn-danger', 'escape' => false)); ?> 
		
		    <?php if($this->request->data['OrdersPhase']['name'] == 'Borrador') { ?>
			    <button id="sendOrder" type="submit" class="btn btn-warning pull-right"><i class="fa fa-plus-square"></i>&nbsp;Colocar pedido</button>
			    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
		    <?php } ?>
		    
                </div>
                <!-- /.box-footer -->
		<?php echo $this->Form->input('set_order', array('type'=>'hidden')); ?>
                <?php echo $this->Form->end(); ?>          </div>
            <!-- /.box -->
        </div>
        <!--/.col (center) -->
    </div>
    <!-- /.row -->
</section>

<script type="text/javascript">
     

$(document)
.on('click', '#sendOrder', function(e) {

   $('#OrderSetOrder').val('1');
   isValid = true;

    if($('#OrderCustomerName').val().length <= 0) {
	alertify
	  .alert("Por favor complete el nombre del cliente", function(){
	    
	  });
	  isValid = false;
    }
    
    if($('#OrderCustomerEmail').val().length <= 0) {
	alertify
	  .alert("Por favor complete el email del cliente", function(){
	    
	  });
	  isValid = false;
    }

    if($('#Orders_Detail0PartNumber').val().length <= 0) {
	 alertify
	  .alert("Por favor complete el # parte solicitada", function(){
	    
	  });
	  isValid = false;
    }
    
    if($('#Orders_Detail0Price').val().length <= 0){
	alertify
	  .alert("Por favor complete el campo precio", function(){
	    
	  });
	  isValid = false;
    }
    
    if($('#Orders_Detail0Quantity').val().length <= 0) {
	alertify
	  .alert("Por favor complete el campo cantidad", function(){
	    
	  });
	  isValid = false;
    }

    var chks = $('form').find('.multiple-chb > input[type=checkbox]');
    var atLeastOneChecked = false;
    
    for(i = 0; i < chks.length; i++) {
	if (chks[i].checked) {
		atLeastOneChecked = true;
	}
    }

    if(atLeastOneChecked != true) {
	alertify
	  .alert("Por favor seleccione al menos un servicio", function(){
	    
	  });
	  isValid = false;
    }

    if($('#OrderPaymentUrl').val().length <= 0 && $('#OrderHasFile').val().length == 0) {
	alertify
	  .alert("Por favor agregue el comprobante de pago", function(){
	    
	  });
	isValid = false;
    }
	
    if($('#OrderStatusId').val() != '1') {
    alertify
      .alert("Por favor cambie el status del registro a Activo", function(){
        
      });
    isValid = false;
    }
    

    if(!isValid) {
      e.preventDefault();
    }
});

</script>