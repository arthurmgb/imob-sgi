<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Inquilinos cadastrados</title>
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
    margin:15px 0;
    text-align: center;
    font-size: 20px;
  }
  
  .content table.table thead th,
  .content table.table tbody tr {
    font-size: 1.1rem;
  } 

</style>
</head>
<body>
	<div class="container">
		<div class="view no-shadow">
      <div>
        <img src="<?php echo BASE_URL;?>upload/<?php echo $empresa['logo']; ?>" style="width:190px; float: left;  "  alt="">
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
    <h3 class="rel_title">RELATÓRIO DE INQUILINOS CADASTRADOS</h3>
    <p class="sub_title">Total de inquilinos cadastrados: <b style="color: green;"><?php echo $TotalInquilinos; ?></b></p>
    <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Nome</th>
                  <th>CPF/CNPJ</th>
                  <th>Endereço</th>
                  <th>Telefone</th>
                </tr>
              </thead>
               
               <?php foreach ($inquilinos as $inquilino): ?>
                <tr class="<?php echo ($inquilino['status'] == 2)? 'danger':''; ?>">
                  <td><?php echo $inquilino['referencia']; ?></td>
                  <td><?php echo $inquilino['nome']; ?></td>
                  <td><?php echo $inquilino['cpf']; ?></td>
                  <td><?php
                    if (!empty($inquilino['cod_imovel'])) {
                      $string = $inquilino['endereco'].' - ';
                      $string .= $inquilino['bairro'];
                      echo $string;
                    }
                    ?>
                  </td>
                  <td id="tel"><?php echo $inquilino['telefone']; ?></td>
                </tr>
                <?php endforeach ;?>
            </table>
  </div>
</div>
</body>
</html>
