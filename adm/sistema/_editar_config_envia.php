<?php include("../_includes/op_codex.php"); //Framework ?>
<?php  
////////////////////Banco de dados

////////////////////Variáveis de retorno
$id=$_POST[id];
$description=htmlentities($_POST[description]);
$value=$_POST[value];
$tipo=$_POST[tipo];

//Verifica se não há nenhuma variável em branco
if($description == null) {header("location:./_editar_perfil.php?error=blank_description"); exit();}
if($value == null) {header("location:./_editar_perfil.php?error=blank_value"); exit();}

//Cadastra valores
mysql_query("UPDATE system SET description='$description',value='$value' WHERE id='$id'") or die(mysql_error()."<br />");

//Busca informações
$select=mysql_query("SELECT * FROM system WHERE id='$id'");
$config=mysql_fetch_array($select);
$config=$config[config];

//Caso esteja tudo OK
register_log("Alteração da configuração: ".$config." valor: ".$value);
header("location:./sistema.php?success=edit_config&tipo=".$tipo);
?>