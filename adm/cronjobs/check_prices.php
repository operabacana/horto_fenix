<?php
//Este arquivo serve para verificar os preços dos conjuntos

//Seleciona os conjuntos
$sel=mysql_query("SELECT * FROM produtos WHERE status!='2' AND (tipo='conjunto')")or die(mysql_error()."<br />");
$total=0;

//Faz a verificação
while($conjunto = mysql_fetch_array($sel)) {
	$id = $conjunto[codigo];
	$relacao=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$id'")or die(mysql_error()."<br />");
	//Busca produtos do conjunto
	while($rel = mysql_fetch_array($relacao)) {
		$prs=mysql_query("SELECT * FROM produtos WHERE codigo='$rel[produto]'")or die(mysql_error()."<br />");
		$pr=mysql_fetch_array($prs);
		//Busca valores
		if($pr["valor2"] == null || $pr["valor2"] == "0") {$valor=$pr["valor"];} else {$valor=$pr["valor2"];}
		$total=$total+$valor." / ";
	}
	//Descontos
	$total_descontado=$total*$conjunto[desconto_conjunto]/100;
	$total=$total-$total_descontado;
		
	//Insere valor principal
	mysql_query("UPDATE produtos SET valor='$total' WHERE codigo='$id'")or die(mysql_error()."<br />");
	connect_db(); register_cronjob("check_prices - preço do conjunto ".$id." alterado para ".$total);
	
	$total=0;
}


//Caso esteja tudo OK
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
}
?>