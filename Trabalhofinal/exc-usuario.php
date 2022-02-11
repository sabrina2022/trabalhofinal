<?php
include 'conexao.php';
$usuario_id = $_GET['usuario_id'];
$query = "DELETE FROM usuario WHERE usuario_id=$usuario_id";
$result = mysqli_query($conexao,$query);
if($result)
{
    echo "O usuario de codigo: $usuario_id foi deletado ";
}

else
{
    echo "O usuario não pôde ser deletado".mysqli_error($conexao);
}
mysqli_close($conexao);

?>