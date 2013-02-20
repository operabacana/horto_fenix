<?php 
session_verify("admin_logon","","acesso/"); //Verifica se está logado
connect_db(); //Seleciona BD diferente do padrão
$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
$profile=$user["profile"];
//Confere se não está bloqueado
//if($user[status] == 0) {header("location: ../acesso/logon.php"); exit();}
$sel_permissions=mysql_query("SELECT * FROM permissions WHERE id=$profile") or die(mysql_error()); //Banco de dados
while ($permission=mysql_fetch_array($sel_permissions)) {
	$$permission[permission] = $permission[permission];
}

$configs=mysql_query("SELECT * FROM system") or die(mysql_error); //Banco de dados
while($sys=mysql_fetch_array($configs)) {
	$$sys[config] = $sys[value];
}
?>
