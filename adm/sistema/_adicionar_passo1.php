<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
//Variáveis de retorno
$nome=$_POST["nome"];
$email=$_POST["email"];
$empresa=$_POST["empresa"];
$login=$_POST["login"];
$senha=$_POST["senha"];
$senha2=$_POST["senha2"];
$perfil=$_POST["perfil"];
$status=$_POST["status"];

//Confere se está editando o usuário
if($_POST["user"]) {
	
	//Variável de retorno
	$user=$_POST["user"];
	
	//Verifica se não há nenhuma variável em branco
	if($nome == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_name"); exit();}
	if($email == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_email"); exit();}
	if($empresa == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_empresa"); exit();}
	if($login == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_login"); exit();}
	if($senha == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_pass"); exit();}
	if($senha2 == null) {header("location:./adicionar_usuario.php?user=$user&error=blank_pass2"); exit();}
	
	//Verifica o tamanho do password
	$tamanho=strlen($senha);
	if($tamanho < 6) {header("location:./adicionar_usuario.php?user=$user&error=invalid_pass"); exit();}
	
	//Verifica se os dois passwords combinam
	if($senha != $senha2) {header("location:./adicionar_usuario.php?user=$user&error=invalid_combination"); exit();}
	
	//Caso esteja tudo ok
	mysql_query("UPDATE users SET name='$nome', mail='$email', company='$empresa', pass='$senha', profile='$perfil', status='$status' WHERE id='$user'") or die(mysql_error()."<br />");
	register_log("Alteração do usuário (".$user.")".$nome);
	header("location:adicionar_usuario.php?user=".$user."&success=edit_user");
	exit();

}

//Verifica se não há nenhuma variável em branco
if($nome == null) {header("location:./adicionar_usuario.php?error=blank_name"); exit();}
if($email == null) {header("location:./adicionar_usuario.php?error=blank_email"); exit();}
if($empresa == null) {header("location:./adicionar_usuario.php?error=blank_empresa"); exit();}
if($login == null) {header("location:./adicionar_usuario.php?error=blank_login"); exit();}
if($senha == null) {header("location:./adicionar_usuario.php?error=blank_pass"); exit();}
if($senha2 == null) {header("location:./adicionar_usuario.php?error=blank_pass2"); exit();}

//Verifica o tamanho do password
$tamanho=strlen($senha);
if($tamanho < 6) {header("location:./adicionar_usuario.php?error=invalid_pass"); exit();}

//Verifica se os dois passwords combinam
if($senha != $senha2) {header("location:./adicionar_usuario.php?error=invalid_combination"); exit();}

//Verifica se o login escolhido não existe
$sel=mysql_query("SELECT * FROM users WHERE login='$login'")or die(mysql_error()."<br />");
if(mysql_num_rows($sel) > 0) {header("location:./adicionar_usuario.php?error=exist_login"); exit();}

//Caso esteja tudo ok
mysql_query("INSERT INTO users (name,mail,company,login,pass,profile,status,register_date) VALUES ('$nome','$email','$empresa','$login','$senha','$perfil','$status','$now_time')") or die(mysql_error()."<br />");
$id=mysql_insert_id();
register_log("Cadastro do usuário (".$id.")".$nome);
header("location:../user/perfil.php?user=".$id."&success=new_user");
?>