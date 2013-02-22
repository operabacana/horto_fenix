<?php

include("../_includes/op_codex.php"); //Framework
session_verify("admin_logon","","acesso/"); //Verifica se está logado
connect_secondary_db();

if ($_GET["passo"] != "") { $passo = $_GET["passo"] + 1; } else { $passo = 1; }

if ($_GET["id"] != "") {

    $id = $_GET["id"];

    $sel = mysql_query("SELECT * FROM plantas WHERE id = '$id'");
    $result = mysql_fetch_array($sel);
    $sel_tipo_planta = mysql_query("SELECT * FROM plantas_tipo_plantas WHERE id_plantas='$result[id]'")or die(mysql_error());
     while($tipo_planta = mysql_fetch_assoc($sel_tipo_planta)){

        $array_tipo[] = $tipo_planta["id_tipo"];

     }

}

$sel_tipo_plantas = mysql_query("SELECT * FROM tipo_plantas")or die(mysql_error);

?>

<script>

function excluirFoto() {

    jQuery(".trBlock").css("display", "none");
    jQuery(".trNone").css("display", "block");

}

</script>

<?php open_header(); ?>
<title>Plantas</title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="article">

    <a name="top"></a>

    <?php if ($passo == 1) { ?>

	<h2><span>Plantas </span> &gt;&gt; Cadastrar</h2>

	<br />

    <?php if (isset($_GET["error"])) { if ($_GET["error"] == "new") { ?>
    <?php echo "<p class='warning_part'>Por favor adicione o nome da planta.</p>"; ?>
    <?php } } ?>
    <?php if (isset($_GET["error"])) { if ($_GET["error"] == "new_foto") { ?>
    <?php echo "<p class='warning_part'>Por favor adicione uma foto.</p>"; ?>
    <?php } } ?>

    <div id="passo1">

        <table id="tableFotos" class="two">

            <form action="_editar.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="passo" value="1" />

                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Nome:&nbsp;&nbsp;<input type="text" name="nome" style="width: 247px;" /></td></tr>
                <tr><td style="vertical-align: top; color: #999999; font-size: 14px; font-weight: bold;">Tipo:&nbsp;&nbsp;

                    <?php while($tipo_plantas = mysql_fetch_assoc($sel_tipo_plantas) ){ ?>

                    <input type="checkbox" name="tipo[]" id="<?php echo $tipo_plantas["id"]; ?>" value="<?php echo $tipo_plantas["id"]; ?>"/>&nbsp;&nbsp;<label for="<?php echo $tipo_plantas["id"]; ?>"><?php echo $tipo_plantas["nome"]; ?></label>

                    <?php } ?>

                </td></tr>

                <tr><td style="color: #999999; font-size: 14px; font-weight: bold;">Publicar: &nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="1" <?php if ($result["status"] == 1) { echo "checked='checked'"; } ?> />&nbsp;Sim</label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="0" <?php if ($result["status"] == 0) { echo "checked='checked'"; } ?> />&nbsp;Não</label></td></tr>

                <tr><td><input style="float: left;" type="submit" class="submit" value="Cadastrar" /></td></tr>

            </form>

        </table>

    </div>

    <?php } elseif ($passo == 2) { ?>

    <h2><span>Plantas </span> &gt;&gt; Editar</h2>

	<br />

    <?php if (isset($_GET["error"])) { if ($_GET["error"] == "new") { ?>
    <?php echo "<p class='warning_part'>Por favor coloque o nome da planta.</p>"; ?>
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

                    <?php while($tipo_plantas = mysql_fetch_assoc($sel_tipo_plantas) ){ ?>

                           <?php if(in_array($tipo_plantas["id"], $array_tipo)){ $checked = "checked='checked'"; }else{ $checked = ""; }; ?>

                    <input type="checkbox" name="tipo[]" id="<?php echo $tipo_plantas["id"]; ?>" value="<?php echo $tipo_plantas["id"]; ?>" <?php echo $checked; ?>/>&nbsp;&nbsp;<label for="<?php echo $tipo_plantas["id"]; ?>"><?php echo $tipo_plantas["nome"]; ?></label>

                    <?php } ?>

                </td></tr>

                <tr><td style="color: #999999; font-size: 14px; font-weight: bold;">Publicar: &nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="1" <?php if ($result["status"] == 1) { echo "checked='checked'"; } ?> />&nbsp;Sim</label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="status" value="0" <?php if ($result["status"] == 0) { echo "checked='checked'"; } ?> />&nbsp;Não</label></td></tr>

                <tr><td><input style="float: left;" type="submit" class="submit" value="Editar" /></td></tr>

            </form>

        </table>

    </div>

    <?php } ?>

</div>

<?php get_footer(); ?>