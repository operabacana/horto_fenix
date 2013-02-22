<?php include("../_includes/op_codex.php"); //Framework ?>
<?php connect_db(); ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>
<?php 

//Verifica permissões
if(!$gerenciar_sistema) {header("location:../acesso/not_authorized.php"); exit();}

//Variáveis de retorno
$cronjob=$_GET["cronjob"];

connect_secondary_db();
//Executa
$redirect="no";
include("../cronjobs/".$cronjob.".php");

//Caso esteja tudo OK
connect_db(); register_log("Execução do cronjob ".$cronjob);
$more="";
if(isset($result)) {$more="&result=".$result;}
header("location:./cronjobs.php?cronjob=".$cronjob."&success=action".$more);
exit();

?>