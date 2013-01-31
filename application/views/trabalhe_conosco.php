<div role="main">

    <section id="trabalhe_conosco">

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

            <?php }elseif($this->session->flashdata("feedback") == "error_type"){ ?>

	            <div class="erro">
                    <?php echo $this -> lang -> line('form_error_type_file');  ?>
                </div>

            <?php }elseif($this->session->flashdata("feedback") == "error_size"){ ?>

	            <div class="error">
                    <?php echo $this -> lang -> line('form_error_size_file');  ?>
                </div>

            <?php } ?>

	    </div>

        <?php echo form_open_multipart("trabalhe_conosco/enviar_trabalhe", array('id'=> 'formTrabalhe_conosco')); ?>

	        <table id="tabelaFormularioTrabalhe_conosco" cellpadding="0" cellspacing="0">

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
	                <td class="label"><label for="cargo_pretendido"><?php echo $this -> lang -> line('label_form_field_cargo'); ?>:</label></td>
	                <td><input type="text" title="Cargo pretendido" name="cargo_pretendido" id="cargo_pretendido" class="text" value="<?php echo set_value('cargo_pretendido'); ?>" /></td>
	            </tr>
                <tr>
	                <td class="label"><label for="curriculo"><?php echo $this -> lang -> line('label_form_field_curriculo'); ?>:</label></td>
	                <td><input type="file" title="Curriculo" name="curriculo" id="curriculo" class="text" value="" /></td>
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