<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  
////////////////////Banco de dados
$sel_permissions=mysql_query("SELECT DISTINCT permission FROM permissions") or die(mysql_error()."<br />"); ?>
<?php 
////////////////////Variáveis de retorno
$nome=htmlentities($_POST[nome]);
$profile=$_POST[profile];

//Verifica se não há nenhuma variável em branco
if($nome == null) {header("location:./_editar_perfil.php?error=blank_name"); exit();}

//Cadastra valores
mysql_query("UPDATE profiles SET name='$nome' WHERE id='$profile'") or die(mysql_error()."<br />");
mysql_query("DELETE FROM permissions WHERE id='$profile'") or die(mysql_error()."<br />");

while($permission = mysql_fetch_array($sel_permissions)) {
	if($_POST["permission_".$permission[permission]]) {
		mysql_query("INSERT INTO permissions (permission,id) VALUES ('$permission[permission]','$profile')") or die(mysql_error()."<br />");
	}
}



//Caso esteja tudo OK
header("location:./perfis.php?success=edit_profile");
?>





