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

$textHeader = ($action === 'add') ? "Alta de registro" : "Edición de registro";
$ignoreFields = array('created', 'created_user_id', 'modified', 'modified_user_id');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <?php echo "<h1>".$textHeader."<small>".$textHeader."</small></h1>"; ?>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo "<?php echo \$this->Html->link(\"{$pluralHumanName}\",array(\"action\"=>\"/index\")); ?>"?></li>
        <?php
        if($action == 'add' || $action == 'edit' || $action == 'view' ){
            echo "<li class=\"active\">$action</li>";
        }
        ?>
    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <?php 
                if($action == 'add'){
                    echo "<h3 class=\"box-title\">".$textHeader."</h3>";
                } else {
                    echo "<h3 class=\"box-title\"> Editando registro #"."<?php echo \$this->request->data['{$modelClass}']['id']; ?>"."</h3>";
                }
              ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <?php echo "<?php echo \$this->Form->create('{$modelClass}',array('class' => 'form-horizontal')); ?>\n"; ?>
            <?php
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field === $primaryKey) {
                    continue;
                } elseif (!in_array($field, $ignoreFields)) {
                    if ($action === 'add' && $field == 'status_id') {
                        
                    } else {
                        if ($action == "edit" && $field == $primaryKey){
                            echo "<?php echo \$this->Form->input('{$field}',array('class' => 'form-control', 'label' => false)); ?>";
                        } else {
                            echo "
                            <div class=\"form-group\">
                                <label for=\"{$field}\" class=\"col-sm-2 control-label\">{$field}</label>
                                    <div class=\"col-sm-6 required\">
                                        <?php echo \$this->Form->input('{$field}',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>";
                        }

                    }
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "echo \$this->Form->input('{$assocName}');\n";
                }
            }
            ?>
                <!-- /.box-body -->
              <div class="box-footer">
<?php echo "<?php echo \$this->Html->link('<i class=\"fa fa-arrow-circle-left\"></i>&nbsp;Cancelar',array('action' => '/index'),array('class' => 'btn btn-danger', 'escape' => false)); ?>"; ?>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              </div>
              <!-- /.box-footer -->
            <?php echo "<?php echo \$this->Form->end(); ?>"; ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (center) -->
      </div>
      <!-- /.row -->
    </section>

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