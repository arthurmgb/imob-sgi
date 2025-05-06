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
      Comprovante de pagamento - N° <?php echo $parcela['n_parcela']; ?>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <?php for ($q = 1; $q <= 3; $q++): ?>
            <div class="view no-shadow" style="position: relative;">
              <div style="position: absolute; top: 5px; right: 10px">
                <div><?php echo $q; ?>° via</div>
                <div><?php
                      $vias = array(
                        '1' => 'Inquilino',
                        '2' => 'Imobiliária',
                        '3' => 'Proprietário'
                      );
                      echo $vias[$q];
                      ?></div>
              </div>


              <p><?php echo mb_strtoupper($config['razao_social'], 'UTF-8'); ?></p>
              <p>End:
                <?php echo $config['endereco'] . ' - ' . $config['bairro']; ?>
                <span class="ml">Telefone: <?php echo $config['telefone']; ?></span>
              </p>
              <p>
                CNPJ: <?php echo $config['cnpj']; ?>
                <span class="ml">CRECI: <?php echo $config['creci']; ?></span>
              </p>
              <p>
                Locador: <?php echo $proprietario['nome']; ?>
                <span class="ml">CPF: <?php echo $proprietario['cpf']; ?></span>
              </p>

              <p>
                Locatario: <?php echo $inquilino['nome']; ?>
                <span class="ml">
                  CPF: <?php echo $inquilino['cpf']; ?>
                  <span class="ml">CODIGO: <?php echo $inquilino['referencia']; ?></span>
                </span>
              </p>
              <div style="margin-top: 30px"></div>
              <p>Endereço: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?></p>
              <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></p>
              <p>Diversos: __________________________________________________________</p>
              <p>Valor bruto: R$ <?php

                                  $valor = floatval($imovel['valor']);

                                  if ($q != 1) {
                                    $comissao = floatval($imovel['comissao']);

                                    $total = ($valor / 100) * $comissao;
                                    if ($q == 2) {
                                      $valor -= $total;
                                    } elseif ($q == 3) {
                                      $valor = $total;
                                    }
                                  }

                                  echo number_format($valor, 2, ',', '.');

                                  ?></p>
              <p>Valor liquido: R$ ______________</p>
              <p>Data: ___/___/____</p>
              <p>Ass. do responsável: _________________________________________________</p>
            </div>
            <?php if ($q != 3): ?>
              <div style="border-bottom: 1px dashed #999"></div>
          <?php endif;
          endfor; ?>
        </div>

        <a href="javascript:window.print();" target="_blank" class="btn btn-primary pull-right">
          <i class="fa fa-print"></i> Imprimir
        </a>

      </div>
  </section>
</div>
</div>