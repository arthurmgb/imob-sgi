<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Contratos</title>
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
            -webkit-print-color-adjust: exact !important;
			print-color-adjust: exact;
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

        <?php 
            
            $num_ativos = 0;
            $num_avencer = 0;
            $num_inativos = 0;

            foreach ($contratos as $contrato){

                $data_final = strtotime($contrato['data_final']);
                $um_mes_frente = strtotime('+1 month');

                if (time() > $data_final) {
                $status = 'danger';
                $num_inativos+=1;
                }
                elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                $status = 'info';
                $num_avencer+=1;
                }
                else {
                $status = '';
                $num_ativos+=1;    
                }
            } 
        ?>

        <div class="content">
            <h3 class="rel_title">RELATÓRIO DE CONTRATOS CADASTRADOS</h3>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">
                Contratos <b>TOTAL</b>: 
                <b style="font-size: 22px; color: purple;"><?= count($contratos) ?></b>
            </p>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">
                Contratos <b>ATIVOS</b>: 
                <b style="font-size: 22px; color: green;"><?= $num_ativos ?></b>
            </p>
            <p style="margin-bottom: 0; padding-bottom: 0;" class="sub_title">
                Contratos <b>À VENCER</b>: 
                <b style="font-size: 22px; color: blue;"><?= $num_avencer ?></b>
            </p>
            <p class="sub_title">
                Contratos <b>VENCIDOS</b>: 
                <b style="font-size: 22px; color: red;"><?= $num_inativos ?></b>
            </p>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 80px;">Nº. Contrato</th>
                        <th>Proprietário</th>
                        <th>Inquilino</th>
                        <th>Imóvel</th>
                        <th style="width: 100px;">Início</th>
                        <th style="width: 100px;">Término</th>
                    </tr>
                </thead>

                <?php foreach ($contratos as $contrato): 

                    $data_final = strtotime($contrato['data_final']);
                    $um_mes_frente = strtotime('+1 month');
      
                    if (time() > $data_final) {
                      $status = 'danger';
                    }
                    elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                      $status = 'info';
                    }
                    else {
                      $status = '';
                    }
                ?>
                    <tr class="<?php echo $status; ?>">
                        <td style="font-weight: bold;"><?= $contrato['id'] ?></td>
                        <td><?= $contrato['nome_proprietario'] ?></td>
                        <td><?= $contrato['nome_inquilino'] ?></td>
                        <td><?= $contrato['end_imv'] ?></td>
                        <td style="font-weight: bold;">
                            <?php echo date("d/m/Y", strtotime($contrato['data_inicio']));?>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo date("d/m/Y", strtotime($contrato['data_final']));?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>