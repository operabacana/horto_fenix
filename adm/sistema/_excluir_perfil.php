<?php include("../_includes/op_codex.php"); //Framework ?>
<?php connect_db(); ?>
<?php 
//Variáveis de retorno
if(isset($_GET["profile"])) {$perfil=$_GET["profile"];}
$id=$_GET["id"];

//Seleciona as permissões
$permissions = mysql_query("SELECT * FROM profiles WHERE id=$id") or die(mysql_error()."<br />");
$permissions = mysql_fetch_array($permissions);
$permission = $permissions[permission];
$name = $permissions[name];

//Remaneja usuários do perfil
if(isset($_GET["profile"])) { mysql_query("UPDATE users SET profile='$perfil' WHERE profile='$id'") or die(mysql_error()."<br />"); }

//Exclui perfil e permissões
mysql_query("DELETE FROM profiles WHERE id='$id'") or die(mysql_error()."<br />");
mysql_query("DELETE FROM permissions WHERE id='$id'") or die(mysql_error()."<br />");

//Caso esteja tudo OK
register_log("Perfil ".$perfil." excluído");
header("location:./perfis.php?profile=".$name."&success=excluir_perfil");
exit();

?>