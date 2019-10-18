
<?php 
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Centro de Trabajo<small>Edición de registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Centros de trabajo",array("action"=>"/index")); ?></li>
        <li class="active">editar</li>    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">* Favor de llenar todos los campos. Favor de llenar correctamente el campo <strong>Numero de empleados</strong>, ya que este se usar&aacute; para calcular el numero de evaluaciones </h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Jobcenter',array('class' => 'form-horizontal')); ?>
            <?php echo $this->Form->input('id',array('class' => 'form-control', 'label' => false)); ?>
                            <div class="form-group">
                                <label for="company_id" class="col-sm-2 control-label">Empresa</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('company_id',array('class' => 'form-control', 'label' => false, 'readonly' => 'readonly')); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre del centro de trabajo</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_street" class="col-sm-2 control-label">Calle</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_street',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_num_ext" class="col-sm-2 control-label">Numero exterior</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_num_ext',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_num_int" class="col-sm-2 control-label">Numero interior</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_num_int',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_zip" class="col-sm-2 control-label">Codigo postal</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_zip',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_col" class="col-sm-2 control-label">Colonia</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_col',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="address_city" class="col-sm-2 control-label">Ciudad</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('address_city',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="state_id" class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('state_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="main_activity" class="col-sm-2 control-label">Actividad principal</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('main_activity',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="rfc" class="col-sm-2 control-label">RFC</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('rfc',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('telephone',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="no_employees" class="col-sm-2 control-label">Numero de empleados (en este centro de trabajo)</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('no_employees',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="status_id" class="col-sm-2 control-label">Estatus</label>
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
$('#JobcenterStatusId').select2();
    });
</script>