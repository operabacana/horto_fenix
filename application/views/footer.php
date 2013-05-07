<footer>

    <div id="box_cadastro">

        <div class="textos">

            <?php if( $this->session->flashdata("feedback") == "success" ){ ?>

                <p class="texto_titulo texto_titulo_sucesso">Sucesso!</p>
                <p class="texto_subtitulo">Você receberá novidades e dicas em seu email.</p>

            <?php }else if( $this->session->flashdata("feedback") == "error" ){ ?>

                <p class="texto_titulo texto_titulo_erro">Erro!</p>
                <p class="texto_subtitulo texto_subtitulo_erro">Ocorreu um erro no seu cadastro.</p>

            <?php }else{ ?>

                <p class="texto_titulo">Cadastre-se</p>
                <p class="texto_subtitulo">Receba novidades e dicas em seu email.</p>

            <?php } ?>

         </div>

           <?php echo form_open("cadastro/enviar_cadastro", array("id"=>"form_cadastro")); ?>
              <div class="order_form">
                  <label for="nome" class="label">Nome: </label>
                  <input type="text" name="nome" id="nome" />
              </div>
              <div class="order_form">
                  <label for="email" class="label">Email: </label>
                  <input type="text" name="email" id="email" />
              </div>
              <input type="submit" class="submit" value="Enviar" />
           <?php echo form_close(); ?>



    </div>

    <address>

        Av. Maximilian Falck nº 380, Perissê<br />
        Nova Friburgo - CEP 28613-490<br />
        Tels.: (22) 3512-0783 - 3512-0784

    </address>

</footer>

<?php
	$jsFiles = $this -> lang -> line('js_file');
	$jsMain = base_url($jsFiles['main']) ;
?>
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
<script language="javascript" type="text/javascript" src="https://raw.github.com/LeaVerou/prefixfree/gh-pages/plugins/prefixfree.dynamic-dom.min.js" ></script>
<script language="javascript" type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js" ></script>
<script language="javascript" type="text/javascript" src="<?php echo $jsMain; ?>" ></script>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>