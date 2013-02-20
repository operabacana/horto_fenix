<?php

function retorna_preco($uf,$rg,$peso)
{
//SELECIONA TABELA DE PAC
$sel_pac=mysql_query("SELECT * FROM fretes WHERE cidade='Nova Friburgo' AND tipo='PAC'");
$frete_pac=mysql_fetch_array($sel_pac);
$tabela_pac=$frete_pac[tabela];

//SELECIONA TABELA DE SEDEX
$sel_sedex=mysql_query("SELECT * FROM fretes WHERE cidade='Nova Friburgo' AND tipo='SEDEX'");
$frete_sedex=mysql_fetch_array($sel_sedex);
$tabela_sedex=$frete_sedex[tabela];


  if($uf=="AC"){ $uf=1;}
  if($uf=="AL"){ $uf=3;}
  if($uf=="AM"){ $uf=5;}
  if($uf=="AP"){ $uf=7;}
  if($uf=="BA"){ $uf=9;}
  if($uf=="CE"){ $uf=11;}
  if($uf=="ES"){ $uf=13;}
  if($uf=="GO"){ $uf=15;}
  if($uf=="MA"){ $uf=17;}
  if($uf=="MG"){ $uf=19;}
  if($uf=="MT"){ $uf=21;}
  if($uf=="PA"){ $uf=23;}
  if($uf=="PB"){ $uf=25;}
  if($uf=="PE"){ $uf=27;}
  if($uf=="PI"){ $uf=29;}
  if($uf=="PR"){ $uf=31;}
  if($uf=="RJ"){ $uf=33;}
  if($uf=="RN"){ $uf=35;}
  if($uf=="RO"){ $uf=37;}
  if($uf=="RR"){ $uf=39;}
  if($uf=="RS"){ $uf=41;}
  if($uf=="SC"){ $uf=43;}
  if($uf=="SE"){ $uf=45;}
  if($uf=="SP"){ $uf=47;}
  if($uf=="TO"){ $uf=49;}
  if($uf=="MS"){ $uf=50;}
  if($uf=="LOCAL"){ $uf=51;}

    $tabela_pac = explode("#",$tabela_pac);
    $tabela_pac = explode(";",$tabela_pac[$uf]);
    $tabela_pac = explode('"',$tabela_pac[$peso+1]);

    $tabela_sedex = explode("#",$tabela_sedex);
    $tabela_sedex = explode(";",$tabela_sedex[$uf]);
    $tabela_sedex = explode('"',$tabela_sedex[$peso+1]);

    return $tabela_pac[1].' / '.$tabela_sedex[1];
}



    /*if($rg==2)
    $uf--;*/

    //if($tipo=='PAC'){$uf++;}
//RG 2 = Capital
//RG 1 = Outras Cidades
?>