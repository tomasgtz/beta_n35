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
      <li><?php echo $this->Html->link("Branches",array("action"=>"/index")); ?></li>
      <li class="active">add</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <!-- center column -->
      <div class="col-md-12">
         <!-- Horizontal Form -->
         <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Alta de registro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Branch',array('class' => 'form-horizontal')); ?>
            <div class="form-group">
               <label for="name" class="col-sm-2 control-label">name</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('name',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="due_date" class="col-sm-2 control-label">due_date</label>
               <div class="col-sm-6 required">
                  <div class="input-group date">
                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                     <?php echo $this->Form->input('due_date',array('type' => 'text', 'class' => 'form-control pull-right', 'label' => false)); ?>
                  </div>
               </div>   
            </div>
            <div class="form-group">
               <label for="phone" class="col-sm-2 control-label">phone</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('phone',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="access" class="col-sm-2 control-label">access</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('access',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="manager" class="col-sm-2 control-label">manager</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('manager',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="rfc" class="col-sm-2 control-label">rfc</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('rfc',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="street" class="col-sm-2 control-label">street</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('street',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="suburb" class="col-sm-2 control-label">suburb</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('suburb',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="postcode" class="col-sm-2 control-label">postcode</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('postcode',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="city" class="col-sm-2 control-label">city</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('city',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="state_id" class="col-sm-2 control-label">state_id</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('state_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="country_id" class="col-sm-2 control-label">country_id</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('country_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="user_id" class="col-sm-2 control-label">user_id</label>
               <div class="col-sm-6 required">
                  <?php echo $this->Form->input('user_id',array('class' => 'form-control', 'label' => false)); ?>
               </div>
            </div>
            <div class="form-group">
               <label for="jewelrystore_id" class="col-sm-2 control-label">jewelrystore_id</label>
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
      
      //Date picker
      $('#BranchDueDate').datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true
      });   
   });
</script>