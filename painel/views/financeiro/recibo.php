<?php
$config = $contrato['config'];
$proprietario = $contrato['proprietario'];
$inquilino = $contrato['inquilino'];
$imovel = $contrato['imovel'];
?>
<div class="content-wrapper">

  <section class="content-header">
    <h1 class="imob-custom-h1">
      Recibo - N° <?php echo $parcela['n_parcela']; ?>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="div-btn-print noPrint-rel">
          <a href="<?= BASE_URL ?>financeiro?contrato=<?= $parcela['id_contrato'] ?>" class="btn btn-primary btn-lg">
            <i style="margin-right: 5px;" class="fa fa-angle-left" aria-hidden="true"></i>
            Voltar
          </a>
          <button onclick="window.print();" class="btn btn-success btn-lg">
            <i style="margin-right: 5px;" class="fa fa-print"></i>
            Imprimir recibo
          </button>
        </div>
        <hr class="noPrint-rel" style="margin: 0px 0 10px 0; border-color: #999;">
        <h4 style="margin-top: 25px;">
          <i class="fa fa-user fa-fw" aria-hidden="true"></i>
          <b>Locador:</b> <?php echo $proprietario['nome'] ?>
        </h4>
        <h4>
          <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
          <b>Locatário:</b> <?php echo $inquilino['nome'] ?> - <b> Parcela: <?php echo $parcela['n_parcela']; ?> </b>
        </h4>
        <!-- Recibo -->
        <div id="recibo-de-locacao" style="margin-bottom: 0;" class="box box-primary">
          <!-- 1ª via  -->
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px; ">
              <div style="color: #000;" class="text-center">
                1ª via
                <br />
                <!-- icon -->
                <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
                Locatário
              </div>
            </div>
            <p>
              <span><?php echo mb_strtoupper($config['razao_social'], 'UTF-8'); ?></span>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                N° Contrato: <b><?php echo $parcela['id_contrato'] ?></b>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
              Endereço:
              <?php echo $config['endereco'] . ' - ' . $config['bairro']; ?>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                Telefone: <?php echo $config['telefone']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-building fa-fw" aria-hidden="true"></i>
              CNPJ: <?php echo $config['cnpj']; ?>
              <span class="ml">
                <!-- icon of doc-->
                <i class="fa fa-id-card fa-fw" aria-hidden="true"></i>
                CRECI: <?php echo $config['creci']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-user fa-fw" aria-hidden="true"></i>
              Locador: <?php echo $proprietario['nome']; ?>
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
              Locatário: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
                CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-home fa-fw" aria-hidden="true"></i>
              Endereço do imóvel: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?>
            </p>
            <p>Referente ao <b>pagamento de aluguel</b> do período de <b><?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?></b> a <b><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></b></p>
            <p>Outros: _____________________________________________________________________</p>

            <?php
            // Seção para calcular valores
            $parc_valor = round($parcela['valor']);
            $parc_comissao_porcentagem = floatval($imovel['comissao']);
            $parc_comissao_valor = round(($parc_valor / 100) * $parc_comissao_porcentagem);
            $parc_valor_liquido = $parc_valor - $parc_comissao_valor;
            ?>

            <p>Valor do aluguel:
              <b>R$ <?= number_format($parc_valor, 2, ',', '.'); ?></b>
            </p>
            <p>Data: _____/_____/______</p>
            <p><b>Assinatura do responsável:</b> ____________________________________________________</p>
          </div>
          <div style="border-bottom: 2px dashed #999"></div>
          <!--- 2ª via -->
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px">
              <div style="color: #000;" class="text-center">
                2ª via
                <br />
                <!-- icon -->
                <i class="fa fa-building fa-fw" aria-hidden="true"></i>
                Imobiliária
              </div>
            </div>
            <p>
              <span><?php echo mb_strtoupper($config['razao_social'], 'UTF-8'); ?></span>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                N° Contrato: <b><?php echo $parcela['id_contrato'] ?></b>
              </span>
              <span style="position: absolute; top: 15px; right: 120px;" class="fw-bold">
                <!-- icon -->
                <i class="fa fa-money fa-fw" aria-hidden="true"></i>
                Origem: [&nbsp;&nbsp;&nbsp;&nbsp;] CAIXA [&nbsp;&nbsp;&nbsp;&nbsp;] BANCO
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
              Endereço:
              <?php echo $config['endereco'] . ' - ' . $config['bairro']; ?>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                Telefone: <?php echo $config['telefone']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-building fa-fw" aria-hidden="true"></i>
              CNPJ: <?php echo $config['cnpj']; ?>
              <span class="ml">
                <!-- icon of doc-->
                <i class="fa fa-id-card fa-fw" aria-hidden="true"></i>
                CRECI: <?php echo $config['creci']; ?>
              </span>
            </p>
            <hr style="margin: 10px 0; border-color: #aaa;">
            <p>
              <!-- icon -->
              <i class="fa fa-user fa-fw" aria-hidden="true"></i>
              Locador: <?php echo $proprietario['nome']; ?>
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              <?php
              switch ($proprietario['tipo_conta']) {
                case 0:
                  $proprietario['tipo_conta'] = '---';
                  break;
                case 1:
                  $proprietario['tipo_conta'] = 'Conta corrente';
                  break;
                case 2:
                  $proprietario['tipo_conta'] = 'Conta poupança';
                  break;
              }
              ?>
              <b>
                <!-- icon -->
                <i class="fa fa-university fa-fw" aria-hidden="true"></i>
                Informações bancárias:
              </b>
            </p>
            <p>
              <span><b>Banco:</b> <?= is_null($proprietario['banco']) ? '---' : $proprietario['banco'] ?> |</span>
              <span><b>Tipo:</b> <span style="text-transform: uppercase; font-weight: bolder;"><?= $proprietario['tipo_conta'] ?></span> |</span>
              <span><b>Agência:</b> <?= is_null($proprietario['agencia']) ? '---' : $proprietario['agencia'] ?> |</span>
              <span><b>Conta:</b> <?= is_null($proprietario['conta']) ? '---' : $proprietario['conta'] ?> |</span>
              <span><b>Operação:</b> <?= is_null($proprietario['operacao']) ? '---' : $proprietario['operacao'] ?> |</span>
            </p>
            <p>
              <b>Chave PIX:</b>
              <span><?= is_null($proprietario['pix']) ? '---' : $proprietario['pix'] ?></span>
            </p>
            <hr style="margin: 10px 0; border-color: #aaa;">
            <p>
              <!-- icon -->
              <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
              Locatário: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
                CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-home fa-fw" aria-hidden="true"></i>
              Endereço do imóvel: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?>
            </p>
            <p>Referente ao <b>pagamento de aluguel</b> do período de <b><?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?></b> a <b><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></b></p>
            <p>
              Outros: ___________________________________________________________________
              &nbsp;&nbsp;&nbsp;
              <!-- square icon -->
              <b>[&nbsp;&nbsp;&nbsp;&nbsp;] Multa 10%</b>
            </p>
            <p>Valor bruto do aluguel: R$ <?= number_format($parc_valor, 2, ',', '.'); ?></p>
            <p>
              Valor da comissão
              <b>(<?= $parc_comissao_porcentagem ?>%)</b>:
              <b>R$ <?= number_format($parc_comissao_valor, 2, ',', '.'); ?></b>
            </p>
            <p>Valor líquido do aluguel: R$ <?= number_format($parc_valor_liquido, 2, ',', '.'); ?></p>
            <p>Data: _____/_____/______</p>
            <p><b>Assinatura do locador:</b> _____________________________________________________
              &nbsp&nbsp&nbsp Data de repasse: _____/_____/______</p>
          </div>
          <div style="border-bottom: 2px dashed #999"></div>
          <!--- 3ª via -->
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px">
              <div style="color: #000;" class="text-center">
                3ª via
                <br />
                <!-- icon -->
                <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                Locador
              </div>
            </div>
            <p>
              <span><?php echo mb_strtoupper($config['razao_social'], 'UTF-8'); ?></span>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                N° Contrato: <b><?php echo $parcela['id_contrato'] ?></b>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
              Endereço:
              <?php echo $config['endereco'] . ' - ' . $config['bairro']; ?>
              <span class="ml">
                <!-- icon -->
                <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                Telefone: <?php echo $config['telefone']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-building fa-fw" aria-hidden="true"></i>
              CNPJ: <?php echo $config['cnpj']; ?>
              <span class="ml">
                <!-- icon of doc-->
                <i class="fa fa-id-card fa-fw" aria-hidden="true"></i>
                CRECI: <?php echo $config['creci']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-user fa-fw" aria-hidden="true"></i>
              Locador: <?php echo $proprietario['nome']; ?>
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
              Locatário: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
                CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
              </span>
            </p>
            <p>
              <!-- icon -->
              <i class="fa fa-home fa-fw" aria-hidden="true"></i>
              Endereço do imóvel: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?>
            </p>
            <p>Referente ao <b>pagamento de aluguel</b> do período de <b><?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?></b> a <b><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></b></p>
            <p>Outros: _________________________________________________________________</p>
            <p>Valor bruto do aluguel: R$ <?= number_format($parc_valor, 2, ',', '.'); ?> </p>
            <p>Valor líquido do aluguel: R$ <b> <?= number_format($parc_valor_liquido, 2, ',', '.'); ?> </b>
            </p>
            <p>Data: _____/_____/______</p>
            <p><b>Assinatura do responsável:</b> ________________________________________________
              &nbsp&nbsp&nbsp Data de repasse: _____/_____/______</p>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>