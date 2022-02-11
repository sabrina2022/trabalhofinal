<?php
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

  <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Página inicial</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cad-usuario.php">Cadastre-se</a>
  </li>
  

</ul>

      <?php 

      
    if(isset($_SESSION['logado']))
    {
    ?>
     <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="cad-medico.php">Médicos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cad-especialidades.php">Especialidades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cad-pacientes.php">Cadastro do Paciente e Agendamentos</a>
  </li>

</ul>
     
     <?php
    }
     ?>
    </ul>
    <?php 
    if(empty($_SESSION['logado']))
    {
    ?>
    <form class="d-flex" method="post" action="login.php">
  
        <input class="form-control me-2" type="text" placeholder="Login" name="login">
        <input class="form-control me-2" type="password" placeholder="Senha" name="senha">
        <button class="btn btn-primary" type="submit">Login</button>
      </form>
      <a href="recuperar.php" class="btn btn-danger" type="submit">Esqueci minha senha</a>
      <?php
    }
    else
    {
      echo "<div>
      <img src='img/$_SESSION[foto]' width='50' heigth='50' class='rounded-circle'>'Bem-vindo(a) $_SESSION[login]!<a href='logout.php' class='btn btn-danger'>Sair</a></div>";
    }

    ?>
  </div>
</nav>