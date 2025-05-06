<div class="content-wrapper">

    <section class="content-header">

        <h1 class="imob-custom-h1">
            Relatórios de Parcelas de Clientes
        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 flex-col-center">
                <h1 style="margin: 40px 0px;">
                    <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
                    Escolha o <b>tipo</b> de relatório
                </h1>
                <!-- <hr style="border: 1px solid #bcbcbc; width: 100%; margin: 0px 0px"> -->
                <div class="item-flex">
                    <a style="font-size: 22px; padding: 15px 30px; max-width: 100%; white-space: normal;" href="<?php echo BASE_URL; ?>relatorios/clientes" name="button-toggle-rel" value="button-toggle-rel" class="btn btn-lg btn-primary">
                        <i style="margin-right: 8px;" class="fa fa-calendar fa-fw"></i>
                        Relatório de Parcelas de Clientes por | <b>Período</b>
                    </a>
                    <p style="font-size: 18px;">
                        <i class="fa fa-exclamation-circle fa-fw"></i>
                        Este relatório filtra por <b>TODAS</b> as situações de parcela
                        (<b class="text-success">PAGAS</b>, <b class="text-primary">PENDENTES</b> e <b class="text-danger">VENCIDAS</b>).
                    </p>
                </div>
                <hr style="border: 1px solid #bcbcbc; width: 70%; margin: 0px 0px">
                <div class="item-flex">
                    <a style="font-size: 22px; padding: 15px 30px; max-width: 100%; white-space: normal;" href="<?php echo BASE_URL; ?>relatorios/clientesDataPag" name="button-toggle-rel" value="button-toggle-rel" class="btn btn-lg btn-success">
                        <i style="margin-right: 8px;" class="fa fa-money fa-fw"></i>
                        Relatório de Parcelas de Clientes por | <b>Data de Pagamento</b>
                    </a>
                    <p style="font-size: 18px;">
                        <i class="fa fa-exclamation-circle fa-fw"></i>
                        Este relatório filtra <b>APENAS</b> por parcelas <b class="text-success">PAGAS</b>.
                    </p>
                </div>
                <!-- <hr style="border: 1px solid #bcbcbc; width: 100%; margin: 0px 0px"> -->
            </div>
        </div>

    </section>

</div>