<?php ob_start(); include("../_includes/op_codex.php"); //Framework ?>
<?php open_header(); ?>
<script language="javascript" src="<?php echo $global_url; ?>/_scripts/functions.js" type="text/javascript"></script>
<?php close_header(); ?>


<?php

if($_POST[login]) {//Confere se veio via POST

  //Resgata variáveis
  $login_form=$_POST["login"];
  $pass_form=$_POST["pass"];
  
  //Banco de dados
  $select=mysql_query("SELECT * FROM users WHERE login='$login_form'") or die(mysql_error());
	$result=mysql_fetch_array($select);
  $count=mysql_num_rows($select);  
  
  //Caso não existe o usuário
  if($count < 1) {
		header("location:./?error=invalid_user");
		exit();
  }

	//Confere se a senha e o usuário batem
	if($pass_form != $result["pass"]) {
		header("location:./?error=invalid_pass");
		exit();
	}
	
	//Caso tudo esteja verificado, cria o cookie e manda para a página, além de atualizar seu último acesso
	mysql_query("UPDATE users SET last_access='$now_time' WHERE login='$login_form'") or die(mysql_error()."<br />");
	session_create("admin_logon",$result["mail"]);
	register_login($login_form);
	header("location:./logon.php");


} else { //Caso não tenha vindo via POST

print $warning_restrict;

}

?>

<?php get_footer(); ob_end_flush(); ?>