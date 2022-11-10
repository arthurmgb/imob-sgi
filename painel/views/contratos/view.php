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
			Informações do Contrato - N° <?php echo $contrato['id']; ?>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="view">
            <div>
              <img src="<?php echo BASE_URL?>upload/<?php echo $config['logo']; ?>" style="width:180px; float: left; margin: 0; padding: 0; "  alt="">
            </div>
            <div style="margin-top:20px; margin-left: 20px;">
  						<p><?php echo strtoupper($config['razao_social']); ?></p>
  						<p>
                CNPJ: <?php echo $config['cnpj']; ?>
                <span class="ml">CRECI: <?php echo $config['creci']; ?></span>
              </p>
  						<p><?php echo $config['endereco'].' - '.$config['bairro'].' - '.$config['cidade'].'/'.$config['uf'].' - '.$config['cep']; ?></p>		
           </div>
    
					</div>
					<div class="view">
						<h3>Dados do proprietário</h3>
						<p><?php echo $proprietario['nome']; ?></p>
						<p>CNPJ / CPF: <?php echo $proprietario['cpf']; ?>
              <span class="ml">INSCRIÇÃO / RG: <?php echo $proprietario['rg']; ?></span>
            </p>
						<p><?php echo 'Nacionalidade: '.$proprietario['nacionalidade'].' - Estado Civil: '.$proprietario['estado_civil']; ?></p>
						<p><?php echo $proprietario['endereco'].' - '.$proprietario['bairro'].' - '.$proprietario['cidade'].'/'.$proprietario['uf'].' - '.$proprietario['cep']; ?></p>	
					</div>
					<div class="view">
            <h3>Dados do inquilino</h3>
            <p><?php echo $inquilino['nome']; ?></p>
            <p>CNPJ / CPF: <?php echo $inquilino['cpf']; ?>
              <span class="ml">INSCRIÇÃO / RG: <?php echo $inquilino['rg']; ?></span>
            </p>
            <p><?php echo 'Nacionalidade: '.$inquilino['nacionalidade'].' - Estado Civil: '.$inquilino['estado_civil']; ?></p>
            <p>Profissao: <?php echo $inquilino['profissao']; ?></p>  
          </div>
          <?php if (count($contrato['fiadores']) > 0): ?>
            <div class="view">
              <h3>Dados dos fiadores</h3>
              <?php foreach ($contrato['fiadores'] as $fiador): ?>
                
                <p><?php echo $fiador['nome']; ?></p>
                <p>CNPJ / CPF: <?php echo $fiador['cpf']; ?>
                  <span class="ml">INSCRIÇÃO / RG: <?php echo $fiador['rg']; ?></span>
                </p>
                <p><?php echo 'Nacionalidade: '.$fiador['nacionalidade'].' - Estado Civil: '.$fiador['estado_civil']; ?></p>
                <p>Profissao: <?php echo $inquilino['profissao']; ?></p>
                <p><?php echo $fiador['endereco'].' - '.$fiador['bairro'].' - '.$fiador['cidade'].'/'.$fiador['uf'].' - '.$fiador['cep']; ?></p>
                <div style="margin-bottom: 30px"></div>  
              <?php endforeach; ?>
              <div style="margin-top: -30px"></div>
            </div>
          <?php endif; ?>
          <div class="view">
            <h3>Dados do imóvel</h3>
            <p>Contrato - N° <?php echo $contrato['id']; ?></p>
            <p>Valor: R$ <?php echo number_format($imovel['valor'], 2, ',', '.'); ?>
              <span class="ml">
                Tipo:
                <?php
                  switch($imovel['tipo']) {
                    case 1:
                      $tipo = 'Casa';
                    break;
                    case 2:
                      $tipo = 'Apartamento';
                    break;
                    case 3:
                      $tipo = 'Comercial';
                    break;
                  }
                  echo $tipo; 
                ?>
              </span>
            </p>
            <p>Reajuste: <?php echo $imovel['reajuste']; ?>%
              <span class="ml">IPTU: <?php echo ($imovel['iptu']==1)? 'Sim':'Nao'; ?></span>
            </p>
            <p><?php echo $imovel['endereco'].' - '.$imovel['bairro'].' - '.$imovel['cidade'].'/'.$imovel['uf'].' - '.$imovel['cep']; ?></p>
          </div>
          <?php if (!empty($contrato['info'])): ?>
            <div class="view">
              <h3>Informações adicionais</h3>
              <p><?php echo $contrato['info']; ?></p>
            </div>
          <?php endif; ?>
				</div>
        <!-- Link para impimir 
        <a href="javascript:window.print();" target="_blank" class="btn btn-primary pull-right">
            <i class="fa fa-print"></i> Imprimir
        </a>-->
			</div>
		</section>
</div>  