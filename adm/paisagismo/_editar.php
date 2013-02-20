<?php

include("../_includes/op_codex.php"); //Framework
connect_secondary_db();

$passo = $_POST["passo"];

if ($passo == 1) {

    $jardim = $_POST["jardim"];
    $descricao = $_POST["descricao"];
    $problema = $_POST["problema"];
    $solucao = $_POST["solucao"];
    $status = $_POST["status"];
    $fotoGrande = $_FILES["fotoGrande"];
    $fotoPequena = $_FILES["fotoPequena"];

    if ($jardim == null) { header("location:cadastrar.php?error=new"); exit(); }
    if ($fotoGrande["name"] == null || $fotoPequena["name"] == null) { header("location:cadastrar.php?error=new_foto"); exit(); }

    mysql_query("INSERT INTO paisagismo (jardim, descricao, problema, solucao, status) VALUES ('$jardim', '$descricao', '$problema', '$solucao', '$status')");

    $id = mysql_insert_id();

    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoGrande["name"], $ext1);
    $a1 = $fotoGrande['tmp_name'];
    $ext1 = $ext1[1];
    $b1 = "foto_paisagismo_G_(".$id.").".$ext1;
    move_uploaded_file($a1,"../../fotos_paisagismo/G/".$b1);

    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoPequena["name"], $ext2);
    $a2 = $fotoPequena['tmp_name'];
    $ext2 = $ext2[1];
    $b2 = "foto_paisagismo_P_(".$id.").".$ext2;
    move_uploaded_file($a2,"../../fotos_paisagismo/P/".$b2);

    mysql_query("UPDATE paisagismo SET foto_grande = '$b1', foto_pequena = '$b2' WHERE id = '$id'");

    header("location:cadastrar.php?success=new&passo=$passo&id=$id"); exit();

} elseif ($passo == 2) {

    $idResult = $_POST["idResult"];
    $jardim = $_POST["jardim"];
    $descricao = $_POST["descricao"];
    $problema = $_POST["problema"];
    $solucao = $_POST["solucao"];
    $status = $_POST["status"];
    $fotoGrande = $_FILES["fotoGrande"];
    $fotoPequena = $_FILES["fotoPequena"];

    $sql = "";

    if ($descricao != "") { $sql .= ", descricao = '$descricao'"; }
    if ($problema != "") { $sql .= ", problema = '$problema'"; }
    if ($solucao != "") { $sql .= ", solucao = '$solucao'"; }

    if ($jardim == null) { header("location:cadastrar.php?error=new&passo=1&id=$idResult"); exit(); }

    if ($fotoGrande["name"] != null || $fotoPequena["name"] != null) {

        $ftp_conexao1 = ftp_open("/".$global_dir."/imagens_fotos/G");

        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoGrande["name"], $ext1);
        $a1 = $fotoGrande['tmp_name'];
        $ext1 = $ext1[1];
        $b1 = "foto_paisagismo_G_(".$idResult.").".$ext1;
        move_uploaded_file($a1,"../../fotos_paisagismo/G/".$b1);

        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoPequena["name"], $ext2);
        $a2 = $fotoPequena['tmp_name'];
        $ext2 = $ext2[1];
        $b2 = "foto_paisagismo_P_(".$idResult.").".$ext2;
        move_uploaded_file($a2,"../../fotos_paisagismo/P/".$b2);

        $sql .= ", foto_grande = '$b1', foto_pequena = '$b2'";

    }

    mysql_query("UPDATE paisagismo SET jardim = '$jardim', status = '$status' $sql WHERE id = '$idResult'");

    header("location:cadastrar.php?success=update&passo=1&id=$idResult"); exit();

}

?>