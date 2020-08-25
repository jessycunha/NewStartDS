<?php include 'conexao.php';

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    
    //echo $nome . $cpf . $contato . $email . $senha . $endereco . $numero . $bairro . $complemento . $cidade . $estado . $cep;

    $sql = "INSERT INTO clientes (nome, cpf, contato, email, senha, endereco, num_end, bairro, complemento_end, cidade, estado, cep) VALUES ('$nome', '$cpf', '$contato', '$email', md5('$senha'), '$endereco', '$numero', '$bairro', '$complemento', '$cidade', '$estado', '$cep')";
    $insert = mysqli_query($conexao, $sql);
    
?>

<title>Cadastrado</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/shop-homepage.css" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

<h6>Cadastrado com sucesso!</h6>
<a href='../index.php'>Início</a>

<!--

| id_cliente      | int(11)      | NO   | PRI | NULL    | auto_increment |
| nome            | varchar(100) | YES  |     | NULL    |                |
| cpf             | char(11)     | NO   |     | NULL    |                |
| contato         | char(11)     | NO   |     | NULL    |                |
| email           | varchar(100) | NO   |     | NULL    |                |
| senha           | varchar(32)  | NO   |     | NULL    |                |
| endereco        | varchar(100) | NO   |     | NULL    |                |
| num_end         | char(5)      | NO   |     | NULL    |                |
| bairro          | varchar(50)  | NO   |     | NULL    |                |
| complemento_end | varchar(30)  | YES  |     | NULL    |                |
| cidade          | varchar(20)  | NO   |     | NULL    |                |
| estado          | char(2)      | NO   |     | NULL    |                |
| cep             | char(8)      | NO   |     | NULL    |                |

name:
nome, cpf, contato, email, senha, endereco, numero, bairro, complemento, cidade, estado, cep 

-->