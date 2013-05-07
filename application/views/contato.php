<div role="main" class="container">

    <div class="box_content" id="content_contato">

        <div id="ordena_form">

            <h1>Contato</h1>

    	    <div class="message_box">

    	        <?php if(  validation_errors() != "" ){ ?>

    	            <div class="erro">
                        Existe algum erro em seu formulário.
                    </div>

    	        <?php }elseif( $this -> session -> flashdata('feedbackContact') == 'success' ){ ?>

    	            <div class="success">
                        <?php echo $this -> lang -> line('form_submit_contato_success');  ?>
                    </div>

                <?php }else{

                    echo "<p>Preencha o formulário ou escolha outra forma de contato abaixo e teremos o prazer em atendê-lo.</p>";

                } ?>

    	    </div>

            <?php echo form_open("contato/enviar_contato", array('id'=> 'formCadastre_se')); ?>

                <div class="order_form">
                    <label class="label label_contato">Nome: </label><input type="text" name="nome" />
                    <label class="label label_contato">Cidade: </label><input type="text" name="cidade" />
                </div>
                <div class="order_form">
                    <label class="label label_contato">Email: </label><input type="text" name="email" />
                    <label class="label label_contato">Telefone: </label><input type="text" name="telefone" />
                </div>
                <div class="order_form">
                    <label class="label label_contato">Endereço: </label><input type="text" name="endereco" />
                </div>
                <div class="order_form">
                    <label class="label label_contato">Assunto: </label><input type="text" name="assunto" />
                </div>
                <div class="order_form">
                    <label class="label label_contato">Mensagem: </label><textarea name="mensagem"></textarea>
                </div>

    	        <input type="submit" title="Enviar" name="enviar" class="submit" value="<?php echo $this -> lang -> line('label_form_field_send'); ?>" />

    	    <?php echo form_close(); ?>

        </div>

        <address>

            Av. Maximilian Falck nº 380, Perissê<br />
            Nova Friburgo - CEP 28613-490<br />
            Tels.: (22) 3512-0783 - 3512-0784

        </address>

    </div>

</div>