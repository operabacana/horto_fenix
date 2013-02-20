<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>

<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado 
//Verifica permissões
if(!$gerenciar_usuarios) {header("location:../acesso/not_authorized.php"); exit();}


///////////////////
$permissions=mysql_query("SELECT * FROM profiles") or die(mysql_error); //Banco de dados

if(isset($_GET["user"])) {
	$select_user=mysql_query("SELECT * FROM users WHERE id=$_GET[user]") or die(mysql_error()."<br />"); //Seleciona tabela
	$user=mysql_fetch_array($select_user);
}

?>
<?php open_header(); ?>
<title><?php if(isset($_GET["user"])) { ?>Editar usu&aacute;rio<?php } else { ?>Cadastrar novo usu&aacute;rio<?php } ?> <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Sistema</span> &gt;&gt; <?php if(isset($_GET["user"])) { ?>Editar usu&aacute;rio<?php } else { ?>Cadastrar novo usu&aacute;rio<?php } ?></h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Os usu&aacute;rios criados nesta &aacute;rea poder&atilde;o efetuar login pela p&aacute;gina de acesso da administra&ccedil;&atilde;o. N&atilde;o deixe nenhum campo necess&aacute;rio em branco.</p><br />
	
  <a name="passo1"></a>
  <!-- ///////////////////////////////////////Passo 1/3 -->
  <form action="_adicionar_passo1.php" method="post" name="form1" enctype="multipart/form-data">
  <input type="hidden" name="user" value="<?php if(isset($_GET["user"])) {echo $_GET["user"];} ?>" />
  <table class="one">
  	<tr>
    	<td colspan="4" class="title">Passo 1/3 <span>Dados gerais</span></td>
    </tr>
    <?php if(isset($_GET["success"])) {if($_GET["success"]=="edit_user") {?>
      <tr>
      	<td colspan="2"><?php echo "<p class=\"warning_success_part\">As informa&ccedil;&otilde;es do usu&aacute;rio foram editadas com sucesso!</p>\n <br /> \n"; ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_name") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou o nome. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_email") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; deixou o email em branco. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_empresa") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou a empresa. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_login") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; deixou o login em branco. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_pass") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou a senha. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="blank_pass2") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Voc&ecirc; n&atilde;o especificou a senha de confirma&ccedil;&atilde;o. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_pass") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">A senha que voc&ecirc; informou n&atilde;o &eacute; v&aacute;lida. A senha deve ter mais de 6 caracteres e n&atilde;o deve ultrapassar 18 caracteres. \n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="invalid_combination") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">As duas senhas informadas n&atilde;o combinam. Confira se o CapsLock n&atilde;o est&aacute; ativo e tente de novo.\n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <?php if(isset($_GET["error"])) {if($_GET["error"]=="exist_login") {?>
      <tr>
      	<td colspan="4"><?php echo "<p class=\"warning_part\">Este login j&aacute; est&aacute; em uso! Por favor, tente outro.\n</p>";  ?></td>
      </tr>
    <?php } } ?>
    <tr>
    	<td class="info">Nome: * <span>Nome e sobrenome do usu&aacute;rio</span></td>
      <td><input type="text" class="text" name="nome" <?php if(isset($_GET["user"])) {echo "value=\"".$user[name]."\"";} ?> /></td>
    </tr>
    <tr>
    	<td class="info">Email: * <span>Este email ser&aacute; usado para receber informa&ccedil;&otilde;es de acordo com seu perfil escolhido no passo 2.</span></td>
      <td><input type="text" class="text" name="email" <?php if(isset($_GET["user"])) {echo "value=\"".$user['mail']."\"";} ?> /></td>
    </tr>
    <tr>
    	<td class="info">Empresa: * <span>Empresa onde o usu&aacute;rio est&aacute; cadastrado.</span></td>
      <td><input type="text" class="text" name="empresa" <?php if(isset($_GET["user"])) {echo "value=\"".$user[company]."\"";} ?> /></td>
    </tr>
    <!-- <tr>
    	<td class="info">Telefone: * <span>Telefone principal para contato (ddd + tel).</span></td>
      <td><input type="text" class="text" name="telefone" style="width:120px;" value="<?php if(isset($_GET["user"])) {echo "value=\"".$user[phone]."\"";} else {echo "value=\"()\"";} ?>" /></td>
    </tr>
    <tr>
      <td class="info">Celular: <span>Telefone celular para contato r&aacute;pido (ddd + tel).</span></td>
      <td><input type="text" class="text" name="telefone2" style="width:120px;" value="<?php if(isset($_GET["user"])) {echo "value=\"".$user[second_phone]."\"";} else {echo "value=\"()\"";} ?>" /></td>
    </tr>
    <tr>
    	<td class="info">Data de Nascimento: * <span>A data de nascimento (dd/mm/aaaa).</span></td>
      <td><input type="text" class="text" name="dia" style="width:20px;" maxlength="2" /> / <input type="text" class="text" name="mes" style="width:20px;" maxlength="2" /> / <input type="text" class="text" name="dia" style="width:40px;" maxlength="4" /></td>
    </tr> -->
  </table>

  <!-- ///////////////////////////////////////Passo 2/3 -->
  <table class="two">
  	<tr>
  		<td colspan="4" class="title">Passo 2/3 <span>Login</span></td>
  	</tr>
  	<tr>
    	<td class="info">Login: * <span>Nome de login para entrar o sistema. Escolha com cuidado este login, pois n&atilde;o poder&aacute; ser trocado futuramente.</span></td>
      <td><input type="text" class="text" name="login" style="width:120px;" <?php if(isset($_GET["user"])) {echo "value=\"".$user[login]."\" readonly=\"readonly\"";} ?>/></td>
    </tr>
    <tr>
      <td class="info">Senha: * <span>Senha para entrar no sistema (m&iacute;nimo:6 m&aacute;ximo:18).</span></td>
      <td><input type="password" class="text" name="senha" maxlength="18" style="width:120px;" <?php if(isset($_GET["user"])) {echo "value=\"".$user[pass]."\"";} ?> /></td>
      <td class="info">Repita a senha: * <span>Para maior seguran&ccedil;a e garantir que voc&ecirc; n&atilde;o tenha digitado errado.</span></td>
      <td><input type="password" class="text" name="senha2" maxlength="18" style="width:120px;" <?php if(isset($_GET["user"])) {echo "value=\"".$user[pass]."\"";} ?> /></td>
  	</tr>
  </table>
  
  <!-- ///////////////////////////////////////Passo 3/3 -->
  <table class="one">
  	<tr>
  		<td colspan="4" class="title">Passo 3/3 <span>Perfil</span></td>
  	</tr>
    <tr>
    	<td class="info">Perfil: * <span>Escolha o perfil de permiss&otilde;es para este usu&aacute;rio. Os perfis podem ser criados em <a href="../sistema/perfis.php" title="Gerenciar Perfis de Usu&aacute;rios">Sistema>Gerenciar Perfis</a>.</span></td>
    	<td>
			<?php while($profile = mysql_fetch_array($permissions)) { ?>
    		<input type="radio" class="radio" name="perfil" value="<?php echo $profile[id]; ?>" id="profile_<?php echo $profile[id]; ?>" <?php if(isset($_GET["user"])) {if($user[profile] == $profile[id]) {echo "checked=\"checked\"";}} elseif($profile[id] == 1) {echo "checked=\"checked\"";} ?> /> <label for="profile_<?php echo $profile[id]; ?>"><?php echo $profile[name]; ?></label><br />
   	 <?php } ?>
   	 </td>
     <td class="info">Status: * <span>Escolha o status geral para este usu&aacute;rio. Usu&aacute;rios bloqueados n&atilde;o poder&atilde;o logar-se no sistema.</span></td>
     <td>
     	<input type="radio" class="radio" name="status" value="1" id="status_1"  <?php if(isset($_GET["user"])) {if($user[status] == 1) {echo "checked=\"checked\"";}} else {echo "checked=\"checked\"";} ?> /><label for="status_1">Ativo</label><br />
      <input type="radio" class="radio" name="status" value="0" id="status_0" <?php if(isset($_GET["user"])) {if($user[status] == 0) {echo "checked=\"checked\"";}} ?> /><label for="status_0">Bloqueado</label>
     </td>
   </tr>
   <tr>
   	<td colspan="4" style="text-align:right;"><?php if(isset($_GET["user"])) { ?><input type="button" class="submit" value="Visualizar" onclick="javascript:window.location='../user/perfil.php?user=<?php echo $user[id]; ?>'" /> <input type="submit" class="submit" value="Editar Informa&ccedil;&otilde;es" /><?php } else { ?><input type="submit" class="submit" value="Cadastrar Usu&aacute;rio" /><?php } ?></td>
   </tr>
  </table>
  </form>
  
</div>
<?php get_footer(); ?>