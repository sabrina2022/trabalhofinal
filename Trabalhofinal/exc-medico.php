<?php
include 'conexao.php';
$medico_id = $_GET['medico_id'];
$query = "DELETE FROM medicos WHERE medico_id=$medico_id";
$result = mysqli_query($conexao,$query);
if($result)
{
    echo "O medico de codigo: $medico_id foi deletado ";
}

else
{
    echo "O medico não pôde ser deletado".mysqli_error($conexao);
}
mysqli_close($conexao);

?>