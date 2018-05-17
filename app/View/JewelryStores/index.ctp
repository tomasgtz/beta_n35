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
        <?php echo __('Lista de Joyerías'); ?>        <small><?php echo __('Lista de Joyerías'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><?php echo $this->Html->link("Joyerías", array("action" => "index")); ?></li>
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
                                <th>Joyería</th>
                                <th>Domicilio</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Status</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jewelryStores as $jewelryStore): ?>
                                <tr>
                                    <td><?php echo h($jewelryStore['JewelryStore']['id']); ?></td>
                                    <td>
                                        <?php
                                        echo "
										<b>Nombre</b>: " . $jewelryStore['JewelryStore']['name'] . "<br>
                                        <b>Razón Social</b>: " . $jewelryStore['JewelryStore']['legal_name'] . "<br>
										<b>Encargado</b>: " . $jewelryStore['JewelryStore']['manager'] . "<br>
										<b>Teléfono</b>: " . $jewelryStore['JewelryStore']['phone'] . "<br>
										<b>Email</b>: " . $jewelryStore['JewelryStore']['email'] . "<br>
										<b>RFC</b>: " . $jewelryStore['JewelryStore']['rfc'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo
                                        $jewelryStore['JewelryStore']['street'] . "<br>"
                                        . $jewelryStore['JewelryStore']['suburb'] . ", CP. " . $jewelryStore['JewelryStore']['postcode'] . "<br>"
                                        . $jewelryStore['JewelryStore']['city'] . ", " . $jewelryStore['State']['iso_code_3'] . "<br>"
                                        . $jewelryStore['Country']['iso_code_3'];
                                        ?>      
                                    </td>
                                    <td><?php echo h($jewelryStore['JewelryStore']['created']); ?></td>
                                    <td><?php echo h($jewelryStore['JewelryStore']['modified']); ?></td>
                                    <td><?php echo ($jewelryStore['Status']['text']); ?></td>
                                    <td class="actions" style="text-align:center">
                                        <?php echo $this->Html->link('', array('action' => 'edit', $jewelryStore['JewelryStore']['id']), array('class' => 'fa fa-edit fa-lg', 'title' => 'Editar')); ?>
                                        &nbsp;&nbsp;
                                        <?php echo $this->Form->postLink('', array('action' => 'delete', $jewelryStore['JewelryStore']['id']), array('confirm' => __('Esta seguro de eliminar la joyería # %s?', $jewelryStore['JewelryStore']['id']), 'class' => 'fa fa-trash-o text-red fa-lg', 'title' => 'Eliminar')); ?>                            
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
                    filename: 'Jewelry Stores',
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