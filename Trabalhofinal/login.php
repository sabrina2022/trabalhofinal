<?php
//a função abaixo cria uma sessão
// e disponibiliza as variáveis temporárias
//para serem utilizadas
session_start();
$login = $_POST['login'];
//md5 gera um hash criptografado da senha
$senhalogin = md5($_POST['senha']);
include 'conexao.php';
$query = "SELECT login,senha,foto FROM usuario WHERE login='$login' and senha='$senhalogin' ";
//executando a query anterior
$resultado = mysqli_query($conexao,$query);
//retorna a quantidade de linhas da consulta
$quantidade = mysqli_num_rows($resultado);
$linha = mysqli_fetch_array($resultado);




$_POST['login'] = preg_replace('/[^[:alpha:]_]/', '',$_POST['login']);
/*
$login = "Um teste de or '1='1;";
$resultado = preg_replace('/[^[:alpha:]_]/', '',$login);
echo $resultado;

$senha = "Um teste de or '1='1;";
$resultado = preg_replace('/[^[:alnum:]_]/', '',$senha);
echo $resultado;*/

if($quantidade == 1)
{
    $_SESSION['logado'] = true;
    $_SESSION['login'] = $login;
    $_SESSION['foto'] = $linha['foto'];
 
}

else
{
    echo "<script>alert('Usuário/senha inválido(s)'); </script>";
}
header('Location: index.php');
exit;
?>