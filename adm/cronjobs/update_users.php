<?php
//Este arquivo serve para atualizar o arquivo users.xml que lista todos os produtos em (id) Nome - email

//Seleciona os produtos
$sel=mysql_query("SELECT * FROM clientes") or die(mysql_error()."<br />");

//Abre arquivo para escrita
$open=fopen("../_includes/users.xml","w+");
fwrite($open,"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n");
fwrite($open,"<pages> \n \n");

while($cliente=mysql_fetch_array($sel)) {
	fwrite($open,"<link> \n");
	fwrite($open,"<title>(".$cliente[id].") ".html_entity_decode($cliente[nome])." / ".html_entity_decode($cliente[email])."</title> \n");
	fwrite($open,"</link> \n \n");
}

//Fecha arquivo
fwrite($open,"</pages>");
fclose($open);

//Caso esteja tudo OK
register_cronjob("update_users - users.xml atualizado");
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
	
}
?>