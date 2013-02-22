<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  connect_secondary_db();  ?>
<?php
//Variaveis de retorno
$banner = $_GET["banner"];
$select=mysql_query("SELECT * FROM banners WHERE id='$banner'") or die(mysql_error()."<br />");
$result=mysql_fetch_array($select);

if($result[status] == 1) {
	mysql_query("UPDATE banners SET status='0',data='' WHERE id='$banner'") or die(mysql_error()."<br />");
	connect_db(); register_log("Banner ".$banner." desativado");
} else {
	mysql_query("UPDATE banners SET status='1',data='$now_time' WHERE id='$banner'") or die(mysql_error()."<br />");
	connect_db(); register_log("Banner ".$banner." ativado");
}

//Caso esteja tudo OK
header("location:./banners.php?banner=".$nome."&success=status1#passo1");
exit();
?>