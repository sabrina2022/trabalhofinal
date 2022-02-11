<?php
include 'conexao.php';
$especialidade_id = $_GET['especialidade_id'];
$query = "DELETE FROM especialidade WHERE especialidade_id=$especialidade_id";
$result = mysqli_query($conexao,$query);
if($result)
{
    echo "O especialidade de codigo: $especialidade_id foi deletado ";
}

else
{
    if (mysqli_error($conexao)=="Cannot delete or update a parent row: a foreign key constraint fails (`clinica`.`medicos`, CONSTRAINT `fk_especialidade_medicos` FOREIGN KEY (`especialidade_medico`) REFERENCES `especialidade` (`especialidade_id`))") {
        echo "A especialidade não pôde ser deletada pois está relacionada a um médico.";
    } else {
        echo "Erro ao Cadastrar".mysqli_error($conexao);
    }
    
    
}
mysqli_close($conexao);

?>