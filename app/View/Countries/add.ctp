
<?php 
echo $this->Html->script('/plugins/iCheck/icheck.min.js');
echo $this->Html->css('/plugins/iCheck/all.css');

echo $this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo $this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');

echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?>
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>

<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Alta de registro    </h1>
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
                    <div class="countries form">
                        <?php echo $this->Form->create('Country'); ?>
                        <fieldset>
                            
<?php echo $this->Html->div('form-group',$this->Form->input('name',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','name')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('iso_code_2',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','iso_code_2')))); ?>

<?php echo $this->Html->div('form-group',$this->Form->input('iso_code_3',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','iso_code_3')))); ?>

                        </fieldset>

                        <div class="box-footer">
                            <button type="button" class="btn btn-default" onclick="getElementById('CountryAddForm').reset()" >Cancelar</button>
                            <button type="submit" class="btn btn-info pull-right">Guardar</button>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                    <div class="actions">
                        <h3><?php echo __('Acciones'); ?></h3>
                        <ul>
                            <li><?php echo $this->Html->link(__('Mostrar Countries'), array('action' => 'index')); ?></li>
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