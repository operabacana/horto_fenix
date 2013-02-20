<?php

error_reporting(0);

/* --------ÓPERA CODEX FRAMEWORK------- */
/* --PROJETO OPEN-SOURCE - SAIBA MAIS-- */
/* ----www.codex.operabacana.com.br---- */

/* ------------------------------------------------------------------------------------ */
/* ------------------------------------------------------------------------------------ */
/* ------------------------INÍCIO DAS INFORMAÇÕES CUSTOMIZÁVEIS------------------------ */
/* Caso você não entenda ou não saiba preencher algum dos campos, deixe-os em branco.   */
/* Todos os campos possuem valores padrões caso estejam setados com valores em branco.  */
/* ------------------------------------------------------------------------------------ */
/* ------------------------------------------------------------------------------------ */

//WEBSITE
$global_url = "/horto_fenix/adm"; //Url principal do seu site (ex.: http://www.meusite.com.br)
$global_dir = "/horto_fenix"; //Diretório ROOT do seu site (ex.: usr/home/meusite)
//$global_url = "http://www.trave.com.br/new_site/adm"; //Url principal do seu site (ex.: http://www.meusite.com.br)
//$global_dir = "/www/new_site"; //Diretório ROOT do seu site (ex.: usr/home/meusite)
$global_image = "imagens_produtos/"; //Diretório das imagens do site (ex.: imagens/)
$global_tittle = "&raquo; Horto Fenix &raquo; &Aacute;rea de Administra&ccedil;&atilde;o"; //Título padrão para as páginas
$global_feed = "nao"; //Seu site possui feeds? Qual o nome do arquivo? (Padrão: nao)
$global_sitemap = "nao"; //Seu site possui sitemap? Qual o nome do arquivo? (Padrão: nao)
$global_robots = "robots.txt"; //Seu site possui arquivo de configuração de robots? Qual o nome do arquivo? (Padrão: nao)
$global_timezone = "Brazil/East"; //Escolhe o horário padrão (Padrão: Brazil/East Veja a lista em:)
$global_error_reporting = "nao"; //Deseja que seja encaminhado um email com os erros exibidos? (Padrão: nao)


//EMAIL
$mail_contact = "contato@reservamury.com.br"; //Email geral de contato
$mail_webmaster = "webmaster@reservamury.com.br"; //Email onde serão enviados Error Reportings
$mail_finance = "suporte@reservamury.com.br"; //Email onde serão enviados Error Reportings

//MENSAGENS
$warning_restrict = "<p class=\"warning_content\">Voc&ecirc; n&atilde;o tem acesso &agrave; esta p&aacute;gina.\n <br />\n Voc&ecirc; ser&aacute; redirecionado em 3 segundos.</p> <script>window.onload = delayer(\"../\",3000);</script>";
$warning_invalid_user = "<p class=\"warning_part\">Este usuário não existe. Tente outro.\n <br />\n";
$warning_invalid_pass = "<p class=\"warning_part\">Essa senha está incorreta. Tente outra.\n <br />\n";
$warning_invalid_image = "<p class=\"warning_part\">Este tipo de arquivo não é válido. São aceitos: JPG, JPEG, PNG, GIF, PNG e BMP.\n</p>"; 
$warning_success = "<p class=\"warning_success\">Informa&ccedil;&otilde;es atualizadas com sucesso!\n <br />\n Voc&ecirc; ser&aacute; redirecionado em 2 segundos.</p> <script>window.onload = delayer(\"voltar\",2000);</script>"; 

//FTP
$ftp_server = "127.0.0.1"; //Servidor do FTP (padrão: "localhost")
$ftp_user = "admin"; //Login do FTP (padrão: "root")
$ftp_pass = "123456"; //Senha do FTP (padrão: "")
$ftp_dir = "/"; //Diretório padrão para FTP (padrão: "/")
/*$ftp_server = "ftp.trave.com.br"; //Servidor do FTP (padrão: "localhost")
$ftp_user = "trave"; //Login do FTP (padrão: "root")
$ftp_pass = "dont4us"; //Senha do FTP (padrão: "")
$ftp_dir = "/www/new_site"; //Diretório padrão para FTP (padrão: "/")*/

//METAS TAGS
$meta_author = "&Oacute;pera Propaganda"; //Autor do website
$meta_charset = ""; //Charset (Padrão: iso-8859-1)
$meta_copyright = "CopyRight &Oacute;pera Propaganda - Todos os direitos reservados"; //Copyright do website
$meta_email = "contato@operabacana.com.br"; //Email principal do autor
$meta_reply = "contato@operabacana.com.br"; //Email de suporte
$meta_cache = "nao"; //Você deseja que seu site seja guardado em cache? (Padrão: nao)
$meta_google = "nao"; //Você deseja que seu site em geral seja indexado pelo Google?  (Padrão: sim)
$meta_phone = "(22) 2525-8500"; //Telefone de contato da empresa. (ddd) numero

//METAS RELS
$rel_icon = "_images/favicon.ico"; //Imagem de ícone
$rel_css = "_scripts/style.css"; //CSS principal
$rel_css_ie = "_scripts/style.ie.css"; //CSS para IE
$rel_css_ie6 = "_scripts/style.ie6.css"; //CSS para IE6
$rel_css_print = "_scripts/style.print.css"; //CSS de impressão

//Quais são as páginas ou diretórios que têm acesso restrito ao Google? (ex.: /admin, /cliente.php, /restrito.php, /dirrestrito)
$meta_restrict = "
/admin,
/login,
/usuario
"; 

//EMPRESA (JURÍDICO)
$info_job_name = "&Oacute;pera Propaganda"; //Nome institucional
$info_job_ddd = ""; //DDD do telefone principal da Empresa
$info_job_phone = ""; //Telefone principal da Empresa

//PESSOA (FÍSICO)
$info_name = ""; //Nome pessoal completo
$info_ddd = ""; //DDD do telefone principal da pessoa
$info_phone = ""; //Telefone principal da pessoa

//BANCO DE DADOS
$bd_dir = "localhost"; //Local do Banco de Dados
$bd_login = "root"; //Login do Banco de Dados
$bd_pass = ""; //Senha do Banco de Dados
$bd_select = "horto"; //Seleciona o Banco de Dados
/*$bd_dir = "mysql.trave.com.br"; //Local do Banco de Dados
$bd_login = "trave03"; //Login do Banco de Dados
$bd_pass = "dont4us"; //Senha do Banco de Dados
$bd_select = "trave03"; //Seleciona o Banco de Dados*/

//BANCO DE DADOS SECUNDÁRIO
$bds_dir = "localhost"; //Local do Banco de Dados
$bds_login = "root"; //Login do Banco de Dados
$bds_pass = ""; //Senha do Banco de Dados
$bds_select = "horto"; //Seleciona o Banco de Dados
/*$bds_dir = "mysql.trave.com.br"; //Local do Banco de Dados
$bds_login = "trave03"; //Login do Banco de Dados
$bds_pass = "dont4us"; //Senha do Banco de Dados
$bds_select = "trave03"; //Seleciona o Banco de Dados*/

//OUTRAS CONFIGURAÇÕES
//error_reporting(0);
date_default_timezone_set($global_timezone);
$previous_page = $_SERVER["HTTP_REFERER"];
$now_time = date("Y-m-d H:i:s");

/* ------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------- */
/* -----------------------FIM DAS INFORMAÇÕES CUSTOMIZÁVEIS----------------------- */
/* ------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------- */

/*
LEMBRAR: 
- Tirar a barra "/" se existir no último caractere do global_url e do global_dir
- Tirar a barra "/" se existir no primeiro caractere do $rel_css e $rel_icon e $global_feed e outros
*/

//Confere valores padrões dos valores customizáveis
//GLOBAL
if($global_url == null) {define(global_url,"/"); $global_url = "/";} else {define(global_url,$global_url);}
if($global_dir == null) {define(global_dir,"./"); $global_dir = "./";} else {define(global_dir,$global_dir);}
if($global_feed == null or $global_feed == "nao") {define(meta_feed,"no"); $meta_feed = null;} else {define(meta_feed,$global_url."/".$global_feed); $meta_feed = $global_url."/".$global_feed;}
if($global_timezone == null) {define(timezone,"Brazil/East"); $timezone = "Brazil/East";} else {define(timezone,$global_timezone);}
if($global_error_reporting == null or $global_error_reporting == "nao") {define(global_error_reporting,"no");} else {define(global_error_reporting,"yes");}
//METAS
if($meta_author == null) {define(meta_author,"");} else {define(meta_author,"$meta_author");}
if($meta_charset == null) {define(meta_charset,"ISO-8859-1");} else {define(meta_charset,"$meta_charset");}
if($meta_copyright == null) {define(meta_copyright,"");} else {define(meta_copyright,"$meta_copyright");}
if($meta_email == null) {define(meta_email,"");} else {define(meta_email,"$meta_email");}
if($meta_reply == null) {define(meta_reply,"");} else {define(meta_reply,"$meta_reply");}
if($meta_cache == "nao") {define(meta_cache,"sem cache");} else {define(meta_cache,"com cache");}
if($meta_google == "nao") {define(meta_google,"NoIndex, NoFollow");} else {define(meta_google,"Index, Follow");}
//RELS
if($rel_icon == null) {define(meta_icon,"");} else {define(meta_icon,$global_url."/".$rel_icon);}
if($rel_css == null) {define(meta_css,"");} else {define(meta_css,$global_url."/".$rel_css);}
if($rel_css_ie6 == null) {define(meta_css_ie6,"");} else {define(meta_css_ie6,$global_url."/".$rel_css_ie6);}
if($rel_css_ie == null) {define(meta_css_ie,"");} else {define(meta_css_ie,$global_url."/".$rel_css_ie);}
if($rel_css_print == null) {define(meta_css_print,"");} else {define(meta_css_print,$global_url."/".$rel_css_print);}
//FTP
if($ftp_server == null) {define(ftp_server,"localhost");} else {define(ftp_server,"$ftp_server");}
if($ftp_user == null) {define(ftp_user,"root");} else {define(ftp_user,"$ftp_user");}
if($ftp_pass == null) {define(ftp_pass ,"");} else {define(ftp_pass,"$ftp_pass");}
if($ftp_dir == null) {define(ftp_dir,"/");} else {define(ftp_dir,"$ftp_dir");}
//BANCO DE DADOS
define(bd_dir,"$bd_dir");
define(bd_login,"$bd_login");
define(bd_pass,"$bd_pass");
define(bd_select,"$bd_select");
define(bds_dir,"$bds_dir");
define(bds_login,"$bds_login");
define(bds_pass,"$bds_pass");
define(bds_select,"$bds_select");
//SESSÕES
//ini_set('session.save_path', 'D:\www\tmp' );
session_start();

/* ------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------- */

//---------------------------------------
// ------------------------BANCO DE DADOS
//---------------------------------------
//Conexão com banco de dados
function connect_db() {
	$con=mysql_connect(bd_dir,bd_login,bd_pass) or die(mysql_error());
	$select=mysql_select_db(bd_select,$con);
}

//Conecta o banco de dados principal
connect_db();

//Conexão secundária com o banco de dados
function connect_secondary_db() {
	mysql_close();
	$cons=mysql_connect(bds_dir,bds_login,bds_pass) or die(mysql_error());
	$select=mysql_select_db(bds_select,$cons);
}

//------------------------------------
// ------------------------ARQUITETURA
//------------------------------------
//Inicia o nosso topo com todas as meta-tags
function open_header() {
  echo "<!-- //////////////////METAS -->\n";
  echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
  echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
  echo "<head profile=\"http://gmpg.org/xfn/11\">\n";
  echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".meta_charset."\" />\n";
  echo "<META name=\"robots\" content=\"".meta_google."\" />\n";
  if(meta_author) {echo "<meta name=\"author\" content=\"".meta_author."\" />\n";}
  if(meta_email) {echo "<meta name=\"email\" content=\"".meta_email."\" />\n";}
  if(meta_reply) {echo "<meta name=\"reply-to\" content=\"".meta_reply."\" />\n";}
  //-> if($meta_cache) {echo "";}
  //-> if($meta_copyright) {echo "";}
  echo "<!-- //////////////////RELS -->\n";
  if(meta_feed) {echo "<link rel=\"feed\" type=\"application/atom+xml\" title=\"RSS 2.0\" href=\"".meta_feed."\" />\n";}
  if(meta_icon) {echo "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"".meta_icon."\" />\n";}
  if(meta_css) {echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".meta_css."\" media=\"screen\" />\n";}
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".global_url."/_scripts/jquery.thickbox.css\" media=\"screen\" />\n";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".global_url."/_scripts/tooltip.css\" media=\"screen\" />\n";
	if (meta_css_ie) {echo "<!--[if gte IE 7]><link rel=\"stylesheet\" type=\"text/css\" href=\"".meta_css_ie."\" media=\"screen\" /><![endif]-->\n";}
	if (meta_css_ie6) {echo "<!--[if lte IE 6]><link rel=\"stylesheet\" type=\"text/css\" href=\"".meta_css_ie6."\" media=\"screen\" /><![endif]-->\n";}
  if(meta_css_print) {echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".meta_css_print."\" media=\"print\" />\n";}
  echo "<!-- //////////////////OTHERS -->\n";
	echo "<script language=\"javascript\" src=\"".global_url."/_scripts/op_functions.js\" type=\"text/javascript\"></script> \n";
	echo "<script language=\"javascript\" src=\"".global_url."/_scripts/jquery.js\" type=\"text/javascript\"></script> \n";
	echo "<script language=\"javascript\" src=\"".global_url."/_scripts/thickbox.js\" type=\"text/javascript\"></script> \n";
	echo "<script language=\"javascript\" src=\"".global_url."/_scripts/tooltip.js\" type=\"text/javascript\"></script> \n";
	echo "\n";
}

//Termina o nosso topo
function close_header() {
  echo "</head>\n";
  echo "<body>\n";
  
}

//Pega o menu
function get_sidebar() {
  include("sidebar.php");
}

//Pega o rodapé
function get_footer(){
  include("footer.php");
}

//Pega o cabeçalho
function get_header() {
	include("header.php");
}

//Gerador de FEEDs
function get_feed() {
}

//Pega resolução
function get_resolution() {
  return "<script type=\"text\\javascript\">document.write(screen.width);</script>";
}

//------------------------------------
// ------------------------FORMULÁRIOS
//------------------------------------
//Validador de formato de preço (Formato: 0,00)
function validate_price($price) {
	$count = explode(",",$price);
	if(!$count[1]) {
		return false;
	} elseif(strlen($count[1]) > 3) {
		return false;
	} else {
		return true;
	}
}

//--------------------------------
// ------------------------COOKIES
//--------------------------------
//Verifica se existe cookie
function cookie_verify($name,$action_yes,$action_no) {
  if(isset($_COOKIE[$name])) {
		if(isset($action_yes) && $action_yes != ""){ header("location:".global_url."/".$action_yes);	}
		else { return true;	}
	} else {
		if(isset($action_no) && $action_no != ""){ header("location:".global_url."/".$action_no);	} 
		else { return false; }
	}
}

//Cria um cookie
function cookie_create($name,$value,$expires,$location) {
	if(!$name or !$value) {print "O nome e/ou valor não foram destinguidas em \"cookie_create\";";}
  if(!$expires) {$expires = "";}
	if(!$location) {$location = "/";}
  setcookie($name,$value,$expires,$location);
}

//Deleta um cookie
function cookie_delete($name,$location) {
  if(!$location) {$location = "/";}
  setcookie($name,null,time()-3600,$location);
}

//---------------------------------
// ------------------------SESSIONS
//---------------------------------
//Verifica se existe sessão
function session_verify($name,$action_yes,$action_no) {
  if(isset($_SESSION[$name])) {
		if(isset($action_yes) && $action_yes != ""){ header("location:".global_url."/".$action_yes);	}
		else { return true;	}
	} else {
		if(isset($action_no) && $action_no != ""){ header("location:".global_url."/".$action_no);	} 
		else { return false; }
	}
}

//Cria uma sessão
function session_create($name,$value) {
	if(!$name) {print "O nome e/ou valor não foram destinguidas em \"cookie_create\";";}
  $_SESSION[$name]=$value;
}

//Deleta uma sessão
function session_delete($name,$location) {
  if(!$location) {$location = "/";}
  unset($_SESSION[$name]);
}

//Modifica um cookie

//----------------------------
// ------------------------FTP
//----------------------------
//Abre uma conexão FTP
function ftp_open($dir) {
  if(!$dir) {$dir = ftp_dir;}
  $ftp_conn = ftp_connect(ftp_server);
  $ftp_enter = ftp_login($ftp_conn, ftp_user, ftp_pass);
  $ftp_connection = ftp_chdir($ftp_conn,$dir);
	define("ftp_connection",$ftp_conn);
	if($ftp_conn != null) {
		return $ftp_conn;
	} else {
		return false;
	}
}

//Coloca arquivos no servidor FTP
//Coloca arquivos no servidor FTP
function ftp_copy($file1, $file2,$connection = null) {
	if($file1 == null || $file2 == null) {
		return false;
	} 
	else {
		if($connection == null) {
			ftp_put(ftp_connection, $file1, $file2, FTP_BINARY);
		} else {
			ftp_put($connection, $file1, $file2, FTP_BINARY);
		}
	}
	return true;
}

//------------------------------------
// ------------------------DATA E HORA
//------------------------------------

//Converte data padrão (0000-00-00) para formato brasileiro (00/00/000)
function date_convert($data) {
	$var=str_replace("-","/",$data);
	$var=explode(" ",$var);
	$date=$var[0];
	$time=$var[1];
	$date=explode("/", $date);
	$data=	$date[2].'/'.$date[1].'/'.$date[0];
	if($time != null) {return $data." &agrave;s ".$time;}
	else {return $data;}
}
function date_desconvert($data) {
	$var=str_replace("/","-",$data);
	$date=explode("-", $var);
	$data=	$date[2].'-'.$date[1].'-'.$date[0];
	return $data;
}

//------------------------------------
// -------------------------TIPOGRAFIA
//------------------------------------

//Substitui todos os tipos de caracteres diferenciados (especiais em nulo e acentos em não acentuados)
//PROGRAMADOR: Melhorar este sistema (fazer via foreach as) /// Adicinoar outros caracteres que podem estar faltando (arroba, copy)
function replace_all_chars($t){	
	$array1 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" , " " , "‘", "\"", "!", "@", "#", "$", "%", "¨", "&", "*", "(", ")", "=", "+", "´", "`", "[", "]", "{", "}", "~", "^", ",", "<", ".", ">", ";", ":", "/", "?", "\\", "|", "¹", "²", "³", "£", "¢", "¬", "§", "ª", "º", "°" , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
  $array2 = array(   "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" , "_", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
  return str_replace( $array1, $array2, $t );
	break;
}

//Converte caracteres lations em caracteres diretos
function replace_special_chars($str) {
	$html_entities = array ( 
				"&" =>  "", 
				"á" =>  "a", 
				"Â" =>  "A",  
				"â" =>  "a", 
				"Æ" =>  "", 
				"æ" =>  "", 
				"À" =>  "A",  
				"à" =>  "a", 
				"Å" =>  "A",  
				"å" =>  "a", 
				"Ã" =>  "A", 
				"ã" =>  "a", 
        "Ä" =>  "A", 
        "ä" =>  "a", 
        "Ç" =>  "C", 
        "ç" =>  "c", 
        "É" =>  "E", 
        "é" =>  "e", 
        "Ê" =>  "E",
        "ê" =>  "e",
        "È" =>  "E",
				"Í" => "I",
				"í" => "i",
				"Ì" => "I",
				"ì" => "i",
				"Î" => "I",
				"î" => "i",
				"ó" => "o",
				"Ó" => "O",
				"õ" => "o",
				"Õ" => "O",
				"ò" => "o",
				"Ò" => "O",
				"ô" => "o",
				"Ô" => "O",
        "û" =>  "u",
        "Ù" =>  "U",
        "ù" =>  "u",
        "Ü" =>  "U",
        "ü" =>  "u",
        "Ý" =>  "y",
        "ý" =>  "y",
        "ÿ" =>  "Y",
        "Ÿ" =>  "Y",
    );
    foreach ($html_entities as $key => $value) {
        $str = str_replace($key, $value, $str);
    }
    return $str;
		break;
} 


//Converte caracteres latinos em caracteres especiais
function replace_latin_chars($str,$invert) {
	$html_entities = array ( 
				"&" =>  "&amp;", 
				"á" =>  "&aacute;",
				"Â" =>  "&Acirc;",  
				"â" =>  "&acirc;", 
				"Æ" =>  "&AElig;", 
				"æ" =>  "&aelig;", 
				"À" =>  "&Agrave;",  
				"à" =>  "&agrave;", 
				"Å" =>  "&Aring;",  
				"å" =>  "&aring;", 
				"Ã" =>  "&Atilde;", 
				"ã" =>  "&atilde;", 
                "Ä" =>  "&Auml;",
                "ä" =>  "&auml;",
                "Ç" =>  "&Ccedil;",
                "ç" =>  "&ccedil;",
                "É" =>  "&Eacute;",
                "é" =>  "&eacute;",
                "Ê" =>  "&Ecirc;",
                "ê" =>  "&ecirc;",
                "È" =>  "&Egrave;",
				"Í" => "&Iacute;",
				"í" => "&iacute;",
				"Ì" => "&Igrave;",
				"ì" => "&igrave;",
				"Î" => "&Icirc;",
				"î" => "&icirc;",
				"ó" => "&oacute;",
				"Ó" => "&Oacute;",
				"ô" => "&ocirc;",
				"Ô" => "&Ocirc;",
				"õ" => "&otilde;",
				"Õ" => "&Otilde;",
				"ò" => "&ograve;",
				"Ò" => "&Ograve;",
                "û" =>  "&ucirc;",
                "Ù" =>  "&Ugrave;",
                "ù" =>  "&ugrave;",
                "Ü" =>  "&Uuml;",
                "ü" =>  "&uuml;",
                "Ý" =>  "&Yacute;",
                "ý" =>  "&yacute;",
                "ÿ" =>  "&yuml;",
                "Ÿ" =>  "&Yuml;",
    );

    if($invert == null or $invert == "false") {
			foreach ($html_entities as $key => $value) {
        $str = str_replace($key, $value, $str);
        }
     } else {
			foreach ($html_entities as $key => $value) {
        $str = str_replace($value, $key, $str);


		} }
    return $str;
		break;
} 

//Converte caracteres especiais UTF em caracteres não acentuados
function replace_utf_chars($str) {
	return replace_special_chars(replace_latin_chars($str,true));
	break;
}

//------------------------------------
// -------------------------------LOGS
//------------------------------------
function register_log($action) {
	$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
	$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
	$ip = $_SERVER['REMOTE_ADDR'];
	$action = mysql_escape_string(replace_utf_chars($action));
	$reffer = $_SERVER['HTTP_REFERER'];
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$page = $_SERVER['REQUEST_URI'];
	$now = $_SERVER['REQUEST_TIME'];
	$now = date("Y-m-d H:i:s", $now);	
	/////////////////////////////
	$message = $now." [user:(".$user[id].")".$user[name]."] [ip:".$ip."] [action:".$action."] [from:".$reffer."] [where:".$page."] [info:".$agent."]";
	/////////////////////////////
	$logpath = "../_logs/"; 
	$logfile = "userid(".$user[id].").log";
	/////////////////////////////
	$open = @fopen($logpath.$logfile, "a");
	fwrite($open, $message."\n");
	fclose($open);
	/////////////////////////////
	$logfile = "logs.log";
	$open = @fopen($logpath.$logfile, "a");
	fwrite($open, $message."\n");
	fclose($open);
	return true;
}

function register_login($login) {
	$select=mysql_query("SELECT * FROM users WHERE login='$login'") or die(mysql_error()); //Banco de dados
	$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
	$ip = $_SERVER['REMOTE_ADDR'];
	$reffer = $_SERVER['HTTP_REFERER'];
	$page = $_SERVER['REQUEST_URI'];
	$now = $_SERVER['REQUEST_TIME'];
	$now = date("Y-m-d H:i:s", $now);	
	/////////////////////////////
	$message = $now." [user:(".$user[id].")".$login."] [ip:".$ip."] [from:".$reffer."]";
	/////////////////////////////
	$logpath = "../_logs/"; 
	$logfile = "login.log";
	/////////////////////////////
	$open = @fopen($logpath.$logfile, "a");
	fwrite($open, $message."\n");
	fclose($open);
	return true;
}

function register_cronjob($action) {
	connect_db(); 
	$select=mysql_query("SELECT * FROM users WHERE mail='$_SESSION[admin_logon]'") or die(mysql_error()); //Banco de dados
	$user=mysql_fetch_array($select); //Para gerar informações sobre o usuário logado
	$ip = $_SERVER['REMOTE_ADDR'];
	$reffer = $_SERVER['HTTP_REFERER'];
	$page = $_SERVER['REQUEST_URI'];
	$now = $_SERVER['REQUEST_TIME'];
	$now = date("Y-m-d H:i:s", $now);	
	/////////////////////////////
	$message = $now." [user:(".$user[id].")".$user[name]."] [ip:".$ip."] [cronjob/action:".$action."] [where:".$page."]";
	/////////////////////////////
	$logpath = "../_logs/"; 
	$logfile = "cronjobs.log";
	/////////////////////////////
	$open = @fopen($logpath.$logfile, "a");
	fwrite($open, $message."\n");
	fclose($open);
	connect_secondary_db(); 
	return true;
}


function to_slug($var) {
	$var = strtolower($var);
	$var = preg_replace("[@!#$%/?¨&:<*\=ª>°º^~´`§¹²³£¢¬\"'|[_/,.;}{]]","",$var);
	$var = htmlentities($var);
	$html_entities = array (
		"&aacute;" => "a",
		"&eacute;" => "e",
		"&iacute;" => "i",
		"&oacute;" => "o",
		"&uacute;" => "u",
		"&agrave;" => "a",
		"&egrave;" => "e",
		"&igrave;" => "i",
		"&ograve;" => "o",
		"&ugrave;" => "u",
		"&acirc;" => "a",
		"&ecirc;" => "e",
		"&icirc;" => "i",
		"&ocirc;" => "o",
		"&ucirc;" => "u",
		"&atilde;" => "a",
		"&etilde;" => "e",
		"&itilde;" => "i",
		"&otilde;" => "o",
		"&utilde;" => "u",
		"&ccedil;" => "c"
	);
	foreach ($html_entities as $key => $value) {
		$var = str_replace($key, $value, $var);
   }
	//$var = replace_latin_chars($var,TRUE);
	$var = preg_replace("[áàâãª]","a",$var);
	$var = preg_replace("[éèê]","e",$var);
	$var = preg_replace("[íìî]","i",$var);
	$var = preg_replace("[óòôõº]","o",$var);
	$var = preg_replace("[úùû]","u",$var);
	$var = str_replace(" ","-",$var);
	$var = str_replace("---","-",$var);
	$var = str_replace("--","-",$var);
	return $var;
}

?>