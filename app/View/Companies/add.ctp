
<?php 
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Empresa<small>Nuevo registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Companies",array("action"=>"/index")); ?></li>
        <li class="active">add</li>    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">* Favor de llenar todos los campos. Ponga especial atencion en el campo <strong>Numero de centros de trabajo</strong>, ya que se usar&aacute; para crear cada centro de trabajo</h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Company',array('class' => 'form-horizontal')); ?>
            
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Razon social</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="no_employees" class="col-sm-2 control-label">Numero de empleados</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('no_employees',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="no_jobcenters" class="col-sm-2 control-label">Numero de centros de trabajo</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('no_jobcenters',array('class' => 'form-control', 'label' => false)); ?>
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
            });
</script>