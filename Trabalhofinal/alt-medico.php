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
    <title>Alteração de Médicos</title>
</head>
<body>
    <?php
        include 'menu.php';
        include 'conexao.php';
        if(isset($_GET['medico_id']))
        {
            $medico_id = $_GET['medico_id'];
            $query = "SELECT medico_id, especialidade_medico, nome, cpf, crm, rua, numero, bairro, cidade, estado, cep, email, foto FROM medico WHERE medico_id = $medico_id ";
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

    <h1>Alteração de Médicos</h1><hr>


    <form name="Frmfoto" method="post"  action="confalt-medico.php" enctype="multipart/form-data">

   Especialidade: <input type="text" name="especialidade_medico" autofocus required value="<?php echo $linha['especialidade_medico']; ?>"><br><br>
   Nome: <input type="text" name="nome" autofocus required value="<?php echo $linha['nome']; ?>"><br><br>
   CPF: <input type="number" name="cpf" autofocus required value="<?php echo $linha['cpf']; ?>"><br><br>
   CRM: <input type="number" name="crm" autofocus required value="<?php echo $linha['crm']; ?>"><br><br>
   Rua: <input type="text" name="rua" autofocus required value="<?php echo $linha['rua']; ?>"><br><br>
   Numero: <input type="number" name="numero" autofocus required value="<?php echo $linha['numero']; ?>"><br><br>
   Bairro: <input type="text" name="bairro" autofocus required value="<?php echo $linha['bairro']; ?>"><br><br>
   Cidade: <input type="text" name="cidade" autofocus required value="<?php echo $linha['cidade']; ?>"><br><br>
   Estado: <input type="estado" name="estado" autofocus required value="<?php echo $linha['estado']; ?>"><br><br>
   CEP: <input type="number" name="cep" autofocus required value="<?php echo $linha['cep']; ?>"><br><br>
   Email: <input type="text" name="email" autofocus required value="<?php echo $linha['email']; ?>"><br><br>
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
   <input type="hidden" name="medico_id"value="<?php echo $linha['medico_id']; ?>">
</form>
</body>
</html>