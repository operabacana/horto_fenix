<?php include("../_includes/op_codex.php"); //Framework ?>
<?php
$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado

?>

<?php open_header(); ?>
<title>Bem vindo, <?php echo $user["name"]; echo"! "; $global_tittle; ?></title>
<?php close_header(); ?>
<?php get_header(); ?>

<?php
if($user[status] == 0) {
?>
<div id="article">
	<a name="top"></a>
	<h2><span>Ol&aacute;!</span> &gt;&gt; Seja bem vindo, <?php echo $user[name]; ?>!</h2>
	<br />
  <table class="one">
  	<tr>
    	<td class="info">Infelizmente voc&ecirc; foi bloqueado pelos administradores do sistema. <span>Entre em contato com o administrador ou o respons&aacute;vel para maiores esclarecimentos.</span></td>
    </tr>
  </table>
</div>

<?php
get_footer();
exit(); 
}
?>

<?php get_sidebar(); ?>

<!-- ////////////////////CONTENT/////////////////////// -->
<div id="article">
	<a name="top"></a>
	<h2><span>Ol&aacute;!</span> &gt;&gt; Seja bem vindo, <?php echo $user[name]; ?>!</h2>
	<br />
</div>
<?php get_footer(); ?>
