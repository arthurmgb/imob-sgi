<?php
$config = $contrato['config'];
$proprietario = $contrato['proprietario'];
$inquilino = $contrato['inquilino'];
$imovel = $contrato['imovel'];
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Renovação de Contrato - N° <?php echo $contrato['id']; ?>
			<small> - Sistema de Gerenciamento Imobiliário</small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatórios!</p>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php if(!empty($error['msg'])): ?>
					<div class="alert alert-<?php echo $error['type']; ?>">
						<?php echo $error['msg']; ?>
					</div>
				<?php endif; ?>
				<form role="form" method="POST">
					<div class="box-body">
						<div class="form-group">
							<label for="busca">* Código do Imóvel</label>
							<input  readonly="true" name="referencia_imovel" class="form-control" id="busca" value="<?php echo $imovel['referencia'];?>">
						</div>
						<div class="form-group">
							<label for="endereco">Endereço</label>
							<input id="endereco" readonly="true" class="form-control" value="<?php echo $imovel['endereco']; ?>,<?php echo $imovel['bairro']; ?> - <?php echo $imovel['cidade']; ?>">
						</div>
						<div class="form-group">
							<label for="iptu">IPTU</label>
							<select name="iptu" class="form-control">
								<option value="1" <?php echo ($imovel['iptu']=='1')? 'selected="selected"':''; ?>>Sim</option>
            					<option value="2" <?php echo ($imovel['iptu']=='2')? 'selected="selected"':''; ?>>Não</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Reajuste</label>
							<input id="reajuste" name="reajuste" required="required" class="form-control" value="<?php echo $imovel['reajuste'];?>">
						</div>
						<div class="form-group">
							<label for="valor">Valor</label>
							<input id="valor" readonly="true" class="form-control" value="<?php echo number_format($imovel['valor'],2,",",".");?>">
						</div>

						<div class="form-group">
							<label for="valor">* Novo Valor</label>
							<input id="n_valor" name="n_valor" required="required" class="form-control" value="">
						</div>

						<input type="hidden" name="cod_proprietario" id="cod_proprietario" value="<?php echo (!empty($proprietario['referencia'])) ? $proprietario['referencia']:''; ?>">
						<div class="form-group">
							<label for="proprietario">Proprietário</label>
							<input id="proprietario" readonly="true" class="form-control" value="<?php echo (!empty($proprietario['nome'])) ? $proprietario['nome'] : '';?>">
						</div>
						<div class="row">
							<div class="col-xs-5 col-md-4">
								<div class="form-group">
									<label>Código do Inquilino</label>
									<input type="text" readonly="true" name="cod_inquilino" class="form-control" value="<?php echo $inquilino['referencia'];?>">
								</div>
							</div>
							<div class="col-xs-7 col-md-8">
								<div class="form-group">
									<label>Nome do Inquilino</label>
									<input type="text" id="nInquilino" readonly="true" value="<?php echo $inquilino['nome'];?>" class="form-control">
								</div> 
							</div>
						</div><!-- row -->
						
						<div class="form-group">
							<label>* Data de Início do Contrato</label>

							<input type="date" name="data_inicio" class="form-control" required>
						</div>
						<div class="form-group">
							<label>* Período</label>
							<select name="periodo" required="required" class="form-control" readonly="readonly" tabindex="-1" aria-disabled="true" style="pointer-events: none; touch-action: none;">
								<option value="12" selected>1 ano</option>
							</select>	
						</div>
						<div class="form-group">
							<input type="hidden" name="id_contrato" class="form-control" value="<?php echo $contrato['id']; ?>">
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success btn-lg btn-block">Renovar</button>
						</div>
					</form>
				</div>
			</div>
		</section>
</div>  
