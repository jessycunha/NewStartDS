<?php 

include "../database/connection.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$contato = $_POST['contato'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep']; 
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$email = $_POST['emailcad'];
$senha = md5($_POST['senhacad']);

$sqlCli = "INSERT INTO clientes VALUES ('', '$nome', '$cpf', '$contato', '$endereco', '$bairro', '$cidade', '$uf', '$cep')";

$insertCli = mysqli_query($connection, $sqlCli);
$id = mysqli_insert_id($connection);

$sqlUser = "INSERT INTO usuarios VALUES ('', '$email', '$senha', 0, $id)";
$insertUser = mysqli_query($connection, $sqlUser);

header("Location: ../views/login.php");
?>

