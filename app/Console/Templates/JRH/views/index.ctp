<!-- DataTables -->
<!-- styles -->
<?php echo "<?php echo \$this->Html->css('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" ?>
<!-- scripts -->
<?php echo "<?php echo \$this->Html->script('/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>" ?>
<?php echo "<?php echo \$this->Html->script('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>" ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo "<?php echo __('Lista de '.'{$pluralHumanName}'); ?>"; ?>
        <small><?php echo "<?php echo __('Lista de '.'{$pluralHumanName}'); ?>"; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php
                        $c = '<?php 
                        $button = \'<i class="fa fa-plus-square"></i>&nbsp;Nuevo registro\';
                        $action = array("action" => "/add");
                        $option1 = array("class" => "btn btn-primary", "escape" => false);
                        echo $this->Html->link($button, $action, $option1);
                    ?>
                    ';
                        echo $c;
                        ?>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <?php foreach ($fields as $field): ?>
                                    <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                                <?php endforeach; ?>
                                <th class="actions"><?php echo "<?php echo __('Acciones'); ?>"; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                            echo "\t<tr>\n";
                            foreach ($fields as $field) {
                                $isKey = false;
                                if (!empty($associations['belongsTo'])) {
                                    foreach ($associations['belongsTo'] as $alias => $details) {
                                        if ($field === $details['foreignKey']) {
                                            $isKey = true;
                                            echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                            break;
                                        }
                                    }
                                }
                                if ($isKey !== true) {
                                    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                                }
                            }

                            echo "<td class=\"actions\" style=\"text-align:center\">\n";
                            echo "<?php echo \$this->Html->link(\"<i class='fa fa-edit'></i>\" , array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>&nbsp;\n";
                            echo "<?php echo \$this->Form->postLink(\"<i class='fa fa-trash-o'></i>\", array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('confirm' => __('Esta seguro de eliminar la dirección # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']), 'class' => 'btn btn-danger btn-xs', 'escape' => false)); ?>";
                            echo "</td>\n";
                            echo "</tr>\n";
                            echo "<?php endforeach; ?>\n";
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>