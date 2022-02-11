<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Alteração de Especialidades</title>
</head>
<body>
    <?php
        include 'menu.php';
        include 'conexao.php';
        if(isset($_GET['especialidade_id']))
        {
            $especialidade_id = $_GET['especialidade_id'];
            $query = "SELECT especialidade_id, nome FROM especialidade WHERE especialidade_id = $especialidade_id ";
            $resultado = mysqli_query($conexao,$query);
            $linha = mysqli_fetch_array($resultado);
        }
       else
       {
              header('Location: http://localhost/trabalhofinal/erro.php'); 
              exit;
       }
mysqli_close($conexao);
    ?>
    <h1>Alteração de Especialidades</h1><hr>
    <form name="Frmfoto" method="post"  action="confalt-especialidades.php" enctype="multipart/form-data">
   Nome: <input type="text" name="nome" autofocus required value="<?php echo $linha['nome']; ?>"><br><br>

   <br><br>
    

   <input type="submit" value="Alterar" title="Alterar">
   <input type="hidden" name="especialidade_id"value="<?php echo $linha['especialidade_id']; ?>">
</form>
</body>
</html>