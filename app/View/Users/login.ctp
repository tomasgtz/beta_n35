<?php // echo $this->Session->flash('auth'); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<style>

@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    background: #3385ff;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #ffffff, #d9d9d9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #ffffff, #d9d9d9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #001133;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#DDDDDD; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}

</style>



<section class="login-block">
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Ingreso</h2>
        <?php echo $this->Form->create('User'); ?>
  <div class="form-group has-feedback">
    <label for="UserUsername" class="text-uppercase">Correo</label>
    <?php echo $this->Form->email('username',array("class" => "form-control", "label" => false, "placeholder" => "Correo electrónico", "autocomplete" => "off")); ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <label for="UserPassword" class="text-uppercase">Contraseña</label>
    <?php echo $this->Form->password('password',array("class" => "form-control", "label" => false, "placeholder" => "Contraseña", "autocomplete" => "off")); ?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  
  
    <div class="form-check">
    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
  </div>
  
<?php echo $this->Form->end(); ?>

<br>
    <?php echo $this->Html->link('¿Olvidaste tú contraseña?', array('action' => 'forgotPassword')); ?>

    </div>
    <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>NOM 035 - Evaluaci&oacute;n en l&iacute;nea</h2>
            <p>Conoce en tiempo real el estatus actual de tu empresa en relación a la norma NOM-035-STPS-2018, la cual tiene como objetivo, identificar y prevenir factores de riesgo psicosocial, así como para promover un entorno organizacional favorable en los centros de trabajo. Esta norma fue emitida por la Secretaría del Trabajo y es vigente a partir del 23 de Octubre de 2019.</p>
        </div>  
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>NOM 035 - Evaluaci&oacute;n en l&iacute;nea</h2>
            <p>Conoce en tiempo real el estatus actual de tu empresa en relación a la norma NOM-035-STPS-2018, la cual tiene como objetivo, identificar y prevenir factores de riesgo psicosocial, así como para promover un entorno organizacional favorable en los centros de trabajo. Esta norma fue emitida por la Secretaría del Trabajo y es vigente a partir del 23 de Octubre de 2019.</p>
        </div>  
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>NOM 035 - Evaluaci&oacute;n en l&iacute;nea</h2>
            <p>Conoce en tiempo real el estatus actual de tu empresa en relación a la norma NOM-035-STPS-2018, la cual tiene como objetivo, identificar y prevenir factores de riesgo psicosocial, así como para promover un entorno organizacional favorable en los centros de trabajo. Esta norma fue emitida por la Secretaría del Trabajo y es vigente a partir del 23 de Octubre de 2019.</p>
        </div>  
    </div>
  </div>
            </div>     
        
    </div>
  </div>
</div>
</section>
    
