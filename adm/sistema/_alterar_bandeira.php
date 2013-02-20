<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
//Variáveis de retorno
$id=$_POST[id];

//Conexões
connect_secondary_db();
$sel=mysql_query("SELECT * FROM formas_pagamento WHERE forma='$id'") or die(mysql_error()."<br />");
$result=mysql_fetch_array($sel);

//Abre conexão FTP
$ftp_conexao=ftp_open("/".$global_dir."/images/bandeiras");

//Arquivo
$file = $_FILES["imagem"];

//Confere o tipo de arquivo
if($file["name"]) { if(!eregi("^image/(pjpeg|jpeg|png|gif|bmp)$", $file["type"])) {header("location:sistema.php?&error=invalid_image#passo3");	exit(); } }

//Cadastra imagem
if($file["name"]) {
	preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $file["name"], $ext);
	$a1 = $file['tmp_name'];
	$ext = $ext[1];
	$b1 = $result[slug].".".$ext;
	ftp_put($ftp_conexao,$b1,$a1,FTP_BINARY);
	mysql_query("UPDATE formas_pagamento SET bandeira='$b1' WHERE forma='$id'") or die(mysql_error()."<br />");			
}

ftp_close($ftp_conexao);

//Caso esteja tudo ok
connect_db(); register_log("Bandeira da forma de pagamento (".$result[forma].")".$result[nome]." alterada");
header("location:../sistema/sistema.php?success=edit_config");
exit();
?>