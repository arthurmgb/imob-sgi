<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Inquilinos com IPTU</title>
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
      /* width: 960px; */
      padding-bottom: 150px;
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
      table-layout: fixed;
    }

    td {
      word-wrap: break-word;
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
      <h3 class="rel_title" style="margin-bottom: 20px;">
        RELATÓRIO DE INQUILINOS COM IPTU
      </h3>
      <h3 class="rel_title" style="margin-bottom: 20px;">
        Quantidade: <span style="color: green;"><?= count($inquilinos); ?></span>
      </h3>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Inquilino</th>
            <th>CPF/CNPJ</th>
            <th>Proprietário</th>
            <th>CPF/CNPJ</th>
            <th>Endereço</th>
            <th style="width: 120px">Data Con.</th>
            <th style="width: 80px">Pago?</th>
          </tr>
        </thead>

        <?php foreach ($inquilinos as $inquilino) : ?>
          <tr class="<?php echo ($inquilino['status'] == 2) ? 'danger' : ''; ?>">
            <td><?php echo $inquilino['nome']; ?></td>
            <td style="font-weight: bold;"><?php echo $inquilino['cpf']; ?></td>
            <td><?php echo $inquilino['prop_nome']; ?></td>
            <td style="font-weight: bold;"><?php echo $inquilino['prop_cpf']; ?></td>
            <td><?php
                if (!empty($inquilino['cod_imovel'])) {
                  $string = $inquilino['endereco'] . ' - ';
                  $string .= $inquilino['bairro'];
                  echo $string;
                }
                ?>
            </td>
            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?php echo date('d/m/Y', strtotime($inquilino['data_inicio'])); ?></td>
            <td style="text-align: center; vertical-align: middle; background-color: #f0fdf4;">
              <i style="color: green; cursor: pointer;" class="pay fa fa-money fa-lg fa-2x" aria-hidden="true" title="Pagar"></i>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <script>
    let pay = document.querySelectorAll('.pay');

    pay.forEach(payb => {
      payb.addEventListener('click', () => {

        let tr = payb.parentNode.parentNode;
        //definir a cor de fundo da tr
        tr.style.backgroundColor = "#dcfce7";

        let td = payb.parentNode;
        //definir a cor de fundo da td
        td.style.backgroundColor = "#dcfce7";
        td.style.color = "green";
        td.style.fontWeight = "bold";
        td.style.fontSize = "18px";
        td.innerHTML = "SIM";
       
     
      });
    })
  </script>
</body>

</html>