<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
session_verify("admin_logon","","acesso/"); //Verifica se está logado 

?>
<?php open_header(); ?>
<title>Logs de acessos <?php echo $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="article">
	<a name="top"></a>
	<h2><span>Logs</span> &gt;&gt; Logs de acessos, visitas e modifica&ccedil;&otilde;es</h2>
	<br />
	<p class="warning_instructions"><strong>Instru&ccedil;&otilde;es:</strong> Nesta p&aacute;gina voc&ecirc; poder&aacute; visualizar todas as atividades que aconteceram no sistema de administra&ccedil;&atilde;o. As atividades s&atilde;o gravadas em arquivos separados por usu&aacute;rio e s&atilde;o configurados de uma forma que o sistema possa separar as informa&ccedil;&otilde;es necess&aacute;rias. Voc&ecirc; tamb&eacute;m poder&aacute; baixar o arquivo de log.</p><br />
  
  <table class="one">
  	<?php if(isset($_GET["success"])) {if($_GET["success"]=="action") {?>
  	<?php echo "<tr><td colspan=\"4\"><p class=\"warning_success_part\">o cronjob ".$_GET[cronjob]." foi executado com sucesso! \n</p></td></tr>";  ?></td>
 	 	<?php } } ?>
    <tr>
    	<td class="title" colspan="4">&Uacute;ltimas intera&ccedil;&otilde;es de usu&aacute;rios</td>
    </tr>
  	<tr>
    	<td>
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF;">Usu&aacute;rio</td>
            <td style="color:#FFF; width:120px;">Data / Hora</td>
            <td style="color:#FFF;">Ip</td>
            <td style="color:#FFF;">A&ccedil;&atilde;o</td>
        	</tr>
          <?php
						$logfile = "../_logs/logs.log";
						$open = fopen($logfile,"a+");
						if(!filesize($logfile) == 0) {
							$content = array_reverse(explode("\n",fread($open, filesize($logfile))));
							for($i=0; $i<20; $i++) {
								$piece=replace_latin_chars(str_replace("]","",explode("[",$content[$i])),false);
								if($piece[0] != null) {
					?>
          <tr class="hover">
	          <td><?php echo str_replace("user:","",$piece[1]); ?></td>
          	<td><?php echo $piece[0]; ?></td>
            <td><?php echo str_replace("ip:","",$piece[2]); ?></td>
            <td><?php echo str_replace("action:","",$piece[3]); ?></td>
          </tr>
          <?php
						} } }
					?>
        </table> 
      </td>
    </tr>
    <tr>
    	<td colspan="4" style="text-align:right;"><form><input type="button" class="submit" style="font-size:11px;" value="Baixar logs.log" onclick="javascript:window.open('<?php echo $logfile; ?>');" /></form></td>
    </tr>
   </table>
   <table class="two">
    <tr>
    	<td class="title" colspan="4">&Uacute;ltimos cronjobs realizados</td>
    </tr>
  	<tr>
    	<td>
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF;">Usu&aacute;rio</td>
            <td style="color:#FFF; width:120px;">Data / Hora</td>
            <td style="color:#FFF;">Ip</td>
            <td style="color:#FFF;">Cronjob - Resultado</td>
        	</tr>
          <?php
						$logfile = "../_logs/cronjobs.log";
						$open = fopen($logfile,"a+");
						if(!filesize($logfile) == 0) {
							$content = array_reverse(explode("\n",fread($open, filesize($logfile))));
							for($i=0; $i<20; $i++) {
								$piece=replace_latin_chars(str_replace("]","",explode("[",$content[$i])),false);
								if($piece[0] != null) {
					?>
          <tr class="hover">
	          <td><?php echo str_replace("user:","",$piece[1]); ?></td>
          	<td><?php echo $piece[0]; ?></td>
            <td><?php echo str_replace("ip:","",$piece[2]); ?></td>
            <td><?php echo str_replace("cronjob/action:","",$piece[3]); ?></td>
          </tr>
          <?php
						} } }
					?>
        </table> 
      </td>
    </tr>
    <tr>
    	<td colspan="4" style="text-align:right;"><form><input type="button" class="submit" style="font-size:11px;" value="Baixar cronjobs.log" onclick="javascript:window.open('<?php echo $logfile; ?>');" /></form></td>
    </tr>
  </table>
  <table class="one">
    <tr>
    	<td class="title" colspan="4">&Uacute;ltimos logins realizados</td>
    </tr>
  	<tr>
    	<td>
      	<table cellpadding="0" cellspacing="0" border="0">
        	<tr style="background:#999; font-weight:bold; color:#FFF;">
          	<td style="color:#FFF;">Usu&aacute;rio</td>
            <td style="color:#FFF; width:120px;">Data / Hora</td>
            <td style="color:#FFF;">Ip</td>
            <td style="color:#FFF;">P&aacute;gina de refer&ecirc;ncia</td>
        	</tr>
          <?php
						$logfile = "../_logs/login.log";
						$open = fopen($logfile,"a+");
						if(!filesize($logfile) == 0) {
							$content = array_reverse(explode("\n",fread($open, filesize($logfile))));
							for($i=0; $i<20; $i++) {
								$piece=replace_latin_chars(str_replace("]","",explode("[",$content[$i])),false);
								if($piece[0] != null) {
					?>
          <tr class="hover">
	          <td><?php echo str_replace("user:","",$piece[1]); ?></td>
          	<td><?php echo $piece[0]; ?></td>
            <td><?php echo str_replace("ip:","",$piece[2]); ?></td>
            <td><?php echo str_replace("from:","",$piece[3]); ?></td>
          </tr>
          <?php
						} } }
					?>
        </table> 
      </td>
    </tr>
    <tr>
    	<td colspan="4" style="text-align:right;"><form><input type="button" class="submit" style="font-size:11px;" value="Baixar login.log" onclick="javascript:window.open('<?php echo $logfile; ?>');" /></form></td>
    </tr>
  </table>
  
  
  <!--<table class="two">
  	<tr>
    	<td colspan="4" class="title">Buscar por logs</td>
    </tr>
    <tr>
    	<td class="info">Por usu&aacute;rio</td>
    </tr>
    <tr>
    	<td class="info">Por data</td>
    </tr>
  </table>-->
</div>

<?php get_footer();?>