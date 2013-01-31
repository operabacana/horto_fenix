<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<?php $cssPaths = $this -> lang -> line( 'css_file' ); ?>
<head>
  <title><?php if($this -> uri -> segment(1) != ""){ echo ucfirst(str_replace("_", " ", $this -> uri -> segment(1)))." | ".$this -> config -> item('title_site'); }else{ echo "Transportadora e Logística | Transportadora Time Express"; } ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
  <meta name="viewport" content="width=device-width">
  <meta name="robots" content="index,follow" />
  <meta name="googlebot" content="index,follow" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta name="author" content="Opera Bacana" />
  <meta http-equiv="content-language" content="pt-br" />
  <meta name="reply-to" content="<?php echo $this -> config -> item('email_contato_opera'); ?>" />
  <?php echo link_tag( $cssPaths['main'] ); ?>
  <?php echo link_tag( $cssPaths['print'], "stylesheet", "text/css", "", "print" ); ?>
  <!--[if lt IE 7]> <![endif]-->
  <!--[if IE 7]><?php echo link_tag( $cssPaths['ie'] ); ?><![endif]-->
  <!--[if IE 8]><?php echo link_tag( $cssPaths['ie'] ); ?><![endif]-->
  <script src="js/modernizr-2.5.3.min.js"></script>
</head>
<body>