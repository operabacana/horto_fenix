<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  connect_secondary_db();  ?>
<?php
//Conta qual o número do arquivo
$select=mysql_query("SELECT * FROM banners") or die(mysql_error()."<br />");
$local = $_POST["local"];

//Caso seja IMAGEM
if($_POST["tipo_arquivo2"] == "imagem") {
	//Variaveis de retorno
	$nome = $_POST["nome"];
	$arquivo = $_FILES["arquivo_imagem"];
	if(isset($_POST["link_imagem"])) {
		$link = $_POST["link_imagem"];
		$link = str_replace("http://","",$link);
	} else {header("location:banners.php?error=blank_link2#passo2");}
	if(isset($_FILES["arquivo_imagem_fundo"])) {$imagem_fundo = $_FILES["arquivo_imagem_fundo"];}
	if($_POST["alternativo"] != null) {$alternativo=$_POST["alternativo"];} else {$alternativo=$_POST["alternativo2"];}
	if($_FILES["arquivo_imagem"][nome] == null) {header("location:banners.php?error=blank_image2#passo2");}
	
	//Verifica os campos
	if($nome == null) {header("location:banners.php?error=blank_name1#passo1");	exit();}
	if($arquivo[name] == null) {header("location:banners.php?error=blank_image1#passo1"); exit();}
	if($link == null) {header("location:banners.php?error=blank_link1#passo1"); exit();}
	
	//Verifica o tipo de arquivo
	if($arquivo["name"]) { if(!eregi("^image/(pjpeg|jpeg|png|gif|bmp)$", $arquivo["type"])) {header("location:banners.php?error=invalid_image2#passo2");	exit(); } }
	if($imagem_fundo["name"]) { if(!eregi("^image/(pjpeg|jpeg|png|gif|bmp)$", $imagem_fundo["type"])) {header("location:banners.php?error=invalid_image2#passo2");	exit(); } } 

	mysql_query("INSERT INTO banners (data,nome,tipo,link,local,alternativo) VALUES ('$now_time','$nome','imagem','$link','$local','$alternativo')") or die(mysql_error()."<br />");
	$count=mysql_insert_id();
	
	//Abre FTP
	ftp_open($global_dir."/produtos/publicidade");
	
	//Cadastra as imagens
	preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
	$a = $arquivo['tmp_name'];
	$ext = $ext[1];
	$b1 = "banner".$count.".".$ext;
	ftp_copy($b1,$a);
	
	preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem_fundo["name"], $ext);
	$a = $imagem_fundo['tmp_name'];
	$ext = $ext[1];
	$b2 = "banner".$count."_fundo.".$ext;
	ftp_copy($b2,$a);

	mysql_query("UPDATE banners SET arquivo='$b1',fundo='$b2' WHERE id='$count'");

	//Caso esteja tudo OK
	connect_db(); register_log("Cadastro do banner (".$count.")".$nome);
	header("location:./banners.php?banner=".$nome."&success=imagem2#passo2");
	exit();


//Caso seja FLASH
} elseif($_POST["tipo_arquivo2"] == "flash") {
	//Variaveis de retorno
	$nome = $_POST["nome"];
	if(isset($_FILES["arquivo_flash"])) {$arquivo = $_FILES["arquivo_flash"];} else {header("location:banners.php?error=blank_flash2#passo2");}
	if($_POST["alternativo"] != null) {$alternativo=$_POST["alternativo"];} else {$alternativo=$_POST["alternativo2"];}
	
	//Verifica os campos
	if($nome == null) {header("location:banners.php?error=blank_name1#passo1");	exit();}
	if($arquivo[name] == null) {header("location:banners.php?error=blank_flash1#passo1"); exit();}

	
	//Verifica o tipo de arquivo
	if($arquivo["name"]) { if(!eregi("^application/(x-shockwave-flash)$", $arquivo["type"])) {header("location:banners.php?error=invalid_flash2#passo2");	exit(); } }
	
	//Verifica o tamanho do arquivo
	$size=filesize($arquivo["tmp_name"])/1024; if($size >= 1500) {header("location:".$previous_page."&error=big_flash2#passo2");	exit();}
	
	
	mysql_query("INSERT INTO banners (data,nome,tipo,link,local,alternativo) VALUES ('$now_time','$nome','flash','$link','$local','$alternativo')") or die(mysql_error()."<br />");
	$count=mysql_insert_id();
	
	//Abre FTP
	ftp_open($global_dir."/produtos/publicidade");
	
	//Insere o arquivo
	$a = $arquivo['tmp_name'];
	$ext = "swf";
	$b1 = "banner".$count.".".$ext;
	ftp_copy($b1,$a);
	
	mysql_query("UPDATE banners SET arquivo='$b1',fundo='' WHERE id='$count'");
	
	//Caso esteja tudo OK
	connect_db(); register_log("Cadastro do banner (".$count.")".$nome);
	header("location:./banners.php?banner=".$nome."&success=flash2#passo2");
	exit();
	
} else {
	header("location:./banners.php?banner=".$nome."&error=not_selected2#passo2");
}
?>