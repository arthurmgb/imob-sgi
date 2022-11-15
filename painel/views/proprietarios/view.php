 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sistema de Gerenciamento Imobiliario - Proprietários
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
                <input type="text"  readonly="true" class="form-control" id="" value="<?php echo $proprietario['nome']; ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="">CPF</label>
                <input type="text" readonly="true" class="form-control" id="cpf" value="<?php echo $proprietario['cpf'];?>"placeholder="">
                <div class="form-group">
                  <label for="">RG</label>
                  <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['rg'];?>" placeholder="">
                </div>
                <div class="form-group">
                  <label style="color: blue;" for="">
                  Informações bancárias
                  </label>
                  <hr style="margin: 10px 0px; border-color: #888;">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <label for="">Banco</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['banco'] ?>" placeholder="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <?php 
                        switch($proprietario['tipo_conta']){
                          case 0:
                            $proprietario['tipo_conta'] = 'Não cadastrada';
                          break;
                          case 1:
                            $proprietario['tipo_conta'] = 'Conta corrente';
                          break;
                          case 2:
                            $proprietario['tipo_conta'] = 'Conta poupança';
                          break;
                        }               
                      ?>
                      <label for="">Tipo de conta</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['tipo_conta'] ?>" placeholder="">
                    </div>
                    <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                      <label for="">Agência</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['agencia'] ?>" placeholder="">
                    </div>
                    <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                      <label for="">Conta</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['conta'] ?>" placeholder="">
                    </div>
                    <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                      <label for="">Operação</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['operacao'] ?>" placeholder="">
                    </div>
                    <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                      <label for="">Chave PIX</label>
                      <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['pix'] ?>" placeholder="">
                    </div>
                  </div>
                  <hr style="margin: 15px 0px; border-color: #888;">
                </div>
                <div class="form-group">
                  <label for="">* Nacionalidade</label>
                  <input name="nacionalidade" readonly="true" type="text" value="<?php echo $proprietario['nacionalidade'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for="">* Estado Civil</label>
                  <input name="estado_civil" readonly="true" type="text" value="<?php echo $proprietario['estado_civil'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for="">Profissão</label>
                  <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['profissao']; ?>"placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="">Endereço / N°</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['endereco']; ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="">Bairro</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['bairro']; ?>"placeholder="">
              </div>
              <div class="form-group">
                <label for="">Cidade</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['cidade']; ?>"pplaceholder="">
              </div>
              <div class="form-group">
                <label for="">CEP</label>
                <input type="text" readonly="true" class="form-control" id="cep" value="<?php echo $proprietario['cep'];?>"placeholder="">
              </div>
              <div class="form-group">
                <label for="">Estado</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['uf']; ?>"placeholder="">
              </div>
              <div class="form-group">
                <label for="">Telefone</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo $proprietario['telefone'];?>"placeholder="">
              </div>
              <div class="form-group">
                <label for="">Pagamento</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($proprietario['pagamento']==1) ? 'Dinheiro' : 'Deposito' ;?>"placeholder="">
              </div>	
              <div class="form-group">
                <label for="">Informações Adicionais</label>
                <textarea class="form-control" id="" readonly="true"><?php echo $proprietario['info']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="">Data de Cadastro</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo date('d/m/Y - H:i:s',strtotime($proprietario['data_cad'])) ;?>" placeholder="">
              </div>

               <div class="form-group">
                <label>Imoveis Cadastrados</label>
                <ul class="list-group">
                  <?php foreach ($getImoveis as $value):?>
                    <li class="list-group-item">
                      <?php echo $value['endereco'];?>,
                      <?php echo $value['bairro'];?>, 
                      <?php echo $value['cidade'];?> 
                    </li>
                  <?php endforeach;?>
                </ul>
               </div> 

              <div class="form-group">
                <label for="">Status</label>
                <input type="text" readonly="true" class="form-control" id="" value="<?php echo ($proprietario['status']==1) ? 'Ativo' : 'Inativo' ;?>" placeholder="">
              </div>

              <hr>
              <a href="<?php echo BASE_URL ;?>proprietarios/editar/<?php echo $proprietario['id'];?>" title="Editar" style="margin:0 10px; "><i class="fa fa-file-text fa-2x fa-border"></i></a>
              <a href="#" onclick="confirm('Espere! Todos os imoveis desse proprietario serao apagados.')? window.location.href='<?php echo BASE_URL ;?>proprietarios/del/<?php echo $proprietario['id']; ?>':'';" title="Excluir" ><i class="fa fa-trash fa-2x fa-border"></i></a>

            </form>
          </div>
        </div>
      </section>

    </div>
