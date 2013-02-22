<?php

include("../_includes/op_codex.php"); //Framework

connect_secondary_db();

////////////////////Variáveis de retorno
if(isset($_POST["cliente"])) {$cliente=$_POST["cliente"];}

$nome = addslashes( htmlentities($_POST["nome"]) );
$email = addslashes( htmlentities($_POST["email"]) );
$cidade = addslashes( htmlentities($_POST["cidade"]) );
$estado = addslashes( htmlentities($_POST["estado"]) );
$telefone = addslashes( htmlentities($_POST["telefone"]) );
$mensagem = addslashes( htmlentities($_POST["mensagem"]) );

//Faz inserções
mysql_query("UPDATE cadastros SET nome='$nome', email='$email', cidade='$cidade', estado='$estado', telefone='$telefone', mensagem='$mensagem' WHERE id='$cliente' ") or die(mysql_error()."<br />");

connect_db(); register_log("Alteração das informações do cliente ".$cliente);
header("location:editar.php?cliente=".$cliente."&success=update_user"); exit();

?>