<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>
<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado 
$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error); //Banco de dados

//Verifica permissões
if(!$gerenciar_usuarios) {header("location:../acesso/not_authorized.php"); exit();}

/////////////////////Seleciona perfís
$sel_profiles=mysql_query("SELECT * FROM profiles") or die(mysql_error()."<br />");
$sel_permissions=mysql_query("SELECT DISTINCT permission FROM permissions") or die(mysql_error()."<br />");

?>
<?php open_header(); ?>
<title>Gerenciar perfil <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); connect_db(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Sistema</span> &gt;&gt;Gerenciar perfis</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Caso voc&ecirc; queira cadastrar um grupo de usu&aacute;rios que podem ter acesso &agrave; somente parte do sistema, configure aqui o perfil do grupo e depois cadastre os usu&aacute;rios para este perfil.</p><br />
  
  <form name="form" action="_cadastrar_perfil.php" method="post">
  <table class="one">
  	<tr>
    	<td colspan="4" class="title">Passo 1/2 <span>Cadastrar perfil</span></td>
    </tr>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="new_profile") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_success_part\">O perfil ".$_GET[profile]." foi adicionado com sucesso!</p>\n <br /> \n"; ?></td>
    </tr>
    <?php } } ?>
     <?php if(isset($_GET["success"])) {if($_GET["success"]=="edit_profile") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_success_part\">O perfil foi alterado com sucesso!</p>\n <br /> \n"; ?></td>
    </tr>
    <?php } } ?>
     <?php if(isset($_GET["success"])) {if($_GET["success"]=="excluir_perfil") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_success_part\">O perfil ".$_GET[profile]." foi exclu&iacute;do do sistema.</p>\n <br /> \n"; ?></td>
    </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_name") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_part\">O nome do perfil n&atilde;o pode ser deixado em branco. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="exist_name") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_part\">O nome do perfil escolhido j&aacute; est&aacute; em uso. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <tr>
    	<td class="info">Nome do perfil: <span>Escolha um nome para este perfil. Ex.: Editor</span></td>
      <td><input type="text" class="text" name="nome" style="width:150px;" /></td>
    </tr>
    <tr>
      <td class="info">Permiss&otilde;es: <span>Escolha as &aacute;reas que o usu&aacute;rio deste perfil poder&atilde;o acessar.</span></td>
      <td>
      <table>
      <tr>
      	<?php $count=0; while($permission = mysql_fetch_array($sel_permissions)) { $count++; ?>
        
        	<?php if($count == 3) {echo "</tr><tr><td>";} elseif($count == 1) {echo "<td>";}  else {echo "<td>";} ?>
          <input type="checkbox" name="permission_<?php echo $permission[permission]; ?>" id="permission_<?php echo $permission[permission]; ?>" class="checkbox" checked="checked" />
          <label for="permission_<?php echo $permission[permission]; ?>" style="margin-left:5px; text-transform:capitalize; margin-right:10px;">
					<?php $permission=str_replace("_"," ",$permission[permission]); echo $permission; ?></label>
          <?php if($count == 3){echo "</td>"; $count=0;} elseif($count == 1) {echo "</td>";} else {echo "</td>";} ?>
					
					<?php } ?>
      </table>
      </td>
    </tr>
    <tr>
    	<td style="text-align:right;" colspan="4"><input type="button" class="submit" value="Selecionar Todos" onclick="javascript:checkAll('form');" style="padding:2px; font-size:11px;" />&nbsp;<input type="button" class="submit" value="Deselecionar Todos" onclick="javascript:uncheckAll('form');" style="padding:2px; font-size:11px;" /></td>
    </tr>
    <tr style="text-align:right;">
    	<td colspan="4"><input type="submit" class="submit" value="Cadastrar perfil" /></td>
    </tr>
  </table>
  </form>
  
  <table class="two">
  	<tr>
    	<td colspan="4" class="title">Passo 2/2 <span>Gerenciar perfis cadastrados</span></td>
    </tr>
    <tr>
    	<td> 
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF;">Nome do perfil</td>
            <td style="color:#FFF;">Permiss&otilde;es</td>
            <td style="color:#FFF; text-align:center; width:40px;">Editar</td>
            <td style="color:#FFF; text-align:center; width:40px;">excluir</td>
        	</tr>
          <?php while($profile = mysql_fetch_array($sel_profiles)) { ?>
          <?php $sel_permissions = mysql_query("SELECT * FROM permissions WHERE id=$profile[id]") or die(mysql_error()."<br />"); ?>
          <tr class="hover">
          	<td><?php echo $profile[name]; ?></td>
            <td style="text-transform:capitalize;"><?php if ($profile[id] == 1) {?> <strong>Todas as permiss&otilde;es poss&iacute;veis</strong> <?php } else { ?><?php while($permission = mysql_fetch_array($sel_permissions)) { ?><?php echo "> ".str_replace("_"," ",$permission[permission])."&nbsp;&nbsp;"; ?> <?php } } ?></td>
            <td style="text-align:center;"><?php if ($profile[id] == 1) {?> <strong>[s/p]</strong> <?php } else { ?><strong><a href="./_editar_perfil.php?profile=<?php echo $profile[id]; ?>&width=520&height=340" class="thickbox" title="Editar o perfil <?php echo $profile[name]; ?>">[editar]</a></strong><?php } ?></td>
            <td style="text-align:center;"><?php if ($profile[id] == 1) {?> <strong>[s/p]</strong> <?php } else { ?><strong><a href="_aviso_perfil.php?id=<?php echo $profile[id]; ?>&width=520&height=180" class="thickbox" title="excluir o perfil <?php echo $profile[name]; ?>">x</a></strong><?php } ?></td>
          </tr>
          <?php } ?>
      	</table>
      </td>
    </tr>
  </table>

</div>
<?php get_footer(); ?>