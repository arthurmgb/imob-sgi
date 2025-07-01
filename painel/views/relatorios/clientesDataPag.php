<div class="content-wrapper">

    <section class="content-header">

        <h1 class="imob-custom-h1">
            Relatório de Parcelas de Clientes por Data de Pagamento
            <a href="<?php echo BASE_URL; ?>relatorios/parcelasClientes" name="button-toggle-rel" value="button-toggle-rel" class="btn btn-primary pull-right">
                <i class="fa fa-undo fa-fw"></i>
                Alterar tipo de relatório
            </a>
        </h1>

        <form role="form" method="POST">

            <div style="margin-top: 2rem;" class="row">

                <div class="col-xs-9">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon1">Mês de pagamento</span>
                        <select style="cursor: pointer;" class="form-control" name="selected-mes" required>
                            <option value="01" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '01' ? 'selected' : ''; ?>>Janeiro</option>
                            <option value="02" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '02' ? 'selected' : ''; ?>>Fevereiro</option>
                            <option value="03" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '03' ? 'selected' : ''; ?>>Março</option>
                            <option value="04" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '04' ? 'selected' : ''; ?>>Abril</option>
                            <option value="05" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '05' ? 'selected' : ''; ?>>Maio</option>
                            <option value="06" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '06' ? 'selected' : ''; ?>>Junho</option>
                            <option value="07" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '07' ? 'selected' : ''; ?>>Julho</option>
                            <option value="08" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '08' ? 'selected' : ''; ?>>Agosto</option>
                            <option value="09" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '09' ? 'selected' : ''; ?>>Setembro</option>
                            <option value="10" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '10' ? 'selected' : ''; ?>>Outubro</option>
                            <option value="11" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '11' ? 'selected' : ''; ?>>Novembro</option>
                            <option value="12" <?= isset($get_input_data['selected-mes']) && $get_input_data['selected-mes'] == '12' ? 'selected' : ''; ?>>Dezembro</option>

                        </select>
                    </div>
                </div>
                <div class="col-xs-3">
                    <style>
                        #ano-pag::-webkit-outer-spin-button,
                        #ano-pag::-webkit-inner-spin-button {
                            -webkit-appearance: none;
                        }
                    </style>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon1">Ano</span>
                        <input style="font-weight: bold;" id="ano-pag" min="2000" class="form-control" type="number" name="ano-pag" value="<?= isset($get_input_data['ano-pag']) ? $get_input_data['ano-pag'] : date('Y'); ?>" required>

                    </div>
                </div>

            </div>

            <div style="margin-top: 2rem;" class="row">

                <div class="col-xs-12">
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
                                <a href="<?= BASE_URL ?>relatorios/clientesDataPag" role="button" class="btn btn-default pull-right noPrint-rel" style="margin-right: 1rem;">
                                    <i style="margin-right: 1rem;" class="fa fa-undo" aria-hidden="true"></i>
                                    Limpar busca
                                </a>

                                <?php

                                $r_pagas = 0;
                                $valor_a_rcb = 0;

                                foreach ($parcelas as $parcela) {

                                    $r_data_fim = strtotime($parcela['data_fim']);
                                    $r_um_mes_frente = strtotime('+1 month');

                                    if ($parcela['status'] == 1) {
                                        $r_pagas += 1;
                                    }

                                    $calc_parc_comissao_porcentagem = floatval($parcela['imv_comissao']);
                                    $calc_parc_comissao_valor = ceil(($parcela['valor'] / 100) * $calc_parc_comissao_porcentagem);

                                    $valor_a_rcb += $calc_parc_comissao_valor;
                                }

                                $valor_a_rcb = number_format($valor_a_rcb, 2, ',', '.');

                                ?>

                                <h3 style="margin-top: 0;">
                                    Resultados de
                                    <!-- Exibir mês e ano selecionados PT-BR -->
                                    <?php
                                    $meses = [
                                        // Primeira letra maiúscula
                                        1 => 'Janeiro',
                                        2 => 'Fevereiro',
                                        3 => 'Março',
                                        4 => 'Abril',
                                        5 => 'Maio',
                                        6 => 'Junho',
                                        7 => 'Julho',
                                        8 => 'Agosto',
                                        9 => 'Setembro',
                                        10 => 'Outubro',
                                        11 => 'Novembro',
                                        12 => 'Dezembro'
                                    ];
                                    $mes = $meses[(int)$get_input_data['selected-mes']];
                                    ?>
                                    <b>
                                        <?= $mes . ' de ' . $get_input_data['ano-pag']; ?>
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
                                    <i style="margin-right: 0.5rem; color: #22c55e;" class="fa fa-circle" aria-hidden="true"></i>
                                    Parcelas pagas:
                                    <b style="color: #3C8DBC;"> <?= $r_pagas ?> </b>
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