<?php 

include "../database/connection.php";

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$cep = $_POST['cep']; 
$bairro = $_POST['bairro'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$password = md5($_POST['password']);

// var_dump($name, $cpf, $contact, $address, $cep, $bairro, $city, $state);

$sqlCli = "INSERT INTO clientes VALUES ('', '$name', '$cpf', '$contact', '$address', '$bairro', '$city', '$state', '$cep')";
$sqlUser = "INSERT INTO usuarios VALUES ('', '$email', '$password', LAST_INSERT_ID())";

$insertCli = mysqli_query($connection, $sqlCli);
$insertUser = mysqli_query($connection, $sqlUser);
?>

<h3>Cadastrado com sucesso</h3>
<a href="../views/login.php">Entrar</a>