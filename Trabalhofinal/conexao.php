<?php

$usuario = "root";
$senha = "isadora";
$host = "localhost";
$banco = "clinica";

$conexao = mysqli_connect($host,$usuario,$senha)
or die (mysqli_error($conexao));

mysqli_select_db($conexao, $banco);

?>