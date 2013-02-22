<?php include("../_includes/op_codex.php"); //Framework ?>
<?php open_header(); ?>
<script language="javascript" src="<?php echo $global_url; ?>/_scripts/functions.js" type="text/javascript"></script>
<title>Sistema <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<!-- ////////////////////CONTENT/////////////////////// -->
<div id="content">
  <?php 
		//Confere se já está logado
		cookie_verify("admin_logon","acesso/logon.php","");
	?>
  <img src="../_images/logo.gif" style="margin:auto;" />
  <br /><br /><br />
  
  <div style="background:#d15d00; width:550px; height:54px; margin:auto;"><img src="../_images/warn.gif" style="float:left; margin-top:-26px;" /><p style="color:#FFF; padding-top:13px; margin-left:-10px; text-align:left;"><strong style="color:#FFF; font-size:12px;">Voc&ecirc; n&atilde;o est&aacute; logado ou n&atilde;o tem autoriza&ccedil;&atilde;o para acessar essa p&aacute;gina!</strong><br />Tente fazer o login novamente ou entre em contato com o administrador do sistema.</p></div>
  
  <br /><br />
  
  <h1 class="login">Administra&ccedil;&atilde;o</h1>

  <div class="form_login">
  	<div style="padding-top:40px; margin:auto; width:250px; text-align:left;">
    <?php if($_GET["error"]) {
			if($_GET["error"] == "invalid_user") {print "<p style='color:white; font-weight:bold; text-align:center;'>Usu&aacute;rio inv&aacute;lido.</p>";}
			if($_GET["error"] == "invalid_pass") {print "<p style='color:white; font-weight:bold; text-align:center;'>Senha inv&aacute;lida.</p>";}
		} ?>
    <form action="login.php" method="post">
      <label for="login">Login:</label><br />    
      <input type="text" name="login" id="login" />
      <br /><br />
      <label for="senha">Senha:</label><br />
      <input type="password" name="pass" id="senha" />
      <br /><br />
      <input type="submit" value="OK" id="submit" />
    </form>
    </div>
  </div>
  <img src="../_images/opera.gif" style="float:right; margin-right:20px;" />
</div>
<!-- ////////////////////END CONTENT/////////////////////// -->

