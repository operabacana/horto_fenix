<div role="main">

    <section id="cadastre_se">

	    <div class="message_box">

	        <?php if(  validation_errors() != "" ){ ?>

	            <div class="error">
                    <?php echo validation_errors(); ?>
                </div>

	        <?php } ?>

	        <?php if( $this -> session -> flashdata('feedback') == 'success' ){?>

	            <div class="success">
                    <?php echo $this -> lang -> line('form_submit_success');  ?>
                </div>

            <?php } ?>

	    </div>

        <?php echo form_open("cadastre_se/enviar_cadastro", array('id'=> 'formCadastre_se')); ?>

	        <table id="tabelaFormularioCadastre_se" cellpadding="0" cellspacing="0">

	            <tr>
	                <td class="label"><label for="nome"><?php echo $this -> lang -> line('label_form_field_name'); ?>:</label></td>
	                <td><input type="text" title="Nome" name="nome" id="nome" class="text" value="<?php echo set_value('nome'); ?>" /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="email"><?php echo $this -> lang -> line('label_form_field_email'); ?>:</label></td>
	                <td><input type="text" title="E-mail" name="email" id="email" class="text" value="<?php echo set_value('email'); ?>"  /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="cidade"><?php echo $this -> lang -> line('label_form_field_city'); ?>:</label></td>
	                <td><input type="text" title="Cidade" name="cidade" id="cidade" class="text cidade" value="<?php echo set_value('cidade'); ?>" />

	                    <label id="labelUF" for="estados"><?php echo $this -> lang -> line('label_form_field_state'); ?>:</label>

						<?php echo print_select_estados( array('name' => 'estados', 'title' => 'veja aqui todos os estados', 'id' => 'estados', 'class' => 'estados') ); ?>
	                </td>
	            </tr>
	            <tr>
	                <td class="label"><label for="telefone"><?php echo $this -> lang -> line('label_form_field_tel'); ?>:</label></td>
	                <td><input type="text" title="Telefone" name="telefone" id="telefone" class="text" value="<?php echo set_value('telefone'); ?>" /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="cnpj"><?php echo $this -> lang -> line('label_form_field_cnpj'); ?>:</label></td>
	                <td><input type="text" title="Cnpj" name="cnpj" id="cnpj" class="text" value="<?php echo set_value('cnpj'); ?>" /></td>
	            </tr>
                <tr>
	                <td class="label"><label for="cpf"><?php echo $this -> lang -> line('label_form_field_cpf'); ?>:</label></td>
	                <td><input type="text" title="Cpf" name="cpf" id="cpf" class="text" value="<?php echo set_value('cpf'); ?>" /></td>
	            </tr>
                <tr>
	                <td class="label"><label for="empresa"><?php echo $this -> lang -> line('label_form_field_empresa'); ?>:</label></td>
	                <td><input type="text" title="Empresa" name="empresa" id="empresa" class="text" value="<?php echo set_value('empresa'); ?>" /></td>
	            </tr>
	            <tr>
	                <td class="label"><label for="mensagem"><?php echo $this -> lang -> line('label_form_field_message'); ?>:</label></td>
	                <td><textarea name="mensagem" title="Mensagem" id="mensagem" class="textarea" ><?php echo set_value('mensagem'); ?></textarea></td>
	            </tr>
	            <tr>
	                <td></td>
	                <td class="botao">
	                    <input type="submit" title="Enviar" name="enviar" class="submit" value="<?php echo $this -> lang -> line('label_form_field_send'); ?>" />
	                </td>
	            </tr>

	        </table>

	    <?php echo form_close(); ?>

    </section>

</div>