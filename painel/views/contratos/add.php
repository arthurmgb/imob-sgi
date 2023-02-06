<?php
if (!empty($imovel['proprietario'])) {
	$proprietario = $imovel['proprietario'];
}

?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Cadastro de Contratos
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
					<?php if (!empty($error['msg'])) : ?>
						<div class="alert alert-<?php echo $error['type']; ?>">
							<?php echo $error['msg']; ?>
						</div>
					<?php endif; ?>
					<form role="form" method="POST">
						<div class="box-body">
							<div class="form-group">
								<label for="busca">* Código do Imóvel</label>
								<input name="cod_imovel" class="form-control" id="busca" value="<?php echo (!empty($imovel['referencia'])) ? $imovel['referencia'] : ''; ?>" required>
							</div>
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
								<input id="tipo" readonly="true" class="form-control" value="<?php echo (!empty($imovel['tipo'])) ? $tipos[$tipo] : ''; ?>">
							</div>
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
								<input id="finalidade" readonly="true" class="form-control" value="<?php echo (!empty($imovel['finalidade'])) ? $finalidades[$fin] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="endereco">Endereço / N°</label>
								<input id="endereco" readonly="true" class="form-control" value="<?php echo (!empty($imovel['endereco'])) ? $imovel['endereco'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="bairro">Bairro</label>
								<input id="bairro" readonly="true" class="form-control" value="<?php echo (!empty($imovel['bairro'])) ? $imovel['bairro'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="cidade">Cidade</label>
								<input id="cidade" readonly="true" class="form-control" value="<?php echo (!empty($imovel['cidade'])) ? $imovel['cidade'] : ''; ?>">
							</div>
							<div class="form-group">
								<label for="cep">CEP</label>
								<input id="cep" readonly="true" class="form-control" value="<?php echo (!empty($imovel['cep'])) ? $imovel['cep'] : ''; ?>">
							</div>
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
								<input id="iptu" readonly="true" class="form-control" value="<?php echo (!empty($imovel['iptu'])) ? $iptuOptions[$iptu] : '' ?>">
							</div>
							<div class="form-group">
								<label for="">Reajuste</label>
								<input id="reajuste" readonly="true" class="form-control" value="<?php echo (!empty($imovel['reajuste'])) ? $imovel['reajuste'] . '%' : ''; ?>">
							</div>
							<div class="form-group">
								<label for="valor">Valor</label>
								<input id="valor" name="valor" readonly="true" class="form-control" value="<?php echo (!empty($imovel['valor'])) ? 'R$ ' . number_format($imovel['valor'], 0, ',', '.') : ''; ?>">
							</div>
							<input type="hidden" name="cod_proprietario" id="cod_proprietario" value="<?php echo (!empty($proprietario['referencia'])) ? $proprietario['referencia'] : ''; ?>">
							<div class="form-group">
								<label for="proprietario">Proprietário</label>
								<input id="proprietario" readonly="true" class="form-control" value="<?php echo (!empty($proprietario['nome'])) ? $proprietario['nome'] : ''; ?>">
							</div>
							<div class="row">
								<div class="col-xs-5 col-md-4">
									<div class="form-group">
										<label>Código do Inquilino</label>
										<input type="text" name="cod_inquilino" onkeyup="pegarFiadoresPorCodInquilino(this)" class="form-control" required>
									</div>
								</div>
								<div class="col-xs-7 col-md-8">
									<div class="form-group">
										<label>Nome do Inquilino</label>
										<input type="text" id="nInquilino" readonly="true" class="form-control">
									</div>
								</div>
							</div><!-- row -->
							<div class="form-group">
								<label>* Fiadores</label>
								<select name="fiador1" class="form-control" id="fiador1">
									<option value="0">Nenhum selecionado</option>
								</select>
							</div>
							<div class="form-group">
								<select name="fiador2" class="form-control" id="fiador2">
									<option value="0">Nenhum selecionado</option>
								</select>
							</div>

							<div class="form-group">
								<label for="info">Observações</label>
								<textarea name="info" style="resize: none; height: 200px" id="info" class="form-control"></textarea>
							</div>
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
							<div class="box-footer">
								<button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
							</div>
					</form>
				</div>
			</div>
	</section>
</div>