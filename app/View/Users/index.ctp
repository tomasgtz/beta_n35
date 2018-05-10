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
        <?php echo __('Lista de Usuarios'); ?>        <small><?php echo __('Lista de Usuarios'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Usuarios", array("action" => "/index")); ?></li>
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
                                <th>id</th>
                                <th>Usuario</th>
                                <th>Sucursal</th>
                                <th>Status sucursal</th>
                                <th>Rol</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Status</th>
                                <th class="actions" style="text-align: center"><?php echo 'Acciones'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo h($user['User']['id']); ?></td>
                                    <td><?php echo h($user['User']['username']); ?></td>
                                    <td><?php if(isset($user['Branch'][0]['name']))echo h($user['Branch'][0]['name']); ?></td>
                                    <td><?php if(isset($user['Branch'][0]['Status']['text']))echo h($user['Branch'][0]['Status']['text']); ?></td>
                                    <td><?php echo h($user['User']['role']); ?></td>
                                    <td><?php echo h($user['User']['created']); ?></td>
                                    <td><?php echo h($user['User']['modified']); ?></td>
                                    <td><?php echo h($user['Status']['text']); ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link('', array('action' => 'edit', $user['User']['id']), array('title' => 'Editar', 'class' => 'fa fa-edit fa-lg')); ?>
                                        <?php
                                        /**                                            
                                            if($user['Branch'][0]['id'] == null){
                                                $user['Branch'][0]['id'] = '';
                                            }
                                            if(!empty($user['Branch'][0]['id'])){
                                                echo "&nbsp;&nbsp;";
                                                echo $this->Html->link('', array('controller' => 'Branches', 'action' => 'edit', $user['Branch'][0]['id']), array('title' => 'Eliminar', 'class' => 'fa fa-address-book-o text-green fa-lg'));
                                            }
                                        */
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
                    filename: 'Users',
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