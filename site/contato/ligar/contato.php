<?
// sistema descriptado por Tiago de Araujo Maccartney, visite nosso site www.brserve.com.br e www.festhalls.com //
?>
				<div id="contato"><!-- contato -->
                        <p class="titulo_contato">Contato</p>
                        <p class="label_contato">Preencha o formulário que entraremos em contato</p>                    
                            <div class="contato_form_cont">        
                                <form id="formID" action="../../contato/ligar/fone.php" method="post" class="validacao">         
                                <label class="labelcontato" for="nome"><strong>Nome</strong></label>        
                                    <input name="nome" type="text" id="nome" class="validate[required] form_cont"/>         
                                    <br />                   
                                    <label class="labelcontato" for="telefone"><strong>Telefone</strong></label>        
                                    <input name="telefone" type="text" id="telefone" class="validate[required,custom[phone]] form_cont"/>        
                                    <br />        
                                    <label class="labelcontato" for="msg"><strong>Informações que você deseja</strong></label>        
                                    <textarea name="msg" id="msg" cols="" rows="" class="form_cont_text validate[required]"></textarea>        
                                    <br />
                                     <input type="image" src="../../temas/<? echo $tema; ?>/images/btn_enviar.png" value="Enviar" style="cursor: pointer;" class="btn_enviar"/>
                                </form>
                        </div>  <!-- /contato_form" -->  
                     </div><!-- contato -->   