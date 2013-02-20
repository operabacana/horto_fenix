<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
//Variáveis de retorno
$id=$_GET[id];

//Banco de dados
connect_secondary_db();
$sel_formas=mysql_query("SELECT * FROM formas_pagamento WHERE forma='$id'")or die(mysql_error()."<br />");
$result=mysql_fetch_array($sel_formas);

//Altera status
if($result[status] == 0) {
	mysql_query("UPDATE formas_pagamento SET status='1' WHERE forma='$id'")or die(mysql_error()."<br/ >");
	connect_db(); register_log("Forma de pagamento (".$result[forma].")".$result[nome]." ativado"); connect_secondary_db();
} else {
	//Verifica
	$sel=mysql_query("SELECT * FROM formas_pagamento WHERE status='1'")or die(mysql_error()."<br />");
	if(mysql_num_rows($sel) == 1) {header("location:../sistema/sistema.php?error=forma_padrao#passo3"); exit();}
	mysql_query("UPDATE formas_pagamento SET status='0' WHERE forma='$id'")or die(mysql_error()."<br/ >");
	connect_db(); register_log("Forma de pagamento (".$result[forma].")".$result[nome]." desativado"); connect_secondary_db();
}

header("location:../sistema/sistema.php?success=edit_config");
?>