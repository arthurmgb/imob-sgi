<div class="custom-imob-loader">
    <div class="div-inside-loader">
        <div class="div-content-loader">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="translate(80,50)">
                <g transform="rotate(0)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="1">
                <animateTransform attributeName="transform" type="scale" begin="-0.5608974358974359s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.5608974358974359s"></animate>
                </circle>
                </g>
                </g><g transform="translate(71.21320343559643,71.21320343559643)">
                <g transform="rotate(45)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.875">
                <animateTransform attributeName="transform" type="scale" begin="-0.4807692307692307s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.4807692307692307s"></animate>
                </circle>
                </g>
                </g><g transform="translate(50,80)">
                <g transform="rotate(90)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.75">
                <animateTransform attributeName="transform" type="scale" begin="-0.4006410256410256s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.4006410256410256s"></animate>
                </circle>
                </g>
                </g><g transform="translate(28.786796564403577,71.21320343559643)">
                <g transform="rotate(135)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.625">
                <animateTransform attributeName="transform" type="scale" begin="-0.3205128205128205s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.3205128205128205s"></animate>
                </circle>
                </g>
                </g><g transform="translate(20,50.00000000000001)">
                <g transform="rotate(180)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.5">
                <animateTransform attributeName="transform" type="scale" begin="-0.24038461538461536s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.24038461538461536s"></animate>
                </circle>
                </g>
                </g><g transform="translate(28.78679656440357,28.786796564403577)">
                <g transform="rotate(225)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.375">
                <animateTransform attributeName="transform" type="scale" begin="-0.16025641025641024s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.16025641025641024s"></animate>
                </circle>
                </g>
                </g><g transform="translate(49.99999999999999,20)">
                <g transform="rotate(270)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.25">
                <animateTransform attributeName="transform" type="scale" begin="-0.08012820512820512s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="-0.08012820512820512s"></animate>
                </circle>
                </g>
                </g><g transform="translate(71.21320343559643,28.78679656440357)">
                <g transform="rotate(315)">
                <circle cx="0" cy="0" r="6" fill="#337ab7" fill-opacity="0.125">
                <animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite"></animateTransform>
                <animate attributeName="fill-opacity" keyTimes="0;1" dur="0.641025641025641s" repeatCount="indefinite" values="1;0" begin="0s"></animate>
                </circle>
                </g>
                </g>

            </svg>
            <h1>Gerando, por favor, aguarde...</h1>
        </div>
    </div>
</div>
<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Gerar Recibos por Datas
            <small> - Sistema de Gerenciamento Imobiliario</small>
        </h1>

        <form id="form-generate-recs" method="POST">

            <div style="margin-top: 2rem;" class="row">

                <div style="margin: 5px 0;" class="col-md-4 col-xs-12">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon1">Início</span>
                        <input id="input-data-inicio" style="cursor: pointer;" onfocus="this.showPicker()" class="form-control" type="date" name="data-inicio" value="<?= $get_input_data['data-inicio'] ?>" required>
                    </div>
                </div>

                <div style="margin: 5px 0;" class="col-md-4 col-xs-12">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-bold" id="sizing-addon1">Venc.</span>
                        <input id="input-data-fim" style="cursor: pointer;" onfocus="this.showPicker()" class="form-control" type="date" name="data-fim" value="<?= $get_input_data['data-fim'] ?>" required>
                    </div>
                </div>

                <div style="margin: 5px 0;" class="col-md-4 col-xs-12">
                    <button name="button-generate" value="button-search" type="submit" class="btn btn-primary btn-lg btn-block" id="btn-generate-recs">
                        <i style="margin-right: 1rem;" class="fa fa-file-text-o" aria-hidden="true">
                        </i>
                        Gerar recibos
                    </button>
                </div>

            </div>

        </form>

        <script>
            
            var btn_generate_recs = document.querySelector("#btn-generate-recs");
            var custom_loader = document.querySelector(".custom-imob-loader");
            var input_data_inicio = document.querySelector("#input-data-inicio");
            var input_data_fim = document.querySelector("#input-data-fim");

            btn_generate_recs.addEventListener('click', ()=>{

                if(input_data_inicio && input_data_inicio.value && input_data_fim && input_data_fim.value){
                    
                    setTimeout(()=>{
                        btn_generate_recs.disabled = true;
                        btn_generate_recs.innerHTML = "<i style='margin-right: 1rem;' class='fa fa-file-text-o' aria-hidden='true'></i> Gerando...";
                        custom_loader.style.display = "flex";
                    }, 100)
                    
                }

            });

        </script>

        <?php if(!empty($get_input_data['button-generate'])): ?>
            <?php if(count($recibos) > 0): ?>
                <div class="div-flex" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
                    <h4 style="margin: 10px 0 5px 0;">
                        <i style="margin-right: 0.5rem; color: #3C8DBC;" class="fa fa-file-text-o" aria-hidden="true"></i>
                        Recibos gerados: <b style="color: #3C8DBC;"><?php echo count($recibos) ?></b>
                    </h4>
                    <button onclick="window.print();" class="btn btn-success">
                        <i style="margin-right: 1rem;" class="fa fa-print" aria-hidden="true"></i> 
                        Imprimir
                    </button>
                </div>
            <?php else: ?>
                <div style="margin-top: 5px;" class="box box-primary box-generate-recibo">                    
                    <div class="no-shadow" style="position: relative; padding: 50px;">
                        <h3 style="margin: 0;" class="text-center">                    
                            <i style="margin-right: 1rem; color: #ef4444;" class="fa fa-times-circle" aria-hidden="true"></i>
                            Nenhum recibo foi encontrado nesse período.
                        </h3>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif ?>

    </section>
    
    <section style="padding-top: 5px;" class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($get_input_data['button-generate'])) : ?>

                    <?php foreach ($recibos as $recibo) : ?>
                        <div id="generate-print-area">
                        <hr style="margin: 5px 0; border-color: #999;">              
                        <h4 style="margin: 15px 0 0px 0;">
                            <b>Proprietário:</b> <?php echo $recibo['nome_pro'] ?>
                        </h4>
                        <h4>
                            <b>Inquilino:</b> <?php echo $recibo['nome_inq'] ?> - <b> N° <?php echo $recibo['n_parcela']; ?> </b>
                        </h4>
                        <div class="box box-primary box-generate-recibo">
                            <!--- 1° via inquilino -->
                            <div class="view no-shadow" style="position: relative;">
                                <div style="position: absolute; top: 10px; right: 10px; ">
                                    <div>1° via <br />Inquilino</div>
                                </div>
                                <p>
                                    <span><?php echo strtoupper($empresa['razao_social']); ?></span>
                                    <span class="ml">N°. Contrato: <?php echo $recibo['id_contrato'] ?></span>
                                </p>
                                <p>End:
                                    <?php echo $empresa['endereco'] . ' - ' . $empresa['bairro']; ?>
                                    <span class="ml">Telefone: <?php echo $empresa['telefone']; ?></span>
                                </p>
                                <p>
                                    CNPJ: <?php echo $empresa['cnpj']; ?>
                                    <span class="ml">CRECI: <?php echo $empresa['creci']; ?></span>
                                </p>
                                <p>
                                    Locador: <?php echo $recibo['nome_pro']; ?>
                                    <span class="ml">CPF: <?php echo $recibo['cpf_pro']; ?></span>
                                </p>
                                <p>
                                    Locatario: <?php echo $recibo['nome_inq']; ?>
                                    <span class="ml">
                                        CPF: <?php echo $recibo['cpf_inq']; ?>
                                        <span class="ml">CODIGO: <?php echo $recibo['ref_inq']; ?></span>
                                    </span>
                                </p>
                                <p>Endereço: <?php echo $recibo['end_imv'] . ' - ' . $recibo['bairro_imv']; ?></p>
                                <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($recibo['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($recibo['data_fim'])); ?></p>
                                <p>Diversos: __________________________________________________________</p>
                                <p>Valor bruto: R$ <?php echo number_format($recibo['valor_imv'], 2, ',', '.'); ?></p>
                                <p>Data: ___/___/____</p>
                                <p>Ass. do responsável: _________________________________________________</p>
                            </div>
                            <div style="border-bottom: 1px dashed #999"></div>
                            <!--- 2° via imobiliaria -->
                            <div class="view no-shadow" style="position: relative;">
                                <div style="position: absolute; top: 10px; right: 10px">
                                    <div>2° via <br />Imobiliária</div>
                                </div>
                                <p><?php echo strtoupper($empresa['razao_social']); ?>
                                    <span class="ml">N°. Contrato: <?php echo $recibo['id_contrato'] ?></span>
                                </p>
                                <p>End:
                                    <?php echo $empresa['endereco'] . ' - ' . $empresa['bairro']; ?>
                                    <span class="ml">Telefone: <?php echo $empresa['telefone']; ?></span>
                                </p>
                                <p>
                                    CNPJ: <?php echo $empresa['cnpj']; ?>
                                    <span class="ml">CRECI: <?php echo $empresa['creci']; ?></span>
                                </p>
                                <hr style="margin: 10px 0; border-color: #aaa;">
                                <p>
                                    Locador: <?php echo $recibo['nome_pro']; ?>
                                    <span class="ml">CPF: <?php echo $recibo['cpf_pro']; ?></span>
                                </p>
                                <p>
                                    <?php
                                    switch ($recibo['tipo_conta_pro']) {
                                        case 0:
                                            $recibo['tipo_conta_pro'] = '---';
                                            break;
                                        case 1:
                                            $recibo['tipo_conta_pro'] = 'Conta corrente';
                                            break;
                                        case 2:
                                            $recibo['tipo_conta_pro'] = 'Conta poupança';
                                            break;
                                    }
                                    ?>
                                    <b>Informações bancárias:</b>
                                </p>
                                <p>
                                    <span><b>Banco:</b> <?= is_null($recibo['banco_pro']) ? '---' : $recibo['banco_pro'] ?> |</span>
                                    <span><b>Tipo:</b> <?= $recibo['tipo_conta_pro'] ?> |</span>
                                    <span><b>Agência:</b> <?= is_null($recibo['agencia_pro']) ? '---' : $recibo['agencia_pro'] ?> |</span>
                                    <span><b>Conta:</b> <?= is_null($recibo['conta_pro']) ? '---' : $recibo['conta_pro'] ?> |</span>
                                    <span><b>Operação:</b> <?= is_null($recibo['operacao_pro']) ? '---' : $recibo['operacao_pro'] ?> |</span>
                                </p>
                                <p>
                                    <b>Chave PIX:</b>
                                    <span><?= is_null($recibo['pix_pro']) ? '---' : $recibo['pix_pro'] ?></span>
                                </p>
                                <hr style="margin: 10px 0; border-color: #aaa;">
                                <p>
                                    Locatario: <?php echo $recibo['nome_inq']; ?>
                                    <span class="ml">
                                        CPF: <?php echo $recibo['cpf_inq']; ?>
                                        <span class="ml">CODIGO: <?php echo $recibo['ref_inq']; ?></span>
                                    </span>
                                </p>
                                <p>Endereço: <?php echo $recibo['end_imv'] . ' - ' . $recibo['bairro_imv']; ?></p>
                                <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($recibo['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($recibo['data_fim'])); ?></p>
                                <p>Diversos: __________________________________________________________</p>
                                <p>Valor bruto: R$ <?php echo number_format($recibo['valor_imv'], 2, ',', '.'); ?></p>
                                <p>Valor da comissão: R$ <?php
                                                            $valor = floatval($recibo['valor_imv']);
                                                            $comissao = floatval($recibo['com_imv']);
                                                            $total = ($valor / 100) * $comissao;
                                                            $valor = ceil($total);

                                                            $valorB = $valor;

                                                            echo number_format($valor, 2, ',', '.');
                                                            ?>
                                </p>
                                <?php
                                $valor = floatval($recibo['valor_imv']);
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
                                <p><?php echo strtoupper($empresa['razao_social']); ?>
                                    <span class="ml">N°. Contrato: <?php echo $recibo['id_contrato'] ?></span>
                                </p>

                                <p>End:
                                    <?php echo $empresa['endereco'] . ' - ' . $empresa['bairro']; ?>
                                    <span class="ml">Telefone: <?php echo $empresa['telefone']; ?></span>
                                </p>
                                <p>
                                    CNPJ: <?php echo $empresa['cnpj']; ?>
                                    <span class="ml">CRECI: <?php echo $empresa['creci']; ?></span>
                                </p>
                                <p>
                                    Locador: <?php echo $recibo['nome_pro']; ?>
                                    <span class="ml">CPF: <?php echo $recibo['cpf_pro']; ?></span>
                                </p>
                                <p>
                                    Locatario: <?php echo $recibo['nome_inq']; ?>
                                    <span class="ml">
                                        CPF: <?php echo $recibo['cpf_inq']; ?>
                                        <span class="ml">CODIGO: <?php echo $recibo['ref_inq']; ?></span>
                                    </span>
                                </p>
                                <p>Endereço: <?php echo $recibo['end_imv'] . ' - ' . $recibo['bairro_imv']; ?></p>
                                <p>Pagamento referente ao periodo de <?php echo date('d/m/Y', strtotime($recibo['data_inicio'])); ?> ate <?php echo date('d/m/Y', strtotime($recibo['data_fim'])); ?></p>
                                <p>Diversos: __________________________________________________________</p>
                                <p>Valor bruto: R$ <?php echo number_format($recibo['valor_imv'], 2, ',', '.'); ?></p>
                                <p>Valor liquido: R$ <?php
                                                        $valor = floatval($recibo['valor_imv']);


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
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="box box-primary box-generate-recibo">                    
                        <div class="no-shadow" style="position: relative; padding: 50px;">
                            <h3 style="margin: 0;" class="text-center">
                                <i style="margin-right: 1rem; color: #3C8DBC;" class="fa fa-info-circle" aria-hidden="true"></i>
                                Selecione as datas de <b>início</b> e <b>vencimento</b> para gerar os recibos.
                            </h3>
                            <h3 style="margin: 5px 0;" class="text-center">
                                <small>A geração de recibos pode demorar um pouco dependendo da quantidade de recibos no período selecionado.</small>
                            </h3>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>