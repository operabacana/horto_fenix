<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>

<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado 
//Verifica permissões
if(!$gerenciar_banners) {header("location:../acesso/not_authorized.php"); exit();}

$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error); //Banco de dados

///////////////////
$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
connect_secondary_db(); //Seleciona BD diferente do padrão
?>
<?php open_header(); ?>
<title>Gerenciar Banners <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Layout</span> &gt;&gt; Gerenciar banners</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Voc&ecirc; poder&aacute; adicionar banners em flash ou imagens. Caso tenha mais de um banner ativo por p&aacute;gina ou se&ccedil;&atilde;o, os banners se tornar&atilde;oaleat&oacute;rios (mudam a cada novo carregamento de p&aacute;gina).</p><br />
	
  <!-- ///////////////////////////////////////Passo 1/2 -->
  <a name="passo1"></a>
  <form action="_banners_passo1.php" method="post" name="form1" enctype="multipart/form-data">
  <table class="one">
  	<tr>
    	<td colspan="4" class="title">Passo 1/2 <span>Banner superior da p&aacute;gina inicial</span></td>
    </tr>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="imagem1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">A imagem foi cadastrada e inserida com sucesso!</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="delete1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">Banner exclu&iacute;do com sucesso.</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="status1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">Status do banner escolhido foi alterado.</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="flash1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">O arquivo flash foi cadastrado e inserido com sucesso!</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_name1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o nome do banner. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_image1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou como imagem n&atilde;o &eacute; v&aacute;lido. Aceito somente imagens. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_image1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou nenhum arquivo de imagem. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="not_selected1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o tipo de arquivo. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_link1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o link da imagem. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_flash1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou nenhum arquivo de flash. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_flash1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou n&atilde;o &eacute; v&aacute;lido. S&atilde;o aceitos apenas arquivos .swf \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="big_flash1") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou &eacute; muito grande! Por favor, n&atilde;o deixe passar de 1.5 Mb. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <tr>
    	<td class="info">Tipo de arquivo: <span>Escolha o tipo de arquivo que ser&aacute; enviado para servir como banner superior da p&aacute;gina inicial.</span></td>
      <td><input type="radio" value="imagem"  name="tipo_arquivo" onchange="javascript:document.getElementById('banner_superior_flash').style.display='none';document.getElementById('banner_superior_imagem').style.display='table-row';document.getElementById('banner_superior_imagem_two').style.display='table-row';" id="passo1_imagem" class="radio" /><label for="passo1_imagem">Imagem</label><br /><input type="radio" value="flash" name="tipo_arquivo" onchange="javascript:document.getElementById('banner_superior_flash').style.display='table-row';document.getElementById('banner_superior_imagem').style.display='none';document.getElementById('banner_superior_imagem_two').style.display='none';" id="passo1_flash" class="radio"/><label for="passo1_flash">Flash</label></td>
      <td class="info">Nome: * <span>Nome de refer&ecirc;ncia para este banner. Este nome servir&aacute; apenas para organiza&ccedil;&atilde;o dentro da administra&ccedil;&atilde;o.</span></td>
      <td><input type="text" class="text" name="nome" style="width:180px;" /></td>
    </tr>
    <tr id="banner_superior_imagem" style="display:none;">
    	<td class="info">Imagem principal: * <span>Escolha a imagem que servir&aacute; para a publicidade superior da p&aacute;gina inicial.</span></td>
      <td><input type="file" name="arquivo_imagem" /></td>
      <td class="info">Imagem de fundo: <span>Escolha a imagem de fundo que se repetir&aacute; caso a resolu&ccedil;&atilde;o do usu&aacute;rio seja maior que a &aacute;rea &uacute;til da imagem acima.</span></td>
      <td><input type="file" name="arquivo_imagem_fundo" /></td>
    </tr>
    <tr id="banner_superior_imagem_two" style="display:none;">
    	<td class="info">Link da imagem: * <span>O link que ser&aacute; apontado pela imagem de propaganda. (Ex.: www.google.com.br)</span></td>
      <td><input type="text" name="link_imagem" class="text" style="width:180px;" /></td>
      <td class="info">Alternativo: * <span>Necess&aacute;rio atribuir uma frase para a tag TITLE do link e a tag ALT da imagem.</span></td>
      <td><input type="text" class="text" style="width:180px;" name="alternativo" /></td>
    </tr>
    <tr id="banner_superior_flash" style="display:none;">
    	<td class="info">Arquivo: * <span>Escolha o arquivo que ser&aacute; o banner superior. Aceito apenas arquivos flash. O arquivo n&atilde;o pode ser superior &agrave; 1.3 MB.</span></td>
      <td><input type="file" name="arquivo_flash" /></td>
      <td class="info">Alternativo: <span>Necess&aacute;rio atribuir uma frase para a tag TITLE do link e a tag ALT da imagem.</span></td>
      <td><input type="text" class="text" style="width:180px;" name="alternativo2" /></td>
    </tr>
    <tr>
    	<td colspan="4" style="text-align:right;"><input type="submit" class="submit" value="Inserir Banner" /></td>
    </tr>
    <?php $select_banners=mysql_query("SELECT * FROM banners  WHERE local='superior_principal'") or die(mysql_error()."<br />"); //Banners ?>
    <?php if(mysql_num_rows($select_banners) != 0) { ?>
    <tr>
    	<td colspan="4">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; vertical-align:middle;">Nome</td>
            <td style="color:#FFF; vertical-align:middle;">Tipo</td>
            <td style="color:#FFF; vertical-align:middle;">Link</td>
            <td style="color:#FFF; vertical-align:middle;">Texto alternativo</td>
            <td style="color:#FFF; vertical-align:middle; width:130px; text-align:center;">Publicado desde</td>
            <td style="color:#FFF; vertical-align:middle; width:50px;text-align:center;">Clicks</td>
            <td style="color:#FFF; vertical-align:middle; width:150px;text-align:center;">Status <br /><span style="font-size:9px; color:#FFF;">(Click para alterar)</span></td>
            <td style="color:#FFF; vertical-align:middle; width:50px;text-align:center;">excluir</td>
          </tr>
          <?php $select_banners=mysql_query("SELECT * FROM banners WHERE local='superior_principal'") or die(mysql_error()."<br />"); //Banners ?>
          <?php while($banner=mysql_fetch_array($select_banners)) { ?>
          <tr class="hover">
          	<td><?php echo $banner["nome"]; ?></td>
            <td><?php echo $banner["tipo"]; ?></td>
            <td><?php if($banner["link"] == null) {echo "-";} else {echo $banner["link"];}; ?></td>
            <td><?php echo $banner["alternativo"]; ?></td>
            <td><?php echo date_convert($banner["data"]); ?></td>
            <td style="text-align:center;"><?php echo $banner["clicks"]; ?></td>
            <td style="text-align:center;">
            	<strong>
            	<?php if($banner[status] == 1) {echo "<a href=\"_banners_status.php?banner=".$banner[id]."\" title=\"Alterar status deste banner\" style=\"color:green;\">"."On"."</a>";}
							else {echo "<a href=\"_banners_status.php?banner=".$banner[id]."\" title=\"Alterar status deste banner\" style=\"color:red;\">"."Off"."</a>";} ?>
              </strong>
            </td>
            <td style="text-align:center;"><strong><a href="javascript:confirmation('_banners_excluir.php?banner=<?php echo $banner[id]; ?>','Voc&ecirc; realmente deseja excluir o banner <?php echo $banner[nome]; ?>?')" title="Excluir banner <?php echo "\"".$banner[nome]."\"" ;?>">x</a></strong></td>
          </tr>
          <?php } ?>
        </table>
      </td>
    </tr>
		<?php } ?>
  </table>
  </form>
  
  <!-- ///////////////////////////////////////Passo 2/2 -->
  <a name="passo2"></a>
  <form action="_banners_passo2.php" method="post" name="form1" enctype="multipart/form-data">
  <table class="two">
  	<tr>
    	<td colspan="4" class="title">Passo 2/2 <span>Banner lateral</span></td>
    </tr>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="imagem2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">A imagem foi cadastrada e inserida com sucesso!</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="delete2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">Banner exclu&iacute;do com sucesso.</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="status2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">Status do banner escolhido foi alterado.</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="flash2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_success_part\">O arquivo flash foi cadastrado e inserido com sucesso!</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_image2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou como imagem n&atilde;o &eacute; v&aacute;lido. Aceito somente imagens. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_image2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou nenhum arquivo de imagem. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="not_selected2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o tipo de arquivo. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_name2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o nome do banner. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_link2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o link da imagem. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_flash2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou nenhum arquivo de flash. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_flash2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou n&atilde;o &eacute; v&aacute;lido. S&atilde;o aceitos apenas arquivos .swf \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="big_flash2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">O arquivo que voc&ecirc; enviou &eacute; muito grande! Por favor, n&atilde;o deixe passar de 1.5 Mb. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <tr>
    	<td class="info">Tipo de arquivo: <span>Escolha o tipo de arquivo que ser&aacute; enviado para servir como banner superior da p&aacute;gina inicial.</span></td>
      <td><input type="radio" value="imagem"  name="tipo_arquivo2" onchange="javascript:document.getElementById('banner_superior_flash2').style.display='none';document.getElementById('banner_superior_imagem2').style.display='table-row';document.getElementById('banner_superior_imagem_two2').style.display='table-row';" id="passo2_imagem" class="radio" /><label for="passo2_imagem">Imagem</label><br /><input type="radio" value="flash" name="tipo_arquivo2" onchange="javascript:document.getElementById('banner_superior_flash2').style.display='table-row';document.getElementById('banner_superior_imagem2').style.display='none';document.getElementById('banner_superior_imagem_two2').style.display='none';" id="passo2_flash" class="radio"/><label for="passo2_flash">Flash</label></td>
      <td class="info">Nome: * <span>Nome de refer&ecirc;ncia para este banner. Este nome servir&aacute; apenas para organiza&ccedil;&atilde;o dentro da administra&ccedil;&atilde;o.</span></td>
      <td><input type="text" class="text" name="nome" style="width:180px;" /></td>
    </tr>
    <tr id="banner_superior_imagem2" style="display:none;">
    	<td class="info">Imagem principal: * <span>Escolha a imagem que servir&aacute; para a publicidade superior da p&aacute;gina inicial.</span></td>
      <td><input type="file" name="arquivo_imagem" /></td>
    </tr>
    <tr id="banner_superior_imagem_two2" style="display:none;">
    	<td class="info">Link da imagem: * <span>O link completo que ser&aacute; apontado pela imagem de propaganda. (Ex.: http://www.google.com.br)</span></td>
      <td><input type="text" name="link_imagem" class="text" style="width:180px;" /></td>
      <td class="info">Alternativo: * <span>Necess&aacute;rio atribuir uma frase para a tag TITLE do link e a tag ALT da imagem ou frase alternativa para flash desabilitado.</span></td>
      <td><input type="text" class="text" style="width:180px;" name="alternativo" /></td>
    </tr>
    <tr id="banner_superior_flash2" style="display:none;">
    	<td class="info">Arquivo: * <span>Escolha o arquivo que ser&aacute; o banner superior. Aceito apenas arquivos flash. O arquivo n&atilde;o pode ser superior &agrave; 1.3 MB.</span></td>
      <td><input type="file" name="arquivo_flash" /></td>
      <td class="info">Alternativo: <span>Necess&aacute;rio atribuir uma frase para a tag TITLE do link e a tag ALT da imagem ou frase alternativa para flash desabilitado.</span></td>
      <td><input type="text" class="text" style="width:180px;" name="alternativo2" /></td>
    </tr>
    <tr>
      <td class="info">Local: <span>Escolha o local onde este banner aparecer&aacute;.</span></td>
      <td>
      	<select name="local" class="select" style="width:180px;">
        	<option value="all">Todas as p&aacute;ginas</option>
        	<option value="inicial">P&aacute;gina Inicial</option>
          <option value="categorias">Categorias</option>
          <option value="busca">Busca</option>
        </select>
      </td>
    </tr>
    <tr>
    	<td colspan="4" style="text-align:right;"><input type="submit" class="submit" value="Inserir Banner" /></td>
    </tr>
    <?php $select_banners=mysql_query("SELECT * FROM banners WHERE local<>'superior_principal'") or die(mysql_error()."<br />"); //Banners ?>
    <?php if(mysql_num_rows($select_banners) != 0) { ?>
    <tr>
    	<td colspan="4">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; vertical-align:middle;">Nome</td>
            <td style="color:#FFF; vertical-align:middle;">Tipo</td>
            <td style="color:#FFF; vertical-align:middle;">Link</td>
            <td style="color:#FFF; vertical-align:middle;">Local</td>
            <td style="color:#FFF; vertical-align:middle;">Texto alternativo</td>
            <td style="color:#FFF; vertical-align:middle; width:130px; text-align:center;">Publicado desde</td>
            <td style="color:#FFF; vertical-align:middle; width:50px;text-align:center;">Clicks</td>
            <td style="color:#FFF; vertical-align:middle; width:150px;text-align:center;">Status <br /><span style="font-size:9px; color:#FFF;">(Click para alterar)</span></td>
            <td style="color:#FFF; vertical-align:middle; width:50px;text-align:center;">excluir</td>
          </tr>
          <?php $select_banners=mysql_query("SELECT * FROM banners WHERE local<>'superior_principal'") or die(mysql_error()."<br />"); //Banners ?>
          <?php while($banner=mysql_fetch_array($select_banners)) { ?>
          <tr class="hover">
          	<td><?php echo $banner["nome"]; ?></td>
            <td><?php echo $banner["tipo"]; ?></td>
            <td><?php if($banner["link"] == null) {echo "-";} else {echo $banner["link"];}; ?></td>
            <td><?php if($banner["local"] == "all") {echo "Todas as p&aacute;ginas";} else {echo $banner["local"];}; ?></td>
            <td><?php echo $banner["alternativo"]; ?></td>
            <td><?php echo date_convert($banner["data"]); ?></td>
            <td style="text-align:center;"><?php echo $banner["clicks"]; ?></td>
            <td style="text-align:center;">
            	<strong>
            	<?php if($banner[status] == 1) {echo "<a href=\"_banners_status.php?banner=".$banner[id]."\" title=\"Alterar status deste banner\" style=\"color:green;\">"."On"."</a>";}
							else {echo "<a href=\"_banners_status.php?banner=".$banner[id]."\" title=\"Alterar status deste banner\" style=\"color:red;\">"."Off"."</a>";} ?>
              </strong>
            </td>
            <td style="text-align:center;"><strong><a href="javascript:confirmation('_banners_excluir.php?banner=<?php echo $banner[id]; ?>','Voc&ecirc; realmente deseja excluir o banner <?php echo $banner[nome]; ?>?')" title="Excluir banner <?php echo "\"".$banner[nome]."\"" ;?>">x</a></strong></td>
          </tr>
          <?php } ?>
        </table>
      </td>
    </tr>
		<?php } ?>
  </table>
  </form>
  
</div>
<?php get_footer(); ?>