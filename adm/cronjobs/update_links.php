<?php
//Este arquivo serve para atualizar o arquivo links.xml que lista todos os produtos em Marca - Nome / Link para produto / Link para relacionados
connect_secondary_db();

////////////////////////////////////ALL.XML
//Abre arquivo para escrita
$open=fopen("../_includes/all.xml","w+");
fwrite($open,"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n");
fwrite($open,"<pages> \n \n");

$sel=mysql_query("SELECT * FROM produtos WHERE status!='2'") or die(mysql_error()."<br />");
while($produto=mysql_fetch_array($sel)) {
	fwrite($open,"<link> \n");
	fwrite($open,"<title>(".$produto[codigo].") ".html_entity_decode($produto[marca])." / ".html_entity_decode($produto[nome])." / ".html_entity_decode($produto[referencia])."</title> \n");
	fwrite($open,"</link> \n \n");
}

//Fecha arquivo
fwrite($open,"</pages>");
fclose($open);
connect_db(); register_cronjob("update_links - all.xml atualizado"); connect_secondary_db();

////////////////////////////////////PRODUTOS.XML
//Abre arquivo para escrita
$open=fopen("../_includes/produtos.xml","w+");
fwrite($open,"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n");
fwrite($open,"<pages> \n \n");

$sel=mysql_query("SELECT * FROM produtos WHERE status!='2' AND (tipo='produto' OR tipo='produto-conjunto')") or die(mysql_error()."<br />");
while($produto=mysql_fetch_array($sel)) {
	fwrite($open,"<link> \n");
	fwrite($open,"<title>(".$produto[codigo].") ".html_entity_decode($produto[marca])." / ".html_entity_decode($produto[nome])." / ".html_entity_decode($produto[referencia])."</title> \n");
	fwrite($open,"</link> \n \n");
}

//Fecha arquivo
fwrite($open,"</pages>");
fclose($open);
connect_db(); register_cronjob("update_links - produtos.xml atualizado"); connect_secondary_db();

////////////////////////////////////OPCIONAIS.XML
//Abre arquivo para escrita
$open=fopen("../_includes/opcionais.xml","w+");
fwrite($open,"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n");
fwrite($open,"<pages> \n \n");

$sel=mysql_query("SELECT * FROM produtos WHERE status!='2' AND tipo='opcional'") or die(mysql_error()."<br />");
while($produto=mysql_fetch_array($sel)) {
	fwrite($open,"<link> \n");
	fwrite($open,"<title>(".$produto[codigo].") ".html_entity_decode($produto[marca])." / ".html_entity_decode($produto[nome])." / ".html_entity_decode($produto[referencia])."</title> \n");
	fwrite($open,"</link> \n \n");
}

//Fecha arquivo
fwrite($open,"</pages>");
fclose($open);
connect_db(); register_cronjob("update_links - opcionais.xml atualizado"); connect_secondary_db();

////////////////////////////////////CONJUNTOS.XML
//Abre arquivo para escrita
$open=fopen("../_includes/conjuntos.xml","w+");
fwrite($open,"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n");
fwrite($open,"<pages> \n \n");

$sel=mysql_query("SELECT * FROM produtos WHERE status!='2' AND (tipo='conjunto' OR tipo='produto-conjunto')") or die(mysql_error()."<br />");
while($produto=mysql_fetch_array($sel)) {
	fwrite($open,"<link> \n");
	fwrite($open,"<title>(".$produto[codigo].") ".html_entity_decode($produto[marca])." / ".html_entity_decode($produto[nome])." / ".html_entity_decode($produto[referencia])."</title> \n");
	fwrite($open,"</link> \n \n");
}

//Fecha arquivo
fwrite($open,"</pages>");
fclose($open);
connect_db(); register_cronjob("update_links - conjuntos.xml atualizado"); connect_secondary_db();

//Caso esteja tudo OK
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
	
}
?>