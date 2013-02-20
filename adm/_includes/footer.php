<!--<div id="user_info" style="padding-bottom:5px; padding-top:10px;">
<?php 
/*connect_db(); //Seleciona BD diferente do padrão
$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
$sel_profile=mysql_query("SELECT * FROM profiles WHERE id=$user[profile]") or die(mysql_error()); //Banco de dados
$profile=mysql_fetch_array($sel_profile);*/
?>
<div style="float:left; padding-left:20px;"><strong>Logado como:</strong> <?php echo $user[name]; ?> (<?php echo $profile[name]; ?>)</div>
<div style="float:right; padding-right:20px;"> &Uacute;ltimo login: <?php echo date_convert($user[last_access]); ?> &nbsp;<a href="../user/perfil.php?user=<?php echo $user[id]; ?>"><strong>[Meu Perfil]</strong></a> <a href="../acesso/logout.php"><strong>[sair]</strong></a></div>
</div>-->
<!-- ////////////////////FOOTER/////////////////////// -->
<div style="clear:both;">&nbsp;</div>
<div style="clear:both;">&nbsp;</div>
</body>
</html>
