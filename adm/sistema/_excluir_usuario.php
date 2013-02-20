<?php include("../_includes/op_codex.php"); //Framework ?>
<?php connect_db(); ?>
<?php 
//Variáveis de retorno
$user=$_GET["user"];
$order=$_GET["order"];
$by=$_GET["by"];

//Busca o usuário
$sel=mysql_query("SELECT * FROM users WHERE id='$user'") or die(mysql_error()."<br />");
$sel=mysql_fetch_array($sel);
$nome=urlencode($sel[name]);

//Exclui usuário
mysql_query("DELETE FROM users WHERE id='$user'") or die(mysql_error()."<br />");

//Caso esteja tudo OK
register_log("Usuário (".$user.")".$nome." excluído");
header("location:./usuarios.php?usuario=".$nome."&success=excluir_usuario&order=".$order."&by=".$by."#");
exit();

?>