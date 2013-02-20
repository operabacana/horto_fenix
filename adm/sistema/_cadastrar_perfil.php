<?php include("../_includes/op_codex.php"); //Framework ?>
<?php

////////////////////Banco de dados
$sel_permissions=mysql_query("SELECT DISTINCT permission FROM permissions") or die(mysql_error()."<br />");

////////////////////Variáveis de retorno
$nome=htmlentities($_POST[nome]);

//Verifica se não há nenhuma variável em branco
if($nome == null) {header("location:./perfis.php?error=blank_name"); exit();}
$sel_profiles=mysql_query("SELECT * FROM profiles WHERE name='$nome'") or die(mysql_error()."<br />");
$count=mysql_num_rows($sel_profiles);
if($count > 0) {header("location:./perfis.php?error=exist_name"); exit();}

//Cadastra valores

mysql_query("INSERT INTO profiles (name) VALUES ('$nome')") or die(mysql_error()."<br />");
$lastid=mysql_insert_id();
mysql_query("UPDATE profiles SET permission=$lastid WHERE name='$nome'") or die(mysql_error()."<br />");

while($permission = mysql_fetch_array($sel_permissions)) {
	if($_POST["permission_".$permission[permission]]) {
		mysql_query("INSERT INTO permissions (permission,id) VALUES ('$permission[permission]','$lastid')") or die(mysql_error()."<br />");
	}
}


//Caso esteja tudo OK
connect_db(); register_log("Cadastro do perfíl (".$lastid.")".$nome);
header("location: ./perfis.php?success=new_profile&profile=$nome");
?>