<?php

include("../_includes/op_codex.php"); //Framework
connect_secondary_db();

$passo = $_POST["passo"];

if ($passo == 1) {

    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $tipo = $_POST["tipo"];

    if ($nome == null) { header("location:cadastrar.php?error=new"); exit(); }

    mysql_query("INSERT INTO vasos (nome,tipo,status) VALUES ('$nome','$tipo','$status')");
    $id = mysql_insert_id();

    header("location:cadastrar.php?success=new&passo=$passo&id=$id"); exit();

} elseif ($passo == 2) {

    $idResult = $_POST["idResult"];
    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $tipo = $_POST["tipo"];

    $sql = "";

    if ($nome == null) { header("location:cadastrar.php?error=new&passo=1&id=$idResult"); exit(); }

    mysql_query("UPDATE vasos SET nome = '$nome', tipo = '$tipo' ,status = '$status' WHERE id = '$idResult'");

    header("location:cadastrar.php?success=update&passo=1&id=$idResult"); exit();

}

?>