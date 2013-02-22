<?php
//Este arquivo serve para verificar os emails cadastrados na newsletter e dos clientes

//Seleciona os emails da newsletter
$sel_news=mysql_query("SELECT * FROM newsletter")or die(mysql_error()."<br />");
//Transforma emails em minúsculas, verifica se está correto e exclui caso esteja incorreto.
while($news = mysql_fetch_array($sel_news)) {
	$email = $news["email"];
	$email = strtolower($email);
	mysql_query("UPDATE newsletter SET email='$email' WHERE id='$news[id]'")or die(mysql_error()."<br />");
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
		mysql_query("DELETE FROM newsletter WHERE id='$news[id]'")or die(mysql_error()."<br />");
		connect_db(); register_cronjob("check_mails - Excluido o email ".$email." da newsletter"); connect_secondary_db();
	}
}

//Seleciona os emails dos clientes
$sel_clientes=mysql_query("SELECT id,email FROM clientes")or die(mysql_error()."<br />");
while($cliente = mysql_fetch_array($sel_clientes)) {
	$email = $cliente["email"];
	$email = strtolower($email);
	mysql_query("UPDATE clientes SET email='$email' WHERE id='$cliente[id]'")or die(mysql_error()."<br />");
}

?>