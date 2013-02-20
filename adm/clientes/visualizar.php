<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado

connect_secondary_db();

if (isset($_GET["cliente"])) { $clientes = $_GET["cliente"]; }
else { $cliente = false; }

$sel_cliente = mysql_query("SELECT * FROM cadastros WHERE id = '$clientes'") or die(mysql_error()."<br />");
$cliente = mysql_fetch_array($sel_cliente);

?>

<title><?php if ($_GET["cliente"]) { ?>Visualizar Comentário<?php } else { ?>Visualizar Comentário<?php } ?> <?php echo $global_tittle; ?></title>

<div><p><strong>Cliente: </strong><?php echo utf8_encode($cliente["nome"]); ?></p></div>

<div style="width: 70px;"><p><strong>Coment&aacute;rio:</strong></p></div>

<div><p style="width: auto;"> <?php echo utf8_decode($cliente["mensagem"]); ?> </p></div> 