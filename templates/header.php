<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['title'] ?></title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../fonts/Barlow-Light.ttf">
</head>
<body>

    <div class="container-header">
        <!-- <div class="us"> -->
            <a href="" >Sobre nós</a>
            <a href="" >Contato</a>
            <a href="" >Vagas</a>
        <!-- </div> -->
        <div class="div-logo">
            <a href=""  href="index.html">
                <img class="logo" src="../images/logo/logotipo.png">
            </a>
        </div>
        <!-- <div class="you"> -->
            <a href="" >Ofertas do dia</a>
            <a href="" >Carrinho</a>
            <a href="" >Entrar</a>
        <!-- </div> -->
    </div>

