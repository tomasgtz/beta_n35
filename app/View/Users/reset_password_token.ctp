<div class="login-box">
    <div class="login-logo">
        <!-- <a href="../../index2.html"> -->
        <b>Cambia tu contraseña</b>
        <!-- </a> -->
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" style="text-align: left">
            La contraseña debe cumplir con lo siguiente.<br>
            *Al menos una mayúscula<br>
            *Al menos un número<br>
            *Al menos un símbolo especial
        </p>
        <?php 
            echo $this->Form->create('User');
            echo $this->Form->hidden('User.reset_password_token');
        ?>
        <div class="form-group has-feedback">
            <?php echo $this->Form->password('new_password', array("class" => "form-control", "label" => false, "placeholder" => "Escribe tu nueva contraseña", "autocomplete" => "off")); ?>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->password('confirm_password', array("class" => "form-control", "label" => false, "placeholder" => "Confirma tu contraseña", "autocomplete" => "off")); ?>        </div>
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
                <button type="submit" class="btn btn-primary btn-block btn-flat">Cambiar contraseña</button>
            </div>
            <!-- /.col -->
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->