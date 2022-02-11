<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <?php
    include 'menu.php';
    ?>


    <title>Home</title>
  </head>
  <body>

  <div class="container">
  <div class="row">
  <div class="col">
<h1>Cadastro</h1>

<form method="post" enctype="multipart/form-data"> 
<div class="form-group">
  <label for="nome"> Nome completo </label>
  <input type="text" class="form-control" name="nome">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="nome@example.com">
</div>
<div class="col-md-6">
    <label for="inputCity" class="form-label">Login</label>
    <input type="text" class="form-control" id="inputCity" name="login">
  </div>

<br>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Password</label><br>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="senha">
  </div>
  <div class="col-auto">
    <span id="passwordHelpInline" class="form-text">
      Must be 8-20 characters long.
    </span>
  </div>
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Foto</label>
  <input class="form-control" type="file" id="formFile" name="foto">
</div>
<div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>
</div>
</div>

<?php

if (isset($_POST['login']) && isset($_POST['senha']) && isset($_FILES['foto']) && isset($_POST['email']) && isset($_POST['nome'])) {
    include 'conexao.php';

    $pasta = "img/";
    $pastafoto = $pasta . basename($_FILES['foto']['name']);
    $foto = $_FILES['foto']['name'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];

    
        if (($_FILES['foto']['type'] == "image/png" || $_FILES['foto']['type'] == "image/jpg" || $_FILES['foto']['type'] == "image/jpeg") && ($_FILES['foto']['size'] <= 1048576)) {
            $resultado2 = move_uploaded_file($_FILES['foto']['tmp_name'], $pastafoto);
            //var_dump($_FILES);
            if ($resultado2) {
                echo "Foto enviada com sucesso!<br>";
            }
            
            $login = $_POST['login'];
            $senhalogin = md5($_POST['senha']);
            include 'conexao.php';
            
            
            $query = "INSERT INTO usuario VALUES(null,'$nome','$login','$senhalogin', '$email', '$foto')";
            $resultado = mysqli_query($conexao, $query);
        
            if ($resultado) {
                echo "Usuário(a) cadastrado(a) com sucesso!";
            }else {
                echo "Erro ao cadastrar usuário(a)" . mysqli_error($conexao);
            } 
        }else{
           echo "o formato do arquivo não é .png ou .jpg e o tamanho é maior que 1mb";
        } 
}
if (!empty($_SESSION['logado'])) {
    include 'lista-usuario.php';
}
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>