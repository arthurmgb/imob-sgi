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
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css?v=2.7">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/plugins/lightbox/css/lightbox.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
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
				page-break-after: auto !important;
				page-break-inside: avoid !important;
			}

			.noPrint-rel {
				display: none;
			}

			.content {
				margin: 0 !important;
				padding: 3px 6px 0 6px !important;
			}

		}
	</style>
	<title>IMOB - Sistema de Gerenciamento Imobiliário</title>
	<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript">
		var BASE_URL = '<?php echo BASE_URL; ?>';
	</script>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed imob-custom-sc">
	<div class="wrapper">
		<header class="main-header">

			<!-- Logo -->
			<!-- <a href="<?php echo BASE_URL; ?>" class="logo">
				<span style="font-family: 'Source Sans Pro',sans-serif; font-weight: 400;" class="logo-lg">Sol & Lua Imobiliária</span>
			</a> -->


			<nav class="navbar navbar-static-top">

				<!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only"></span>
				</a> -->

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo BASE_URL; ?>upload/avatar/<?php echo $_SESSION['user']['avatar']; ?>" class="user-image" alt="User Image">
								<span class="hidden-xs">
									<?php echo $_SESSION['user']['nome']; ?>
								</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<p>
										<?php echo $_SESSION['user']['nome']; ?>
									</p>
									<p class="bg-info p-10">
										<?php
										$cargo = $_SESSION['user']['nivel'];
										switch ($cargo) {
											case '1':
												echo '
												<i style="margin-right: 5px;" class="fa fa-shield" aria-hidden="true"></i>
												Administrador
												';
												break;
											case '0':
												echo 'Funcionário';
												break;
											default:
												break;
										}
										?>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<a style="color: #fff; padding: 8px;" href="<?php echo BASE_URL; ?>logout" class="btn btn-danger fs-16">
										<i style="margin-right: 5px;" class="fa fa-sign-out"></i>
										Sair
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

				<a href="<?= BASE_URL ?>financeiro" class="btn btn-success btn-absolute-shortcut btn-lg">
					<i style="margin-right: 5px;" class="fa fa-usd"></i>
					Pagamentos
				</a>
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
		<script src="<?php echo BASE_URL; ?>assets/js/script.js?v=2.7"></script>
		<script src="<?php echo BASE_URL; ?>assets/plugins/lightbox/js/lightbox.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/plugins/jquery-mask/jquery.mask.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/demo.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
</body>

</html>