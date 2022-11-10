<?
// sistema descriptado por Tiago de Araujo MacCartney, visite nosso site www.brserve.com.br e www.festhalls.com //
?>
				<div id="contato"><!-- contato -->
                        <p class="titulo_contato">Contato</p>
                        <p class="label_contato">Preencha o formulário para indicar o site</p>                    
                            <div class="contato_form_cont">        
                                <form id="formID" action="../../contato/indique/indique.php" method="post" class="validacao">         
                                <label class="labelcontato" for="nome"><strong>Seu nome</strong></label>        
                                    <input name="nome" type="text" id="nome" class="validate[required] form_cont"/>         
                                    <br />                   
                                    <label class="labelcontato" for="email"><strong>Seu email</strong></label>        
                                    <input name="email" type="text" id="email" class="validate[required,custom[email]] form_cont"/>         
                                    <br />    
                                    <label class="labelcontato" for="nome"><strong>Nome do amigo</strong></label>        
                                    <input name="nome2" type="text" id="nome2" class="validate[required] form_cont"/>         
                                    <br />                   
                                    <label class="labelcontato" for="email"><strong>Email do amigo</strong></label>        
                                    <input name="email2" type="text" id="email2" class="validate[required,custom[email]] form_cont"/>         
                                    <br />        
                                    <label class="labelcontato" for="msg"><strong>Mensagem</strong></label>        
                                    <textarea name="msg" id="msg" cols="" rows="" class="form_cont_text validate[required]"></textarea>        
                                    <br />
                                     <input type="image" src="../../temas/<? echo $tema; ?>/images/btn_enviar.png" value="Enviar" style="cursor: pointer;" class="btn_enviar"/>
                                </form>
                        </div>  <!-- /contato_form" -->  
                     </div><!-- contato -->   