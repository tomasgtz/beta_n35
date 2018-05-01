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
        <?php echo __('Lista de Sucursales'); ?>        <small><?php echo __('Lista de Sucursales'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Sucursales", array("action" => "index")); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo", array("action" => "/add"), array("class" => "btn btn-primary", "escape" => false)); ?>                    
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Acceso</th>
                                <th>Comicilio</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Status</th>
                                <th class="actions"><?php echo 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branches as $branch): ?>
                                <tr>
                                    <td><?php echo h($branch['Branch']['id']); ?></td>
                                    <td>
                                        <?php
                                        echo "
										<b>Joyería</b>: " . $branch['Jewelrystore']['name'] . "<br>
										<b>Sucursal</b>: " . $branch['Branch']['name'] . "<br>
										<b>Encargado</b>: " . $branch['Branch']['manager'] . "<br>
										<b>Teléfono</b>: " . $branch['Branch']['phone'] . "<br>
										<b>RFC</b>: " . $branch['Branch']['rfc'] . "<br>
										<b>Fecha de vencimiento</b>: " . date_format(date_create($branch['Branch']['due_date']), "Y-m-d") . "<br>
										<b>Usuario asignado</b>: " . $branch['User']['username']
                                        ;
                                        ?>
                                    </td>
                                    <td><?php echo h($branch['Branch']['access']); ?></td>
                                    <td>
                                        <?php
                                        echo
                                        $branch['Branch']['street'] . "<br>"
                                        . $branch['Branch']['suburb'] . ", CP. " . $branch['Branch']['postcode'] . "<br>"
                                        . $branch['Branch']['city'] . ", " . $branch['State']['iso_code_3'] . "<br>"
                                        . $branch['Country']['iso_code_3'];
                                        ?>      
                                    </td>
                                    <td><?php echo h($branch['Branch']['created']); ?></td>
                                    <td><?php echo h($branch['Branch']['modified']); ?></td>
                                    <td><?php echo h($branch['Status']['text']); ?></td>
                                    <td class="actions" style="text-align:center">
                                        <?php
                                        echo
                                        $this->Html->link(
                                                '', array('action' => 'edit', $branch['Branch']['id']), array('class' => 'fa fa-edit fa-lg')
                                        );
                                        ?>
                                        &nbsp;&nbsp;
                                        <?php
                                        echo
                                        $this->Html->link(
                                                '', array('controller' => 'BranchesPayments', 'action' => 'index/branch_id:' . $branch['Branch']['id']), array('class' => 'fa fa-history text-green fa-lg')
                                        );
                                        ?>
                                        &nbsp;&nbsp;
                                        <?php
                                        echo
                                        $this->Html->link(
                                                '', array('controller' => 'Devices', 'action' => 'index/branch_id:' . $branch['Branch']['id']), array('class' => 'fa fa-laptop text-yellow fa-lg')
                                        );
                                        ?>
                                        &nbsp;&nbsp;                          
                                        <?php
                                        echo
                                        $this->Form->postLink(
                                                '', array('action' => 'delete', $branch['Branch']['id']), array(
                                            'confirm' => __('Esta seguro de eliminar la sucursal # %s?', $branch['Branch']['id']),
                                            'class' => 'fa fa-trash-o text-red fa-lg'
                                                )
                                        );
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
        var table = $('#table1').DataTable({
            dom: 'Blftip',
            buttons: [{
                    extend: 'excel',
                    filename: 'Branches',
                    exportOptions: {
                        format: {
                            body: function (data, row, col) {
                                var s = '<p>' + data + '</p>';
                                return $(s).text();
                            }
                        }

                    }
                }]
        });
    });
</script>