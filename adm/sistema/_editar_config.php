<?php include("../_includes/op_codex.php"); //Framework ?>
<?php 
//Variáveis de retorno
$id=$_GET[config];
$tipo=$_GET[tipo];

//Seleciona banco de dados
$sel_config=mysql_query("SELECT * FROM system WHERE id='$id'") or die(mysql_error());
$config=mysql_fetch_array($sel_config);

?>

<?php if($_GET[ok]) { ?>
<script language="javascript">
function closepopup() {
	window.opener.location.href="sistema.php?success=edit_config";
	window.close();
}
closepopup();
</script>

<?php } ?>

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
<form action="_editar_config_envia.php" method="post" name="form">
	<input type="hidden" name="id" value="<?php echo "$id"; ?>" />
  <input type="hidden" name="tipo" value="<?php echo "$tipo"; ?>" />
  <table>
  	<tr>
    	<td><strong>Configura&ccedil;&atilde;o:</strong></td>
      <td><?php echo $config[config]; ?></td>
    </tr>
  	<tr>
    	<td><strong>Descri&ccedil;&atilde;o:</strong></td>
      <td><input type="text" class="text" name="description" value="<?php echo $config[description]; ?>" style="width:400px;" /></td>
    </tr>
    <tr>
    	<td><strong>Valor:</strong></td>
      <td><input type="text" class="text" name="value" value="<?php echo $config[value]; ?>" style="width:50px;" /></td>
    </tr>
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


