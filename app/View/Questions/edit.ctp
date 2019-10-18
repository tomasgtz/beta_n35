
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
        <li><?php echo $this->Html->link("Preguntas",array("action"=>"/index")); ?></li>
        <li class="active">Editar</li>    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Editando registro #<?php echo $this->request->data['Question']['id']; ?></h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Question',array('class' => 'form-horizontal')); ?>
            <?php echo $this->Form->input('id',array('class' => 'form-control', 'label' => false)); ?>
                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">Numero</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('number',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-sm-2 control-label">Texto</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('text',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="querstionary_type" class="col-sm-2 control-label">Tipo de cuestionario</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('querstionary_type',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">Categoria</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('category',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="domain" class="col-sm-2 control-label">Dominio</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('domain',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="dimension" class="col-sm-2 control-label">Dimension</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('dimension',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="r_always" class="col-sm-2 control-label">Siempre</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('r_always',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="r_almost_always" class="col-sm-2 control-label">Casi siempre</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('r_almost_always',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="r_sometimes" class="col-sm-2 control-label">Algunas veces</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('r_sometimes',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="r_almost_never" class="col-sm-2 control-label">Casi nunca</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('r_almost_never',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="r_never" class="col-sm-2 control-label">Nunca</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('r_never',array('class' => 'form-control', 'label' => false)); ?>
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
$('#QuestionStatusId').select2();
    });
</script>