<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo "<?php echo __('Lista de '.'{$pluralHumanName}'); ?>"; ?>
        <small><?php echo "<?php echo __('Lista de '.'{$pluralHumanName}'); ?>"; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo "<?php echo \$this->Html->link(\"{$pluralHumanName}\",array(\"action\"=>\"/index\")); ?>"?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
<?php echo "<?php echo \$this->Html->link(\"<i class='fa fa-plus'></i>&nbsp;Nuevo\",array(\"action\"=>\"/add\"),array(\"class\"=>\"btn btn-primary\",\"escape\"=>false)); ?>"?>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <?php foreach ($fields as $field): ?>
                                <th><?php echo $field; ?></th>
                                <?php endforeach; ?>
                                <th class="actions"><?php echo "<?php echo 'acciones'; ?>"; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                            echo "<tr>\n";
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
                                    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
                                }
                            }
                            ?>
                            <td class="actions" style="text-align:center">
<?php
echo "<?php echo \$this->Html->link('',array('action'=>'edit',\${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'fa fa-edit fa-lg')); ?>\n";
?>
&nbsp;&nbsp;
<?php
echo "<?php echo \$this->Form->postLink('',array('action'=>'delete',\${$singularVar}['{$modelClass}']['{$primaryKey}']),array('confirm'=>__('Esta seguro de eliminar la dirección # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>";
?>
                            </td>
                            </tr>
                            <?php echo "<?php endforeach; ?>\n"; ?>
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
<?php

echo 
"<script>
$(document).ready(function() {
  var table = $('#table1').DataTable({
      dom: 'Blftip',
      buttons: [{
          extend: 'excel',
          filename: '{$pluralHumanName}',
          exportOptions: {
              format: {
                  body: function(data, row, col) {
                      var s = '<p>' + data + '</p>';
                      return $(s).text();
                  }
              }

          }
      }]
  });
});
</script>";
?>