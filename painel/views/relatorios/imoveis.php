<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Imoveis</title>
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
    <h3 class="rel_title">RELATÓRIO DE IMÓVEIS</h3>
    <p class="sub_title">Hoje temos <?php echo $TotalImoveis; ?> imóveis cadastrados</p>
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#COD</th>
          <th>Tipo</th>
          <th>Finalidade</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>Valor</th>
        </tr>
      </thead>
      <?php foreach ($imoveis as $imovel):?>
        <tr>
          <td><?php echo $imovel['referencia'];?></td>
          <td><?php 
          switch ($tipo = $imovel['tipo']) {
           case 1:
           $tipo = 'Casa';
           break;
           case 2:
           $tipo = 'Apartamento';
           break;
           case 3:
           $tipo = 'Comercial';
           break;
         } 
         echo $tipo;
         ?>
       </td>
       <td><?php echo ($imovel['finalidade']=='1') ? 'Aluguel':'Venda'; ?></td>
       <td><?php echo $imovel['endereco']; ?></td>
       <td><?php echo $imovel['bairro']; ?></td>
       <td><?php echo $imovel['cidade']; ?></td>
       <td>R$ <?php echo number_format($imovel['valor'],2,",",".");?></td>
     </tr>
   <?php endforeach ; ?>
 </table>
</div>
</div>
</body>
</html>
