<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Financeiro</title>
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
    .content {
      padding: 20px;
      padding-top: 0;
    }

    .content .rel_title {
      margin:15px 0;
      font-size: 20px;
    }
  
    .content table.table thead th,
    .content table.table tbody tr {
      font-size: 1.1rem;
    } 

    .content table.table tbody tr:last-child td {
      font-weight: bold;
    }
  </style>
</head>
<body>
	<div class="container">
		<div class="view no-shadow">
      <div>
        <img src="<?php echo BASE_URL?>upload/<?php echo $empresa['logo']; ?>" style="width:190px; float: left;  "  alt="">
      </div>
      <div style="margin-top: 20px;">
			<p><?php echo strtoupper($empresa['razao_social']); ?></p>
			<p>
        CNPJ: <?php echo $empresa['cnpj']; ?>
        <span class="ml">CRECI: <?php echo $empresa['creci']; ?></span>
      </p>
			<p><?php echo $empresa['endereco'].' - '.$empresa['bairro'].' - '.$empresa['cidade'].'/'.$empresa['uf'].' - '.$empresa['cep']; ?></p>			
      </div>		
		</div>

    <div class="content">
      <h3 class="rel_title">RELATÓRIO MENSAL DE CAIXA</h3>
      <p class="lead" style="font-size: 1.3rem">
        Período:
        <?php
          $meses = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Marco',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
          ];
           if (!empty($rows[0]['data'])) {
            $data = strtotime($rows[0]['data']);
            echo $meses[date('m', $data)].' de '.date('Y', $data);
            } else {
            echo 'Não há registros no sistema!';
            }
          ?>
      </p>
      <table class="table table-striped table-condensed">
        <thead>
          <th>DIA</th>
          <th>ENTRADA</th>
          <th>SAIDA</th>
          <th>SALDO</th>
        </thead>
        <tbody>
          <?php
          $entrada = 0;
          $saida = 0;
          $saldo = 0;
          foreach ($rows as $row):

            $dia = date('D', strtotime($row['data']));
            if ($dia == 'Sun') continue;

            $entrada += $row['entrada'];
            $saida += $row['saida'];
            $saldo += $row['saldo'];
            ?>
            <tr>
              <td><?php echo date('d', strtotime($row['data'])); ?></td>
              <td><?php echo number_format($row['entrada'], 2, ',', '.'); ?></td>
              <td><?php echo number_format($row['saida'], 2, ',', '.'); ?></td>
              <td><?php echo number_format($row['saldo'], 2, ',', '.'); ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td>TOTAL</td>
            <td><?php echo number_format($entrada, 2, ',', '.'); ?></td>
            <td><?php echo number_format($saida, 2, ',', '.'); ?></td>
            <td><?php echo number_format($saldo, 2, ',', '.'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
