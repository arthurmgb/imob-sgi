<?php
if (!empty($imovel['proprietario'])) {
	$proprietario = $imovel['proprietario'];
}
?>
<div class="content-wrapper">

	<section class="content-header">
		<h1 class="imob-custom-h1">
			Cadastrar Contrato
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<?php if (!empty($error['msg'])) : ?>
					<div class="alert alert-<?php echo $error['type']; ?> fs-16">
						<?php echo $error['msg']; ?>
					</div>
				<?php endif; ?>

				<div class="box box-primary p-10">
					<form class="fs-16" autocomplete="off" role="form" method="POST">
						<div class="box-body">

							<div class="col-md-12 p-0">
								<div class="form-group">
									<label for="select-con-imv">
										<i style="margin-right: 5px; font-size: 20px; color: #16a34a;" class="fa fa-home fa-1x"></i>
										Selecione um Imóvel Disponível
									</label>
									<select onfocus="this.size=5" onblur="this.size=1" onchange="this.size=1; this.blur();" style="height: unset;" required class="form-control input-lg pointer fw-bold imob-custom-sc" name="cod_imovel" id="select-con-imv">
										<option style="text-transform: initial;" value="" selected>
											🔴 Nenhum imóvel selecionado
										</option>
										<?php foreach ($imoveis_disponiveis as $imv_disponivel) : ?>
											<option style="text-transform: uppercase; background-color: #eff6ff;" class="fw-bold" value="<?= $imv_disponivel['referencia'] ?>">
												🏠&nbsp; <?= $imv_disponivel['endereco'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
								<hr style="border-color: #3C8DBC; border-width: 2px; margin-bottom: 10px;">
							</div>

							<div class="col-md-12 p-0">
								<label style="color: #0f172a; font-size: 18px;" class="pb-10 text-uppercase">
									Informações do imóvel
								</label>
								<small id="box-edit-imv" style="font-size: 14px; display: none;">
									(edite <a id="con-edit-imv" class="fw-bold" style="text-decoration: underline; color: #3C8DBC;" href="">clicando aqui</a>, se necessário)
								</small>
							</div>

							<div class="col-md-4 pr-10">
								<div class="form-group">
									<label for="tipo">Tipo</label>
									<?php
									if (!empty($imovel['tipo'])) {
										$tipos = array(
											'1' => 'Casa',
											'2' => 'Apartamento',
											'3' => 'Comercial'
										);
										$tipo = $imovel['tipo'];
									}
									?>
									<input id="tipo" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['tipo'])) ? $tipos[$tipo] : ''; ?>">
								</div>
							</div>

							<div class="col-md-4 pr-10">
								<div class="form-group">
									<label for="finalidade">Finalidade</label>
									<?php
									if (!empty($imovel['finalidade'])) {
										$finalidades = array(
											'1' => 'Aluguel',
											'2' => 'Venda'
										);
										$fin = $imovel['finalidade'];
									}
									?>
									<input id="finalidade" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['finalidade'])) ? $finalidades[$fin] : ''; ?>">
								</div>
							</div>

							<div class="col-md-4 p-0">
								<div class="form-group">
									<label for="iptu">IPTU</label>
									<?php
									if (!empty($imovel['iptu'])) {
										$iptuOptions = array(
											'1' => 'Sim',
											'2' => 'Não'
										);
										$iptu = $imovel['iptu'];
									}
									?>
									<input id="iptu" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['iptu'])) ? $iptuOptions[$iptu] : '' ?>">
								</div>
							</div>

							<div class="col-md-3 pr-10">
								<div class="form-group">
									<label for="endereco">Endereço</label>
									<input id="endereco" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['endereco'])) ? $imovel['endereco'] : ''; ?>">
								</div>
							</div>

							<div class="col-md-3 pr-10">
								<div class="form-group">
									<label for="bairro">Bairro</label>
									<input id="bairro" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['bairro'])) ? $imovel['bairro'] : ''; ?>">
								</div>
							</div>

							<div class="col-md-3 pr-10">
								<div class="form-group">
									<label for="cidade">Cidade</label>
									<input id="cidade" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['cidade'])) ? $imovel['cidade'] : ''; ?>">
								</div>
							</div>

							<div class="col-md-3 p-0">
								<div class="form-group">
									<label for="cep">CEP</label>
									<input id="cep" readonly="true" class="form-control input-lg" value="<?php echo (!empty($imovel['cep'])) ? $imovel['cep'] : ''; ?>">
								</div>
							</div>

							<div class="col-md-12 p-0">
								<input type="hidden" name="cod_proprietario" id="cod_proprietario" value="<?php echo (!empty($proprietario['referencia'])) ? $proprietario['referencia'] : ''; ?>">
								<div class="form-group">
									<label for="proprietario">Proprietário</label>
									<input id="proprietario" readonly="true" class="form-control input-lg" value="<?php echo (!empty($proprietario['nome'])) ? $proprietario['nome'] : ''; ?>">
								</div>
							</div>

							<div class="col-md-6 pr-10">
								<div class="form-group">
									<label for="valor">Valor</label>
									<div class="input-group">
										<div class="input-group-addon fw-bold">R$</div>
										<input id="valor" name="valor" readonly="true" class="form-control input-lg fw-bold" value="<?php echo (!empty($imovel['valor'])) ? 'R$ ' . number_format($imovel['valor'], 0, ',', '.') : ''; ?>">
									</div>
								</div>
							</div>

							<div class="col-md-6 p-0">
								<div class="form-group">
									<label for="reajuste">Reajuste</label>
									<div class="input-group">
										<div class="input-group-addon fw-bold">%</div>
										<input id="reajuste" readonly="true" class="form-control input-lg fw-bold" value="<?php echo (!empty($imovel['reajuste'])) ? $imovel['reajuste'] . '%' : ''; ?>">
									</div>
								</div>
							</div>

							<div id="imob-separator" class="col-md-12 p-0">
								<hr style="border-color: #3C8DBC; border-width: 2px; margin-top: 10px;">
							</div>

							<div class="col-md-12 p-0">
								<div class="form-group">
									<label for="select-con-inq">
										<i style="margin-right: 5px; font-size: 20px;" class="fa fa-user fa-1x text-info"></i>
										Selecione o Inquilino
									</label>
									<select onfocus="this.size=5" onblur="this.size=1" style="height: unset;" required class="form-control input-lg pointer fw-bold imob-custom-sc" name="cod_inquilino" id="select-con-inq" onchange="pegarFiadoresPorCodInquilino(this); this.size=1; this.blur();">
										<option style="text-transform: initial;" value="" selected>
											🔴 Nenhum inquilino selecionado
										</option>
										<?php foreach ($inquilinos_list as $inquilino_con) : ?>
											<option style="text-transform: uppercase; background-color: #eff6ff;" class="fw-bold" value="<?= $inquilino_con['referencia'] ?>">
												👤&nbsp; <?= $inquilino_con['nome'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-md-6 pr-10">
								<div class="form-group">
									<label for="fiador1">
										Primeiro Fiador
										<small>(opcional)</small>
									</label>
									<select name="fiador1" class="form-control input-lg pointer" id="fiador1">
										<option value="0">Nenhum selecionado</option>
									</select>
								</div>
							</div>

							<div class="col-md-6 p-0">
								<div class="form-group">
									<label for="fiador2">
										Segundo Fiador
										<small>(opcional)</small>
									</label>
									<select name="fiador2" class="form-control input-lg pointer" id="fiador2">
										<option value="0">Nenhum selecionado</option>
									</select>
								</div>
							</div>

							<div class="col-md-6 pr-10">
								<div class="form-group">
									<label for="date-start-con">Data de Início do Contrato</label>
									<input id="date-start-con" min="2000-01-01" max="2200-01-01" type="date" name="data_inicio" class="form-control input-lg pointer" onfocus="this.showPicker()" required>
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
								<div class="form-group">
									<label for="info">
										Observações
										<small>(opcional)</small>
									</label>
									<textarea name="info" style="resize: vertical; min-height: 100px" id="info" class="form-control input-lg"></textarea>
								</div>
							</div>

							<div class="col-md-12 p-0">
								<div class="box-footer pt-10">
									<button type="submit" class="btn btn-primary btn-lg btn-block">
										Cadastrar
									</button>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

</div>