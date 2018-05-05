<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
         <link rel="apple-touch-icon" sizes="57x57" href="/consola/dist/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/consola/dist/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/consola/dist/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/consola/dist/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/consola/dist/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/consola/dist/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/consola/dist/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/consola/dist/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/consola/dist/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/consola/dist/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="144x144" href="/consola/dist/img/favicon/android-icon-144x144.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/consola/dist/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="72x72" href="/consola/dist/img/favicon/favicon-72x72.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/consola/dist/img/favicon/favicon-48x48.png">
        <link rel="icon" type="image/png" sizes="36x36" href="/consola/dist/img/favicon/favicon-36x36.png">        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <?php  echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?> 
        <!-- Font Awesome -->
        <?php   echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min.css'); ?>
        <!-- Ionicons -->
        <?php echo $this->Html->css('/bower_components/Ionicons/css/ionicons.min.css'); ?>
        <!-- Theme style -->
        <?php echo $this->Html->css('/dist/css/AdminLTE.min.css'); ?>

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <!-- link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/-->
        <!-- Bootstrap theme -->
        <!-- link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.min.css"/-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>

        <!-- jQuery 3 -->
        <?php // echo $this->Html->script("/bower_components/jquery/dist/jquery.min.js"); ?>
        <!-- Bootstrap 3.3.7 -->
        <?php // echo $this->Html->script("/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>
        <style type="text/css">.error-message{color: red;font-weight: bold;} #flashMessage{display: none}</style>
        <script>
            $(document).ready(function () {
                if ($('#flashMessage').length) {
                    var message = $('#flashMessage').html();
                    message = message.replace(/&lt;/g, '<');
                    message = message.replace(/&gt;/g, '>');
                    var hasClassError = $('#flashMessage').hasClass("error");
                    var hasClassSuccess = $('#flashMessage').hasClass("success");
                    if (hasClassError) {
                        alertify.dialog('errorAlert', function factory() {
                            return{
                                build: function () {
                                    var header = '<span class="fa fa-times-circle fa-2x" style="vertical-align:middle;color:#e10000;"></span> CADCAM - Error';
                                    this.setHeader(header);
                                }
                            };
                        }, true, 'alert');
                        alertify.errorAlert(message);
                    }
                    if (hasClassSuccess) {
                        alertify.dialog('successAlert', function factory() {
                            return{
                                build: function () {
                                    var header = '<span class="fa fa-check-circle fa-2x" style="vertical-align:middle;color:#1f7d40;"></span> CADCAM - Mensaje';
                                    this.setHeader(header);
                                }
                            };
                        }, true, 'alert');
                        alertify.successAlert(message);
                    }
                }
            });
        </script>
        <!-- Google Font -->
       
       
    </head>
    <body class="hold-transition login-page">
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
