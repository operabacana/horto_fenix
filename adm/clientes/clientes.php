<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado

//Conecta ao bando de dados secundário
connect_secondary_db();

//Banco de dados
$sel = mysql_query("SELECT * FROM cadastros");
$count = mysql_num_rows($sel);

?>

<?php open_header(); ?>
<title>Lista de clientes <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="article">

    <a name="top"></a>

	<h2><span>Clientes</span> &gt;&gt; Lista de clientes</h2>

	<br />

    <?php if (isset($_GET["success"])) { if ($_GET["success"] == "delete_client") { ?>
    <?php echo "<p class='warning_success_part'>Cliente exclu&iacute;do com sucesso.</p><br />";  ?>
    <?php } } ?>

    <?php if ($count > 0) { ?>

    <div id="informations">

  	    <div class="box">
    	    <span>Clientes:</span><br />
            <?php echo $count; ?>
        </div>

    </div>

	<table class="one">

	    <tr>
    	    <td>

      	        <table cellpadding="0" cellspacing="0" border="0">

        	        <tr style="background: #999; font-weight: bold; color: #FFF;">
          	            <td style="color: #FFF;">Nome</td>
                        <td style="color: #FFF;">E-mail</td>
          	            <td style="color: #FFF;">Cidade</td>
          	            <td style="color: #FFF;">Estado</td>
          	            <td style="color: #FFF;">Telefone</td>
          	            <td style="color: #FFF;">Mensagem</td>
                        <td style="color: #FFF; width: 40px; text-align: center;">Editar</td>
                        <td style="color: #FFF; width: 40px; text-align: center;">Excluir</td>
        	        </tr>

                    <?php while ($cliente = mysql_fetch_array($sel)) { ?>

                    <tr class="hover">
                        <td><?php echo $cliente["nome"]; ?></td>
                        <td><?php echo $cliente["email"]; ?></td>
                        <td><?php echo $cliente["cidade"]; ?></td>
                        <td><?php echo $cliente["estado"]; ?></td>
                        <td><?php echo $cliente["telefone"]; ?></td>
                        <td><strong><a class="thickbox" href="./visualizar.php?cliente=<?php echo $cliente["id"]; ?>" title="Visualizar o comentário">[Visualizar]</a></strong></td>
                        <td style="text-align:center;"><strong><a href="./editar.php?cliente=<?php echo $cliente["id"]; ?>" title="Editar o cliente <?php echo $cliente["nome"]; ?>">[Editar]</a></strong></td>
                        <td style="text-align:center;"><a href="javascript:confirmation('_excluir.php?cliente=<?php echo $cliente["id"];?>','Voc&ecirc; realmente deseja excluir permanentemente o cliente <?php echo $cliente["nome"]; ?>?')" title="excluir o cliente <?php echo $cliente["nome"]; ?>"><strong>x</strong></a></td>
                    </tr>

                    <?php } ?>

                </table>

            </td>
        </tr>

    </table>

    <?php } else { ?>

    <p>N&atilde;o h&aacute; clientes cadastrados.</p>

    <?php } ?>

</div>

<?php get_footer(); ?>