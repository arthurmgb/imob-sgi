<div class="content-wrapper">

    <section class="content-header">
        <h1 class="imob-custom-h1">
            Painel de Aprovação
        </h1>
    </section>

    <section class="content">

        <!-- ALERT -->
        <?php if (!empty($_GET['msg'])): ?>
            <div class="alert mb-10 alert-<?php echo $_GET['type']; ?> fs-16">
                <?php echo $_GET['msg']; ?>
            </div>
        <?php endif; ?>
        <!-- END -->

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger p-10">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i style="margin-right: 8px;" class="fa fa-list-alt"></i>
                            Exclusão de Contratos
                        </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <h3 class="fs-18 p-10 mb-10 bg-info rad-6">
                            <i style="margin-right: 5px;" class="fa fa-gavel"></i>
                            Aguardando Aprovação
                        </h3>
                        <table id="t-aguardando" class="table table-bordered table-hover fs-16">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Inquilino</th>
                                    <th>Proprietário</th>
                                    <th>Imóvel</th>
                                    <th>Início</th>
                                    <th>Término</th>
                                    <th>Solicitante</th>
                                </tr>
                            </thead>

                            <?php if (count($contratos)): ?>

                                <?php foreach ($contratos as $contrato_to_approve):

                                    $data_final = strtotime($contrato_to_approve['data_final']);
                                    $um_mes_frente = strtotime('+1 month');

                                    if (time() > $data_final) {
                                        $status = 'danger';
                                    } elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                                        $status = 'info';
                                    } else {
                                        $status = '';
                                    }
                                ?>

                                    <tr class="<?php echo $status; ?> <?= $contrato_to_approve['del_approval'] == '1' ? 'cont-excluir-style' : '' ?>">
                                        <td><?php echo $contrato_to_approve['id']; ?></td>
                                        <td><?php echo $contrato_to_approve['nome_inquilino']; ?></td>
                                        <td><?php echo $contrato_to_approve['nome_proprietario']; ?></td>
                                        <td><?php echo $contrato_to_approve['end_imv']; ?></td>
                                        <td>
                                            <?php echo date("d/m/Y", strtotime($contrato_to_approve['data_inicio'])); ?>
                                        </td>
                                        <td>
                                            <?php echo date("d/m/Y", strtotime($contrato_to_approve['data_final'])); ?>
                                        </td>
                                        <td style="font-weight: bold;">
                                            <?php echo $contrato_to_approve['del_user']; ?>
                                        </td>
                                    </tr>
                                    <?php if ($contrato_to_approve['del_approval'] == '1'): ?>
                                        <tr>
                                            <td class="cont-excluir-advice" colspan="8">
                                                <div class="painel-d-flex">
                                                    <span>
                                                        <i style="margin-right: 5px;" class="fa fa-exclamation-triangle text-danger"></i>
                                                        Exclusão aguardando aprovação.
                                                    </span>
                                                    <div class="painel-d-flex-btns">
                                                        <a onclick="confirm('Deseja realmente aprovar a exclusão?\n\nEste contrato (<?= $contrato_to_approve['id']; ?>), bem como suas parcelas serão excluídos e não poderão mais ser recuperados!')? window.location.href='<?php echo BASE_URL . 'aprovacoes/aprovar/' . $contrato_to_approve['id']; ?>':''" class="btn btn-sm btn-success" href="#">
                                                            <i style="margin-right: 5px;" class="fa fa-thumbs-o-up"></i>
                                                            Aprovar
                                                        </a>
                                                        <a onclick="confirm('Deseja revogar a exclusão?\n\nEste contrato (<?= $contrato_to_approve['id']; ?>) será restaurado ao estado anterior.')? window.location.href='<?php echo BASE_URL . 'aprovacoes/revogar/' . $contrato_to_approve['id']; ?>':''" class="btn btn-sm btn-danger" href="#">
                                                            <i style="margin-right: 5px;" class="fa fa-thumbs-o-down"></i>
                                                            Revogar
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td style="padding: 40px;" class="text-center bg-info" colspan="8">
                                        <i style="margin-right: 5px;" class="fa fa-check-circle text-success"></i>
                                        Tudo certo! Nenhum contrato para aprovação.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                        <hr>
                        <h3 class="fs-18 p-10 my-10 bg-danger rad-6 flex-h-items">
                            <span>
                                <i style="margin-right: 5px;" class="fa fa-history"></i>
                                Histórico de Contratos Excluídos
                            </span>
                            <code style="font-size: 14px;">
                                <i style="margin-right: 5px;" class="fa fa-exclamation-triangle"></i>
                                Contratos excluídos <b>não</b> podem ser recuperados.
                            </code>
                        </h3>
                        <table id="t-historico" class="table table-bordered table-hover fs-16">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Inquilino</th>
                                    <th>Proprietário</th>
                                    <th>Imóvel</th>
                                    <th>Início</th>
                                    <th>Término</th>
                                    <th>Solicitante</th>
                                </tr>
                            </thead>

                            <?php if (count($contratos_excluidos)): ?>

                                <?php foreach ($contratos_excluidos as $contrato_excluido): ?>

                                    <tr class="danger">
                                        <td><?php echo $contrato_excluido['num']; ?></td>
                                        <td><?php echo $contrato_excluido['inquilino']; ?></td>
                                        <td><?php echo $contrato_excluido['proprietario']; ?></td>
                                        <td><?php echo $contrato_excluido['imovel']; ?></td>
                                        <td>
                                            <?php echo date("d/m/Y", strtotime($contrato_excluido['inicio'])); ?>
                                        </td>
                                        <td>
                                            <?php echo date("d/m/Y", strtotime($contrato_excluido['termino'])); ?>
                                        </td>
                                        <td style="font-weight: bold;">
                                            <?php echo $contrato_excluido['solicitante']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td style="padding: 40px;" class="text-center bg-danger" colspan="8">
                                        <i style="margin-right: 5px;" class="fa fa-check-circle text-success"></i>
                                        Ainda não há contratos excluídos.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>