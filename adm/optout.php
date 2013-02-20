<?php

echo '

<html>

<head>
<title>Remover e-mail</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#C9C9C9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

    <center style="background: #fff; width: 500px; height: 100px; margin: 20px auto auto; padding-top: 1px;">

';

$caminho = $_GET["caminho"];
$banco = $_GET["nome"];

if ($_POST["email"] != "") {

    $caminho = $_POST["caminho"];
    $banco = $_POST["banco"];

    require($caminho."config.php");

    $sql->connect();

    $tabelas = mysql_list_tables($banco);

    $table = "";

    while ($tabela = mysql_fetch_array($tabelas)) {

        if ($tabela[0] == "newsletter") { $table = "newsletter"; }

    }

    if ($table != "newsletter") { $table = "clientes"; }

    $email = $_POST["email"];

    mysql_query("UPDATE $table SET ativo = '0' WHERE email = '$email'");

    echo '

    <p>Seu e-mail foi removido com sucesso!</p>

    ';

} else {

echo '

    <p>Por favor digite seu e-mail para confirmar:</p>

    <form action="optout.php" name="removerEmail" method="post">

        <input type="hidden" name="caminho" value="'.$caminho.'" />
        <input type="hidden" name="banco" value="'.$banco.'" />
        <input type="text" name="email" title="e-mail" />
        <input type="submit" name="confirmaEmail" title="Remover" value="Remover" />

    </form>

';

}

echo '

    </center>

</body>

</html>

';

?>