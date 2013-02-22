<?php
//Este arquivo serve para atualizar o arquivo sitemap.xml

//Seleciona os produtos
$sel=mysql_query("SELECT * FROM produtos WHERE status='1' ORDER BY codigo DESC") or die(mysql_error()."<br />");
$cc=mysql_query("SELECT * FROM categorias") or die(mysql_error()."<br />");
$url = substr($global_url,0,-4);
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_opcional'")or die(mysql_error()."<br />");
$modulo_opcional = mysql_result($sel_config,0);
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_conjunto'")or die(mysql_error()."<br />");
$modulo_conjunto = mysql_result($sel_config,0);
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='tipo_de_visualizacao'")or die(mysql_error()."<br />");
$tipo_de_visualizacao = mysql_result($sel_config,0);
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='exibir_opcionais'")or die(mysql_error()."<br />");
$exibir_opcionais = mysql_result($sel_config,0);

//Abre arquivo para escrita
$open=fopen("../../feed.xml","w+");

//Escreve cabeçalho
fwrite($open, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
	<rss version=\"2.0\"
		xmlns:content=\"http://purl.org/rss/1.0/modules/content/\"
		xmlns:wfw=\"http://wellformedweb.org/CommentAPI/\"
		xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
		xmlns:atom=\"http://www.w3.org/2005/Atom\"
		xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\"
	>
	<channel>
	<title><![CDATA[ Beautiful Lingerie ]]></title>
	<link>".$url."</link>
	<description><![CDATA[A loja virtual de lingerie mais completa do Brasil. Conheça a Beautiful Lingerie]]></description>
	<pubDate>".date("D, d M Y H:i:s O")."</pubDate>
	<language>pt-br</language>
	<dc:creator>Ópera Propaganda (http://www.operabacana.com.br)</dc:creator>
	<dc:rights>Copyright ".date("Y")."</dc:rights>
	");

while ($produto = mysql_fetch_array($sel)) {

// -------------------------------------------------------------------
$sel_nome_cat=mysql_query("SELECT * FROM categorias WHERE id='$produtos_categoria[categoria]' ");
while($cat_prod=mysql_fetch_array($sel_nome_cat)) {$nome_cat=$cat_prod['nome'];}
if(mysql_num_rows($sel_nome_cat)==0)
{ $nome_cat='sem-categoria'; }

$tipo = $produto[tipo];

$diz_cat=strtolower($nome_cat);
$diz_cat=str_replace(" ","-",$diz_cat);
$diz_cat=htmlentities($diz_cat);

$diz_nome=$produto['nome'];
$diz_nome=strtolower($diz_nome);
$diz_nome=str_replace(" ","-",$diz_nome);
$diz_nome=str_replace("---","-",$diz_nome);
$diz_nome=str_replace("--","-",$diz_nome);
$diz_nome=htmlspecialchars($diz_nome);
$diz_nome=$diz_nome;

$diz=$diz_cat."/".replace_utf_chars(str_replace("/","-",$diz_nome));

if($produto[valor2] < $produto[valor] && $produto[valor2] != "0.00") {$valor = number_format($produto[valor2],2,",",".");} else {$valor = number_format($produto[valor],2,",",".");}
// -------------------------------------------------------------------
	
	
//Caso seja conjuntos
	if(($tipo == "conjunto" || $tipo == "produto-conjunto") && ($tipo_de_visualizacao == "conjuntos" || $tipo_de_visualizacao == "conjuntos+produtos")) {
fwrite($open, "
	<item>
		<title><![CDATA[".html_entity_decode($produto[nome])."]]></title>
		<link>".$url."/produto-".$produto[0]."/".$diz."</link>
		<category>".$nome_cat."</category>
		<description>
			<![CDATA[
			<a href=\"".$url."/produto-".$produto[0]."/".$diz."\" title=\"".$produto[nome]."\"><img src=\"".$url."/produtos/imagens/".$produto[codigo]."/".$produto[thumb]."\" alt=\"".$produto[nome]."\" style=\"width:200px;\" /></a><br />
			<br /><br />				 
			<strong>Descri&ccedil;&atilde;o:</strong> <br />".$produto[resumo]."
			<br /><br />
			<strong>Especifica&ccedil;&atilde;o:</strong> <br />".$produto[especificacao]."
			<br /><br />
			<strong>Valor:</strong> R$: ".$valor."
			]]>
		</description>
	</item> \n"
	);
}

	//Caso seja produtos
	if(($tipo == "produto" || tipo == "produto-conjunto") && ($tipo_de_visualizacao == "produtos" || $tipo_de_visualizacao == "conjuntos+produtos")) {
fwrite($open, "
	<item>
		<title><![CDATA[".html_entity_decode($produto[nome])."]]></title>
		<link>".$url."/produto-".$produto[0]."/".$diz."</link>
		<category>".$nome_cat."</category>
		<description>
			<![CDATA[
			<a href=\"".$url."/produto-".$produto[0]."/".$diz."\" title=\"".$produto[nome]."\"><img src=\"".$url."/produtos/imagens/".$produto[codigo]."/".$produto[thumb]."\" alt=\"".$produto[nome]."\" style=\"width:200px;\" /></a><br />
			<br /><br />				 
			<strong>Descri&ccedil;&atilde;o:</strong> <br />".$produto[resumo]."
			<br /><br />
			<strong>Especifica&ccedil;&atilde;o:</strong> <br />".$produto[especificacao]."
			<br /><br />
			<strong>Valor:</strong> R$: ".$valor."
			]]>
		</description>
	</item> \n"
	);
}

	//Caso seja opicionais
	if($tipo == "opcional" && ($exibir_opcionais == "ativado")) {
fwrite($open, "
	<item>
		<title><![CDATA[".html_entity_decode($produto[nome])."]]></title>
		<link>".$url."/produto-".$produto[0]."/".$diz."</link>
		<category>".$nome_cat."</category>
		<description>
			<![CDATA[
			<a href=\"".$url."/produto-".$produto[0]."/".$diz."\" title=\"".$produto[nome]."\"><img src=\"".$url."/produtos/imagens/".$produto[codigo]."/".$produto[thumb]."\" alt=\"".$produto[nome]."\" style=\"width:200px;\" /></a><br />
			<br /><br />				 
			<strong>Descri&ccedil;&atilde;o:</strong> <br />".$produto[resumo]."
			<br /><br />
			<strong>Especifica&ccedil;&atilde;o:</strong> <br />".$produto[especificacao]."
			<br /><br />
			<strong>Valor:</strong> R$: ".$valor."
			]]>
		</description>
	</item> \n"
	);
}

}

//Fecha arquivo
fwrite($open,"
	</channel>
</rss>");
fclose($open);

//Caso esteja tudo OK
register_cronjob("update_feeds - feed.xml atualizado");
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
	
}
?>