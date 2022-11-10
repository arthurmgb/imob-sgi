<?
// descriptado por Tiago de Araujo Maccartney visite nosso site www.brserve.com.br e www.festhalls.com.br //
?>
				<div id="contato"><!-- contato -->
                	<p class="titulo_contato">Contato</p>
                 	<p class="label_contato">Preencha o formulário abaixo para entrar em contato com um de nossos coloboradores</p>                    
                        <div class="contato_form_cont">
    
                            <form id="formID" action="../../contato/index/email.php" method="post" class="validacao">         
                            <label class="labelcontato" for="nome"><strong>Nome</strong></label>        
                                <input name="nome" type="text" id="nome" class="validate[required] form_cont"/>     
                                <br />        
                                <label class="labelcontato" for="empresa"><strong>Empresa</strong></label>        
                                <input name="empresa" type="text" id="empresa" class="form_cont"/>        
                                <br />        
                                <label class="labelcontato" for="email"><strong>Email</strong></label>        
                                <input name="email" type="text" id="email" class="validate[required,custom[email]] form_cont"/>        
                                <br />        
                                <label class="labelcontato" for="telefone"><strong>Telefone</strong></label>        
                                <input name="telefone" type="text" id="telefone" class="validate[required,custom[phone]] form_cont"/>        
                                <br />        
                                <label class="labelcontato" for="msg"><strong>Mensagem</strong></label>        
                                <textarea name="msg" id="msg" cols="" rows="" class="form_cont_text validate[required]"></textarea>        
                                <br />
                                 <input type="image" src="../../temas/<? echo $tema; ?>/images/btn_enviar.png" value="Enviar" style="cursor: pointer;" class="btn_enviar"/>
                            </form>
                    </div>  <!-- /contato_form" -->  
                 </div><!-- contato -->              
        
                 <div id="contat_endereco"><!-- contato -->
                     <div class="rodape_dados">
                        <div class="rodape_dados_titulo"><? echo $nomeempresa; if($creci != ''){echo " - Creci: ". $creci; } ?></div>
                        <div class="rodape_dados_texto"><? echo $endereco .', '.$bairro .' - '.$cidade.' - '.$estado.' - Cep: '.$cep; ?></div>
                        <div class="rodape_dados_texto"><? echo 'Fone principal: '. $telefone1 .' - Fone: '.$telefone2; ?></div>
            		</div> 
                 </div>                        