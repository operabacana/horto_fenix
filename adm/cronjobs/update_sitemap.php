<?php
//Este arquivo serve para atualizar o arquivo sitemap.xml

//Seleciona os produtos
connect_secondary_db();
$sel=mysql_query("SELECT * FROM produtos WHERE status='1'") or die(mysql_error()."<br />");
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
$open=fopen("../../sitemap.xml","w+");

fwrite($open,"<?xml version=\"1.0\" encoding=\"UTF-8\"?> 
<?xml-stylesheet type=\"text/xsl\" href=\"".$url."/css/sitemap.xsl\"?>
	<urlset
		xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" 
		xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" 
		xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
	<url>
		<loc>".$url."/</loc>
		<priority>1.0</priority>
		<changefreq>daily</changefreq>
		<lastmod>".date("Y-m-d")."</lastmod>
	</url>
	<url>
		<loc>".$url."/atendimento/</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/como-comprar</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/produtos</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/encontrando-um-produto</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/trocas-e-devolucoes</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/reembolso</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/formas-de-pagamento</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/cartao-de-credito</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/pagseguro</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/entrega</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/prazo-de-entrega-expirado</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/entrega-em-outro-endereco</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/frete</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/por-que-me-cadastrar</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/como-me-cadastrar</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/alterar-minha-senha</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/esqueci-minha-senha</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/acompanhe-seu-pedido</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/erros-ao-finalizar-pedido</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/meu-pedido-nao-chegou</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/atendimento/cancelamento-de-pedido</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/fale-conosco</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/compra-segura</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/seguranca-e-privacidade</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/politica-de-troca-e-devolucao</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/institucional/condicoes-de-uso</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/carrinho/</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
	<url>
		<loc>".$url."/busca/</loc>
		<priority>0.2</priority>
		<changefreq>yearly</changefreq>
	</url>
");


// ################################################Categorias
while($c = mysql_fetch_array($cc)) {
	$name=strtolower($c[nome]);
	$name=str_replace(" ","-",$name);
	$name=htmlspecialchars($name);
	$name=replace_utf_chars(str_replace("/","-",$name));
	
	fwrite($open,"	<url>
		<loc>".$url."/categorias/(".$c[id].")".$name."</loc>
		<priority>0.60</priority>
		<changefreq>weekly</changefreq>
		<lastmod>".date("Y-m-d")."</lastmod>
	</url>
	");
}

// ################################################Produtos
while($produto=mysql_fetch_array($sel)) {
	$seleciona=mysql_query("select * from produtos_categorias where produto='$produto[codigo]'");
	$produtos_categoria=mysql_fetch_array($seleciona);

	// -------------------------------------------------------------------
	$sel_nome_cat=mysql_query("SELECT * FROM categorias WHERE id='$produtos_categoria[categoria]' ");
	while($cat_prod=mysql_fetch_array($sel_nome_cat)) {$nome_cat=$cat_prod['nome'];}
	if(mysql_num_rows($sel_nome_cat)==0) { $nome_cat='sem-categoria'; }
	
	$tipo = $produto[tipo];

	$diz_cat=strtolower($nome_cat);
	$diz_cat=str_replace(" ","-",$diz_cat);

	$diz_nome=$produto['nome'];
	$diz_nome=strtolower($diz_nome);
	$diz_nome=str_replace(" ","-",$diz_nome);
	$diz_nome=str_replace("---","-",$diz_nome);
	$diz_nome=str_replace("--","-",$diz_nome);
	$diz_nome=htmlspecialchars($diz_nome);

	$diz=$diz_cat."/".replace_utf_chars(str_replace("/","-",$diz_nome));
	// -------------------------------------------------------------------

	
	//Caso seja conjuntos
	if(($tipo == "conjunto" || $tipo == "produto-conjunto") && ($tipo_de_visualizacao == "conjuntos" || $tipo_de_visualizacao == "conjuntos+produtos")) {
		fwrite($open,"	<url>
			<loc>".$url."/produto-".$produto[0]."/".$diz."</loc>
			<priority>0.50</priority>
			 <changefreq>monthly</changefreq>
			 <lastmod>".date("Y-m-d")."</lastmod>
		</url>
		");
	}
	//Caso seja produtos
	if(($tipo == "produto" || tipo == "produto-conjunto") && ($tipo_de_visualizacao == "produtos" || $tipo_de_visualizacao == "conjuntos+produtos")) {
		fwrite($open,"	<url>
			<loc>".$url."/produto-".$produto[0]."/".$diz."</loc>
			<priority>0.50</priority>
			 <changefreq>monthly</changefreq>
			 <lastmod>".date("Y-m-d")."</lastmod>
		</url>
		");
	}
	//Caso seja opicionais
	if($tipo == "opcional" && ($exibir_opcionais == "ativado")) {
		fwrite($open,"	<url>
			<loc>".$url."/produto-".$produto[0]."/".$diz."</loc>
			<priority>0.50</priority>
			 <changefreq>monthly</changefreq>
			 <lastmod>".date("Y-m-d")."</lastmod>
		</url>
		");
	}
} 

//Fecha arquivo
fwrite($open,"</urlset>");
fclose($open);

//Caso esteja tudo OK
connect_db(); register_cronjob("update_sitemap - sitemap.xml atualizado"); connect_secondary_db();
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
	
}
?>