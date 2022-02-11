<?php

include 'conexao.php';

echo "<h1>Lista de Médicos</h1><hr>";


$query = "SELECT medico_id, nome FROM medicos ORDER BY medico_id DESC";

$result = mysqli_query($conexao, $query);


while($linha = mysqli_fetch_array($result))

{
     echo $linha['medico_id']."-".
     $linha['nome']."-". "
     <a href='alt-medico.php?medico_id=$linha[medico_id]'>
     Alterar
     </a>
     -<a href='exc-medico.php?medico_id=$linha[medico_id]'onclick=\"return confirm('Deseja realmente excluir:$linha[nome]?');\">
     Excluir</a>
     <br>";
     

}

mysqli_close($conexao);

?>