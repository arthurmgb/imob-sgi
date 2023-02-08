<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Imóveis Disponíveis (Blocos)</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
    <style>
        html {
            font-size: 12px;
        }

        body {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
            margin-top: 30px;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact;
        }

        .container {
            margin: 0 auto;
            width: 960px;
            padding-bottom: 50px;
        }

        .container div.view {
            padding: 10px 20px;
        }

        .rel_title {
            font-size: 1.2rem;
            font-family: Arial;
            line-height: 15px;
            font-weight: bold !important;
            letter-spacing: 1;
        }

        .sub_title {
            font-size: 1.6rem;
            font-family: Arial;
            line-height: 20px;
            padding: 10px 0;
            letter-spacing: 1;
        }

        .content {
            padding: 20px;
            padding-top: 0;
        }

        .content .rel_title {
            margin: 15px 0;
            text-align: center;
            font-size: 20px;
        }

        .content table.table thead th,
        .content table.table tbody tr {
            font-size: 1.1rem;
        }

        .imv-blocks {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .house {
            padding: 30px 10px 0px 10px;
            font-family: Arial, Helvetica, sans-serif;
            user-select: none;
            width: 50%;
        }

        .roof {
            width: 100%;
            border-left: 213px solid transparent;
            border-right: 213px solid transparent;
            border-bottom: 100px solid #498DBC;
            border-radius: 4px;
            position: relative;
        }

        .box {
            padding: 15px 15px 5px 15px;
            width: 100%;
            border: 2px solid #2C4765;
            background-color: #f0f7ff;
            border-radius: 4px;
        }

        .item {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 5px;
            word-wrap: break-word;
        }

        .item p {
            text-transform: uppercase;
            font-size: 1.4rem;
            margin: 0;
        }

        .span-roof {
            position: absolute;
            top: 40px;
            right: -20px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #386B88;
            border: 3px solid #004166;
            background-color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media print {
            .house {
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h3 class="rel_title">RELATÓRIO DE IMÓVEIS DISPONÍVEIS</h3>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">
                Imóveis disponíveis no momento:
                <b style="color: green; font-size: 22px;"><?php echo count($imoveis); ?></b>
            </p>
            <div class="imv-blocks">
                <?php
                $count_imv = 0;
                foreach ($imoveis as $imovel) :
                    $count_imv += 1;
                ?>

                    <div class="house">
                        <div class="roof">
                            <span class="span-roof"><?= $count_imv ?></span>
                        </div>
                        <div class="box">
                            <div class="item">
                                <p><b>Bairro:</b> <?= $imovel['bairro'] ?></p>
                            </div>
                            <div class="item">
                                <p><b>Endereço:</b> <?= $imovel['endereco'] ?></p>
                            </div>
                            <div class="item">
                                <p><b>Proprietário:</b> <?= $imovel['nome_prop'] ?></p>
                            </div>
                            <div class="item">
                                <p>
                                    <b>Valor:</b>
                                    <b style="color: green; font-weight: bold; text-decoration: underline; font-size: 1.6rem;">
                                        R$ <?= number_format($imovel['valor'], 2, ",", "."); ?>
                                    </b>
                                </p>
                            </div>
                            <hr style="margin: 5px 0 5px 0; border-color: #2C4765">
                            <div class="item">
                                <p>
                                    <b style="color: #004899;">Informações do Imóvel:</b>
                                    <br>
                                    <?php echo nl2br($imovel['outros']) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

                <div class="house">
                    <div class="roof">
                        <span class="span-roof"></span>
                    </div>
                    <div class="box">
                        <div class="item">
                            <p><b>Bairro:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Endereço:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Proprietário:</b> </p>
                        </div>
                        <div class="item">
                            <p>
                                <b>Valor:</b>
                                <b style="color: green; font-weight: bold; text-decoration: underline; font-size: 1.6rem;">
                                    R$
                                </b>
                            </p>
                        </div>
                        <hr style="margin: 5px 0 5px 0; border-color: #2C4765">
                        <div class="item" style="padding-bottom: 110px;">
                            <p>
                                <b style="color: #004899;">Informações do Imóvel:</b>
                                <br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="house">
                    <div class="roof">
                        <span class="span-roof"></span>
                    </div>
                    <div class="box">
                        <div class="item">
                            <p><b>Bairro:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Endereço:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Proprietário:</b> </p>
                        </div>
                        <div class="item">
                            <p>
                                <b>Valor:</b>
                                <b style="color: green; font-weight: bold; text-decoration: underline; font-size: 1.6rem;">
                                    R$
                                </b>
                            </p>
                        </div>
                        <hr style="margin: 5px 0 5px 0; border-color: #2C4765">
                        <div class="item" style="padding-bottom: 110px;">
                            <p>
                                <b style="color: #004899;">Informações do Imóvel:</b>
                                <br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="house">
                    <div class="roof">
                        <span class="span-roof"></span>
                    </div>
                    <div class="box">
                        <div class="item">
                            <p><b>Bairro:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Endereço:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Proprietário:</b> </p>
                        </div>
                        <div class="item">
                            <p>
                                <b>Valor:</b>
                                <b style="color: green; font-weight: bold; text-decoration: underline; font-size: 1.6rem;">
                                    R$
                                </b>
                            </p>
                        </div>
                        <hr style="margin: 5px 0 5px 0; border-color: #2C4765">
                        <div class="item" style="padding-bottom: 110px;">
                            <p>
                                <b style="color: #004899;">Informações do Imóvel:</b>
                                <br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="house">
                    <div class="roof">
                        <span class="span-roof"></span>
                    </div>
                    <div class="box">
                        <div class="item">
                            <p><b>Bairro:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Endereço:</b> </p>
                        </div>
                        <div class="item">
                            <p><b>Proprietário:</b> </p>
                        </div>
                        <div class="item">
                            <p>
                                <b>Valor:</b>
                                <b style="color: green; font-weight: bold; text-decoration: underline; font-size: 1.6rem;">
                                    R$
                                </b>
                            </p>
                        </div>
                        <hr style="margin: 5px 0 5px 0; border-color: #2C4765">
                        <div class="item" style="padding-bottom: 110px;">
                            <p>
                                <b style="color: #004899;">Informações do Imóvel:</b>
                                <br>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>