<?php 
   echo $this->Html->script('/plugins/iCheck/icheck.min.js');
   echo $this->Html->css('/plugins/iCheck/all.css');
   echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
   echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
   echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
   echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?>
<style type="text/css">input#JewelryStoreRfc{text-transform: uppercase;}</style>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>Alta de registro<small>Alta de registro</small></h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li><?php echo $this->Html->link("Sucursales",array("action"=>"index")); ?></li>
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
               <h3 class="box-title">Nueva sucursal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Branch',array('class' => 'form-horizontal')); ?>
            <div class="form-group">
               <label for="name" class="col-sm-2 control-label">Nombre</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('name',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="due_date" class="col-sm-2 control-label">Fecha de vencimiento</label>
               <div class="col-sm-6 required">
                  <div class="input-group date">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <?php echo $this->Form->input('due_date',array('type' => 'text', 'class' => 'form-control pull-right', 'label' => false)); ?>
                  </div>
               </div>   
            </div>
            <div class="form-group">
               <label for="phone" class="col-sm-2 control-label">Teléfono</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('phone',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="access" class="col-sm-2 control-label">Acceso</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('access',array( 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="manager" class="col-sm-2 control-label">Encargado</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('manager',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="manager" class="col-sm-2 control-label">Plaza comercial</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shopping_mall',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="manager" class="col-sm-2 control-label">No. de local</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('store_number',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
                 <label for="legal_name" class="col-sm-2 control-label">Razón social</label>
                 <div class="col-sm-6 required">
                     <?php echo $this->Form->input('legal_name', array('class' => 'form-control', 'label' => false)); ?>
                 </div>
             </div>
            <div class="form-group">
               <label for="rfc" class="col-sm-2 control-label">RFC</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('rfc',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="street" class="col-sm-2 control-label">Calle</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('street',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="suburb" class="col-sm-2 control-label">Colonia</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('suburb',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="postcode" class="col-sm-2 control-label">Código Postal</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('postcode',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="city" class="col-sm-2 control-label">Ciudad</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('city',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="state_id" class="col-sm-2 control-label">Estado</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('state_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="country_id" class="col-sm-2 control-label">País</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('country_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_street" class="col-sm-2 control-label">Calle de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_street',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_suburb" class="col-sm-2 control-label">Colonia de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_suburb',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_postcode" class="col-sm-2 control-label">Código Postal de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_postcode',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_city" class="col-sm-2 control-label">Ciudad de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_city',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_state_id" class="col-sm-2 control-label">Estado de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_state_id',array('type'=>'select', 'class' => 'form-control', 'label' => false, 'options'=>$states)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="shipping_country_id" class="col-sm-2 control-label">País de Envío</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('shipping_country_id',array('type'=>'select', 'class' => 'form-control', 'label' => false, 'options'=> $countries)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="user_id" class="col-sm-2 control-label">Usuario asignado</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('user_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="jewelrystore_id" class="col-sm-2 control-label">Joyería</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('jewelrystore_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar',array('action' => '/index'),array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
            </div>
            <!-- /.box-footer -->
            <?php echo $this->Form->end(); ?>          
         </div>
         <!-- /.box -->
      </div>
      <!--/.col (center) -->
   </div>
   <!-- /.row -->
</section>
<script type="text/javascript">
   $(document).ready(function () {
      //Initialize Select2 Elements
      $('#BranchStatusId').select2();
      $('#BranchStateId').select2();
      $('#BranchCountryId').select2();
      $('#BranchJewelrystoreId').select2();
      $('#BranchUserId').select2();
      $('#BranchShippingStateId').select2();
      $('#BranchShippingCountryId').select2();
      
      //Date picker
      $('#BranchDueDate').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true
      });   
   });
</script>