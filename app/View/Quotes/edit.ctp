
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
        <li><?php echo $this->Html->link("Quotes", array("action" => "/index")); ?></li>
        <li class="active">edit</li>    </ol>    
</section>

<section class="content">
    <div class="row">
        <!-- center column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Editando folio #<?php echo $this->request->data['Quote']['id']; ?></h3>            </div>
                <!-- /.box-header -->
                <!-- form start -->
                <br>
                <?php echo $this->Form->create('Quote', array('class' => 'form-horizontal')); ?>
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => false)); ?>
                <div class="form-group">
                    <label for="customer_name" class="col-sm-2 control-label">customer_name</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_name', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_email" class="col-sm-2 control-label">customer_email</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_email', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_phone" class="col-sm-2 control-label">customer_phone</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('customer_phone', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments" class="col-sm-2 control-label">comments</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('comments', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="branch_id" class="col-sm-2 control-label">branch_id</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('branch_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_id" class="col-sm-2 control-label">status_id</label>
                    <div class="col-sm-6 required">
                        <?php echo $this->Form->input('status_id', array('class' => 'form-control', 'label' => false)); ?>
                    </div>
                </div>                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar', array('action' => '/index'), array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
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
        $('#QuoteStatusId').select2();
    });
</script>