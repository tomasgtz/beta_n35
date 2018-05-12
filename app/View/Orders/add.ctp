<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Alta de registro<small>Alta de registro</small></h1>    
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
                    <h3 class="box-title">Nuevo Pedido desde la cotizacion # <?php echo $this->request->data['Quote']['id']; ?></h3>            </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Order', array('class' => 'form-horizontal', 'type' => 'file')); ?>
		
		<div class="form-group">
                    <label for="branch_id" class="col-sm-2 control-label">Sucursal</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('branch_id', array('type' => 'text', 'class' => 'form-control', 'readonly' => 'readonly', 'label' => false)); ?>
                    </div>
                </div>
                
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
                        <?php echo $this->Form->input('payment_url', array('type' => 'file', 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Orders_Detail0PartNumber" class="col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-6 required">
                        <?php 
			echo $this->Form->input('Orders_Detail.0.part_number', array('class' => 'form-control', 'label' => false)); ?>
                        <?php echo $this->Form->input('quantity', array('type' => 'hidden', 'value' => 1)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Orders_Detail0Description" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.description', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0Quantity" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.quantity', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0Price" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.price', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
		<div class="form-group">
                    <label for="Orders_Detail0PriceCadcam" class="col-sm-2 control-label">Precio CadCam</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('Orders_Detail.0.price_cadcam', array('class' => 'form-control', 'label' => false)); ?>
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

                        <?php echo $this->Form->input('service_id', array('type' => 'select', 'multiple' => 'checkbox', 'class' => 'multiple-chb', 'label' => false, 'selected' => $selected)); ?>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => '/index'), array('class' => 'btn btn-danger', 'escape' => false)); ?>
                    <?php if($user_role <> 'admin') { 
                    ?> 
		              <button id="sendOrder" type="submit" class="btn btn-warning pull-right"><i class="fa fa-plus-square"></i>&nbsp;Colocar pedido</button>
                    <?php } ?>
		    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
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
    $(document).ready(function () {
        $('#sendOrder').click(function() {
	   $('#OrderSetOrder').val('1');
	});
 
    });
 

$(document)
.on('click', 'form button[type=submit]', function(e) {
    
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

    if($('#OrderPaymentUrl').val().length <= 0) {
	alertify
	  .alert("Por favor agregue el comprobante de pago", function(){
	    
	  });
	isValid = false;
    }
	
    if(!isValid) {
      e.preventDefault();
    }
});

</script>