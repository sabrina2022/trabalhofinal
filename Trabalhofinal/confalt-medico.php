<?php

include 'menu.php';

if(isset($_POST['medico_id']) &&  isset($_POST['login']) && isset($_FILES['foto']))
{   
    $medico_id = $_POST['medico_id'];
    $login = $_POST['login'];

    
    $pasta = "img/";
 $pastafoto = $pasta.basename(
$_FILES['foto']['name']);
$foto =$_FILES['foto']['name'];
$resultado = move_uploaded_file(
    $_FILES['foto']['tmp_name'], $pastafoto);
    if($resultado)
    {
        echo "Foto enviada com sucesso!";
    }
    
    if (!empty($_POST['senhanova']))
    {
        $senhanova = md5($_POST['senhanova']);
        $querysenha = ",senha='$senhanova'";
    }

    else
    {
        $querysenha = "";
    }
    include 'conexao.php';
    $query = "UPDATE medico SET login='$login',foto='$foto' $querysenha WHERE medico_id=$medico_id";
    //echo $query
    $resultado = mysqli_query($conexao,$query);
//NOW pega a data e a hora e retorna

if($resultado)
{   
    echo "A medico: $login foi alterada com sucesso!";
}
else
{  
    echo "A medico não pode ser alterada!";
    mysqli_error($conexao);

}
mysqli_close($conexao);

}
?>