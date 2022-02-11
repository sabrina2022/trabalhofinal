<?php

include 'menu.php';


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $especialidade_id = $_POST['especialidade_id'];
    include 'conexao.php';
    $query = "UPDATE especialidade SET nome='$nome' WHERE especialidade_id=$especialidade_id";
    //echo $query
    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        echo "A especialidade: $nome foi alterada com sucesso!";
    } else {
        echo "A especialidade não pode ser alterada!";
        mysqli_error($conexao);
    }
    mysqli_close($conexao);
}



   
//NOW pega a data e a hora e retorna
