<?php include("../_includes/op_codex.php"); //Framework ?>
<?php 
//Variáveis de retorno
$perfil=$_GET[profile];

//Seleciona banco de dados
$sel_profile=mysql_query("SELECT * FROM profiles WHERE id='$perfil'") or die(mysql_error());
$profile=mysql_fetch_array($sel_profile);
$sel_all_permissions=mysql_query("SELECT DISTINCT permission FROM permissions") or die(mysql_error()); 
$sel_permissions=mysql_query("SELECT * FROM permissions WHERE id='$perfil'") or die(mysql_error()); 

?>
<?php if($_GET[ok]) { ?>
<script language="javascript">
function closepopup() {
	window.opener.location.href="perfis.php?success=edit_profile";
	window.close();
}
closepopup();
</script>

<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Editando coment&aacute;rio</title>
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
<form action="_editar_perfil_envia.php" method="post" name="form">
	<input type="hidden" name="profile" value="<?php echo "$perfil"; ?>" />
  <table>
  	<tr>
    	<td><strong>Nome:</strong></td>
      <td><input type="text" class="text" name="nome" value="<?php echo $profile[name]; ?>" /></td>
    </tr>
    <tr>
    	<td><strong>Permiss&otilde;es:</strong></td>
    </tr>
    <tr>
    <?php $count=0; while($permission = mysql_fetch_array($sel_all_permissions)) { $count++; ?>
        
        	<?php if($count == 3) {echo "</tr><tr><td>";} elseif($count == 1) {echo "<td>";}  else {echo "<td>";} ?>
          <input type="checkbox" name="permission_<?php echo $permission[permission]; ?>" id="permission_<?php echo $permission[permission]; ?>" class="checkbox" <?php $sel_permissions=mysql_query("SELECT * FROM permissions WHERE id='$perfil'") or die(mysql_error()); while($my=mysql_fetch_array($sel_permissions)){ if($my[permission] == $permission[permission]) {echo "checked=\"checked\"";} } ?> />
          <label for="permission_<?php echo $permission[permission]; ?>" style="margin-left:5px; text-transform:capitalize; margin-right:10px;">
					<?php $permission=str_replace("_"," ",$permission[permission]); echo $permission; ?></label>
          <?php if($count == 3){echo "</td>"; $count=0;} elseif($count == 1) {echo "</td>";} else {echo "</td>";} ?>
					
					<?php } ?>
          
   <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr style="text-align:right;">
    	<td colspan="4" style="text-align:right;"><input type="submit" class="submit" value="Editar" /></td>    
    </tr>
  </table>

</form>
</body>
</html>


