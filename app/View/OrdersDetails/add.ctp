
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
        <li><?php echo $this->Html->link("Orders Details",array("action"=>"/index")); ?></li>
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
            <?php echo $this->Form->create('OrdersDetail',array('class' => 'form-horizontal')); ?>
            
                            <div class="form-group">
                                <label for="part_number" class="col-sm-2 control-label">part_number</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('part_number',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">description</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('description',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="col-sm-2 control-label">quantity</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('quantity',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-sm-2 control-label">price</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('price',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="order_id" class="col-sm-2 control-label">order_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('order_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>echo $this->Form->input('Service');
                <!-- /.box-body -->
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