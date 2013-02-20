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

<header>

    <article>

        <div id="back_menu_header">

            <ul id="menu_header">

                <li><a href="<?php echo site_url(); ?>" class="header_menu">Inicial</a></li>
                <li><a href="<?php echo site_url(); ?>quem_somos" class="header_menu">Quem Somos</a></li>
                <li><a href="<?php echo site_url(); ?>contato" class="header_menu">Contato</a></li>

            </ul>

            <a href="<?php echo site_url(); ?>" id="logo"><img src="<?php echo site_url(); ?>imagens/logo.png" /></a>

        </div>

    </article>

    <div id="back_nav">

        <nav>

            <ul>

                <li><a href="<?php echo site_url(); ?>paisagismo" class="link_menu link_paisagismo"><div class="sprite icones_menu paisagismo"></div> <p class="texto_link paisagismo">Paisagismo</p></a></li>
                <li><a href="<?php echo site_url(); ?>jardinagem" class="link_menu link_jardinagem"><div class="sprite icones_menu jardinagem"></div> <p class="texto_link jardinagem">Jardinagem</p></a></li>
                <li><a href="<?php echo site_url(); ?>plantas" class="link_menu link_plantas"><div class="sprite icones_menu plantas"></div> <p class="texto_link plantas">Plantas</p></a></li>
                <li><a href="<?php echo site_url(); ?>moveis" class="link_menu link_moveis"><div class="sprite icones_menu moveis"></div> <p class="texto_link moveis">Móveis</p></a></li>
                <li><a href="<?php echo site_url(); ?>vasos" class="link_menu link_vasos"><div class="sprite icones_menu vasos"></div> <p class="texto_link vasos">Vasos</p></a></li>

            </ul>

        </nav>

    </div>

</header>