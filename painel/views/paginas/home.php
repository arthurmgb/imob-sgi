<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="padding-left: 12px"><b>IMOB</b> - Sistema de Gerenciamento Imobiliário</h1>
    <section class="content">

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
                <span style="color: red;" class="custom-imob-box-num">
                  <?php echo $count_alugados; ?>
                </span>

              </div>

            </div>
          </a>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <a href="<?= BASE_URL ?>inquilinos" title="Ir para inquilinos">
            <div class="custom-imob-box">

              <div class="custom-imob-box-icon bg-red">
                <i class="fa fa-address-card"></i>
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

      <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
          <a href="<?= BASE_URL ?>proprietarios" title="Ir para proprietários">
            <div class="custom-imob-box">

              <div class="custom-imob-box-icon bg-green">
                <i class="fa fa-address-card-o"></i>
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
          <a href="<?= BASE_URL ?>contratos/buscar" title="Ir para contratos">
            <div class="custom-imob-box">

              <div class="custom-imob-box-icon bg-yellow">
                <i class="fa fa-handshake-o"></i>
              </div>

              <div class="custom-block-ifb">

                <span>
                  Contratos cadastrados
                </span>
                <span class="custom-imob-box-num">
                  <?php echo $totalContratos; ?>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 style="font-size: 21px; padding: 10px;" class="box-title">Imóveis Disponíveis para Aluguel: <b style="color: green;"><?php echo count($disponiveis) ?></b></h3>

              <div class="home-flex-btns pull-right">
                <a class="btn btn-primary" href="<?= BASE_URL ?>relatorios/disponiveis" target="_blank">Relatório de Imóveis Disponíveis</a>
              </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#COD</th>
                    <th>Tipo</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th style="color: #fff; background-color: green;">CEMIG</th>
                    <th>Valor</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <?php foreach ($disponiveis as $disponivel) : ?>
                  <tr>
                    <td><?php echo $disponivel['referencia']; ?></td>
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

                    <td style="vertical-align: middle; background-color: #dcfce7;" class="text-center">
                      <?php

                      if (!is_null($disponivel['cemig'])) :
                        echo "
                      <span style='color: green; font-weight: 700; font-size: 16px;'>"
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

                    <td>R$ <?php echo number_format($disponivel['valor'], 2, ",", "."); ?></td>
                    <td>
                      <a href="imovel/ver/<?php echo $disponivel['id']; ?>" title="Ver" style="margin:0 10px;"><i class="fa fa-eye fa-1x fa-border"></i></a>
                      <a href="imovel/editar/<?php echo $disponivel['id']; ?>" title="Editar"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>

            </div>

            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 style="font-size: 21px; padding: 10px;" class="box-title">Aluguel Vencido: <b style="color: red;"><?php echo count($atrasado) ?></b></h3>
              <div class="home-flex-btns pull-right">
                <a class="btn btn-primary" href="<?= BASE_URL ?>relatorios/clientes" target="_blank">Relatório de Parcelas de Clientes</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>N° Contrato</th>
                    <th>N° Parcela</th>
                    <th>Inquilino</th>
                    <th>Mês</th>
                    <th>Vencimento</th>
                    <th>Valor</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <?php foreach ($atrasado as $vencido) : ?>
                  <tr class="danger">
                    <td><?php echo $vencido['id_contrato']; ?></td>
                    <td><?php echo $vencido['n_parcela']; ?></td>
                    <td><?php echo $vencido['nome_inquilino']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($vencido['data_inicio'])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($vencido['data_fim'])); ?></td>
                    <td>R$ <?php echo number_format($vencido['valor'], 2, ",", "."); ?></td>
                    <td>
                      <a href="<?php echo BASE_URL; ?>financeiro?contrato=<?php echo $vencido['id_contrato']; ?>" title="Ver" style="margin:0 10px;"><i class="fa fa-eye fa-1x fa-border"></i></a>

                      <a href="#" onclick="confirm('Tem certeza que deseja pagar esta parcela?') ? window.location.href='<?php echo BASE_URL; ?>financeiro/pagar/<?php echo $vencido['id_contrato']; ?>/<?php echo $vencido['n_parcela']; ?>' : ''" title="Pagar"><i class="fa fa-money fa-1x fa-border"></i></a>

                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 style="font-size: 21px; padding: 10px;" class="box-title">Contratos Vencidos: <b style="color: red;"><?php echo count($contrato) ?></b></h3>
              <div class="home-flex-btns pull-right">
                <a class="btn btn-primary" href="<?= BASE_URL ?>contratos?status=3" target="_blank">Todos os Contratos Vencidos</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>N° Contrato</th>
                    <th>Inquilino</th>
                    <th>Proprietário</th>
                    <th>Imóvel</th>
                    <th>Início</th>
                    <th>Término</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <?php foreach ($contrato as $c) :

                  $data_final = strtotime($c['data_final']);
                  $um_mes_frente = strtotime('+1 month');

                  if (time() > $data_final) {
                    $status = 'danger';
                  } elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                    $status = 'info';
                  } else {
                    $status = '';
                  }
                ?>
                  <!-- danger info -->
                  <tr class="<?php echo $status; ?>">
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo $c['nome_inquilino']; ?></td>
                    <td><?php echo $c['nome_proprietario']; ?></td>
                    <td><?php echo $c['cod_imovel']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($c['data_inicio'])); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($c['data_final'])); ?></td>
                    <td>
                      <a href="<?php echo BASE_URL . 'contratos/ver/' . $c['id']; ?>" title="Ver"><i class="fa fa-eye fa-1x fa-border"></i></a>
                      <a href="#" onclick="confirm('Tem certeza que deseja renovar este contrato?') ? window.location.href='<?php echo BASE_URL . 'contratos/renovar/' . $c['id']; ?>' : ''" title="Renovar"><i class="fa fa-file fa-1x fa-border"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>