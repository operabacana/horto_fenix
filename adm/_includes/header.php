<?php
connect_db(); //Seleciona BD diferente do padrão
$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
?>
<div id="header">
	<a href="../../" title="Ir para o site"><img src="../_images/logo.png" alt="" /></a>
	<p class="user"><a href="../user/perfil.php?user=<?php echo $user[id]; ?>" title="Visualizar meu perfil">Meu Perfil</a> | <a href="../acesso/logout.php" title="Sair do sistema">Logout</a></p>
	<p class="info">&Aacute;rea de Administra&ccedil;&atilde;o</p>
</div>
<?php connect_secondary_db(); ?>
