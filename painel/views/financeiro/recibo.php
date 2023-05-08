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
        <div style="margin-bottom: 0;" class="box box-primary">
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px; ">
              <div>1° via <br />Inquilino</div>
            </div>
            <p>
              <span><?php echo strtoupper($config['razao_social']); ?></span>
              <span class="ml">N°. Contrato: <?php echo $parcela['id_contrato'] ?></span>
            </p>
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
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              Locatario: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
              CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
                <span class="ml">CODIGO: <?php echo $inquilino['referencia']; ?></span>
              </span>
            </p>
            <p>Endereço: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?></p>
            <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></p>
            <p>Diversos: __________________________________________________________</p>
            <p>Valor bruto: R$ <?php echo number_format($imovel['valor'], 2, ',', '.'); ?></p>
            <p>Data: ___/___/____</p>
            <p>Ass. do responsável: _________________________________________________</p>
          </div>
          <div style="border-bottom: 1px dashed #999"></div>
          <!--- 2° via imobiliaria -->
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px">
              <div>2° via <br />Imobiliária</div>
            </div>
            <p><?php echo strtoupper($config['razao_social']); ?>
              <span class="ml">N°. Contrato: <?php echo $parcela['id_contrato'] ?></span>
            </p>
            <p>End:
              <?php echo $config['endereco'] . ' - ' . $config['bairro']; ?>
              <span class="ml">Telefone: <?php echo $config['telefone']; ?></span>
            </p>
            <p>
              CNPJ: <?php echo $config['cnpj']; ?>
              <span class="ml">CRECI: <?php echo $config['creci']; ?></span>
            </p>
            <hr style="margin: 10px 0; border-color: #aaa;">
            <p>
              Locador: <?php echo $proprietario['nome']; ?>
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              <?php 
                switch($proprietario['tipo_conta']){
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
              <b>Informações bancárias:</b>
            </p>
            <p>
              <span><b>Banco:</b> <?= is_null($proprietario['banco']) ? '---' : $proprietario['banco'] ?> |</span>
              <span><b>Tipo:</b> <?= $proprietario['tipo_conta'] ?> |</span>
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
              Locatario: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
              CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
                <span class="ml">CODIGO: <?php echo $inquilino['referencia']; ?></span>
              </span>
            </p>
            <p>Endereço: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?></p>
            <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></p>
            <p>Diversos: __________________________________________________________</p>
            <p>Valor bruto: R$ <?php echo number_format($imovel['valor'], 2, ',', '.'); ?></p>
            <p>Valor da comissão: R$ <?php
                                      $valor = floatval($imovel['valor']);
                                      $comissao = floatval($imovel['comissao']);
                                      $total = ($valor / 100) * $comissao;
                                      $valor = ceil($total);

                                      $valorB = $valor;

                                      echo number_format($valor, 2, ',', '.');
                                      ?>
            </p>
            <?php
            $valor = floatval($imovel['valor']);
            $valorC = ($valor - $valorB);


            ?>
            <p>Valor Liquido: <?php echo number_format($valorC, 2, ',', '.'); ?></p>
            <p>Data: ___/___/____</p>
            <p>Ass. do Proprietário: __________________________________________________
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspData: ___/___/____</p>
          </div>
          <div style="border-bottom: 1px dashed #999"></div>
          <!--- 3° via proprietaeio -->
          <div class="view no-shadow" style="position: relative;">
            <div style="position: absolute; top: 10px; right: 10px">
              <div>3° via <br />Proprietário</div>
            </div>
            <p><?php echo strtoupper($config['razao_social']); ?>
              <span class="ml">N°. Contrato: <?php echo $parcela['id_contrato'] ?></span>
            </p>

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
              <span class="ml text-bold">CPF/CNPJ: <?php echo $proprietario['cpf']; ?></span>
            </p>
            <p>
              Locatario: <?php echo $inquilino['nome']; ?>
              <span class="ml text-bold">
              CPF/CNPJ: <?php echo $inquilino['cpf']; ?>
                <span class="ml">CODIGO: <?php echo $inquilino['referencia']; ?></span>
              </span>
            </p>
            <p>Endereço: <?php echo $imovel['endereco'] . ' - ' . $imovel['bairro']; ?></p>
            <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($parcela['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></p>
            <p>Diversos: __________________________________________________________</p>
            <p>Valor bruto: R$ <?php echo number_format($imovel['valor'], 2, ',', '.'); ?></p>
            <p>Valor liquido: R$ <?php
                                  $valor = floatval($imovel['valor']);


                                  $total = ($valor - $valorB);

                                  echo number_format($total, 2, ',', '.')



                                  ////echo number_format($valor, 2, ',', '.');
                                  ?>

            </p>
            <p>Data: ___/___/____</p>
            <p>Ass. do responsável: _________________________________________________
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspData: ___/___/____</p>
            </p>
          </div>

        </div>
      </div>
  </section>
</div>
</div>