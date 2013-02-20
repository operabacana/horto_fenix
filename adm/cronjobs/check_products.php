<?php
//Este arquivo serve para verificar a estocagem dos produtos e despublicar os produtos em estoque baixo para segurança

//Seleciona os produtos
$products_count=0;
$pair_count=0;
$sel=mysql_query("SELECT * FROM produtos WHERE status='1'") or die(mysql_error()."<br />");

//Seleciona sistema
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='tipo_de_visualizacao'")or die(mysql_error()."<br />");
$tipo_de_visualizacao = mysql_result($sel_config,0); 
$sel_config=mysql_query("SELECT valor FROM sistema WHERE configuracao='modulo_conjunto'")or die(mysql_error()."<br />");
$modulo_conjunto = mysql_result($sel_config,0); 

while($produto = mysql_fetch_array($sel)) {
	$id = $produto[codigo];
	//Verifica estocagem geral
	if($produto[estoque] == 0 && $produto[tipo] != conjunto){
		mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
		if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		connect_db(); register_cronjob("check_products - verificado estocagem do produto ".$id." e despublicado");  connect_secondary_db();
	}
	//Verifica se possui imagem principal
	if(($produto[imagem] == null || $produto[thumb] == null) && $modulo_conjunto == "desativado") {
		mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
		if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		connect_db(); register_cronjob("check_products - verificado imagem principal do produto ".$id." e despublicado");  connect_secondary_db();
	}
	//Verifica se o preço não está zerado
	if($produto[tipo] != "conjunto" && ($produto[valor] == "0.00" || $produto[valor] == null || $produto[valor] == "0")) {
		mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
		if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		connect_db(); register_cronjob("check_products - verificado preço do produto ".$id." e despublicado");  connect_secondary_db();
	}
	//Verifica os atributos principais
	if(($produto[tipo] != "conjunto" && ($produto[nome] == null || $produto[resumo] == null || $produto[especificacao] == null)) || ($produto[tipo] == "conjunto" && ($produto[nome] == null || $produto[resumo] == null))) {
		mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
		if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		connect_db(); register_cronjob("check_products - verificado atributos do produto ".$id." e despublicado");  connect_secondary_db();
	}
	//Verifica se existe ao menos uma categoria
	$categoria=mysql_query("SELECT * FROM produtos_categorias WHERE produto='$id'") or die(mysql_error()."<br />");
	if(mysql_num_rows($categoria) == 0) {
		mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
		if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		connect_db(); register_cronjob("check_products - verificado categorias do produto ".$id." e despublicado");  connect_secondary_db();
	}
	//Verifica se todos os produtos relacionados existem
	$relacionados=mysql_query("SELECT * FROM produtos_relacionados WHERE produto='$id'") or die(mysql_error()."<br />");
	while ($related=mysql_fetch_array($relacionados)) {
		$verifica=mysql_query("SELECT * FROM produtos WHERE codigo='$related[relacionado]'") or die(mysql_error()."<br />");
		if(mysql_num_rows($verifica) == 0) {
		mysql_query("DELETE FROM produtos_relacionados WHERE relacionado='$related[relacionado]'") or die(mysql_error()."<br />");
		connect_db(); register_cronjob("check_products - verificado relacionados do produto ".$id." e atualizado");  connect_secondary_db();
		}
	}
	//Verifica se todos os produtos dos conjuntos existem
	$conjuntos=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$id'") or die(mysql_error()."<br />");
	while ($related=mysql_fetch_array($conjuntos)) {
		$verifica=mysql_query("SELECT * FROM produtos WHERE codigo='$related[produto]'") or die(mysql_error()."<br />");
		if(mysql_num_rows($verifica) == 0) {
		mysql_query("DELETE FROM produtos_conjuntos WHERE produto='$related[produto]'") or die(mysql_error()."<br />");
		connect_db(); register_cronjob("check_products - verificado produtos filhos do conjunto ".$id." e atualizado");  connect_secondary_db();
		}
	}
	//Verifica se todos os produtos dos conjuntos possuem ao menos uma cor em comum entre si
	if($produto[tipo] == "conjunto") {
	$conjuntos=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$id'") or die(mysql_error()."<br />");
	while ($related=mysql_fetch_array($conjuntos)) {
		$codigo=$related[conjunto];
		$cont_1=1; $sel_itens=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$codigo' LIMIT 1");
		while($produtos=mysql_fetch_array($sel_itens)) {
			$sel_cores_prod=mysql_query("SELECT * FROM produtos_cores WHERE produto='$produtos[produto]'");
			while($cores=mysql_fetch_array($sel_cores_prod)) {
				$prod_cores=$prod_cores.','.$cores[cor];	 
			}
		}
		$sel_itens=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$codigo'");
		$num_produtos=mysql_num_rows($sel_itens);
		while($produtos=mysql_fetch_array($sel_itens)) {
			$cores_prod=explode(",",$prod_cores);
			while($cores_prod[$cont_1]) {
				$sel_cores=mysql_query("SELECT * FROM estoque WHERE produto='$produtos[produto]' and cor='$cores_prod[$cont_1]' and quantidade>0 ");
				$retornos=mysql_num_rows($sel_cores);
				if($retornos>0) {
					$cores_final=$cores_final.','.$cores_prod[$cont_1];
				}
				$cont_1++;
			}
			$prod_cores=$cores_final;
			$cores_final='';
			$cont_1=1;
		}
	}
		$cores_prod=explode(",",$prod_cores);
		if(!$cores_prod[1]) {
			connect_db(); register_cronjob("check_products - verificado cor em comum dos produtos filhos do conjunto ".$id." e despublicado"); connect_secondary_db();
			mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'")or die(mysql_error()."<br/ >");
			if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
		}
	}
	//Verifica se todos os produtos de conjuntos estão publicados
	$conjuntos=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$id'") or die(mysql_error()."<br />");
	while ($related=mysql_fetch_array($conjuntos)) {
		$verifica=mysql_query("SELECT * FROM produtos WHERE codigo='$related[produto]' AND status='0'") or die(mysql_error()."<br />");
		if(mysql_num_rows($verifica) != 0) {
			mysql_query("UPDATE produtos SET status='0' WHERE codigo='$id'") or die(mysql_error()."<br />");
			if($produto[tipo] == "produto") {$products_count++;} elseif($produto[tipo] == "conjunto") {$pair_count++;}
			if($related["status"] == "1") {register_cronjob("check_products - verificado se produtos filhos estão publicados do conjunto ".$id." e despublicado");}
		}
	}
	//Adiciona especificação dos produtos de um conjunto no próprio conjunto
	if($produto[tipo] == "conjunto") {
		$especificacao = "";
		$conjuntos=mysql_query("SELECT * FROM produtos_conjuntos WHERE conjunto='$id'") or die(mysql_error()."<br />");
		while($related = mysql_fetch_array($conjuntos)) {
			$select = mysql_query("SELECT * FROM produtos WHERE codigo='$related[produto]'") or die(mysql_error()."<br />");
			$pr = mysql_fetch_array($select);
			$especificacao .= "<strong>".$pr[nome]."</strong><br />";
			$especificacao .= $pr[especificacao]."<br/ >";
		}
		mysql_query("UPDATE produtos SET especificacao='$especificacao' WHERE codigo='$id'") or die(mysql_error()."<br />");
		}
}

//Caso esteja tudo OK
if(isset($redirect)) {
	if($redirect == "no") {
		$result="Foram despublicados ".$products_count." produtos e ".$pair_count." conjuntos.";
		return true;
	}
} else {
}
?>