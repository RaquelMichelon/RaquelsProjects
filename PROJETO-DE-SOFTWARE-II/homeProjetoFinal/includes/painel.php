<?php
//para verificar se a sessao para o user vai ser visível nessa pagina painel...
// print_r($_SESSION);
//para o php entender que queremos trabalhar com sessao 
session_start();

$includeVerificaLogin      = "./includes/verifica_login.inc.php";
require_once $includeVerificaLogin;

// include('verifica_login.php');
?>

<h2>Olá, 
    <?php
    echo $_SESSION['nome'];
    ?>
    !
</h2>

<h2>
    <a href="logout.php">Sair</a>
</h2>