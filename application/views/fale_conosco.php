<div role="main">

    <section id="fale_conosco">

	    <div class="message_box">

	        <?php if(  validation_errors() != "" ){ ?>

	            <div class="error">
                    <?php echo validation_errors(); ?>
                </div>

	        <?php } ?>

	        <?php if( $this -> session -> flashdata('feedback') == 'success' ){?>

	            <div class="success">
                    <?php echo $this -> lang -> line('form_fale_conosco_submit_success');  ?>
                </div>

            <?php } ?>

	    </div>

        <?php echo form_open("fale_conosco/enviar_fale_conosco", array('id'=> 'formFale_conosco')); ?>

	        <table id="tabelaFormularioFale_conosco" cellpadding="0" cellspacing="0">

	            <tr>
	                <td class="label"><label for="nome"><?php echo $this -> lang -> line('label_form_fale_conosco_field_name'); ?>:</label></td>
	                <td><input type="text" title="Nome" name="nome" id="nome" class="text" value="<?php echo set_value('nome'); ?>" /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="email"><?php echo $this -> lang -> line('label_form_fale_conosco_field_email'); ?>:</label></td>
	                <td><input type="text" title="E-mail" name="email" id="email" class="text" value="<?php echo set_value('email'); ?>"  /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="cidade"><?php echo $this -> lang -> line('label_form_fale_conosco_field_city'); ?>:</label></td>
	                <td><input type="text" title="Cidade" name="cidade" id="cidade" class="text cidade" value="<?php echo set_value('cidade'); ?>" />

	                    <label id="labelUF" for="estados"><?php echo $this -> lang -> line('label_form_fale_conosco_field_state'); ?>:</label>

						<?php echo print_select_estados( array('name' => 'estados', 'title' => 'veja aqui todos os estados', 'id' => 'estados', 'class' => 'estados') ); ?>
	                </td>
	            </tr>
	            <tr>
	                <td class="label"><label for="telefone"><?php echo $this -> lang -> line('label_form_fale_conosco_field_tel'); ?>:</label></td>
	                <td><input type="text" title="Telefone" name="telefone" id="telefone" class="text" value="<?php echo set_value('telefone'); ?>" /></td>
	            </tr>
                <tr>
	                <td class="label"><label for="empresa"><?php echo $this -> lang -> line('label_form_fale_conosco_field_empresa'); ?>:</label></td>
	                <td><input type="text" title="Empresa" name="empresa" id="empresa" class="text" value="<?php echo set_value('empresa'); ?>" /></td>
	            </tr>
                <tr>
	                <td class="label"><label for="assunto"><?php echo $this -> lang -> line('label_form_fale_conosco_field_subject'); ?>:</label></td>
	                <td><input type="text" title="Assunto" name="assunto" id="assunto" class="text" value="<?php echo set_value('assunto'); ?>" /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="mensagem"><?php echo $this -> lang -> line('label_form_fale_conosco_field_message'); ?>:</label></td>
	                <td><textarea name="mensagem" title="Mensagem" id="mensagem" class="textarea" ><?php echo set_value('mensagem'); ?></textarea></td>
	            </tr>
	            <tr>
	                <td></td>
	                <td class="botao">
	                    <input type="submit" title="Enviar" name="enviar" class="submit" value="<?php echo $this -> lang -> line('label_form_fale_conosco_field_send'); ?>" />
	                </td>
	            </tr>

	        </table>

	    <?php echo form_close(); ?>

    </section>

</div>