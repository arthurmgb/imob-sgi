 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="display: flex; justify-content: space-between">
    <h1>
      CAIXA
      <small>Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <div>
    	<a href="#" class="btn btn-primary btn-sm" onclick="confirm('Tem certeza que deseja fechar o caixa?')? window.location.href=BASE_URL+'financeiro/fecharcaixa':'';">FECHAR CAIXA</a>
    </div>
  </section>
	<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box flex-row">
          <!--<div class="box-header">
            <h3 class="box-title">Titulos</h3>
          </div>-->
					<div class="caixa">
						<div class="caixa-header">
							<h3>Entrada</h3>
						</div>
						<div class="caixa-body">
							R$ <?php echo number_format($caixa['entrada'], 2, ',', '.'); ?>
						</div>
					</div>
					<div class="caixa">
						<div class="caixa-header">
							<h3>Saida</h3>
						</div>
						<div class="caixa-body">
							R$ <?php echo number_format($caixa['saida'], 2, ',', '.'); ?>
						</div>
					</div>
					<div class="caixa">
						<div class="caixa-header">
							<h3>Saldo</h3>
						</div>
						<div class="caixa-body">
							R$ <?php echo number_format($caixa['saldo'], 2, ',', '.'); ?>
						</div>
					</div>
      	</div>
  		</div>
		</div>
	</section>
</div>   