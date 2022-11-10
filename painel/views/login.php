<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="IMOB- Sistema de Gerenciamento Imobiliario<">
  <meta name="author" content="Lucas Silva">
  <link rel="icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/adminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <title>IMOB - Sistema de Gerenciamento Imobiliario</title>
</head>
<style type="text/css">
  .login-page{
  background-image: url("assets/images/background.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center; 
  background-size: cover;
  bottom: 0;
  left: 0;
  overflow: auto;
  position: absolute;
  right: 0;
  top: 0;
}
</style>
<body class="hold-transition login-page">
  <div class="bg-login">
  <div class="login-box">
   
    <!-- /.login-logo -->
    <div class="login-box-body">
      <div class="login-logo">
      <img src="<?php echo BASE_URL;?>assets/images/imob.png" width="205" >
    </div>
      <?php if(!empty($msg)):?>
        <p class="alert alert-danger"><?php echo $msg; ?></p>
      <?php endif ;?>  

      <form method="post">
       
        <div class="form-group has-feedback">
          <input type="text" name="login" class="form-control" placeholder="Login">
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Acessar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  </div>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  </script>
</body>
</html>
