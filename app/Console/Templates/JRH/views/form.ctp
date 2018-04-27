<?php
$code = "
<?php 
echo \$this->Html->script('/plugins/iCheck/icheck.min.js');
echo \$this->Html->css('/plugins/iCheck/all.css');

echo \$this->Html->css('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');
echo \$this->Html->script('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');

echo \$this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo \$this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?>";
echo $code;

$textoEncabezado = ($action === 'add') ? "Alta de registro" : "Edición de registro";
$ignoreFields = array('created', 'created_user_id', 'modified', 'modified_user_id');
$code02 = 
"
<?php
echo \$this->Html->div(
    'form-group',
    \$this->Form->input(
        '{$field}',
        array(
            'class' => 'form-control',
            'placeholder' => 'Escribe tu '.str_replace('_',' ','{$field}')
        )
    )
);
?>
";

?>

<script type="text/javascript">
    $(document).ready(function () {
<?php
if ($action === 'edit') {
    echo "//Initialize Select2 Elements\n";
    echo "$('#" . $singularHumanName . "StatusId').select2();\n";
}
?>
    });
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $textoEncabezado; ?>
        <small><?php echo $textoEncabezado; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- center column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo "<?php echo \$this->Form->create('{$modelClass}',array('class' => 'form-horizontal')); ?>\n"; ?>
                <?php
                $labelOptions = array('class' => 'col-sm-2 control-label');
                $inputOptions = array('div' => 'col-sm-6', 'class' => 'form-control', 'label' => false);
                ?>
                <div class="box-body">
                    <?php
                    foreach ($fields as $field) {
                        if (strpos($action, 'add') !== false && $field === $primaryKey) {
                            continue;
                        } elseif (!in_array($field, $ignoreFields)) {
                            if ($action === 'add' && $field == 'status_id') {
                                
                            } else {
                                echo $code02;
                            }
                        }
                    }
                    if (!empty($associations['hasAndBelongsToMany'])) {
                        foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                            echo "echo \$this->Form->input('{$assocName}');\n";
                        }
                    }
                    ?>





                    <div class="form-group">
                        <?php echo $this->Form->label('entry_street_address', 'Calle', $labelOptions) . $this->Form->input('entry_street_address', $inputOptions); ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $this->Form->label('entry_postcode', 'Código Postal', $labelOptions) . $this->Form->input('entry_postcode', array('type' => 'number', 'div' => 'col-sm-6', 'class' => 'form-control', 'label' => false)
                        );
                        ?>
                    </div>                
                    <div class="form-group">
                        <?php echo $this->Form->label('entry_suburb', 'Colonia', $labelOptions) . $this->Form->input('entry_suburb', $inputOptions); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('entry_city', 'Ciudad', $labelOptions) . $this->Form->input('entry_city', $inputOptions); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('entry_state', 'Estado', $labelOptions) . $this->Form->input('entry_state', $inputOptions); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('es_direccion_default_envio', '¿Es dirección predeterminada?', $labelOptions); ?>
                        <?php echo $this->Form->checkbox('es_direccion_default_envio', array('class' => 'col-sm-6 flat-red')); ?>
                    </div>
                    <?php echo $this->Form->input('address_book_id'); ?>
                    <?php echo $this->Form->hidden('customers_id'); ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php
                    echo $this->Html->link(
                            '<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar'
                            , array('action' => '/index')
                            , array('class' => 'btn btn-danger', 'escape' => false)
                    );
                    ?>
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
<!-- /.content -->
<!-- iCheck 1.0.1 -->
<?php echo $this->Html->script("/plugins/iCheck/icheck.min.js"); ?>

<script>
    $(document).ready(function () {
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $(".error-message").each(function (i, v) {
            var mensaje = $(this).html();
            $(this).html('<span style="color:#dd4b39"><i class="fa fa-times-circle-o"></i>' + mensaje + '</label>')
        });

    });
</script>



<!-- ------------------------------------------------------------------------ -->
<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php
        echo ($action === 'add') ? "Alta de registro" : "Edición de registro";
        ?>
    </h1>
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
                    <div class="<?php echo $pluralVar; ?> form">
                        <?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
                        <fieldset>
                            <?php
                            foreach ($fields as $field) {
                                if (strpos($action, 'add') !== false && $field === $primaryKey) {
                                    continue;
                                } elseif (!in_array($field, array('created', 'created_user_id', 'modified', 'modified_user_id'))) {
                                    if ($action === 'add' && $field == 'status_id') {
                                        
                                    } else {
                                        echo "
<?php echo \$this->Html->div('form-group',\$this->Form->input('{$field}',array('class'=>'form-control','placeholder' => 'Escribe tu '.str_replace('_',' ','{$field}')))); ?>\n";
                                    }
                                }
                            }
                            if (!empty($associations['hasAndBelongsToMany'])) {
                                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                                    echo "\t\techo \$this->Form->input('{$assocName}');\n";
                                }
                            }
                            ?>

                        </fieldset>

                        <div class="box-footer">
                            <button type="button" class="btn btn-default" onclick="getElementById(<?php echo "'" . $modelClass . ucfirst($action) . 'Form' . "'"; ?>).reset()" >Cancelar</button>
                            <button type="submit" class="btn btn-info pull-right">Guardar</button>
                        </div>
                        <?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>

                    </div>
                    <div class="actions">
                        <h3><?php echo "<?php echo __('Acciones'); ?>"; ?></h3>
                        <ul>
                            <li><?php echo "<?php echo \$this->Html->link(__('Mostrar " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
                            <?php
                            /**
                              $done = array();
                              foreach ($associations as $type => $data) {
                              foreach ($data as $alias => $details) {
                              if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                              echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
                              echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
                              $done[] = $details['controller'];
                              }
                              }
                              }
                             */
                            ?>
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