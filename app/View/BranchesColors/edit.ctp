<?php
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');
echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
echo $this->Html->css('/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');
?><!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edición de registro<small>Edición de registro</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Colors", array("action" => "index")); ?></li>
        <li class="active">edit</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- center column -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Editando registro #<?php echo $this->request->data['BranchesColor']['id']; ?></h3>            </div>
                <!-- /.box-header -->
                <!-- form start -->
                <br>
                <div class="box-body">
                    <?php echo $this->Form->create('BranchesColor', array('type' => 'file')); ?>
                    <?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>
                    <?php if ($this->request->data['BranchesColor']['url_logo'] !== 'no_image.png') : ?>
                        <div class="form-group">
                            <label for="url_banner"></label>
                            <?php echo $this->Html->link('<i class="fa fa-download fa-3x"></i>&nbspDescargar ' . $this->request->data['BranchesColor']['url_logo'], array('action' => 'download', $this->request->data['BranchesColor']['url_logo']), array('escape' => false)); ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="url_logo">Logo</label>
                        <?php echo $this->Form->input('url_logo', array('type' => 'file', 'class' => 'form-control', 'label' => false)); ?>
                    </div>
                    <div class="form-group">
                        <label for="text1">Texto 1</label>
                        <?php echo $this->Form->input('text1', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                    <div class="form-group">
                        <label for="color1">Color 1</label>
                        <div class="input-group mycolorpicker01">
                            <?php echo $this->Form->input('color1', array('class' => 'form-control', 'label' => false)); ?>
                            <div class="input-group-addon"><i></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text2">Texto 2</label>
                        <?php echo $this->Form->input('text2', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                    <div class="form-group">
                        <label for="color2">Color 2</label>
                        <div class="input-group mycolorpicker02">
                            <?php echo $this->Form->input('color2', array('class' => 'form-control', 'label' => false)); ?>
                            <div class="input-group-addon"><i></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text3">Texto 3</label>
                        <?php echo $this->Form->input('text3', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                    <div class="form-group">
                        <label for="color3">Color 3</label>
                        <div class="input-group mycolorpicker03">
                            <?php echo $this->Form->input('color3', array('class' => 'form-control', 'label' => false)); ?>
                            <div class="input-group-addon"><i></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch_id">Sucursal</label>
                        <?php echo $this->Form->input('branch_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                    <div class="form-group">
                        <label for="status_id">status_id</label>
                        <?php echo $this->Form->input('status_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>                <!-- /.box-body -->
                    <div class="box-footer">
                        <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                    </div>
                    <!-- /.box-footer -->
                    <?php echo $this->Form->end(); ?>          
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (center) -->
    </div>
    <!-- /.row -->
</section>

<script type="text/javascript">
    $(document).ready(function () {
        //color picker with addon
        $('.mycolorpicker01').colorpicker();
        $('.mycolorpicker02').colorpicker();
        $('.mycolorpicker03').colorpicker();
        //Initialize Select2 Elements
        $('#BranchesColorBranchId').select2();
        $('#BranchesColorStatusId').select2();
    });
</script>