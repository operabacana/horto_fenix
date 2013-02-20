<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>
<?php
//Verifica permissões
if(!$gerenciar_sistema) {header("location:../acesso/not_authorized.php"); exit();}

?>
<?php open_header(); ?>
<title>Gerenciar Configura&ccedil;&otilde;es do Sistema <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); connect_db(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Sistema</span> &gt;&gt;Gerenciar sistema</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> As configura&ccedil;&otilde;es do sistema n&atilde;o podem ser criadas ou exclu&iacute;das, pois s&atilde;o de extrema necessidade para o funcionamento do sistema. As configura&ccedil;&otilde;es avan&ccedil;adas devem ser acessadas ou criadas apenas manualmente. Cuidado ao alterar as configura&ccedil;&otilde;es desta p&aacute;gina, pois isto poder&aacute; implicar em mudan&ccedil;as na exibi&ccedil;&atilde;o e na compra dos produtos.</p><br />
  
   <?php if(isset($_GET["success"])) {if($_GET["success"]=="edit_config") {?>
   	<?php echo "<p class=\"warning_success_part\">A configura&ccedil;&atilde;o foi editada com sucesso!</p>\n <br /> \n"; ?>
   <?php } } ?>

	<table class="one">
  	<tr>
    	<td class="title" colspan="5">Produtos</td>
    </tr>
	 <?php 
		connect_secondary_db(); 
		$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_conjunto'")or die(mysql_error()."<br />");
		$modulo_conjunto = mysql_result($sel_config,0);
	?>
    <form action="_edita_config_loja.php" method="post" name="form">
    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
    <tr>
    	<td class="info">M&oacute;dulo de conjuntos: <span>Ativando este m&oacute;dulo os produtos poder&atilde;o ser agrupados para formar cojuntos. Um novo grupo aparecer&aacute; no menu ao lado para manipular os conjuntos. Um exemplo de uso &eacute; para venda de lingerie.</span></td>
      <td>
      	<select class="select" style="width:auto;" name="modulo_conjunto" onchange="javascript:document.form.submit();">
        	<option value="ativado" <?php if($modulo_conjunto == "ativado"): ?> selected="selected" <?php endif ?>>Ativado</option>
          <option value="desativado" <?php if($modulo_conjunto == "desativado"): ?> selected="selected" <?php endif ?>>Desativado</option>
        </select>
      </td>
    <?php if($modulo_conjunto == "ativado") { ?>
    	<td class="info">Modo de visualiza&ccedil;&atilde;o: <span>Escolha como os produtos ser&atilde;o visualizados na loja virtual.</span></td>
      <td>
      	<?php
					$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='tipo_de_visualizacao'")or die(mysql_error()."<br />");
					$tipo_visualizacao=mysql_result($sel_config,0);
				?>
      	<select class="select" style="width:auto;" name="tipo_visualizacao" onchange="javascript:document.form.submit();">
      		<option value="conjuntos" <?php if($tipo_visualizacao == "conjuntos"): ?> selected="selected" <?php endif ?>>Apenas conjuntos</option>
          <option value="conjuntos+produtos" <?php if($tipo_visualizacao == "conjuntos+produtos"): ?> selected="selected" <?php endif ?>>Conjuntos e produtos</option>	
          <option value="produtos" <?php if($tipo_visualizacao == "produtos"): ?> selected="selected" <?php endif ?>>Apenas produtos</option>
        </select>
      </td>
    </tr>
    <?php } ?>
    <?php
			$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='exibir_opcionais'")or die(mysql_error()."<br />");
			$exibir_opcionais=mysql_result($sel_config,0);
		?>
    <?php 
			$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_opcional'")or die(mysql_error()."<br />");
			$modulo_opcional = mysql_result($sel_config,0);
		?>
    <tr>
    	<td class="info">M&oacute;dulo opcionais: <span>Ativando este m&oacute;dulo poder&atilde;o ser cadastrados opcionais para cada produto da loja. Um novo grupo aparecer&aacute; no menu lateral para manipular os opcionais.</span></td>
      <td>
      	<select class="select" style="width:auto;" name="modulo_opcional" onchange="javascript:document.form.submit();">
        	<option value="ativado" <?php if($modulo_opcional== "ativado"): ?> selected="selected"<?php endif ?>>Ativado</option>
          <option value="desativado" <?php if($modulo_opcional == "desativado"): ?> selected="selected"<?php endif ?>>Desativado</option>
        </select>
      </td>
      <?php if($modulo_opcional == "ativado") { ?>
    	<td class="info">Exibir opcionais como produtos: <span>Ativando esta op&ccedil;&atilde;o, os opcionais ser&atilde;o exibidos tamb&eacute;m como produtos na loja.</span></td>
      <td>
      	<select class="select" style="width:auto;" name="exibir_opcionais" onchange="javascript:document.form.submit();">
        	<option value="ativado" <?php if($exibir_opcionais == "ativado"): ?> selected="selected"<?php endif ?>>Ativado</option>
          <option value="desativado" <?php if($exibir_opcionais == "desativado"): ?> selected="selected"<?php endif ?>>Desativado</option>
        </select>
      </td>
      <?php } ?>
    </tr>
    </form>
    <?php connect_db(); ?>
    <tr>
    	<td colspan="5">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; width:40px; text-align:center;">ID</td>
            <td style="color:#FFF;">Configura&ccedil;&atilde;o</td>
            <td style="color:#FFF;">Descri&ccedil;&atilde;o</td>
            <td style="color:#FFF; text-align:center;">Valor</td>
            <td style="color:#FFF; text-align:center;">Editar</td>
        	</tr>
          <?php $select=mysql_query("SELECT * FROM system ORDER BY config")or die(mysql_error()."<br />"); while($config = mysql_fetch_array($select)) { $explode=explode("_",$config[config]); if($explode[0] == "produto") { ?>
          <tr class="hover">
          	<td style="text-align:center;"><?php echo $config[id]; ?></td>
            <td><?php echo $config[config]; ?></td>
            <td><?php echo $config[description]; ?></td>
            <td style="text-align:center;"><?php echo $config[value]; ?></td>
            <td style="text-align:center;"><a href="./_editar_config.php?config=<?php echo $config[id]; ?>&tipo=<?php echo $tipo; ?>&height=150&width=520" class="thickbox" title="Editar a configura&ccedil;&atilde;o <?php echo $config[config]; ?>"><strong>[editar]</strong></a></td>
          </tr>
          <?php } } ?>
        </table>
      </td>
    </tr>
    </table>
    
    <table class="two">
  	<tr>
    	<td class="title">Atacado/Varejo</td>
    </tr>
    <?php 
		connect_secondary_db(); 
		$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_atacado'")or die(mysql_error()."<br />");
		$modulo_atacado = mysql_result($sel_config,0);
		connect_db();
		?>
    <form action="_edita_config_loja.php?form=2" method="post" name="form2">
    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
    <tr>
    	<td class="info">M&oacute;dulo atacado: <span>Ativando este m&oacute;dulo, o sistema de atacado ser&aacute; ativado no sistema. Somente alguns clientes poder&atilde;o visualizar a loja em modo de atacado. Para editar os clientes com acesso ao atacado, v&aacute; em <a href="../clientes/clientes.php" title="Gerenciar clientes">Clientes>Gerenciar Clienntes</a>, selecione o cliente e edite-o.</span></td>
      <td>
      	<select class="select" style="width:auto;" name="modulo_atacado" onchange="javascript:document.form2.submit();">
        	<option value="ativado" <?php if($modulo_atacado == "ativado"): ?> selected="selected" <?php endif ?>>Ativado</option>
          <option value="desativado" <?php if($modulo_atacado == "desativado"): ?> selected="selected" <?php endif ?>>Desativado</option>
        </select>
      </td>
    </tr>
    </form>
  </table>
  
   <?php 
		connect_secondary_db(); 
		$sel_formas=mysql_query("SELECT * FROM formas_pagamento WHERE forma != 5 && forma != 7 && forma != 6 && forma != 2")or die(mysql_error()."<br />");
		connect_db();
		?>
    
   <a name="passo3"></a>
	<form action="_formas_de_pagamento.php" method="post">
  <table class="one">
  	<tr>
    	<td class="title" colspan="5">Formas de pagamento</td>
    </tr>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="forma_padrao") {?>
   	<tr>
    	<td colspan="5">
			<?php echo "<p class=\"warning_part\">Ao menos uma forma de pagamento deve estar selecionado para o perfeito funcionamento da loja.</p>\n <br /> \n"; ?>
   		<?php } } ?>
      </td>
    </tr>
    <tr>
    	<td class="info" colspan="2">Instru&ccedil;&otilde;es: <span>As formas de pagamento devem ser configuradas antes de serem ativadas. Logo que s&atilde;o ativadas, a forma de pagamento &eacute; dispon&iacute;vel na loja. <strong>CUIDADO!</strong> Ao menos uma delas deve estar selecionada.</span></td>
    </tr>
    <tr>
    	<td colspan="2">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; width:40px; text-align:center;">N&deg;</td>
            <td style="color:#FFF; width:60px; text-align:center;">Bandeira</td>
            <td style="color:#FFF;">Forma de pagamento</td>
            <td style="color:#FFF; text-align:center;">Ativo?  <span style="color:#FFF; font-size:10px;">(Click para alterar)</span></td>
            <td style="color:#FFF; text-align:center;">Alterar Bandeira</td>
						<td style="color:#FFF; text-align:center;">Configurar</td>
          </tr>
          <?php while($pag=mysql_fetch_array($sel_formas)) { ?>
          <tr class="hover">
          	<td style="text-align:center;"><?php echo $pag[forma]; ?></td>
            <td style="text-align:center;"><img style="width:35px;" src="<?php echo $global_url; ?>/../images/bandeiras/<?php echo $pag[bandeira]; ?>" alt="<?php echo $pag[slug]; ?>" /></td>
            <td><?php echo $pag[nome]; ?></td>
            <td style="text-align:center;"><?php if($pag[status] == 0) { ?><a href="_status_forma_pagamento.php?id=<?php echo $pag[forma]; ?>" title="Ativar esta forma de pagamento" style="color:red;">N&atilde;o</a><?php } else { ?><a href="_status_forma_pagamento.php?id=<?php echo $pag[forma]; ?>" title="Desativar esta forma de pagamento" style="color:green;">Sim</a><?php } ?></td>
            <td style="text-align:center;"><strong><a href="_aviso_bandeira.php?id=<?php echo $pag[forma]; ?>&width=520&height=120" class="thickbox" title="Alterar bandeira desta forma de pagamento">[Alterar bandeira]</a></strong></td>
						<td style="text-align:center;"><strong><?php if($pag[forma] != 3) { ?><a href="../formas_de_pagamento/<?php echo $pag[slug]; ?>.php" title="Configurar esta forma de pagamento">[Configurar]</a><?php } else { ?> [n/a]<?php } ?></strong></td>
          </tr>
          <?php } ?>
        </table>
      </td>
    </tr>
  </table>
  </form>
  
  <table class="two">
  	<tr>
    	<td class="title" colspan="5">Pedidos</td>
    </tr>
    <tr>
    	<td colspan="5">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; width:40px; text-align:center;">ID</td>
            <td style="color:#FFF;">Configura&ccedil;&atilde;o</td>
            <td style="color:#FFF;">Descri&ccedil;&atilde;o</td>
            <td style="color:#FFF; text-align:center;">Valor</td>
            <td style="color:#FFF; text-align:center;">Editar</td>
        	</tr>
          <?php $select=mysql_query("SELECT * FROM system ORDER BY config")or die(mysql_error()."<br />"); while($config = mysql_fetch_array($select)) { $explode=explode("_",$config[config]); if($explode[0] == "pedido") { ?>
          <tr class="hover">
          	<td style="text-align:center;"><?php echo $config[id]; ?></td>
            <td><?php echo $config[config]; ?></td>
            <td><?php echo $config[description]; ?></td>
            <td style="text-align:center;"><?php echo $config[value]; ?></td>
            <td style="text-align:center;"><a href="./_editar_config.php?config=<?php echo $config[id]; ?>&tipo=<?php echo $tipo; ?>&height=150&width=520" class="thickbox" title="Editar a configura&ccedil;&atilde;o <?php echo $config[config]; ?>"><strong>[editar]</strong></a></td>
          </tr>
          <?php } } ?>
        </table>
      </td>
    </tr>
  </table>
  
  

<?php get_footer(); ?>