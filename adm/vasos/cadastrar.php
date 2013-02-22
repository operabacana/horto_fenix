<?php

include("../_includes/op_codex.php"); //Framework
session_verify("admin_logon","","acesso/"); //Verifica se está logado
connect_secondary_db();

if ($_GET["passo"] != "") { $passo = $_GET["passo"] + 1; } else { $passo = 1; }

if ($_GET["id"] != "") {

    $id = $_GET["id"];

    $sel = mysql_query("SELECT * FROM vasos WHERE id = '$id'");
    $result = mysql_fetch_array($sel);

}

?>

<script>

function excluirFoto() {

    jQuery(".trBlock").css("display", "none");
    jQuery(".trNone").css("display", "block");

}

</script>

<?php open_header(); ?>
<title>Vasos</title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="article">

    <a name="top"></a>

    <?php if ($passo == 1) { ?>

	<h2><span>Vasos </span> &gt;&gt; Cadastrar</h2>

	<br />

    <?php if (isset($_GET["error"])) { if ($_GET["error"] == "new") { ?>
    <?php echo "<p class='warning_part'>Por favor adicione o nome do vaso.</p>"; ?>
    <?php } } ?>

    <div id="passo1">

        <table id="tableFotos" class="two">

            <form action="_editar.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="passo" value="1" />

                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Nome:&nbsp;&nbsp;<input type="text" name="nome" style="width: 247px;" /></td></tr>
                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Tipo:&nbsp;&nbsp;

                <input type="radio" name="tipo" id="inorganico" value="Inorgânicos"/>&nbsp;&nbsp;<label for="inorganico">Inorgânico</label>
                <input type="radio" name="tipo" id="organico" value="Orgânicos"/>&nbsp;&nbsp;<label for="organico">Orgânico</label>


                </td></tr>

                <tr><td style="color: #999999; font-size: 14px; font-weight: bold;">Publicar: &nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="1" <?php if ($result["status"] == 1) { echo "checked='checked'"; } ?> />&nbsp;Sim</label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="0" <?php if ($result["status"] == 0) { echo "checked='checked'"; } ?> />&nbsp;Não</label></td></tr>

                <tr><td><input style="float: left;" type="submit" class="submit" value="Cadastrar" /></td></tr>

            </form>

        </table>

    </div>

    <?php } elseif ($passo == 2) { ?>

    <h2><span>Vasos </span> &gt;&gt; Editar</h2>

	<br />

    <?php if (isset($_GET["error"])) { if ($_GET["error"] == "new") { ?>
    <?php echo "<p class='warning_part'>Por favor coloque o nome do vaso.</p>"; ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if ($_GET["success"] == "new") { ?>
    <?php echo "<p class='warning_success_part'>Cadastro realizada com sucesso!</p>"; ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if ($_GET["success"] == "update") { ?>
    <?php echo "<p class='warning_success_part'>Alteração realizada com sucesso!</p>"; ?>
    <?php } } ?>
    <?php if (isset($_GET["success"])) { if ($_GET["success"] == "delete") { ?>
    <?php echo "<p class='warning_success_part'>Deleção realizada com sucesso!</p>"; ?>
    <?php } } ?>

    <div id="passo2" style="background: #eeeeee; float: left; width: 100%;">

        <table id="tableFotos" class="two">

            <form action="_editar.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="passo" value="2" />
                <input type="hidden" name="idResult" value="<?php echo $result["id"]; ?>" />

                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Nome:&nbsp;&nbsp;<input type="text" name="nome" style="width: 247px;" value="<?php echo $result["nome"]; ?>" /></td></tr>
                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Tipo:&nbsp;&nbsp;

                <input type="radio" name="tipo" id="inorganico" value="Inorgânicos" <?php if($result["tipo"] == "Inorgânicos"){ echo "checked='checked'"; } ?>/>&nbsp;&nbsp;<label for="inorganico">Inorgânico</label>
                <input type="radio" name="tipo" id="organico" value="Orgânicos" <?php if($result["tipo"] == "Orgânicos"){ echo "checked='checked'"; } ?>/>&nbsp;&nbsp;<label for="organico">Orgânico</label>

                </td></tr>

                <tr><td style="color: #999999; font-size: 14px; font-weight: bold;">Publicar: &nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="1" <?php if ($result["status"] == 1) { echo "checked='checked'"; } ?> />&nbsp;Sim</label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="0" <?php if ($result["status"] == 0) { echo "checked='checked'"; } ?> />&nbsp;Não</label></td></tr>

                <tr><td><input style="float: left;" type="submit" class="submit" value="Editar" /></td></tr>

            </form>

        </table>

    </div>

    <?php } ?>

</div>

<?php get_footer(); ?>