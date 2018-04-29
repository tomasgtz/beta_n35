<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edición de registro<small>Edición de registro</small></h1>    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
    </ol>    
</section>

<section class="content">
      <div class="row">
        <!-- center column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Editando registro #<?php echo $this->request->data['Order']['id']; ?></h3>            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Order',array('class' => 'form-horizontal')); ?>
            <?php echo $this->Form->input('id',array('class' => 'form-control', 'label' => false)); ?>
                            <div class="form-group">
                                <label for="customer_name" class="col-sm-2 control-label">customer_name</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_name',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_email" class="col-sm-2 control-label">customer_email</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_email',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_phone" class="col-sm-2 control-label">customer_phone</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('customer_phone',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="comments" class="col-sm-2 control-label">comments</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('comments',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="payment_url" class="col-sm-2 control-label">payment_url</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('payment_url',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="received_by" class="col-sm-2 control-label">received_by</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('received_by',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="estimated_delivery_date" class="col-sm-2 control-label">estimated_delivery_date</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('estimated_delivery_date',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="quote_id" class="col-sm-2 control-label">quote_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('quote_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="branch_id" class="col-sm-2 control-label">branch_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('branch_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="payments_type_id" class="col-sm-2 control-label">payments_type_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('payments_type_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="orders_phase_id" class="col-sm-2 control-label">orders_phase_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('orders_phase_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="status_id" class="col-sm-2 control-label">status_id</label>
                                    <div class="col-sm-6 required">
                                        <?php echo $this->Form->input('status_id',array('class' => 'form-control', 'label' => false)); ?>
                                    </div>
                            </div>                <!-- /.box-body -->
              <div class="box-footer">
<?php echo $this->Html->link('<i class="fa fa-arrow-circle-left"></i>&nbsp;Cancelar',array('action' => '/index'),array('class' => 'btn btn-danger', 'escape' => false)); ?>                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              </div>
              <!-- /.box-footer -->
            <?php echo $this->Form->end(); ?>          </div>
          <!-- /.box -->
        </div>
        <!--/.col (center) -->
      </div>
      <!-- /.row -->
    </section>