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
    	<td>
      	<strong>ATEN&Ccedil;&Atilde;O:</strong> <span>A imagem da bandeira n&atilde;o deve passar de 20Kb e deve respeitar os seguintes tamanhos: 30px de largura e 20px de altura.</span>
      	<form action="_alterar_bandeira.php" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="id" value="<?php echo $_GET[id]; ?>" />
          <br />
          <input type="file" name="imagem" />
          <p style="text-align:right;"><input type="submit" class="submit" value="Enviar" /></p>
        </form>
    </tr>
  </table>
</body>
</html>