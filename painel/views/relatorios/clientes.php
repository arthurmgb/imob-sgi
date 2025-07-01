<div class="content-wrapper">

    <section class="content-header">

        <h1 class="imob-custom-h1">
            Relatório de Parcelas de Clientes por Período
            <a href="<?php echo BASE_URL; ?>relatorios/parcelasClientes" name="button-toggle-rel" value="button-toggle-rel" class="btn btn-primary pull-right">
                <i class="fa fa-undo fa-fw"></i>
                Alterar tipo de relatório
            </a>
        </h1>

        <form role="form" method="POST">

            <div style="margin-top: 2rem;" class="row">

                <div class="col-xs-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon1">Início</span>
                        <input style="cursor: pointer;" onfocus="this.showPicker()" class="form-control" type="date" name="data-inicio" value="<?= $get_input_data['data-inicio'] ?>" required>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon2">Venc.</span>
                        <input style="cursor: pointer;" onfocus="this.showPicker()" class="form-control" type="date" name="data-fim" value="<?= $get_input_data['data-fim'] ?>" required>
                    </div>
                </div>

            </div>

            <div style="margin-top: 2rem;" class="row">

                <div class="col-xs-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon3">Situação</span>
                        <?php

                        $option_sit = '';

                        if (isset($get_input_data['selected-situacao'])) {
                            $option_sit = $get_input_data['selected-situacao'];
                        }

                        ?>
                        <select style="cursor: pointer;" class="form-control" name="selected-situacao">
                            <option value="all" <?= ($option_sit == 'all') ? 'selected' : '' ?>>
                                🟣 Todas
                            </option>
                            <option value="1" <?= ($option_sit == '1') ? 'selected' : '' ?>>
                                🟢 Pagas
                            </option>
                            <option value="0" <?= ($option_sit == '0') ? 'selected' : '' ?>>
                                🔵 Pendentes
                            </option>
                            <option value="3" <?= ($option_sit == '3') ? 'selected' : '' ?>>
                                🔴 Vencidas
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon4">Inquilinos</span>
                        <?php

                        $option_cli = '';

                        if (isset($get_input_data['selected-cliente'])) {
                            $option_cli = $get_input_data['selected-cliente'];
                        }

                        ?>
                        <select style="cursor: pointer;" class="form-control" name="selected-cliente">
                            <option value="all" <?= ($option_cli == 'all') ? 'selected' : '' ?>>Todos (<?= count($get_all_inquilinos); ?> cadastrados) </option>
                            <?php foreach ($get_all_inquilinos as $single_inquilino) : ?>
                                <option value="<?= $single_inquilino['referencia']; ?>" <?= ($option_cli == $single_inquilino['referencia']) ? 'selected' : '' ?>>
                                    <?= $single_inquilino['nome']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

            <div style="margin-top: 2rem;" class="row">

                <div class="col-xs-12">
                    <button name="button-search" value="button-search" type="submit" class="btn btn-primary btn-lg btn-block">
                        <i style="margin-right: 1rem;" class="fa fa-search" aria-hidden="true">
                        </i>
                        Buscar
                    </button>
                </div>

            </div>

        </form>

    </section>

    <?php if (!empty($get_input_data['button-search'])) : ?>
        <?php if (count($parcelas) > 0) : ?>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div style="padding: 15px 20px;" class="box-header">
                                <button onclick="window.print();" class="btn btn-primary pull-right noPrint-rel">
                                    <i style="margin-right: 1rem;" class="fa fa-print" aria-hidden="true"></i>
                                    Imprimir
                                </button>
                                <a href="<?= BASE_URL ?>relatorios/clientes" role="button" class="btn btn-default pull-right noPrint-rel" style="margin-right: 1rem;">
                                    <i style="margin-right: 1rem;" class="fa fa-undo" aria-hidden="true"></i>
                                    Limpar busca
                                </a>

                                <?php

                                $r_pagas = 0;
                                $r_vencidas = 0;
                                $r_pendentes = 0;
                                $r_a_vencer = 0;

                                $vl_pagas = 0;
                                $vl_vencidas = 0;
                                $vl_pendentes = 0;
                                $vl_a_vencer = 0;

                                $valor_a_rcb = 0;

                                foreach ($parcelas as $parcela) {

                                    $r_data_fim = strtotime($parcela['data_fim']);
                                    $r_um_mes_frente = strtotime('+1 month');

                                    if ($parcela['status'] == 1) {
                                        $r_pagas += 1;
                                        $vl_pagas += round($parcela['valor']);
                                    } else if (time() > $r_data_fim) {
                                        $r_vencidas += 1;
                                        $vl_vencidas += round($parcela['valor']);
                                    } elseif ($r_data_fim >= time() && $r_data_fim <= $r_um_mes_frente) {
                                        $r_pendentes += 1;
                                        $vl_pendentes += round($parcela['valor']);
                                    } else {
                                        $r_a_vencer += 1;
                                        $vl_a_vencer += round($parcela['valor']);
                                    }

                                    $calc_parc_comissao_porcentagem = floatval($parcela['imv_comissao']);
                                    $calc_parc_comissao_valor = ceil(($parcela['valor'] / 100) * $calc_parc_comissao_porcentagem);

                                    $valor_a_rcb += $calc_parc_comissao_valor;
                                }

                                $vl_pagas = number_format($vl_pagas, 2, ',', '.');
                                $vl_vencidas = number_format($vl_vencidas, 2, ',', '.');
                                $vl_pendentes = number_format($vl_pendentes, 2, ',', '.');
                                $vl_a_vencer = number_format($vl_a_vencer, 2, ',', '.');
                                $valor_a_rcb = number_format($valor_a_rcb, 2, ',', '.');

                                ?>

                                <h3 style="margin-top: 0;">
                                    Perídodo de
                                    <b>
                                        <?= date('d/m/Y', strtotime($get_input_data['data-inicio'])); ?>
                                        até
                                        <?= date('d/m/Y', strtotime($get_input_data['data-fim'])); ?>
                                    </b>
                                    <br>
                                    <small style="color: #000; font-size: 18px;">
                                        Relatório impresso em:
                                        <b>
                                            <?= date('d/m/Y H:i'); ?>
                                        </b>
                                    </small>
                                </h3>
                                <hr>
                                <h4>
                                    Total de parcelas encontradas:
                                    <b style="color: #3C8DBC;"> <?= count($parcelas); ?> </b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #22c55e;" class="fa fa-circle" aria-hidden="true"></i>
                                    Parcelas pagas:
                                    <b style="color: #3C8DBC;"> <?= $r_pagas ?> </b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #3b82f6;" class="fa fa-circle" aria-hidden="true"></i>
                                    Parcelas pendentes:
                                    <b style="color: #3C8DBC;"> <?= $r_pendentes ?> </b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #ef4444;" class="fa fa-circle" aria-hidden="true"></i>
                                    Parcelas vencidas:
                                    <b style="color: #3C8DBC;"> <?= $r_vencidas ?> </b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #333;" class="fa fa-circle-o" aria-hidden="true"></i>
                                    Parcelas à vencer (daqui a mais de um mês):
                                    <b style="color: #3C8DBC;"> <?= $r_a_vencer ?> </b>
                                </h4>
                                <hr>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #22c55e;" class="fa fa-circle" aria-hidden="true"></i>
                                    Valor total pagas:
                                    <b style="color: green;">R$ <?= $vl_pagas ?></b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #3b82f6;" class="fa fa-circle" aria-hidden="true"></i>
                                    Valor total pendentes:
                                    <b style="color: green;">R$ <?= $vl_pendentes ?></b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #ef4444;" class="fa fa-circle" aria-hidden="true"></i>
                                    Valor total vencidas:
                                    <b style="color: green;">R$ <?= $vl_vencidas ?></b>
                                </h4>
                                <h4>
                                    <i style="margin-right: 0.5rem; color: #333;" class="fa fa-circle-o" aria-hidden="true"></i>
                                    Valor total à vencer (daqui a mais de um mês):
                                    <b style="color: green;">R$ <?= $vl_a_vencer ?></b>
                                </h4>
                                <hr>
                                <h4 style="margin-bottom: 0; font-size: 22px;">
                                    <b>Valor total:</b>
                                    <b style="color: green;">R$ <?= $valor_total ?></b>
                                </h4>
                                <h4 style="margin-bottom: 0; font-size: 22px;">
                                    <b>Valor total de comissões:</b>
                                    <b style="color: green;">R$ <?= $valor_a_rcb ?></b>
                                </h4>
                                <hr style="margin-bottom: 0;">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>N° Cont.</th>
                                            <th>Inquilino</th>
                                            <th>N° Parc.</th>
                                            <th>Valor</th>
                                            <th>Vl. Comissão</th>
                                            <th>% Comissão</th>
                                            <th>Data Início</th>
                                            <th>Data Venc.</th>
                                            <th>Data Pag.</th>
                                            <th>Origem</th>
                                        </tr>
                                    </thead>

                                    <?php foreach ($parcelas as $parcela) :
                                        $data_fim = strtotime($parcela['data_fim']);
                                        $um_mes_frente = strtotime('+1 month');
                                        if ($parcela['status'] == 1) {
                                            $status = 'success';
                                        } else if (time() > $data_fim) {
                                            $status = 'danger';
                                        } elseif ($data_fim >= time() && $data_fim <= $um_mes_frente) {
                                            $status = 'info';
                                        } else {
                                            $status = '';
                                        }
                                    ?>
                                        <?php
                                        $parc_valor = round($parcela['valor']);
                                        $parc_comissao_porcentagem = floatval($parcela['imv_comissao']);
                                        $parc_comissao_valor = ceil(($parc_valor / 100) * $parc_comissao_porcentagem);
                                        ?>

                                        <tr class="<?php echo $status; ?>">
                                            <td><?php echo $parcela['id_contrato']; ?></td>
                                            <td><?php echo $parcela['nome_inquilino']; ?></td>
                                            <td><?php echo $parcela['n_parcela']; ?></td>
                                            <td style="white-space: nowrap;">
                                                R$ <?= number_format($parc_valor, 2, ',', '.'); ?>
                                            </td>
                                            <td style="text-align: center; font-weight: bold; white-space: nowrap;">
                                                R$ <?= number_format($parc_comissao_valor, 2, ',', '.'); ?>
                                            </td>
                                            <td style="text-align: center;"><?= $parc_comissao_porcentagem ?>%</td>
                                            <td><?php echo date("d/m/Y", strtotime($parcela['data_inicio'])); ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></td>
                                            <?php if ($parcela['data_pag'] > 0) : ?>
                                                <td><?php echo date('d/m/Y', strtotime($parcela['data_pag'])); ?></td>
                                            <?php else : ?>
                                                <td></td>
                                            <?php endif; ?>
                                            <td style="text-align: center;">
                                                <?php
                                                $origem = null;
                                                switch ($parcela['origem']) {
                                                    case null:
                                                        $origem = "Indefinida";
                                                        break;
                                                    case 1:
                                                        $origem = "CAIXA";
                                                        break;
                                                    case 2:
                                                        $origem = "BANCO";
                                                        break;
                                                    case 3:
                                                        $origem = "CAIXA/BANCO";
                                                        break;
                                                    default:
                                                        $origem = "---";
                                                        break;
                                                }
                                                ?>
                                                <span style="<?= ($origem === 'Indefinida') ? 'color: red;' : 'font-weight: bold'; ?>">
                                                    <?= $origem  ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </section>
        <?php else : ?>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div style="padding: 50px;" class="box-header">
                                <h3 style="margin: 0;" class="text-center">
                                    <i style="margin-right: 1rem; color: #ef4444;" class="fa fa-times-circle" aria-hidden="true"></i>
                                    Nenhuma parcela encontrada para estes filtros.
                                </h3>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </section>
        <?php endif; ?>
    <?php else : ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div style="padding: 50px;" class="box-header">
                            <h3 style="margin: 0;" class="text-center">
                                <i style="margin-right: 1rem; color: #3C8DBC;" class="fa fa-info-circle" aria-hidden="true"></i>
                                Faça uma busca para filtrar os resultados.
                            </h3>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    <?php endif; ?>

</div>