<?php

include("../_includes/op_codex.php"); //Framework        
connect_secondary_db();

$id = $_GET["id"];

mysql_query("DELETE FROM moveis WHERE id = '$id'");

header("location:todos.php?success=delete"); exit();


?>