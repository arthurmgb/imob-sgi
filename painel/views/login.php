<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="IMOB- Sistema de Gerenciamento Imobiliario<">
  <meta name="author" content="Lucas Silva | Arthur Oliveira">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/home.png">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/adminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/skins.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css?v=2.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <title>IMOB - Login</title>
</head>

<body>
  <div class="mdn-login-box">
    <img class="mdn-logo" src="<?php echo BASE_URL; ?>assets/images/imob.png">
    <?php if (!empty($msg)) : ?>
      <p class="alert alert-danger mdn-alert"><?php echo $msg; ?></p>
    <?php endif; ?>
    <form class="mdn-login-form" method="post">
      <input type="text" name="login" placeholder="Usuário">
      <div class="mdn-password-box">
        <input class="mdn-password-input" type="password" name="senha" placeholder="Senha">
        <button type="button" class="mdn-toggler">
          <i id="toggler-icon" class="fa fa-eye" aria-hidden="true"></i>
        </button>
      </div>
      <button class="mdn-btn" type="submit">
        Acessar
        <i id="mdn-sign-in" class="fa fa-sign-in fa-fw" aria-hidden="true"></i>
      </button>
    </form>
  </div>

  <script>
    let toggler = document.querySelector('.mdn-toggler');
    let togglerIcon = document.querySelector('#toggler-icon');
    let passwordInput = document.querySelector('.mdn-password-input');

    toggler.addEventListener("click", () => {
      if (togglerIcon.classList.contains('fa-eye')) {
        togglerIcon.classList.remove('fa-eye');
        togglerIcon.classList.add('fa-eye-slash');
        passwordInput.type = 'text';
      } else {
        togglerIcon.classList.remove('fa-eye-slash');
        togglerIcon.classList.add('fa-eye');
        passwordInput.type = 'password';
      }
    });
  </script>

  <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
</body>

</html>