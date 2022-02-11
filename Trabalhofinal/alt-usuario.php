<!DOCTYPE html>
<html lang="pt-br">
<head>

 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Alteração de Usuário</title>
</head>
<body>
    <?php
        include 'menu.php';
        include 'conexao.php';
        if(isset($_GET['usuario_id']))
        {
            $usuario_id = $_GET['usuario_id'];
            $query = "SELECT usuario_id,login, senha, foto FROM usuario WHERE usuario_id = $usuario_id ";
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
    <h1>Alteração de Usuário</h1><hr>
    <form name="Frmfoto" method="post"  action="confalt-usuario.php" enctype="multipart/form-data">
   Login: <input type="text" name="login" autofocus required value="<?php echo $linha['login']; ?>"><br><br>
   Senha: <input type="password" name="senha" autofocus required value="<?php echo $linha['senha']; ?>" readonly disabled><br><br>
   Senha Nova: <input type="password" name="senhanova"><br><br>
   Foto: <input type="file" name="foto" autofocus required value="<?php echo $linha['foto']; ?>">
   <br><br>
    
   <?php
      echo "<div>
      <a href='img/$_SESSION[foto]' target='_blank'>
      <img src='img/$_SESSION[foto]' 
      width='50' heigth='50' classe='rouded-circle' title= '$_SESSION[login]'> 
      </a><br>";

    ?>
   <input type="submit" value="Alterar" title="Alterar">
   <input type="hidden" name="usuario_id"value="<?php echo $linha['usuario_id']; ?>">
</form>
</body>
</html>