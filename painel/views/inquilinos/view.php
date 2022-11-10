
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sistema Gerenciamento Imóbiliario - Inquilinos
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
                <label for="">Nome</label>
                <input type="text" readonly="true" class="form-control" value="<?php echo $inquilino['nome'];?>">
              </div>
              <div class="form-group">
                <label for="">CPF / CNPJ</label>
                <input type="text" readonly="true" class="form-control" value="<?php echo $inquilino['cpf'];?>">
              </div>  
              <div class="form-group">
                <label for="">RG</label>
                <input type="text" readonly="true" class="form-control" value="<?php echo $inquilino['rg'];?>">
              </div>
              <div class="form-group">
                <label for="">* Nacionalidade</label>
                <input name="nacionalidade" readonly="true" type="text" required="required" class="form-control" value="<?php echo $inquilino['nacionalidade'];?>">
              </div>
              <div class="form-group">
                <label for="">* Estado Civil</label>
                <input name="estado_civil" readonly="true" type="text" required="required" class="form-control" value="<?php echo $inquilino['estado_civil'];?>">
              </div>
              <div class="form-group">
                <label for="">Profissão</label>
                <input type="text" readonly="true" class="form-control" value="<?php echo $inquilino['profissao'];?>">
              </div>
            
            <div class="form-group">
              <label>Endereço</label>
              <?php
              if (!empty($inquilino['cod_imovel'])) {
                $string = $inquilino['endereco'].' - Bairro ';
                $string .= $inquilino['bairro'].' - ';
                $string .= $inquilino['cidade'].' / ';
                $string .= $inquilino['uf'].' CEP: ';
                $string .= $inquilino['cep'];
              }
              if (!empty($string)): ?>
                <input type="text" readonly="true" class="form-control" value="<?php echo $string; ?>">
              <?php else: ?>
                <input type="text" readonly="true" class="form-control">
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="">Informações Adicionais</label>
              <textarea readonly="true" class="form-control" cols="30" rows="10"><?php echo $inquilino['info'];?></textarea>
            </div>
            <div class="form-group">
              <label for="">Data de Cadastro</label>
              <input type="text" readonly="true" class="form-control" value="<?php echo date('d/m/Y - H:i:s',strtotime($inquilino['data_cad'])) ;?>">
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <input type="text" readonly="true" class="form-control" value="<?php echo ($inquilino['status']==1) ? 'Ativo' : 'Inativo' ;?>">
            </div>

            <hr>
            <a href="<?php echo BASE_URL ;?>inquilinos/editar/<?php echo $inquilino['id'];?>" title="Editar" style="margin:0 10px; "><i class="fa fa-file-text fa-2x fa-border"></i></a>
            <a href="#" onclick="confirm('Tem certeza que deseja apagar?')? window.location.href='<?php echo BASE_URL.'inquilinos/del/'.$inquilino['id'];?>':''" title="Excluir" ><i class="fa fa-trash fa-2x fa-border"></i></a>

          </form>
        </div>
      </div>
    </section>

  </div>  