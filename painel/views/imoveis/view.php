 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Código do imóvel: <?php echo $imoveis['referencia']?>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             <div class="form-group">
              <label for="">Proprietário do imóvel</label>      
              <input class="form-control" value="<?php echo $imoveis['cod_proprietario'];?>" readonly="true">
            </select>
          </div>
          <div class="form-group">
            <label for="">Tipo</label>
            <input type="text" readonly="true" class="form-control" id="" 
            value="<?php
                  switch($imoveis['tipo']) {
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
            ">
          </div>

          <div class="form-group">
            <label for="">Finalidade</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($imoveis['finalidade']=='1') ? 'Aluguel':'Venda'; ?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Endereço / N°</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['endereco']; ?>"  placeholder="">
          </div>
          <div class="form-group">
            <label for="">Bairro</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['bairro']; ?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Cidade</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['cidade']; ?>" pplaceholder="">
          </div>
          <div class="form-group">
            <label for="">CEP</label>
            <input type="text" readonly="true" class="form-control" id="cep" value="<?php echo $imoveis['cep'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Estado</label>
            <input type="text"  class="form-control" id="" value="<?php echo $imoveis['uf']; ?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Dormitorios</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['dormitorios'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Suites</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['suites'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Banheiros</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['banheiros'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Garagem</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['garagem'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Informações Adicionais</label>
            <textarea class="form-control" id="" readonly="true"><?php echo $imoveis['outros'];?></textarea>
          </div>
          <div class="form-group">
            <label for="">Area em M²</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['tamanho'];?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">IPTU</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($imoveis['iptu']==1) ? 'Sim' : 'Não' ;?>"placeholder="">
          </div>
          <div class="form-group">
            <label for="">Reajuste</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['reajuste'];?>%"placeholder="">
          </div>
          <div class="form-group">
            <label for="">Valor</label>
            <input type="text" readonly="true" class="form-control" id="" value="R$ <?php echo number_format($imoveis['valor'], 2, ',', '.');?>"placeholder="">
          </div>
          <div class="form-group">
            <label for="">Comissão</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo $imoveis['comissao'];?>%" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($imoveis['status']==1) ? 'Ativo' : 'Inativo' ;?>" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Mostar no site</label>
            <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($imoveis['site']==1) ? 'Sim' : 'Não' ;?>" placeholder="">
          </div>

          <div class="form-group">
          <div class="panel panel-default">
               <div class="panel-heading">Fotos do Imovel</div>

               <div class="panel-body" style="padding: 20px"> 

                <?php foreach($imoveis['fotos'] as $fotos): ?>
                  <div class="">
                    <img src="<?php echo BASE_URL;?>upload/<?php echo $fotos['url_img']?>" class="img-responsive" style="width: 272px; height: 200px" border="0"  alt=""> 
                   </div>
                <?php endforeach; ?>
            </div>
          </div>


        <hr>
        <a href="<?php echo BASE_URL ;?>imovel/editar/<?php echo $imoveis['id'];?>" title="Editar" ><i class="fa fa-file-text fa-2x fa-border"></i></a>

        <?php if ($imoveis['status'] == 1): ?>
          <a href="<?php echo BASE_URL ;?>contratos/adicionar/?imovel=<?php echo $imoveis['id']; ?>" target="_blank" title="Contratar" style="margin:0 10px;"><i class="fa fa-list-alt fa-2x fa-border"></i></a>
        <?php endif; ?>

        <a href="#" onclick="confirm('Tem certeza que deseja apagar?') ? window.location.href='<?php echo BASE_URL.'imovel/del/'.$imoveis['id'];?>':''" title="Excluir" ><i class="fa fa-trash fa-2x fa-border"></i></a>
      </form>
    </div>
  </div>
</section>
</div>  