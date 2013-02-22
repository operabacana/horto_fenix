<?php

include("../_includes/op_codex.php"); //Framework

session_verify("admin_logon","","acesso/"); //Verifica se está logado

connect_secondary_db();

if (isset($_GET["cliente"])) { $clientes = $_GET["cliente"]; }
else { $cliente = false; }

$sel_cliente = mysql_query("SELECT * FROM cadastros WHERE id = '$clientes'") or die(mysql_error()."<br />");
$cliente = mysql_fetch_array($sel_cliente);

?>

<?php open_header(); ?>
<title><?php if($_GET["cliente"]) {?>Editar cliente<?php } else { ?>Cadastrar  cliente<?php } ?> <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="article">

    <a name="top"></a>

	<h2><span>Clientes</span> &gt;&gt; <?php if ($_GET['cliente']) { ?>Editar cliente<?php } else { ?>Cadastrar  cliente<?php } ?></h2>

	<br />

	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Antes de qualquer passo, escolha o tipo de cliente que deseja alterar ou cadastrar. Logo ap&oacute;s, cadastre todas as informa&ccedil;&otilde;es necess&aacute;rias. </p><br />

    <?php if (isset($_GET["success"])) { if($_GET["success"] == "update_user") { ?>
    <?php echo "<p class='warning_success_part'>Cliente alterado com sucesso!</p>";  ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if($_GET["success"] == "edit_address") { ?>
    <?php echo "<p class='warning_success_part'>Endere&ccedil;o alterado com sucesso!</p>";  ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if($_GET["success"] == "delete_address") { ?>
    <?php echo "<p class='warning_success_part'>Endere&ccedil;o selecionado exclu&iacute;do do sistema com sucesso.</p>";  ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if($_GET["success"] == "block") { ?>
    <?php echo "<p class='warning_success_part'>Cliente bloqueado.</p>";  ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if($_GET["success"] == "unblock") { ?>
    <?php echo "<p class='warning_success_part'>Cliente desbloqueado.</p>";  ?>
    <?php } } ?>
    <?php if (isset($_GET["error"])) { if($_GET["error"] == "blank_information") { ?>
    <?php echo "<p class='warning_part'>Por favor, n&atilde;o deixe nenhum campo necess&aacute;rio em branco.</p>";  ?>
    <?php } } ?>

    <div id="form_juridico">

        <form action="_editar.php" method="POST" >

            <?php if (isset($_GET["cliente"])) { ?><input type="hidden" value="<?php echo $_GET["cliente"]; ?>" name="cliente"><? } ?>

            <table class="two" >

                <tr><td class="info"><p style="float: left; margin-right: 5px;">Nome:</p><input type="text" value="<?php if (isset($_GET["cliente"])) { echo $cliente["nome"]; } ?>" name="nome" class="text" style="width: 200px;"/></td></tr>
                <tr><td class="info"><p style="float: left; margin-right: 5px;">E-mail:</p><input type="text" value="<?php if (isset($_GET["cliente"])) { echo $cliente["email"]; } ?>" name="email" class="text" style="width: 200px;"/></td></tr>
                <tr><td class="info"><p style="float: left; margin-right: 5px;">Cidade:</p><input type="text" value="<?php if (isset($_GET["cliente"])) { echo $cliente["cidade"]; } ?>" name="cidade" class="text" style="width: 200px;"/></td></tr>
                <tr><td class="info"><p style="float: left; margin-right: 5px;">Estado:</p><input type="text" value="<?php if (isset($_GET["cliente"])) { echo $cliente["estado"]; } ?>" name="estado" class="text" style="width: 200px;"/></td></tr>
                <tr><td class="info"><p style="float: left; margin-right: 5px;">Telefone:</p><input type="text" value="<?php if (isset($_GET["cliente"])) { echo $cliente["telefone"]; } ?>" name="telefone" class="text" style="width: 200px;"/></td></tr>
                <tr><td class="info"><p style="float: left; margin-right: 5px;">Mensagem:</p><textarea name="mensagem" style="width: 400px;"><?php if (isset($_GET["cliente"])) { echo $cliente["mensagem"]; } ?></textarea></td></tr>
                <tr><td class="info"><input style="float: left;" type="submit" class="submit" value="Editar Cliente" /></td></tr>

            </table>

        </form>

    </div>

</div>

<?php get_footer(); ?>