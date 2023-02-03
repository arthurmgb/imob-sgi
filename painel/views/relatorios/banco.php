<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Proprietários com banco cadastrados</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <style>
        html {
            font-size: 12px;
        }

        body {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
            margin-top: 30px;
        }

        .container {
            margin: 0 auto;
            width: 960px;
            padding-bottom: 50vh;
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
        table {
            table-layout:fixed;
        }
        td {
            word-wrap:break-word;
            word-break: break-all;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="view no-shadow">
            <div>
                <img src="<?php echo BASE_URL; ?>upload/<?php echo $empresa['logo']; ?>" style="width:190px; float: left;  " alt="">
            </div>
            <div style="margin-top: 20px;">
                <p><?php echo strtoupper($empresa['razao_social']); ?></p>
                <p>
                    CNPJ: <?php echo $empresa['cnpj']; ?>
                    <span class="ml">CRECI: <?php echo $empresa['creci']; ?></span>
                </p>
                <p><?php echo $empresa['endereco'] . ' - ' . $empresa['bairro'] . ' - ' . $empresa['cidade'] . '/' . $empresa['uf'] . ' - ' . $empresa['cep']; ?></p>
            </div>
        </div>

        <div class="content">
            <h3 class="rel_title">RELATÓRIO DE PROPRIETÁRIOS COM BANCO</h3>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">Total de proprietários cadastrados: <b style="font-size: 22px; color: blue;">
                <?php echo count($proprietarios) + $nobank ?></b>
            </p>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">Proprietários <b>COM</b> banco cadastrado: <b style="font-size: 22px; color: green;">
                <?php echo count($proprietarios) ?></b>
            </p>
            <p class="sub_title">Proprietários <b>SEM</b> banco cadastrado: <b style="font-size: 22px; color: red;">
                <?php echo $nobank ?></b>
            </p>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cód.</th>
                        <th>Nome</th>
                        <th>Banco</th>
                        <th>Tipo de Conta</th>
                        <th>Agência</th>
                        <th>Conta</th>
                        <th>Operação</th>
                        <th>PIX</th>
                    </tr>
                </thead>

                <?php foreach ($proprietarios as $proprietario) : 
                    
                    if($proprietario['tipo_conta'] == 1){
                        $tipo_de_conta = 'Corrente';
                    }elseif($proprietario['tipo_conta'] == 2)
                        $tipo_de_conta = 'Poupança';
                    
                ?>
                    <tr>
                        <td><?php echo $proprietario['referencia']; ?></td>
                        <td><?php echo $proprietario['nome']; ?></td>
                        <td style="font-weight: bold;"><?php echo $proprietario['banco']; ?></td>
                        <td><?php echo $tipo_de_conta ?></td>
                        <td style="font-weight: bold;"><?php echo $proprietario['agencia']; ?></td>
                        <td style="font-weight: bold;"><?php echo $proprietario['conta']; ?></td>
                        <td style="font-weight: bold;"><?php echo $proprietario['operacao']; ?></td>
                        <td><?php echo $proprietario['pix']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>