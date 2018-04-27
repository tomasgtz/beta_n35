<!-- bootstrap datepicker -->
<?php echo $this->Html->css('plugins/datepicker/datepicker3.css'); ?>
<!-- Select2 -->
<?php echo $this->Html->css('plugins/select2/select2.min.css'); ?>

<!-- bootstrap datepicker -->
<?php echo $this->Html->script('plugins/datepicker/bootstrap-datepicker.js'); ?>
<!-- Select2 -->
<?php echo $this->Html->script('plugins/select2/select2.full.min.js'); ?>

<script type="text/javascript">
$(document).ready(function() {
  //Initialize Select2 Elements
$('#OrderEstatusRegistroId').select2();

});  
</script>

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php echo __('Edición De  Order'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- right column -->
        <div class="col-md-6">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="orders form">
              <?php echo $this->Form->create('Order'); ?>
              <fieldset>
                
<?php echo $this->Html->div('form-group',$this->Form->input('id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('customer_name',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','customer_name')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('customer_email',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','customer_email')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('customer_phone',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','customer_phone')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('comments',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','comments')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('payment_url',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','payment_url')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('received_by',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','received_by')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('estimated_delivery_date',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','estimated_delivery_date')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('quote_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','quote_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('branch_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','branch_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('payments_type_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','payments_type_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('orders_phase_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','orders_phase_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('created_user_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','created_user_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('modified_user_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','modified_user_id')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('status_id',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','status_id')))); ?>

              </fieldset>

              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="getElementById('OrderEditForm').reset()" >Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Guardar</button>
              </div>
              <?php echo $this->Form->end(); ?>

              </div>
              <div class="actions">
                <h3><?php echo __('Acciones'); ?></h3>
                <ul>
                  <li><?php echo $this->Html->link(__('Mostrar Orders'), array('action' => 'index')); ?></li>
                              </ul>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->