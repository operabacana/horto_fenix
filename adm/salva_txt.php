<?php /*
include("_includes/op_codex.php"); //Framework

connect_secondary_db(); //Seleciona BD diferente do padrão

$arquivo = 'plantas.txt';
$fp = fopen($arquivo,'r');

$sel_plantas = mysql_query('SELECT * FROM plantas');

//lemos o arquivo
$texto = fread($fp, filesize($arquivo));

$i=0;
$texto=explode("\n",$texto);
$id="";

while($texto[$i]){

 while($plantas = mysql_fetch_assoc($sel_plantas)){


    if( $texto[$i] == $plantas["nome"] ){

           $id = $plantas["id"];

    }

 }

 if($id == ""){

    mysql_query("INSERT INTO plantas (nome,status) VALUES ('$texto[$i]','1')");
    $id = mysql_insert_id();

 }

 mysql_query("INSERT INTO plantas_tipo_plantas (id_plantas, id_tipo) VALUES ('$id', '5')");

 $id="";
 $i++;

}
*/
?>