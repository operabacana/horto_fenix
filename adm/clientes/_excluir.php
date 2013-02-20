<?php

include("../_includes/op_codex.php"); //Framework

connect_secondary_db();

////////////////////Variáveis de retorno
$cliente = $_GET["cliente"];

$sel = mysql_query("SELECT * FROM cadastros WHERE id='$cliente'") or die(mysql_error()."<br />");
$result = mysql_fetch_array($sel);

//Ação
mysql_query("DELETE FROM cadastros WHERE id='$cliente'") or die(mysql_error()."<br />");

connect_db(); register_log("Cliente ".$result["id"]." foi excuído do sistema");
header("location:clientes.php?success=delete_client");
exit();

?>