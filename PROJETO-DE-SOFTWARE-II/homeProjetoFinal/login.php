<?php

session_start();

$includeConexao      = "includes/conexao.inc.php";
require_once $includeConexao;

//verificacao simples de preenchimento de campos
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: ./pg-login.php');
    exit();
}
//funcao para proteger contra ataque de sql injection
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$senhaCriptografada = hash("sha512", senha);

//query com cripto
// $query = "SELECT nome, foto_usuario FROM usuario WHERE email = '{$usuario}' AND senha = md5('{$senha}')";

//query sem cripto para testes
$query = "SELECT nome, foto_usuario, idusuario FROM usuario WHERE email = '{$usuario}' AND senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {

    $registro = mysqli_fetch_array($result, MYSQLI_NUM); //acessa vetor só por índices numericos

    $nomeusuario = $registro[0];
    $idusuario = $registro[2];

    $_SESSION['nome'] = $nomeusuario; 
    $_SESSION['idusuario'] = $idusuario; 
    $_SESSION['usuario'] = $usuario; 

    header('Location: ./pg-sidebar-user.php'); // ./painel.php
    exit();

} else {
    $_SESSION['nao_autenticado'] = true; 

    header('Location: ./pg-login.php');
    exit();
}

mysqli_close($conexao);

?>