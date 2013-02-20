<?php include("../_includes/op_codex.php"); //Framework ?>
<?php 
/////////////////////Seleciona perfís
$sel_profiles=mysql_query("SELECT * FROM profiles WHERE id!='$_GET[id]'") or die(mysql_error()."<br />");
$sel_users=mysql_query("SELECT * FROM users WHERE profile='$_GET[id]'") or die(mysql_error()."<br />");
$count=mysql_num_rows($sel_users);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Editando configura&ccedil;&atilde;o</title>
<style type="text/css">
* {padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;}
body {background-color:#F5F5F5;}
table, td, tr {padding:0px; margin:0px; vertical-align:top; color:#666; font-size:13px;}
input.submit {background:#999; color:#FFF; font-weight:bold; text-align:center; border:#999 solid 1px; font-size:16px; padding:2px 10px; cursor:pointer;}
input.submit:hover, #article input.submit:focus {background:#CCC;}
textarea.textarea {border:1px solid #999; background:#FFF; font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:3px;}
textarea.textarea:hover, textarea.textarea:focus, input.textarea:hover, input.textarea:focus {background:#EFEFEF; }
</style>
<script language="javascript" src="../_scripts/op_functions.js" type="text/javascript"></script> 
</head>
<body>
  <table>
  	<tr>
    	<?php if($count > 0) { ?>
      <td>
      	<strong>ATEN&Ccedil;&Atilde;O:</strong> <span> Ainda existem usu&aacute;rios cadastrados para este perfil. &Eacute; necess&aacute;rio remanejar todos os usu&aacute;rios para outro perfil antes de exclu&iacute;-lo. Escolha abaixo o perfil para que o sistema mova todos os usu&aacute;rios:</span>
        <br /><br />
        <form action="_excluir_perfil.php" method="GET">

          <input type="hidden" name="id" value="<?php echo $_GET[id]; ?>" />
          <?php $c==0; while($profile = mysql_fetch_array($sel_profiles)) { $c++; ?>
          	<input type="radio" id="profile_<?php echo $profile[id]; ?>" name="profile" value="<?php echo $profile[id]; ?>" <?php if($c == 2): ?> checked="checked"<?php endif; ?> /><label style="padding-left:5px;" for="profile_<?php echo $profile[id]; ?>"><?php echo $profile[name]; ?></label><br />
          <?php } ?>

          <p style="text-align:right;"><input  type="submit" class="submit" value="Remanejar usu&aacute;rios e excluir perfil" /></p>
        </form>
        </td>
        <?php } else { ?>
        <td>
        	<strong>Voc&ecirc; realmente deseja exclu&iacute;r este perfil? Esta a&ccedil;&atilde;o &eacute; irrevers&iacute;vel.</strong> <span>Certifique-se que este perfil &eacute; realmente o que voc&ecirc; deseja excluir.</span>
          
          <br /><br />
          <form action="_excluir_perfil.php" method="GET">
          	<input type="hidden" name="id" value="<?php echo $_GET[id]; ?>" />
          	<p style="text-align:right;"><input type="submit" class="submit" value="Excluir perfil" /></p>
          </form>
        </td>
        <?php } ?>
    </tr>
  </table>
</body>
</html>