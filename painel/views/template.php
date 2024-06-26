<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="IMOB- Sistema de Gerenciamento Imobiliario<">
	<meta name="author" content="Lucas Silva | Arthur Oliveira">
	<link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/home.png">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/adminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/skins.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css?v=2.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/plugins/lightbox/css/lightbox.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		body {
			-webkit-print-color-adjust: exact !important;
			print-color-adjust: exact;
		}

		@page {
			size: A4 !important;
			margin: 0 !important;
		}

		@media print {
			body {
				zoom: 95%;
			}

			.content-wrapper {
				background-color: #fff !important;
			}

			.div-generate-print-area {
				page-break-after: always;
			}

			.noPrint-rel {
				display: none;
			}
		}
	</style>
	<title>IMOB - Sistema de Gerenciamento Imobiliario</title>
	<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript">
		var BASE_URL = '<?php echo BASE_URL; ?>';
	</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">

			<!-- Logo -->
			<a href="<?php echo BASE_URL; ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<img width="32" height="32" src="#">
				</span>
				<!-- logo for regular state and mobile devices -->
				<span style="font-family: 'Source Sans Pro',sans-serif; font-weight: 400;" class="logo-lg">Sol & Lua Imobiliária</span>
			</a>

			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only"></span>
				</a> -->
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo BASE_URL; ?>upload/avatar/<?php echo $_SESSION['user']['avatar']; ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['user']['nome']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo BASE_URL; ?>upload/avatar/<?php echo $_SESSION['user']['avatar']; ?>" class="img-circle" alt="User Image">

									<p>
										<?php
										$funcao = $_SESSION['user']['nivel'];
										switch ($funcao) {
											case '1':
												echo 'Adminstrador';
												break;
											case '2':
												echo 'Gerente';
												break;
											case '3':
												echo 'Funcionário';
												break;
										}
										?>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a style="color: #fff;" href="<?php echo BASE_URL; ?>usuarios/ver/<?php echo $_SESSION['user']['id'] ?>" class="btn btn-primary btn-flat">Perfil</a>
									</div>
									<div class="pull-right">
										<a style="color: #fff;" href="<?php echo BASE_URL; ?>logout" class="btn btn-danger btn-flat"><i class="fa fa-power-off"></i> Sair</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<?php
		$this->loadViewSidebar($viewName, $viewData);
		?>

		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>

		<footer class="main-footer noPrint-rel">
			<strong>
				&copy; <?= date('Y'); ?>
				<a style="color: #020617;" href="#">IMOB</a> -
			</strong>
			Todos os direitos reservados.
		</footer>
		<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/adminlte.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/dashboard.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js?v=2.0"></script>
		<script src="<?php echo BASE_URL; ?>assets/plugins/lightbox/js/lightbox.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/plugins/jquery-mask/jquery.mask.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/demo.js"></script>
</body>

</html>