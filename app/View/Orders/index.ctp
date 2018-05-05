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
<?php
echo $this->Html->css('/bower_components/select2/dist/css/select2.min.css');
echo $this->Html->script('/bower_components/select2/dist/js/select2.full.min.js');
?>
<!-- Content header -->
<section class="content-header">
    <h1><?php echo __('Lista de Pedidos'); ?><small><?php echo __('Lista de Pedidos'); ?></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pedidos</li>
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
                        $button = '<i class="fa fa-plus-square"></i>&nbsp;Nuevo registro';
                        $action = array("action" => "/add");
                        $option1 = array("class" => "btn btn-primary", "escape" => false);
                        echo $this->Html->link($button, $action, $option1);
                        ?>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Cliente</th>
                                <th>Comentarios</th>
                                <th>F.estimada entrega</th>
                                <th>Sucursal</th>
                                <th>Status pedido</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Status</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?php echo h($order['Order']['id']); ?></td>
                                    <td>
										<b>Nombre</b>: <?php echo h($order['Order']['customer_name']); ?><br>
                                        <b>Correo</b>: <?php echo h($order['Order']['customer_email']); ?><br>
                                        <b>Tel.</b>: <?php echo h($order['Order']['customer_phone']); ?>
									</td>
                                    <td><?php echo h($order['Order']['comments']); ?></td>
                                    <td><?php echo h($order['Order']['estimated_delivery_date']); ?></td>
                                    <td>
                                        <?php echo $order['Branch']['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $order['OrdersPhase']['name']; ?>
                                    </td>
                                    <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
                                    <td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
                                    <td>
                                        <?php echo $order['Status']['text']; ?>
                                    </td>
                                    <td class="actions" style="text-align:center">
                                        <?php echo $this->Html->link("<i class='fa fa-edit'></i>", array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>&nbsp;
                                        <?php echo $this->Form->postLink("<i class='fa fa-trash-o'></i>", array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Esta seguro de eliminar el pedido # %s?', $order['Order']['id']), 'class' => 'btn btn-danger btn-xs', 'escape' => false)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Sucursal</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>.</th>
                            </tr>
                        </tfoot>                        
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
                filename: 'Orders',
                exportOptions: {
                    format: {
                        body: function (data, row, col) {
                            var s = '<p>' + data + '</p>';
                            return $(s).text();
                        }
                    }
                }
            }],
            initComplete: function () {
                this.api().columns().every( function (index) {
                    if(index == 5){   
                        var column = this;
                        var select = $('<select id="filterByOrderStatus" style="100%"><option value="">Seleccionar</option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    }
                } );
            }
        });

        $('#filterByOrderStatus').select2();
    });
</script>