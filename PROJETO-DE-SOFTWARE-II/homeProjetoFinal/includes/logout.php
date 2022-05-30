<?php
session_start();

//PARA DESTRUIR UMA SESSAO:
// unset($_SESSION['NOMEDASESSAO']);

//PARA DESTRUIR TODAS AS SESSOES
session_destroy();

header('Location: http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-login.php');
exit();

?>