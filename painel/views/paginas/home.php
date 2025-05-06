<div class="content-wrapper">

  <section class="content-header">
    <h1 class="imob-custom-h1">
      IMOB - Sistema de Gerenciamento Imobiliário
    </h1>
  </section>

  <section class="content">

    <!-- CARDS -->
    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="<?= BASE_URL ?>imovel" title="Ir para imóveis">
          <div class="custom-imob-box">

            <div class="custom-imob-box-icon bg-aqua">
              <i class="fa fa-home"></i>
            </div>

            <div class="custom-block-ifb">

              <span>
                Imóveis cadastrados
              </span>
              <span class="custom-imob-box-num">
                <?php echo $count_total_imoveis; ?>
              </span>

              <span>
                Imóveis disponíveis
              </span>
              <span style="color: green;" class="custom-imob-box-num">
                <?php echo $count_disponiveis; ?>
              </span>

              <span>
                Imóveis alugados
              </span>
              <span style="color: blue;" class="custom-imob-box-num">
                <?php echo $count_alugados; ?>
                <code style="font-size: 12px;">(Deve ser igual a contratos cadastrados)</code>
              </span>
            </div>

          </div>
        </a>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="#target-show-three" style="position: absolute; bottom: 30px; right: 20px;" title="Ir para renovações" class="btn btn-sm btn-success pull-right mr-10">
          <i style="margin-right: 5px;" class="fa fa-angle-double-down fa-1x"></i>
          Renovações
        </a>
        <a href="<?= BASE_URL ?>contratos/buscar" title="Ir para contratos">
          <div class="custom-imob-box">

            <div class="custom-imob-box-icon bg-yellow">
              <i class="fa fa-list-alt"></i>
            </div>

            <div class="custom-block-ifb">

              <span>
                Contratos cadastrados
              </span>
              <span style="color: blue;" class="custom-imob-box-num">
                <?php echo $totalContratos; ?>
                <code style="font-size: 12px;">(Deve ser igual a imóveis alugados)</code>
              </span>

              <span>
                Contratos ativos/à vencer
              </span>
              <span style="color: green;" class="custom-imob-box-num">
                <?php echo $totalContratos - count($contrato); ?>
              </span>

              <span>
                Contratos vencidos
              </span>
              <span style="color: red;" class="custom-imob-box-num">
                <?php echo count($contrato); ?>
              </span>

            </div>

          </div>
        </a>
      </div>

    </div>

    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="<?= BASE_URL ?>proprietarios" title="Ir para proprietários">
          <div class="custom-imob-box">

            <div class="custom-imob-box-icon bg-green">
              <i class="fa fa-users"></i>
            </div>

            <div class="custom-block-ifb">

              <span>
                Proprietários cadastrados
              </span>
              <span class="custom-imob-box-num">
                <?php echo $totalProprietarios; ?>
              </span>

              <span>
                Proprietários ativos
              </span>
              <span style="color: green;" class="custom-imob-box-num">
                <?php echo $totalProprietariosAtivos; ?>
              </span>

              <span>
                Proprietários inativos
              </span>
              <span style="color: red;" class="custom-imob-box-num">
                <?php echo $totalProprietariosInativos; ?>
              </span>

            </div>

          </div>
        </a>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="<?= BASE_URL ?>inquilinos" title="Ir para inquilinos">
          <div class="custom-imob-box">

            <div class="custom-imob-box-icon bg-red">
              <i class="fa fa-user"></i>
            </div>

            <div class="custom-block-ifb">

              <span>
                Inquilinos cadastrados
              </span>
              <span class="custom-imob-box-num">
                <?php echo $totalInquilinos; ?>
              </span>

              <span>
                Inquilinos ativos
              </span>
              <span style="color: green;" class="custom-imob-box-num">
                <?php echo $totalInquilinosAtivos; ?>
              </span>

              <span>
                Inquilinos inativos
              </span>
              <span style="color: red;" class="custom-imob-box-num">
                <?php echo $totalInquilinosInativos; ?>
              </span>

            </div>

          </div>
        </a>
      </div>

    </div>
    <!-- END -->

    <!-- IMV DISPONÍVEIS -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success imob-box">
          <div style="border-bottom: 2px solid #ddd;" class="box-header imob-flex-row remove-b-and-a">

            <h3 style="font-size: 21px; padding: 10px;" class="box-title fw-bold">
              <i style="margin-right: 5px;" class="fa fa-home text-success"></i>
              Imóveis Disponíveis:
              <b style="color: #16a34a;">
                <?php echo count($disponiveis) ?>
              </b>
            </h3>

            <div class="home-flex-btns">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="margin-right: 5px;" class="fa fa-file-powerpoint-o"></i>
                  Relatório de Imóveis Disponíveis
                  <span style="margin-left: 5px;" class="caret"></span>
                </button>
                <ul style="min-width: 200px; border: 1px solid #aaa; padding: 0;" class="dropdown-menu dropdown-menu-right fs-16">
                  <li style="border-bottom: 1px solid #aaa;">
                    <a style="padding: 10px 20px;" href="<?= BASE_URL ?>relatorios/disponiveis" target="_blank">
                      <i style="margin-right: 5px;" class="fa fa-external-link"></i>
                      Lista
                    </a>
                  </li>
                  <li>
                    <a style="padding: 10px 20px;" href="<?= BASE_URL ?>relatorios/blocosDisponiveis" target="_blank">
                      <i style="margin-right: 5px;" class="fa fa-external-link"></i>
                      Blocos
                    </a>
                  </li>
                </ul>
              </div>
            </div>

          </div>
          <div id="target-show-one" class="box-body table-responsive imob-table-responsive">
            <table id="example2" class="table table-bordered table-hover fs-16">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Endereço</th>
                  <th>Bairro</th>
                  <th>Proprietário</th>
                  <th>Valor</th>
                  <th style="background-color: #4ade80; color: #052e16;">CEMIG</th>
                  <th style="width: min-content;">Ações</th>
                </tr>
              </thead>
              <?php foreach ($disponiveis as $disponivel) : ?>
                <tr>
                  <td>
                    <?php
                    switch ($disponivel['tipo']) {
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
                  </td>
                  <td><?php echo $disponivel['endereco']; ?></td>
                  <td><?php echo $disponivel['bairro']; ?></td>
                  <td><?php echo $disponivel['nome_proprietario']; ?></td>
                  <td class="nowrap fw-bold">
                    R$ <?php echo number_format($disponivel['valor'], 2, ",", "."); ?>
                  </td>
                  <td style="vertical-align: middle; background-color: #f0fdf4;" class="text-center">
                    <?php

                    if (!is_null($disponivel['cemig'])) :
                      echo "
                      <span style='color: #14532d; font-weight: 700; font-size: 16px;'>"
                        . $disponivel['cemig'] .
                        "</span>
                      ";
                    else :
                      echo "
                      <span style='color: red; font-weight: 500; font-size: 14px;'>
                        Não cadastrado
                      </span>
                      ";
                    endif;

                    ?>
                  </td>

                  <td style="vertical-align: middle;" class="text-center nowrap">
                    <a href="imovel/ver/<?php echo $disponivel['id']; ?>" title="Ver"
                      style="margin: 0 5px;">
                      <i class="fa fa-eye fa-1x fa-border text-primary"></i>
                    </a>
                    <a href="imovel/editar/<?php echo $disponivel['id']; ?>" title="Editar" style="margin: 0 5px;">
                      <i class="fa fa-pencil-square-o fa-1x fa-border text-success"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <div id="div-show-one" class="imob-show-all">
            <h2 class="fs-20" id="btn-show-one">
              <i style="margin-right: 5px;" class="fa fa-eye fa-1x"></i>
              Mostrar tudo
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

    <!-- PARCELAS VENCIDAS -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-danger imob-box">
          <div style="border-bottom: 2px solid #ddd;" class="box-header imob-flex-row remove-b-and-a">
            <h3 style="font-size: 21px; padding: 10px;" class="box-title fw-bold">
              <i style="margin-right: 5px;" class="fa fa-money text-danger"></i>
              Parcelas Vencidas:
              <b style="color: #dc2626;">
                <?php echo count($atrasado) ?>
              </b>
            </h3>

            <div class="home-flex-btns">
              <a class="btn btn-default" href="<?= BASE_URL ?>relatorios/parcelasClientes">
                <i style="margin-right: 5px;" class="fa fa-user-circle-o"></i>
                Relatórios de Parcelas de Clientes
              </a>
            </div>
          </div>

          <div id="target-show-two" class="box-body table-responsive imob-table-responsive">
            <table id="example2" class="table table-bordered table-hover fs-16">
              <thead>
                <tr>
                  <th>N° Cont.</th>
                  <!-- <th>N° Parc.</th> -->
                  <th>Inquilino</th>
                  <th>Proprietário</th>
                  <th>Valor</th>
                  <th>Data Início</th>
                  <th>Data Venc.</th>
                  <th style="width: min-content;">Ações</th>
                </tr>
              </thead>
              <?php foreach ($atrasado as $vencido) : ?>
                <tr class="danger">
                  <td><?php echo $vencido['id_contrato']; ?></td>
                  <!-- <td><?php echo $vencido['n_parcela']; ?></td> -->
                  <td><?php echo $vencido['nome_inquilino']; ?></td>
                  <td><?php echo $vencido['nome_proprietario']; ?></td>
                  <td class="nowrap fw-bold">R$ <?php echo number_format($vencido['valor'], 2, ",", "."); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($vencido['data_inicio'])); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($vencido['data_fim'])); ?></td>
                  <td style="vertical-align: middle;" class="text-center nowrap">
                    <a href="<?php echo BASE_URL; ?>financeiro?contrato=<?php echo $vencido['id_contrato']; ?>"
                      title="Pagamentos" style="margin: 0 5px;">
                      <i class="fa fa-money fa-1x fa-border text-success"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <div id="div-show-two" class="imob-show-all">
            <h2 class="fs-20" id="btn-show-two">
              <i style="margin-right: 5px;" class="fa fa-eye fa-1x"></i>
              Mostrar tudo
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

    <!-- CONTRATOS VENCIDOS -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-danger imob-box">
          <div style="border-bottom: 2px solid #ddd;" class="box-header imob-flex-row remove-b-and-a">
            <h3 style="font-size: 21px; padding: 10px;" class="box-title fw-bold">
              <i style="margin-right: 5px;" class="fa fa-list-alt text-danger"></i>
              Contratos Vencidos para Renovação:
              <b style="color: #dc2626;">
                <?php echo count($contrato) ?>
              </b>
            </h3>
            <div class="home-flex-btns">
              <a style="color: #dc2626;" class="btn btn-default" href="<?= BASE_URL ?>contratos?status=3">
                <i style="margin-right: 5px;" class="fa fa-list-alt"></i>
                Visualizar Contratos Vencidos
              </a>
            </div>
          </div>
          <div id="target-show-three" class="box-body table-responsive imob-table-responsive">
            <table id="example2" class="table table-bordered table-hover fs-16">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Inquilino</th>
                  <th>Proprietário</th>
                  <th>Imóvel</th>
                  <th>Início</th>
                  <th>Término</th>
                  <th style="width: min-content;">Ações</th>
                </tr>
              </thead>
              <?php foreach ($contrato as $c): ?>

                <tr class="danger">
                  <td><?php echo $c['id']; ?></td>
                  <td><?php echo $c['nome_inquilino']; ?></td>
                  <td><?php echo $c['nome_proprietario']; ?></td>
                  <td><?php echo $c['end_imv']; ?></td>
                  <td class="fw-bold"><?php echo date("d/m/Y", strtotime($c['data_inicio'])); ?></td>
                  <td class="fw-bold"><?php echo date("d/m/Y", strtotime($c['data_final'])); ?></td>
                  <td style="vertical-align: middle;" class="text-center nowrap">
                    <a class="btn btn-success" style="margin: 0 5px;" href="<?= BASE_URL . 'contratos/renovar/' . $c['id']; ?>" title="Renovar">
                      <i style="margin-right: 5px;" class="fa fa-refresh fa-1x"></i>
                      Renovar
                    </a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </table>
          </div>
          <div id="div-show-three" class="imob-show-all">
            <h2 class="fs-20" id="btn-show-three">
              <i style="margin-right: 5px;" class="fa fa-eye fa-1x"></i>
              Mostrar tudo
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

  </section>

</div>

<script>
  // Show One
  let btnShowOne = document.querySelector('#btn-show-one');
  let targetShowOne = document.querySelector('#target-show-one');
  let divShowOne = document.querySelector('#div-show-one');

  btnShowOne.addEventListener('click', () => {
    targetShowOne.classList.toggle('imob-uncollapse-box');
    divShowOne.style.display = 'none';
  });
  // Show Two
  let btnShowTwo = document.querySelector('#btn-show-two');
  let targetShowTwo = document.querySelector('#target-show-two');
  let divShowTwo = document.querySelector('#div-show-two');

  btnShowTwo.addEventListener('click', () => {
    targetShowTwo.classList.toggle('imob-uncollapse-box');
    divShowTwo.style.display = 'none';
  });
  // Show Three
  let btnShowThree = document.querySelector('#btn-show-three');
  let targetShowThree = document.querySelector('#target-show-three');
  let divShowThree = document.querySelector('#div-show-three');

  btnShowThree.addEventListener('click', () => {
    targetShowThree.classList.toggle('imob-uncollapse-box');
    divShowThree.style.display = 'none';
  });
</script>