<?php

include("../_includes/op_codex.php"); //Framework
session_verify("admin_logon","","acesso/"); //Verifica se está logado

//Conecta ao bando de dados secundário
connect_secondary_db();

$sel = mysql_query("SELECT * FROM plantas");
$num = mysql_num_rows($sel);

?>

<?php open_header(); ?>
<title>Listar Plantas <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="article">

    <a name="top"></a>

	<h2><span>Plantas</span> &gt;&gt; Lista</h2>

	<br />

    <?php if (isset($_GET["success"])) { if ($_GET["success"] == "delete") { ?>
    <?php echo "<p class='warning_success_part'>Deleção realizada com sucesso.</p><br />";  ?>
    <?php } } ?>

    <?php if ($num > 0) { ?>

	<table class="one">

	    <tr>
    	    <td>

      	        <table cellpadding="0" cellspacing="0" border="0">

        	        <tr style="background: #999; font-weight: bold; color: #FFF;">
          	            <td style="color: #FFF;">Nome</td>
                        <td style="color: #FFF; width: 80px; text-align: center;">Publicado</td>
                        <td style="color: #FFF; width: 60px; text-align: center;">Editar</td>
                        <td style="color: #FFF; width: 60px; text-align: center;">Excluir</td>
        	        </tr>

                    <?php while ($result = mysql_fetch_array($sel)) { ?>

                    <tr class="hover">
                        <td><?php echo $result["nome"]; ?></td>
                        <td style="text-align:center;"><?php if ($result["status"] == 1) { echo "<span style='color: green;'>Sim</span>"; } else { echo "<span style='color: red;'>Não</span>"; } ?></td>
                        <td style="text-align:center;"><strong><a href="./cadastrar.php?id=<?php echo $result["id"]; ?>&passo=1" title="Editar a planta <?php echo $result["nome"]; ?>">[Editar]</a></strong></td>
                        <td style="text-align:center;"><a href="javascript:confirmation('_excluir.php?id=<?php echo $result["id"];?>','Voc&ecirc; realmente deseja excluir permanentemente a planta <?php echo $result["nome"]; ?>?')" title="excluir a planta <?php echo $result["nome"]; ?>"><strong>x</strong></a></td>
                    </tr>

                    <?php } ?>

                </table>

            </td>
        </tr>

    </table>

    <?php } else { ?>

    <p>Não há cadastros</p>

    <?php } ?>

</div>

<?php get_footer(); ?>