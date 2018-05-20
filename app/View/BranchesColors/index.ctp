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
    <h1>Lista de colores<small>Lista de colores</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Colores", array("action" => "index")); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php echo $this->Html->link("<i class='fa fa-plus'></i>&nbsp;Nuevo", array("action" => "/add"), array("class" => "btn btn-primary", "escape" => false)); ?>                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Logo</th>
                                <th>Color 1</th>
                                <th>Color 2</th>
                                <th>Color 3</th>
                                <th>Sucursal</th>
                                <th>Joyería</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Estatus</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branchesColors as $branchesColor): ?>
                                <tr>
                                    <td><?php echo h($branchesColor['BranchesColor']['id']); ?></td>
                                    <td><img class="img-responsive" src="<?php echo h($fileRoute . $branchesColor['BranchesColor']['url_logo']); ?>"></td>
                                    <td>
                                        <b><?php echo h($branchesColor['BranchesColor']['text1']); ?></b><br>
                                        <b><?php echo h($branchesColor['BranchesColor']['color1']); ?></b><br>
                                    </td>
                                    <td>
                                        <b><?php echo h($branchesColor['BranchesColor']['text2']); ?></b><br>
                                        <b><?php echo h($branchesColor['BranchesColor']['color2']); ?></b><br>
                                    </td>
                                    <td>
                                        <b><?php echo h($branchesColor['BranchesColor']['text3']); ?></b><br>
                                        <b><?php echo h($branchesColor['BranchesColor']['color3']); ?></b><br>
                                    </td>
                                    <td><?php echo h($branchesColor['Branch']['name']); ?></td>
                                    <td><?php echo h($jewelryStores[$branchesColor['Branch']['id']]); ?></td>
                                    <td><?php echo h($branchesColor['BranchesColor']['created']); ?></td>
                                    <td><?php echo h($branchesColor['BranchesColor']['modified']); ?></td>
                                    <td><?php echo h($branchesColor['Status']['text']); ?></td>
                                    <td class="actions" style="text-align:center">
                                        <?php echo $this->Html->link('', array('action' => 'edit', $branchesColor['BranchesColor']['id']), array('class' => 'fa fa-edit fa-lg')); ?>
                                        &nbsp;&nbsp;
                                        <?php echo $this->Form->postLink('', array('action' => 'delete', $branchesColor['BranchesColor']['id']), array('confirm' => __('Esta seguro de eliminar el registro # %s?', $branchesColor['BranchesColor']['id']), 'class' => 'fa fa-trash-o text-red fa-lg')); ?>                            </td>
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
                    filename: 'Branches Colors',
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