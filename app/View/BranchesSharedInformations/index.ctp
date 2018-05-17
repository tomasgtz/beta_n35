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
    <h1>Lista de url's compartidas<small>Lista de url's compartidas</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Url's compartidas", array("action" => "index")); ?></li>
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
                        // debug($options);
                        if ($options['allowAdd'] == 1) {
                            echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo", array("action" => "add"), array("class" => "btn btn-primary", "escape" => false));
                        }
                        ?>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Joyería</th>
                                <th>Sucursal</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Estatus</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branchesSharedInformations as $branchesSharedInformation): ?>
                                <tr>
                                    <td><?php echo h($branchesSharedInformation['BranchesSharedInformation']['id']); ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo h($branchesSharedInformation['BranchesSharedInformation']['url']); ?>"><?php echo h($branchesSharedInformation['BranchesSharedInformation']['title']); ?></a>
                                    </td>

                                    <td><?php 
   
                                    echo h($branchesSharedInformation['BranchesSharedInformation']['text1']); ?></td>
                                    <td><?php echo h($jewelryStores[$branchesSharedInformation['Branch']['id']]); ?></td>
                                    <td><?php echo h($branchesSharedInformation['Branch']['name']); ?></td>
                                    <td><?php echo h($branchesSharedInformation['BranchesSharedInformation']['created']); ?></td>
                                    <td><?php echo h($branchesSharedInformation['BranchesSharedInformation']['modified']); ?></td>
                                    <td><?php echo h($branchesSharedInformation['Status']['text']); ?></td>
                                    <td class="actions" style="text-align:center">
                                        <?php
                                        if ($options['allowEdit'] == 1) {
                                            echo $this->Html->link('', array('action' => 'edit', $branchesSharedInformation['BranchesSharedInformation']['id']), array('class' => 'fa fa-edit fa-lg'));
                                        }
                                        ?>
                                        &nbsp;&nbsp;
                                        <?php
                                        if ($options['allowAdd'] == 1) {
                                            echo $this->Form->postLink('', array('action' => 'delete', $branchesSharedInformation['BranchesSharedInformation']['id']), array('confirm' => __('Esta seguro de eliminar el registro # %s?', $branchesSharedInformation['BranchesSharedInformation']['id']), 'class' => 'fa fa-trash-o text-red fa-lg'));
                                        }
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
                    filename: 'Branches Shared Informations',
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