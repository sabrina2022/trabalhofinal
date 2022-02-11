<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <?php
    include 'menu.php';
    ?>

    <title>Especialidades</title>
  </head>
  <body>

  <div class="container">
  <div class="row">
  <div class="col">

    <h1>Cadastro de Especialidades</h1><hr>
    <form class="row g-3" method="post" enctype="multipart/form-data">
    <div class="form-group">
  <label for="nome"> Nome da especialidade </label>
  <input type="text" class="form-control" name="nome">
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

</form>

<?php

if (isset($_POST['nome'])) {
    include 'conexao.php';
    $nome = $_POST['nome'];
    
    $query = "INSERT INTO especialidade VALUES(null,'$nome')";
    $resultado = mysqli_query($conexao, $query);
    if ($resultado) {
      echo "Cadastro realizado com sucesso";
    } else {

        echo "Erro ao realizar cadastro".mysqli_error($conexao); 
        echo"<br>"; 

     // var_dump($resultado); 
      echo"<br>";

      //var_dump($_POST);
      echo"<br>";

      //var_dump($query);
      
   

    }
    
}
include 'lista-especialidades.php';

?>
</body>
</html>

