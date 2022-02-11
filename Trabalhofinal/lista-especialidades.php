<?php

include 'conexao.php';

echo "<h1>Lista de Especialidades</h1><hr>";


$query = "SELECT especialidade_id, nome FROM especialidade ORDER BY especialidade_id DESC";

$result = mysqli_query($conexao, $query);


while($linha = mysqli_fetch_array($result))

{
     echo $linha['especialidade_id']."-".
     $linha['nome']."-". "
     <a href='alt-especialidades.php?especialidade_id=$linha[especialidade_id]'>
     Alterar
     </a>
     -<a href='exc-especialidades.php?especialidade_id=$linha[especialidade_id]'onclick=\"return confirm('Deseja realmente excluir:$linha[nome]?');\">
     Excluir</a>
     <br>";
     

}

mysqli_close($conexao);

?>