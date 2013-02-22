<?php include("../_includes/op_codex.php"); //Framework ?>
<?php include("../_includes/permissions.php"); //Permissões dos usuários ?>
<?php 
//Verifica permissões
if(!$gerenciar_embalagens) {header("location:../acesso/not_authorized.php"); exit();}
?>
<?php open_header(); ?>
<title>Cronjobs <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Cronjobs</span> &gt;&gt; Gerenciar cronjobs</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Cronjobs s&atilde;o a&ccedil;&otilde;es automatizadas que o sistema realiza em determinados locais e hor&aacute;rios. Caso os usu&aacute;rios estejam enfrentando algum problema no sistema, execute os cronjobs relacionados para verificar que o sistema esteja atualizado.</p><br />
  
  <table class="one">
  	<?php if(isset($_GET["success"])) {if($_GET["success"]=="action") {?>
  	<?php echo "<tr><td colspan=\"4\"><p class=\"warning_success_part\">o cronjob ".$_GET[cronjob]." foi executado com sucesso! \n</p></td></tr>";  ?></td>
 	 	<?php } } ?>
    <?php if(isset($_GET["result"])) { ?>
  	<?php echo "<tr><td colspan=\"4\"><p class=\"warning_part\">".$_GET[result]." \n</p></td></tr>";  ?></td>
 	 	<?php } ?>
  	<tr>
    	<td>
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
            <td style="color:#FFF;">Cronjob</td>
            <td style="color:#FFF;">Descri&ccedil;&atilde;o</td>
            <td style="color:#FFF; width:40px; text-align:center;">Executar</td>
        	</tr>
          <tr class="hover">
          	<td>Update links</td>
            <td>Atualiza os arquivos de listagem de produtos, conjuntos e opcionais</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=update_links" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>
          <tr class="hover">
          	<td>Update sitemap</td>
            <td>Atualiza o arquivo de listagem de diret&oacute;rios e arquivos</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=update_sitemap" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>
          <tr class="hover">
          	<td>Update feeds</td>
            <td>Atualiza o arquivo de feeds RSS/XML</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=update_feeds" title="Executar este cronjob">[executar]</a></strong></td>
          </tr> 
          <tr class="hover">
          	<td>Check products</td>
            <td>Verifica a estocagem dos produtos e despublica os produtos com estoque zerado, com problemas na exibi&ccedil;&atilde;o ou conflitos</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=check_products" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>
          <tr class="hover">
          	<td>Optimize tables</td>
            <td>Otimiza as tabelas do SQL limpando registros em branco e melhorando o desempenho</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=optimize_tables" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>
          <?php 
						connect_secondary_db();
						$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_conjunto'")or die(mysql_error()."<br />");
						$modulo_conjunto = mysql_result($sel_config,0); 
						connect_db(); 
					?>
          <?php if($modulo_conjunto == "ativado"): ?>
          <tr class="hover">
          	<td>Check prices</td>
            <td>Verifica os pre&ccedil;os dos conjuntos em rela&ccedil;&atilde;o aos produtos que lhe fazem parte</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=check_prices" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>
          <?php endif ?>
          <tr class="hover">
          	<td>Check mails</td>
            <td>Verifica se h&aacute; emails duplicados ou mal-formatados na newsletter e nos clientes cadastrados.</td>
            <td style="text-align:center;"><strong><a href="_executa.php?cronjob=check_mails" title="Executar este cronjob">[executar]</a></strong></td>
          </tr>     
        </table> 
      </td>
    </tr>
  </table>
</div>

<?php get_footer();?>