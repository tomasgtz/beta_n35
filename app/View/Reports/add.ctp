
<?php 
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Alta de registro<small>Alta de registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Reportes",array("action"=>"/index")); ?></li>
        <li class="active">add</li>    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Alta de registro</h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo $this->Form->create('Report',array('class' => 'form-horizontal')); ?>
            
                            <div class="form-group">
                                <label for="company_id" class="col-sm-2 control-label">company_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('company_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="jobcenter_id" class="col-sm-2 control-label">jobcenter_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('jobcenter_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="law_code" class="col-sm-2 control-label">law_code</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('law_code',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="law_name" class="col-sm-2 control-label">law_name</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('law_name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="verifier_name" class="col-sm-2 control-label">verifier_name</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('verifier_name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="verification_date" class="col-sm-2 control-label">verification_date</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('verification_date',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="results_date_valid" class="col-sm-2 control-label">results_date_valid</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('results_date_valid',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="issued_place" class="col-sm-2 control-label">issued_place</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('issued_place',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="issued_date" class="col-sm-2 control-label">issued_date</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('issued_date',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="SCTPS_number" class="col-sm-2 control-label">SCTPS_number</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('SCTPS_number',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="method" class="col-sm-2 control-label">method</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('method',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="result_category" class="col-sm-2 control-label">result_category</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('result_category',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="result_domain" class="col-sm-2 control-label">result_domain</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('result_domain',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="result_dimension" class="col-sm-2 control-label">result_dimension</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('result_dimension',array('class' => 'form-control', 'label' => false)); ?>
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