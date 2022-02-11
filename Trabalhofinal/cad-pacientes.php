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
<h1>Cadastro do Paciente</h1>


<form method="post" enctype="multipart/form-data"> 
<div class="form-group">
  <label for="nome"> Nome completo </label>
  <input type="text" class="form-control" name="nome">
</div>

<div class="col-md-6">
    <label for="inputCity" class="form-label">CPF</label>
    <input type="text" class="form-control" id="inputCity" placeholder="___ ___ ___ - __" name="cpf">
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
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="nome@example.com">
</div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Foto</label>
  <input class="form-control" type="file" id="formFile" name="foto">
</div>

<h1>Agendamento da consulta</h1>
<div class="col-md-4">
<div class="form-group">
  <label for="nome">Médico </label>
  <select name="medico">
       <option value="" selected>Selecione o médico</option>
    <?php
          include 'conexao.php';
          $query = "SELECT medico_id, nome FROM medicos";
          $resultado = mysqli_query($conexao,$query);
          while($linha = mysqli_fetch_array($resultado))
          {
              echo "<option value='$linha[medico_id]'>
              $linha[nome]</option>";
          }

    ?>
    </select><br><br>
        </div>
    
    <div class="form-group">
      <div class="col-md-4">
  <label for="nome">Data de horário</label>
  <select name="horario_consulta">
       <option value="" selected>Selecione o horário</option>
    <?php
          include 'conexao.php';
          $query = "SELECT horario_consulta FROM pacientes";
          $resultado = mysqli_query($conexao,$query);
          while($linha = mysqli_fetch_array($resultado))
          {
              echo "<option value='$linha[medico_id]'>
              $linha[nome]</option>";
          }

    ?>
    </select><br><br>
        </div>


  <div class="col-12">
    <button type="submit" class="btn btn-primary">Agendar consulta</button>
  </div>

  <?php


if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['cidade']) && isset($_POST['rua']) && isset($_POST['complemento'])&& isset($_POST['numero'])&& isset($_POST['estado'])&& isset($_POST['cep'])&& isset($_POST['email'])&& isset($_FILES['foto']) && isset($_POST['medico']) && isset($_POST['horario_consulta'])) {
    include 'conexao.php';
    $resultado2 = move_uploaded_file($_FILES['foto']['tmp_name'], $pastafoto);

    $pasta = "img/";
    $pastafoto = $pasta . basename($_FILES['foto']['name']);
    $foto = $_FILES['foto']['name'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $complemento = $_POST['complemento'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $medico = $_POST['medico'];
    $horario_consulta = $_POST['horario_consulta'];



    if ($resultado2) {
        echo "Foto enviada com sucesso!<br>";
    }
    else
    { echo "erro ao enviar foto";
    }

    if ($resultado) {
        echo "Consulta agendada com sucesso";
    }else {
        echo "Erro ao agendar consulta." . mysqli_error($conexao);
    } 


} 


?>


</form>
</div>
</div>
</div>



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