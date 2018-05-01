<?php echo $this->Session->flash('auth'); ?>
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"> -->
        <b>Acceso a clientes</b>
    <!-- </a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Para comenzar debes iniciar sesión</p>
    <?php echo $this->Form->create('User'); ?>
    <!-- <form action="../../index2.html" method="post"> -->
      <div class="form-group has-feedback">
        <?php echo $this->Form->email('username',array("value" => "rodriguez.jaime2014@gmail.com","class" => "form-control", "label" => false, "placeholder" => "Correo electrónico", "autocomplete" => "off")); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->password('password',array("class" => "form-control", "label" => false, "placeholder" => "Contraseña", "autocomplete" => "off")); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!--
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>          
        </div>
        -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo $this->Form->end(); ?>
    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    -->
    <!-- /.social-auth-links -->
    <br>
    <?php // echo $this->Html->link('¿Olvidaste tú contraseña?', array('action' => 'forgotPassword'), array('class'=>'btn btn-primary btn-block btn-flat','escape' => false)); ?>
    <?php echo $this->Html->link('¿Olvidaste tú contraseña?', array('action' => 'forgotPassword')); ?>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->