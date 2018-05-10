<?php
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Alta de registro<small>Alta de registro</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Banners", array("action" => "index")); ?></li>
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
                    <h3 class="box-title">Nuevo banner</h3>            
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <br>
                <?php echo $this->Form->create('BranchesBanner', array('class' => 'form-horizontal', 'type' => 'file')); ?>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="url_banner" class="col-sm-2 control-label">Banner</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('url_banner', array('class' => 'form-control', 'type' => 'file', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="col-sm-2 control-label">Texto 1</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('text1', array('required' => false, 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text2" class="col-sm-2 control-label">Texto 2</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('tex2', array('required' => false, 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text3" class="col-sm-2 control-label">Texto 3</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('text3', array('required' => false, 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="branch_id" class="col-sm-2 control-label">Sucursal</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('branch_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger', 'escape' => false)); ?>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
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
        $('#BranchesBannerBranchId').select2();
    });
</script>