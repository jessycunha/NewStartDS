<?php

$servername = 'localhost:3308';
$database = 'vegetal';
$username = 'root';
$password = '';

$conexao = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Falha na conexão com o Banco de Dados" . mysql_connect_error();
}

?>