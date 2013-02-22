<?php
//Este arquivo serve para otimizar as tabelas
connect_secondary_db();

$table = array("banners",
							 "banner_news",
							 "carrinho",
							 "categorias",
							 "clientes",
							 "comentarios",
							 "cores",
							 "embalagens",
							 "enderecos",
							 "estoque",
							 "formas_pagamento",
							 "fretes",
							 "fretes_gratuitos",
							 "fretes_localidades",
							 "fretes_regioes",
							 "fretes_regioes_localidades",
							 "news",
							 "newsletter",
							 "observacoes",
							 "pagamento_boleto",
							 "pagamento_pagseguro",
							 "parcelas_visa",
							 "pedidos",
							 "prazo_entrega",
							 "produtos",
							 "produtos_categorias",
							 "produtos_conjuntos",
							 "produtos_cores",
							 "produtos_imagens",
							 "produtos_opicionais",
							 "produtos_relacionados",
							 "produtos_subcategorias",
							 "produtos_tamanhos",
							 "produtos_voltagens",
							 "sistema",
							 "subcategorias",
							 "tamanhos",
							 "view_produtos",
							 "voltagens"
							 );

for($i=0;$i<count($table);$i++) {
	mysql_query("OPTIMIZE table $table[$i]")or die(mysql_error()."<br />");	
}

connect_db(); register_cronjob("Tabelas SQL otimizadas");connect_secondary_db();

//Caso esteja tudo OK
if(isset($redirect)) {
	if($redirect == "no") {
		return true;
	}
} else {
}

?>