<?php

$linkImagem = array();
$quantidadeImagensPorLinha = array();

/* -------------------------------------------------------------------------- */

$titulo = '';

$corFundo = '#000000';
$corFundoTopo = '#000000';
$corFundoDados = '#000000';
$corFundoRedes = '#000000';
$corFundoOptout = '#000000';

$corFonteExterna = '#fff';
$corFonteInterna = '#fff';

$temBorda = 'não';
$corBorda = '';

$arquivo = 'news_nome';
$prefixoImagens = 'nome_imagem_';

$larguraPrincipal = 509;

$numeroPrimeiraImagem = 1;
$quantidadeImagens = 5;

// quantidade de linhas apenas do conteúdo
$quantidadeLinhas = 3;

// de acordo com a quantidade de linhas
$quantidadeImagensPorLinha[0] = 1;
$quantidadeImagensPorLinha[1] = 1;
$quantidadeImagensPorLinha[2] = 1;

// de acordo com a quantidade de linhas
$linkImagem[0] = 'http://www.reservamury.com.br';
$linkImagem[1] = 'http://www.reservamury.com.br';
$linkImagem[2] = 'http://www.reservamury.com.br';

$formasPagamento = 'não';

$certificadosDeSeguranca = 'não';
$parceiros = 'não';
$espaco = '';

$atendimentoTelefone = 'não';
$chat = 'não';

$redesSociais = 'não';
$redesSociaisTexto = 'não';

$cliqueAqui = 'sim';
$redesExternas = 'sim';
$mostrarOptout = 'sim';

$facebook = '';
$twitter = '';
$youtube = '';
$pinterest = '';
$blog = '';

$url = 'http://www.reservamury.com.br';
$linkAdministracao = 'adm';

$empresa = 'Reserva Mury';
$emailContato = 'contato@reservamury.com.br';
$emailWebmaster = 'webmaster@reservamury.com.br';
$telefone = '';

$emailTeste = 'leandraoleao@gmail.com';
$emailTeste .= ', sabrina@operabacana.com.br';
$emailTeste .= ', jonathan@operabacana.com.br';
$emailTeste .= ', roulien@operabacana.com.br';
$emailTeste .= ', leao@operabacana.com.br';
$emailTeste .= ', feleepe@operabacana.com.br';
$emailTeste .= ', demetrius@operabacana.com.br';
$emailTeste .= ', yuri@operabacana.com.br';
$emailTeste .= ', danielpy@operabacana.com.br';
$emailTeste .= ', leonardo@operabacana.com.br';
$emailTeste .= ', thamyres@operabacana.com.br';
$emailTeste .= ', helena@operabacana.com.br';
$emailTeste .= ', monika@operabacana.com.br';
$emailTeste .= ', guilherme@operabacana.com.br';
$emailTeste .= ', thiago@operabacana.com.br';
$emailTeste .= ', susi@operabacana.com.br';

// allin ou código
$modoDeEnvio = 'allin';

$caminhoConfig = '';
$nomeBanco = '';

/* -------------------------------------------------------------------------- */

$urlArquivo = $url.'/news/'.$arquivo.'.html';
$emailsender = $emailContato;

$php = __FILE__;
$explode = explode($linkAdministracao."/", $php);
$php = $explode[1];

if ($temBorda == 'sim') { $styleBorda = '1px solid '.$corBorda; }
else { $styleBorda = 'none'; }

$maior = max($quantidadeImagensPorLinha);

$aux = 0;
$contador = 1;

$numeroImagem = array();

while ($contador <= $quantidadeImagens) {

    if ($contador >= 10) { $numeroImagem[$aux] = $contador; }
    else { $numeroImagem[$aux] = "0".$contador; }

    $aux++;
    $contador++;

}

$aux = $numeroPrimeiraImagem - 2;

$comeco = '
<html>

<head>
<title>'.$titulo.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="'.$corFundo.'" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
';

$topo = '
<table width="'.$larguraPrincipal.'" height="54" align="center" border="0" cellpadding="0" cellspacing="0" style="border-right: '.$styleBorda.'; border-left: '.$styleBorda.'; border-top: '.$styleBorda.';">
	<tr>
		<td><div style="background-color: '.$corFundoTopo.'; width: '.$larguraPrincipal.'px; height: 54px;"><a href="'.$urlArquivo.'" target="_blank" style="text-decoration: none; color: '.$corFonteExterna.'; float: right; margin-right: 2px; margin-top: 25px; font-family: Verdana; font-size: 11px;">Não consegue visualizar esse e-mail? <u>Acesse aqui</u>.</a></div></td>
	</tr>
</table>
';

$conteudo = '
<table width="'.$larguraPrincipal.'" align="center" cellpadding="0" cellspacing="0" style="border-right: '.$styleBorda.'; border-left: '.$styleBorda.';">
';

$contLinhas = 0;
$contLinks = 0;

while ($contLinhas < $quantidadeLinhas) {

    $conteudo .= '
    <tr>
    ';

    $contImagens = 0;

    while ($contImagens < $quantidadeImagensPorLinha[$contLinhas]) {

        if ($maior > 1 && $quantidadeImagensPorLinha[$contLinhas] == 1) { $atributo = ' colspan='.$maior.''; }
        else { $atributo = ''; }

        $conteudo .= '
        <td'.$atributo.'><a href="'.$linkImagem[$contLinks].'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
        ';

        $contImagens++;
        $contLinks++;

    }

    $conteudo .= '
    </tr>
    ';

    $contLinhas++;

}

$conteudo .= '
</table>
';

if ($formasPagamento != 'sim' && $certificadosDeSeguranca != 'sim' && $atendimentoTelefone != 'sim' && $chat != 'sim' && $redesSociais != 'sim' && $redesSociaisTexto != 'sim') { $mostrarDados = false; } else { $mostrarDados = true; }

if ($mostrarDados) {

$dados = '
<table width="'.$larguraPrincipal.'" align="center" cellpadding="0" cellspacing="0" style="color: '.$corFonteInterna.'; font-family: Verdana; font-size: 13px; border-right: '.$styleBorda.'; border-left: '.$styleBorda.'; background-color: '.$corFundoDados.';">
';

}

if ($formasPagamento == "sim") {

    $dados .= '
    <tr>
        <td><p style="margin-left: 10px; margin-top: 10px;"><strong>Formas de Pagamento</strong></p></td>
    </tr>
    <tr>
		<td><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+2].'.jpg" alt=""></td>
	</tr>
    ';

}

if ($certificadosDeSeguranca == "sim") {

    $dados .= '
    <tr>
		<td><p style="margin-left: 10px;"><strong><br />Certificados de Segurança';

    if ($parceiros == "sim") {

        $dados .= $espaco.'Parceiros';

    }

    $dados .= '</strong></p></td>
	</tr>
    <tr>
		<td><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+2].'.jpg" alt=""></td>
	</tr>
    ';

}

if ($atendimentoTelefone == "sim" || $chat == "sim") {

    $dados .= '
    <tr>
		<td><p style="margin-left: 12px; margin-top: 10px;">';

}

if ($atendimentoTelefone == "sim") {

    $dados .= '<strong>Atendimento por Telefone</strong><br />'.$telefone.'<br /><br />';

}

if ($chat == "sim") {

    $dados .= '<strong> Chat Online</strong> para esclarecer dúvidas em tempo real<br /><br />';

}

if ($atendimentoTelefone == "sim" || $chat == "sim") {

    $dados .= '</p></td>
    </tr>
    ';

}

if ($redesSociais == "sim") {

    if ($redesSociaisTexto == "sim") {

    $dados .= '
    <tr>
        <td><p style="margin-left: 12px;"><strong>Siga a '.$empresa.' nas redes sociais</strong></p></td>
    </tr>
    ';

    $aux = $aux + 1;

    }

    if ($facebook != "") {

    $dados .= '
    <tr>
        <td><a href="'.$facebook.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
    </tr>
    ';

    }

    if ($twitter != "") {

    $dados .= '
    <tr>
	    <td><a href="'.$twitter.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
	</tr>
    ';

    }

    if ($youtube != "") {

    $dados .= '
    <tr>
	    <td><a href="'.$youtube.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
	</tr>
    ';

    }

    if ($pinterest != "") {

    $dados .= '
    <tr>
	    <td><a href="'.$pinterest.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
	</tr>
    ';

    }

    if ($blog != "") {

    $dados .= '
    <tr>
	    <td><a href="'.$blog.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
	</tr>
    ';

    }

    $dados .= '
    <tr>
		<td><a href="'.$url.'" target="_blank"><img style="border: none; display: block;" src="'.$url.'/'.$linkAdministracao.'/_images/news/'.$prefixoImagens.$numeroImagem[$aux = $aux+1].'.jpg" alt=""></a></td>
	</tr>
    ';

}

if ($mostrarDados) {

$dados .= '
</table>
';

}

$redes = '
<table width="'.$larguraPrincipal.'" align="center" cellpadding="0" cellspacing="0" style="background-color: '.$corFundoRedes.'; border-bottom: '.$styleBorda.'; border-right: '.$styleBorda.'; border-left: '.$styleBorda.';">
    <tr>
		<td>
			<div style="background-color: '.$corFundoRedes.'; width: '.$larguraPrincipal.'px; height: 105px;">
                <span style="color: '.$corFonteInterna.'; font-size: 10px; font-family: Verdana; margin: 15px 0px 3px 10px; float: left;">Compartilhe essa mensagem nas redes sociais</span><br />
                <div style="float: left; margin-left: 10px;">
                <a rel="nofollow" target="_blank" href="http://twitter.com/home?status='.$urlArquivo.'" title="Compartilhe pelo Twitter!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/twitter.gif" alt="twitter" /></a>
                <a rel="nofollow" target="_blank" href="http://del.icio.us/post?url='.$urlArquivo.'" title="Compartilhe no Delicious!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/delicious.png" alt="del.icio.us" /></a>
                <a rel="nofollow" target="_blank" href="http://www.facebook.com/share.php?u='.$urlArquivo.'" title="Compartilhe no Facebook!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/facebook.png" alt="facebook" /></a>
                <a rel="nofollow" target="_blank" href="http://digg.com/submit?phase=2&amp;url='.$urlArquivo.'" title="Compartilhe no Digg!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/digg.png" alt="digg" /></a>
                <a rel="nofollow" target="_blank" href="http://www.myspace.com/Modules/PostTo/Pages/?u='.$urlArquivo.'" title="Compartilhe no MySpace!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/myspace.png" alt="myspace" /></a>
                <a rel="nofollow" target="_blank" href="https://favorites.live.com/quickadd.aspx?marklet=1&amp;url='.$urlArquivo.'" title="Compartilhe no Windows Live!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/live.png" alt="live" /></a>
                <a rel="nofollow" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$urlArquivo.'" title="Compartilhe no LinkedIn!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/linkedin.png" alt="linkedin" /></a>
                <a rel="nofollow" target="_blank" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$urlArquivo.'" title="Compartilhe no Yahoo My Web!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/yahoomyweb.png" alt="yahoo" /></a>
                <a rel="nofollow" target="_blank" href="http://www.netvibes.com/share?url='.$urlArquivo.'" title="Compartilhe no Netvibes!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/netvibes.png" alt="netvibes" /></a>
                <a rel="nofollow" target="_blank" href="http://blogblogs.com.br/meu-blogblogs/bookmarks/adicionar?bookmark_url[url]='.$urlArquivo.'" title="Compartilhe no Blogblogs!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/blogblogs.png" alt="blogblogs" /></a>
                <a rel="nofollow" target="_blank" href="http://reddit.com/submit?url='.$urlArquivo.'" title="Compartilhe no Reddit!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/reddit.png" alt="Reddit" /></a>
                <a rel="nofollow" target="_blank" href="http://technorati.com/faves?add='.$urlArquivo.'" title="Compartilhe no Technorati!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/technorati.png" alt="technorati" /></a>
                <a rel="nofollow" target="_blank" href="body='.$urlArquivo.'" title="Enviar por email!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/email_link.png" alt="email" /></a>
                <a rel="nofollow" target="_blank" href="javascript:window.print();" title="Imprima esta página!"><img src="'.$url.'/'.$linkAdministracao.'/_images/compartilhe/printer.png" alt="imprimir" /></a>
                </div>
            </div>
        </td>
	</tr>
</table>
';

if ($modoDeEnvio == "allin") {

$optout = '
<table width="'.$larguraPrincipal.'" align="center" border="0" cellpadding="0" cellspacing="0" style="height: 40px; background-color: '.$corFundoOptout.';">
    <tr>
        <td><center><font face="Verdana, Arial, sans-serif" size="1" style="color: '.$corFonteExterna.';">Caso não queira mais receber nossos emails, <a href="##optout##" style="color: '.$corFonteExterna.';">remova aqui.</a></font></center></td>
    </tr>
</table>
';

} else {

$optout = '
<table width="'.$larguraPrincipal.'" align="center" border="0" cellpadding="0" cellspacing="0" style="height: 40px; background-color: '.$corFundoOptout.';">
    <tr>
        <td><center><font face="Verdana, Arial, sans-serif" size="1" style="color: '.$corFonteExterna.';">Caso não queira mais receber nossos emails, <a href="'.$url.'/'.$linkAdministracao.'/optout.php?caminho='.$caminhoConfig.'&nome='.$nomeBanco.'" style="color: '.$corFonteExterna.';">remova aqui.</a></font></center></td>
    </tr>
</table>
';

}

$fim = '
</body>

</html>
';

$mensagem = $comeco;

if ($cliqueAqui == "sim") { $mensagem .= $topo; }

$mensagem .= $conteudo;
$mensagem .= $dados;

if ($redesExternas == "sim") { $mensagem .= $redes; }
if ($mostrarOptout == "sim") { $mensagem .= $optout; }

$mensagem .= $fim;

$mensagemArquivo = $comeco;
$mensagemArquivo .= $conteudo;
$mensagemArquivo .= $dados;

if ($redesExternas == "sim") { $mensagemArquivo .= $redes; }

$mensagemArquivo .= $fim;

$assunto = $titulo;

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ".$empresa." <".$emailContato.">\n";
$headers .= "Return-path: ".$emailWebmaster;

$tipo = $_GET["tipo"];

if ($tipo == "teste") {

    $sent = mail($emailTeste, $assunto, $mensagem, $headers, "-r".$emailsender);

    if (!$sent) {

        $sent = mail($emailTeste, $assunto, $mensagem, $headers);

    }

    if ($sent) {

        echo "

        <body bgcolor='".$corFundo."'>

        <br />

        <center>

            <b style='color: ".$corFonteExterna.";'>Teste enviado com sucesso!</b>

            <br /><br />

            <a style='color: ".$corFonteExterna.";' href='".$url."/".$linkAdministracao."/".$php."'><< Voltar</a>

        </center>

        <br />

        </body>

        ";

    }

} elseif ($tipo == "cliente") {

    require($caminhoConfig."config.php");

    $sql->connect();

    $quant = 1; // número de mensagens enviadas de cada vez
    $sec = 40; // tempo entre o envio de um pacote e outro (em segundos)
    $ok = 0;
    $inicio = 0;
    $fim = $inicio + $quant;

    $tabelas = mysql_list_tables($nomeBanco);

    $table = "";

    while ($tabela = mysql_fetch_array($tabelas)) {

        if ($tabela[0] == "newsletter") { $table = "newsletter"; }

    }

    if ($table != "newsletter") { $table = "clientes"; }

    $query = mysql_query("SELECT * FROM $table WHERE status_envio = '0' AND ativo = '1' LIMIT $inicio,$fim");
    $registros = mysql_num_rows($query);

    if ($registros == 0) {

        mysql_query("UPDATE $table SET status_envio = 0");

        printf("

        <body bgcolor='".$corFundo."'>

        <br />

        <center>

            <b style='color: ".$corFonteExterna.";'>Todas as mensagens foram enviadas!</b>

            <br /><br />

            <a style='color: ".$corFonteExterna.";' href='".$url."/".$linkAdministracao."/".$php."'><< Voltar</a>

        </center>

        <br />

        </body>

        ");

        $ok = 1;

    }

    while ($result = mysql_fetch_array($query)) {

        $to = $result["email"];
        $id = $result["id"];

        if (!mail($to, $assunto, $mensagem, $headers, "-r".$emailsender)) { mail($to, $assunto, $mensagem, $headers); }

        mysql_query("UPDATE $table SET status_envio = 1 WHERE id = '$id'");

        echo "

        <body bgcolor='".$corFundo."'>

        <br />

        <center>

            <b style='color: ".$corFonteExterna.";'>( $id ) mensagem para <strong>$to</strong> enviada com sucesso!</b>

        </center>

        <br />

        </body>

        ";

    }

    mysql_free_result($query);

    if (!$ok) { echo("<meta http-equiv=\"refresh\" content=\"" . $sec . "\">"); }

} elseif ($tipo == "allin") {

    echo "

    <body bgcolor='".$corFundo."'>

    <br />

    <center>

        <b style='color: ".$corFonteExterna.";'>Copiei e cole esses dados nos seus determinados campos na allin:</b>

        <br /><br />

        <a style='color: ".$corFonteExterna.";' href='".$url."/".$linkAdministracao."/".$php."'><< Voltar</a>

    </center>

    <br />

    <div style='color: ".$corFonteExterna.";'>

        <p><b style='text-decoration: underline;'>Campanha:</b> ".$titulo."</p>
        <p><b style='text-decoration: underline;'>Assunto:</b> ".$titulo."</p>
        <p><b style='text-decoration: underline;'>E-mail Remetente:</b> ".$emailContato."</p>
        <p><b style='text-decoration: underline;'>Nome Remetente:</b> ".$empresa."</p>
        <p><b style='text-decoration: underline;'>E-mail de Resposta:</b> ".$emailContato."</p>
        <p><b style='text-decoration: underline;'>Mensagem HTML:</b> ".htmlentities($mensagem)."</p>

    </div>

    </body>";

} elseif ($tipo == "criar_news") {

    echo "

    <body bgcolor='".$corFundo."'>

    <br />

    <center>";

    if (file_exists('../news/'.$arquivo.'.html')) {

    echo "
        <b style='color: ".$corFonteExterna.";'>Arquivo de news atualizado com sucesso!</b>";

    } else {

    echo "
        <b style='color: ".$corFonteExterna.";'>Arquivo de news criado com sucesso!</b>";

    }

    echo "
        <br /><br />

        <a style='color: ".$corFonteExterna.";' href='".$url."/".$linkAdministracao."/".$php."'><< Voltar</a>

    </center>

    <br />

    </body>

    ";

    $handle = fopen("../news/".$arquivo.".html", "w+");

    fwrite($handle, $mensagemArquivo);

} else {

    echo $comeco;

    if ($cliqueAqui == "sim") { echo $topo; }

    echo $conteudo;
    echo $dados;

    if ($redesExternas == "sim") { echo $redes; }
    if ($mostrarOptout == "sim") { echo $optout; }

    echo '
    <center>
    ';

    if (file_exists('../news/'.$arquivo.'.html')) {

    echo '
        <a style="color: '.$corFonteExterna.';" href="'.$url.'/'.$linkAdministracao.'/'.$php.'?tipo=criar_news">ATUALIZAR ARQUIVO</a>';

    } else {

    echo '
        <a style="color: '.$corFonteExterna.';" href="'.$url.'/'.$linkAdministracao.'/'.$php.'?tipo=criar_news">CRIAR ARQUIVO</a>';

    }

    echo '
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a style="color: '.$corFonteExterna.';" href="'.$url.'/'.$linkAdministracao.'/'.$php.'?tipo=teste">ENVIAR TESTE</a>
    ';

    if ($modoDeEnvio == 'allin') {

    echo '
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a style="color: '.$corFonteExterna.';" href="'.$url.'/'.$linkAdministracao.'/'.$php.'?tipo=allin">CRIAR NEWS ALLIN</a>
    ';

    } else {

    echo '
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a style="color: '.$corFonteExterna.';" href="'.$url.'/'.$linkAdministracao.'/'.$php.'?tipo=cliente">ENVIAR</a>
    ';

    }

    echo '
    </center>

    <br />';

    echo $fim;

}

?>