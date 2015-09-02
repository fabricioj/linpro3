<?php

//desativar os erros do tipo notice
error_reporting( E_ALL ^ E_NOTICE );
//Valida dados
$usuario = $_POST;
$cpf = $usuario['cpf'];

if (strlen($cpf)!= 11 || ! is_numeric($cpf))
    die('Digite um CPF válido');
// die termina a execução da aplicação processa.php no momento que é acionado.
    

//Iniciar sessão
session_start();

//Sessão é entre o servidor e a nossa conexão, nenhum outro acesso carregara as mesmas informações.
$_SESSION['usuarios'][$cpf] = $usuario;
//$_SESSION = array();

echo '<pre>';
print_r( $_SESSION );
echo '</pre>';

//Redirecionar para a página lista.php
header('Location: lista.php');