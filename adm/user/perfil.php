<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>

<?php
//Verifica permissões
if(!$visualizar_usuarios && !$gerenciar_usuarios) {header("location:../acesso/not_authorized.php"); exit();}

///////////////////
$user_select=mysql_query("SELECT * FROM users WHERE id='$_GET[user]'") or die(mysql_error); //Banco de dados
$user=mysql_fetch_array($user_select); //Para gerar informações sobre o usuário logado
$profile_select=mysql_query("SELECT * FROM profiles WHERE id='$user[profile]'") or die(mysql_error); //Banco de dados
$profile=mysql_fetch_array($profile_select);
?>
<?php open_header(); ?>
<title>Perfil de Usu&aacute;rio <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Sistema</span> &gt;&gt; Perfil de usu&aacute;rio</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Esta p&aacute;gina mostra as informa&ccedil;&otilde;es do usu&aacute;rio selecionado. Voc&ecirc; poder&aacute; editar seu pr&oacute;prio perfil ou, caso seja administrador, editar o perfil de qualquer usu&aacute;rio.</p><br />
  <?php if(isset($_GET["success"])) {if($_GET["success"]=="new_user") {?>
  <?php echo "<p class=\"warning_success_part\">Usu&aacute;rio criado com sucesso! \n</p>";  ?></td>
  <?php } } ?>
	
  <form>
  <table class="one">
  	<tr>
    	<td  rowspan="3"><img src="../_images/noimage.jpg" alt="<?php echo $user[name]; ?> Photo" style="width:100px;" /></td>
    	<td><h2><?php echo $user[name]; ?> </h2><span style="font-weight:bold; font-size:14px;"><?php echo $profile[name]; ?></span></td>
    </tr>
    <tr>
    	<td colspan="2">
      	<!-- <strong>Data de nascimento:</strong> 00/00/0000 -->
      	<br /><strong>Data de cadastro:</strong> <?php echo date_convert($user[register_date]); ?>
        <br /><strong>Empresa de trabalho:</strong> <?php echo $user[company]; ?>
    	</td>
    </tr>
    <tr>
    	<td colspan="2"><strong>Email:</strong> <?php echo $user["mail"]; ?><br /><strong>Login:</strong> <?php echo $user[login]; ?></td>
      <td style="width:60%;"><!-- <strong>Telefone:</strong> (00) 0000-0000 <br />--><strong>Status:</strong> <?php if($user[status] == 1) {echo "<span style=\"color:green;\">Ativo</span>";} elseif($user[status] == 0) {echo "<span style=\"color:red;\">N&atilde;o</span>";} ?></td>
    </tr>
    <?php if($visualizar_logs || $gerenciar_sistema) { ?>
    <tr>
    	<td class="info" colspan="4">&Uacute;ltimas a&ccedil;&otilde;es: <span>Para ver log de acessos e modifica&ccedil;&otilde;es gerais, acesse <a href="../sistema/logs.php" title="Visualizar logs">Sistema>Logs</a>.</span></td>
    </tr>
    <tr>
    	<td colspan="4">
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF; width:120px;">Data / Hora</td>
            <td style="color:#FFF;">Ip</td>
            <td style="color:#FFF;">A&ccedil;&atilde;o</td>
            <td style="color:#FFF;">Navegador / Sistema / Server</td>
          </tr>
          <?php
						$logfile = "../_logs/userid(".$user[id].").log";
						$open = fopen($logfile,"a+");
						if(!filesize($logfile) == 0) {
							$content = array_reverse(explode("\n",fread($open, filesize($logfile))));
							for($i=0; $i<10; $i++) {
								$piece=replace_latin_chars(str_replace("]","",explode("[",$content[$i])),false);
								if($piece[0] != null) {
					?>
          <tr class="hover">
          	<td><?php echo $piece[0]; ?></td>
            <td><?php echo str_replace("ip:","",$piece[2]); ?></td>
            <td><?php echo str_replace("action:","",$piece[3]); ?></td>
            <td><?php echo str_replace("info:","",$piece[6]); ?></td>
          </tr>
          <?php
						} } }
					?>
        </table>
      </td>
    </tr>
    <?php } ?>
    <tr>
    	<td colspan="4" style="text-align:right;"><form><input type="button" class="submit" style="font-size:11px;" value="Baixar userid(<?=$user[id]?>).log" onclick="javascript:window.open('<?php echo $logfile; ?>');" /></form></td>
    </tr>
    <?php if($gerenciar_usuarios || $user['mail'] == $_SESSION[admin_logon]) { ?>
    <tr>
    	<td colspan="4" style="text-align:right;"><input type="button" class="submit" value="Editar Usu&aacute;rio" onclick="javascritp:window.location='../sistema/adicionar_usuario.php?user=<?php echo $user[id]; ?>';" /></td>
    </tr>
    <?php } ?>
  </table>
  </form>
    
</div>
<?php get_footer(); ?>

