<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  connect_secondary_db();  ?>
<?php
//Variaveis de retorno
$banner = $_GET["banner"];

mysql_query("DELETE FROM banners WHERE id='$banner'") or die(mysql_error()."<br />");

//Caso esteja tudo OK
connect_db(); register_log("Banner ".$banner." excluído");
header("location:./banners.php?banner=".$nome."&success=delete1#passo1");
exit();
?>