<?php
$config = $contrato['config'];
$proprietario = $contrato['proprietario'];
$inquilino = $contrato['inquilino'];
$imovel = $contrato['imovel'];
?>
<div class="content-wrapper">

	<section class="content-header">
		<h1 class="imob-custom-h1">
			Renovação de Contrato - N° <?php echo $contrato['id']; ?>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<?php if (!empty($error['msg'])): ?>
					<div style="font-weight: 600;" class="text-center alert alert-<?php echo $error['type']; ?> fs-16">
						<?php echo $error['msg']; ?>
					</div>
					<div style="justify-content: center;" class="imob-flex-row">
						<a href="<?= BASE_URL ?>" class="btn btn-primary btn-lg">
							<i style="margin-right: 5px;" class="fa fa-check-circle fa-1x" aria-hidden="true"></i>
							Ok
						</a>
					</div>

				<?php endif; ?>

				<?php if (empty($error['msg'])): ?>
					<div class="box box-success p-10">
						<form class="fs-16" autocomplete="off" role="form" method="POST">
							<div class="box-body">

								<input type="hidden" readonly="true" name="referencia_imovel" class="form-control input-lg" id="busca" value="<?php echo $imovel['referencia']; ?>">
								<input type="hidden" name="cod_proprietario" id="cod_proprietario" value="<?php echo (!empty($proprietario['referencia'])) ? $proprietario['referencia'] : ''; ?>">
								<input id="cdInquilino" type="hidden" readonly="true" name="cod_inquilino" class="form-control input-lg" value="<?php echo $inquilino['referencia']; ?>">
								<input type="hidden" name="id_contrato" class="form-control input-lg" value="<?php echo $contrato['id']; ?>">

								<div class="col-md-12 p-0">
									<div class="form-group">
										<label for="endereco">Endereço</label>
										<input id="endereco" readonly="true" class="form-control input-lg" value="<?php echo $imovel['endereco']; ?>, <?php echo $imovel['bairro']; ?> - <?php echo $imovel['cidade']; ?>">
									</div>
								</div>

								<div class="col-md-6 pr-10">
									<div class="form-group">
										<label for="iptu">IPTU</label>
										<select id="iptu" name="iptu" class="form-control input-lg pointer">
											<option value="1" <?php echo ($imovel['iptu'] == '1') ? 'selected="selected"' : ''; ?>>Sim</option>
											<option value="2" <?php echo ($imovel['iptu'] == '2') ? 'selected="selected"' : ''; ?>>Não</option>
										</select>
									</div>
								</div>

								<div class="col-md-6 p-0">
									<div class="form-group">
										<label for="reajuste">Reajuste</label>
										<div class="input-group">
											<div class="input-group-addon fw-bold">%</div>
											<input type="text" id="reajuste" name="reajuste" required="required" class="form-control input-lg num-reajuste fw-bold" value="<?php echo $imovel['reajuste']; ?>" placeholder="000">
										</div>
									</div>
								</div>

								<div class="col-md-6 pr-10">
									<div class="form-group">
										<label for="valor">Valor Atual</label>
										<div class="input-group">
											<div class="input-group-addon fw-bold">R$</div>
											<input id="valor" readonly="true" class="form-control input-lg fw-bold" value="<?php echo number_format($imovel['valor'], 2, ",", "."); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6 p-0">
									<div class="form-group">
										<label for="n_valor">Novo Valor</label>
										<div class="input-group">
											<div class="input-group-addon fw-bold">R$</div>
											<input id="n_valor" name="n_valor" required="required" class="form-control input-lg fw-bold cash" placeholder="0,00" value="">
										</div>
									</div>
								</div>

								<div class="col-md-6 pr-10">
									<div class="form-group">
										<label for="proprietario">Proprietário</label>
										<input id="proprietario" readonly="true" class="form-control input-lg" value="<?php echo (!empty($proprietario['nome'])) ? $proprietario['nome'] : ''; ?>">
									</div>
								</div>

								<div class="col-md-6 p-0">
									<div class="form-group">
										<label for="nInquilino">Inquilino</label>
										<input type="text" id="nInquilino" readonly="true" value="<?php echo $inquilino['nome']; ?>" class="form-control input-lg">
									</div>
								</div>

								<div class="col-md-6 pr-10">
									<div class="form-group">
										<label for="date-start-con">Data de Início do Contrato</label>

										<?php

										// formatar data final para exibir no input
										$contrato_df = DateTime::createFromFormat('d/m/Y', $contrato['data_final'])->format('Y-m-d');

										?>

										<input id="date-start-con" min="2000-01-01" max="2200-01-01" type="date" name="data_inicio" onfocus="this.showPicker()" class="form-control input-lg pointer" value="<?= $contrato_df ?>" required>

									</div>
								</div>

								<div class="col-md-6 p-0">
									<div class="form-group">
										<label for="periodo-con">Período</label>
										<select id="periodo-con" name="periodo" required="required" class="form-control input-lg" readonly="readonly" tabindex="-1" aria-disabled="true" style="pointer-events: none; touch-action: none;">
											<option value="12" selected>1 ano (12 meses)</option>
										</select>
									</div>
								</div>

								<div class="col-md-12 p-0">
									<div class="box-footer pt-10 imob-flex-row-2">
										<button style="flex-grow: 1;" type="submit" class="btn btn-success btn-lg mr-10">
											Renovar
										</button>
										<a style="width: 200px;" href="<?= BASE_URL; ?>" class="btn btn-danger btn-lg">
											Cancelar
										</a>
									</div>
								</div>

							</div>
						</form>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

</div>