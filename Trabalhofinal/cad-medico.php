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

    <title>Home</title>
  </head>
  <body>

  <div class="container">
  <div class="row">
  <div class="col">

    <h1>Cadastro de Médicos</h1><hr>
    <form class="row g-3" method="post" enctype="multipart/form-data">
    <div class="form-group">
  <label for="nome"> Nome completo </label>
  <input type="text" class="form-control" name="nome">
</div>
<div class="form-group">
  <label for="nome">Especialidade </label>
  <select name="especialidade">
       <option value="" selected>Selecione uma especialidade</option>
    <?php
          include 'conexao.php';
          $query = "SELECT especialidade_id, nome FROM especialidade";
          $resultado = mysqli_query($conexao,$query);
          while($linha = mysqli_fetch_array($resultado))
          {
              echo "<option value='$linha[especialidade_id]'>
              $linha[nome]</option>";
          }

    ?>
    </select><br><br>
</div>


<div class="col-md-6">
    <label for="inputCity" class="form-label">Email</label>
    <input type="text" class="form-control" id="inputCity" placeholder= "nome@gmail.com" name="email">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">CPF</label>
    <input type="text" class="form-control" id="inputCity" placeholder="___ ___ ___ - __" name="cpf">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">CRM</label>
    <input type="text" class="form-control" id="inputCity" placeholder="___ ___ ___ - __" name="crm">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="inputCity" name="cidade" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Rua</label>
    <input type="text" class="form-control" id="inputCity" name="rua" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="inputCity" name="bairro" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Número</label>
    <input type="text" class="form-control" id="inputCity" name="numero" >
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="inputCity" placeholder="Apartamento, casa, estúdio" name="complemento">
  </div>
  

  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Estado</label>
    <select id="inputState" class="form-select" name="estado">
      <option selected>Choose...</option>
      
    
      		
      <option>Alagoas</option>		
      <option>Amapá		</option>
      <option>Amazonas		</option>
      <option>Bahia		</option>
      <option>Ceará		</option>
      <option>Espírito Santo	</option>	
      <option>Goiás	</option>
<option>Maranhão		</option>
<option>Mato Grosso		</option>
<option>Mato Grosso do Sul		</option>
<option>Minas Gerais		</option>
<option>Pará		</option>
<option>Paraíba		</option>
<option>Paraná		</option>
<option>Pernambuco		</option>
<option>Piauí		</option>
<option>Rio de Janeiro	</option>	  
<option>Rio Grande do Norte		</option>
<option>Rio Grande do Sul		 </option>
<option>Rondônia		 </option>
<option>Roraima		 </option>
<option>Santa Catarina		</option>
<option>São Paulo		 </option>
<option>Sergipe		</option>
<option>Tocantins		</option>
      
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">CEP</label>
    <input type="text" class="form-control" id="inputZip" name="cep">
  </div><br>

  <div class="mb-3">
  <label for="formFile" class="form-label">Foto</label>
  <input class="form-control" type="file" id="formFile" name="foto">
</div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

<?php

if (isset($_POST['nome']) && isset($_POST['especialidade']) && isset($_POST['cpf']) && isset($_POST['crm']) && isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['complemento']) 
&& isset($_POST['bairro'])&& isset($_POST['cidade'])&& isset($_POST['estado'])&& isset($_POST['cep'])&& isset($_POST['email'])&& isset($_FILES['foto'])) {
    include 'conexao.php';


    $pasta = "img/";
    $pastafoto = $pasta . basename($_FILES['foto']['name']);
    $foto = $_FILES['foto']['name'];
    $resultado2 = move_uploaded_file($_FILES['foto']['tmp_name'], $pastafoto);
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $crm = $_POST['crm'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $email = $_POST['email'];
    $especialidade = $_POST['especialidade'];
    
    $query = "INSERT INTO medicos VALUES(null,'$especialidade','$nome','$cpf','$crm','$rua','$numero','$complemento', '$bairro', '$cidade', '$estado', '$cep', '$email','$foto')";
    $resultado = mysqli_query($conexao, $query);
    if ($resultado) {
      echo "Cadastro realizado com sucesso";
    } else {

      echo "Erro ao cadastrar";
      //var_dump($resultado);
      //var_dump($_POST);
      //var_dump($query);
      //var_dump();
      //$erro = mysqli_error($conexao);
      //echo "$erro";
    }
    
}
include 'lista-medico.php';

?>
</body>
</html>

