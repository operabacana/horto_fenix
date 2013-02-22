<?php

include("../_includes/op_codex.php"); //Framework
connect_secondary_db();

$passo = $_POST["passo"];

if ($passo == 1) {

    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $tipo = $_POST["tipo"];

    if ($nome == null) { header("location:cadastrar.php?error=new"); exit(); }

    mysql_query("INSERT INTO plantas (nome,status) VALUES ('$nome', '$status')");
    $id = mysql_insert_id();

    for( $i=0 ; $i < count($tipo) ; $i++){

        $id_tipo = $tipo[$i];
        mysql_query("INSERT INTO plantas_tipo_plantas SET id_plantas='$id', id_tipo='$id_tipo'");

    }


    header("location:cadastrar.php?success=new&passo=$passo&id=$id"); exit();

} elseif ($passo == 2) {

    $idResult = $_POST["idResult"];
    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $tipo = $_POST["tipo"];

    $sql = "";

    if ($nome == null) { header("location:cadastrar.php?error=new&passo=1&id=$idResult"); exit(); }

    mysql_query("UPDATE plantas SET nome = '$nome', status = '$status' WHERE id = '$idResult'");
    mysql_query("DELETE FROM plantas_tipo_plantas WHERE id_plantas='$idResult'");

    for( $i=0 ; $i < count($tipo) ; $i++){

        $id_tipo = $tipo[$i];
        mysql_query("INSERT INTO plantas_tipo_plantas SET id_plantas='$idResult', id_tipo='$id_tipo'");

    }

    header("location:cadastrar.php?success=update&passo=1&id=$idResult"); exit();

}

?>