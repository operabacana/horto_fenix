<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  
////////////////////Banco de dados

////////////////////Variáveis de retorno
connect_secondary_db();
$mc=$_POST[modulo_conjunto];
$mo=$_POST[modulo_opcional];
$ma=$_POST[modulo_atacado];
if(isset($_POST[tipo_visualizacao])) {$tv=$_POST[tipo_visualizacao];}
$tipo=$_POST[tipo];
$eo=$_POST[exibir_opcionais]; 

$sel=mysql_query("SELECT * FROM sistema")or die(mysql_error()."<br/ >");
while($result = mysql_fetch_array($sel)) {
	$$result["configuracao"] = $result["valor"];
}

//Cadastra valores
if($_GET[form] != "2"){
	mysql_query("UPDATE sistema SET valor='$mc' WHERE configuracao='modulo_conjunto'") or die(mysql_error()."<br />");
	if($modulo_conjunto == "ativado" && $mc == "desativado") {connect_db(); register_log("Módulo de conjunto desativado"); connect_secondary_db();}
	if($modulo_conjunto == "desativado" && $mc == "ativado") {connect_db(); register_log("Módulo de conjunto ativado"); connect_secondary_db();}
	
	mysql_query("UPDATE sistema SET valor='$mo' WHERE configuracao='modulo_opcional'") or die(mysql_error()."<br />");
	if($modulo_opcional == "ativado" && $mo == "desativado") {connect_db(); register_log("Módulo de opcional desativado"); connect_secondary_db();}
	if($modulo_opcional == "desativado" && $mo == "ativado") {connect_db(); register_log("Módulo de opcional ativado"); connect_secondary_db();}

	if(isset($_POST[tipo_visualizacao])) {
		mysql_query("UPDATE sistema SET valor='$tv' WHERE configuracao='tipo_de_visualizacao'") or die(mysql_error()."<br />");
		if($tipo_de_visualizacao == "produtos" && $tv == "conjuntos") {connect_db(); register_log("Tipo de visualização alterado para conjuntos"); connect_secondary_db();}
		if($tipo_de_visualizacao == "produtos" && $tv == "conjuntos+produtos") {connect_db(); register_log("Tipo de visualização alterado para conjuntos+produtos"); connect_secondary_db();}
		if($tipo_de_visualizacao == "conjuntos" && $tv == "produtos") {connect_db(); register_log("Tipo de visualização alterado para produtos"); connect_secondary_db();}
		if($tipo_de_visualizacao == "conjuntos" && $tv == "conjuntos+produtos") {connect_db(); register_log("Tipo de visualização alterado para conjuntos+produtos"); connect_secondary_db();}
		if($tipo_de_visualizacao == "conjuntos+produtos" && $tv == "conjuntos") {connect_db(); register_log("Tipo de visualização alterado para conjuntos"); connect_secondary_db();}
		if($tipo_de_visualizacao == "conjuntos+produtos" && $tv == "produtos") {connect_db(); register_log("Tipo de visualização alterado para produtos"); connect_secondary_db();}
	}

	mysql_query("UPDATE sistema SET valor='$eo' WHERE configuracao='exibir_opcionais'") or die(mysql_error()."<br />");
	if($exibir_opcionais == "ativado" && $eo == "desativado") {connect_db(); register_log("Exibição de opcionais desativado"); connect_secondary_db();}
	if($exibir_opcionais == "desativado" && $eo == "ativado") {connect_db(); register_log("Exibição de opcionais ativado"); connect_secondary_db();}

} else {
	mysql_query("UPDATE sistema SET valor='$ma' WHERE configuracao='modulo_atacado'") or die(mysql_error()."<br />");
	if($modulo_atacado == "ativado" && $ma == "desativado") {connect_db(); register_log("Módulo de atacado desativado"); connect_secondary_db();}
	if($modulo_atacado == "desativado" && $ma == "ativado") {connect_db(); register_log("Módulo de atacado ativado"); connect_secondary_db();}

}

//Caso esteja tudo OK
header("location:./sistema.php?success=edit_config&tipo=".$tipo);
?>