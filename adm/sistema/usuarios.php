<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>
<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado 
//Verifica permissões
if(!$visualizar_usuarios && !$gerenciar_usuarios) {header("location:../acesso/not_authorized.php"); exit();}


$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error); //Banco de dados

///////////////////
//Ordem
if($_GET['order']) { $order=$_GET['order'];} else { $order="id"; }
if($_GET['by']) { $by=$_GET['by']; } else { $by="DESC"; }

$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
$select_users=mysql_query("SELECT * FROM users ORDER BY $order $by") or die(mysql_error()."<br />"); //Seleciona usuários
$count=mysql_num_rows($select_users); //Quantidade de usuários normais
$select_bloqued_users=mysql_query("SELECT * FROM users WHERE status=0") or die(mysql_error()."<br />"); //Seleciona usuários
$count_bloqued=mysql_num_rows($select_bloqued_users); //Quantidade de usuários normais
?>
<?php open_header(); ?>
<title>Gerenciar Usu&aacute;rios <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); connect_db(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Sistema</span> &gt;&gt;Gerenciar usu&aacute;rios</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Nesta p&aacute;gina voc&ecirc; pode editar ou excluir qualquer usu&aacute;rio cadastrado no sistema. Apenas administradores possuem esta permiss&atilde;o.<p><br />
  
  <div id="informations">
  	<div class="box">
    	<span>Usu&aacute;rios registrados:</span><br />
    	<?php echo $count; ?>
    </div>
    <div class="box">
    	<span>Usu&aacute;rios bloqueados:</span><br />
    	<?php echo $count_bloqued; ?>
    </div>
    <div class="box">
    	<span>Usu&aacute;rios ativos:</span><br />
    	<?php echo $count-$count_bloqued; ?>
    </div>
  </div>
  
  <table class="one">
  	<?php if(isset($_GET["success"])) {if($_GET["success"]=="excluir_usuario") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_success_part\">O usu&aacute;rio \"".urldecode($_GET["usuario"])."\"&nbsp;&nbsp;foi exclu&iacute;do permanentemente do sistema.</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
  	<tr>
    	<td>
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          <td style="color:#FFF;"><a href="usuarios.php?order=id&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Identfica&ccedil;&atilde;o">Id <?php if($_GET[order] == "id" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "id" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
          	<td style="color:#FFF;"><a href="usuarios.php?order=name&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Nome">Usu&aacute;rio <?php if($_GET[order] == "name" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "name" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
        		<td style="color:#FFF;"><a href="usuarios.php?order=login&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Login">Login <?php if($_GET[order] == "login" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "login" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
          	<td style="color:#FFF;"><a href="usuarios.php?order=company&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Empresa">Empresa <?php if($_GET[order] == "company" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "company" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
            <td style="color:#FFF;"><a href="usuarios.php?order=mail&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Email">Email <?php if($_GET[order] == "mail" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "mail" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
          	<td style="color:#FFF;"><a href="usuarios.php?order=profile&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Perfil de Acesso">Perfil de Acesso <?php if($_GET[order] == "profile" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "profile" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
            <td style="color:#FFF;"><a href="usuarios.php?order=last_access&by=<?php if($_GET[by] == "ASC") {echo "DESC"; } else {echo "ASC"; }?>" style="color:#FFF;" title="Ordenar por Data de &Uacute;ltimo acesso">&Uacute;ltimo acesso <?php if($_GET[order] == "last_access" && $_GET[by] == "ASC") {echo "<strong style=\"color:#FFF;\">&uarr;</strong>"; } elseif($_GET[order] == "last_access" && $_GET[by] == "DESC") { echo "<strong style=\"color:#FFF;\">&darr;</strong>"; } ?></a></td>
            <td style="color:#FFF; text-align:center;">Visualizar</td>
            <td style="color:#FFF; text-align:center;">Editar</td>
            <td style="color:#FFF; text-align:center;">excluir</td>
        	</tr>
          <?php while($user = mysql_fetch_array($select_users)){ ?>
          <tr <?php if($user[status] == 0) {echo "class=\"hover_warning\"";} else {echo "class=\"hover\"";} ?>>
          	<td><?php echo $user[id]; ?></td>
            <td><?php echo $user[name]; ?></td>
            <td><?php echo $user[login]; ?></td>
            <td><?php echo $user[company]; ?></td>
            <td><?php echo $user['mail']; ?></td>
            <td><?php $permissions=mysql_query("SELECT * FROM profiles WHERE id=$user[profile]") or die(mysql_error()."<br />"); $result=mysql_fetch_array($permissions); echo $result[name]; ?></td>
            <td><?php echo date_convert($user[last_access]); ?></td>
            <td style="text-align:center;"><?php if($gerenciar_usuarios || $visualizar_usuarios) { ?><strong><a href="../user/perfil.php?user=<?php echo $user[id]; ?>" title="Visualizar informa&ccedil;&otilde;es do usu&aacute;rio '<?php echo $user[name]; ?>'">[visualizar]</a></strong><?php } else { ?><strong>[s/p]</strong><?php } ?></td>
            <td style="text-align:center;"><?php if($gerenciar_usuarios) { ?><strong><a href="adicionar_usuario.php?user=<?php echo $user[id]; ?>" title="Editar informa&ccedil;&otilde;es do usu&aacute;rio '<?php echo $user[name]; ?>'">[editar]</a></strong><?php } else { ?><strong>[s/p]</strong><?php } ?></td>
            <td style="text-align:center;"><?php if($gerenciar_usuarios) { ?><?php if($user["mail"] == $_COOKIE["admin_logon"]) { ?><strong>[s/p]</strong><?php } else { ?><strong><a href="javascript:confirmation('_excluir_usuario.php?user=<?php echo $user[id]; ?>&order=<?php echo $_GET[order]; ?>&by=DESC','Voc&ecirc; realmente deseja excluir o usu&aacute;rio \'<?php echo $user[name]; ?>\' definitivamente do sistema ?')" title="Excluir o usu&aacute;rio '<?php echo $user[name]; ?>'">x</a></strong><?php } } else { ?><strong>[s/p]</strong><?php } ?></td>
          </tr>
          <?php } ?>
      	</table>
      </td>
    </tr>
  </table>
  
</div>
<?php get_footer(); ?>