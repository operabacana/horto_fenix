<?php

include("../_includes/op_codex.php"); //Framework        
connect_secondary_db();

$id = $_GET["id"];

mysql_query("DELETE FROM plantas WHERE id = '$id'");
mysql_query("DELETE FROM plantas_tipo_plantas WHERE id_planta = '$id'");

header("location:todos.php?success=delete"); exit();


?>