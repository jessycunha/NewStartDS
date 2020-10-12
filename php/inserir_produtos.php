<?php
    include "../database/connection.php";

    $produto = $_POST['produto'];
    $grupo = $_POST['grupo'];
    $preco_custo = $_POST['preco_custo'];
    $preco_venda = $_POST['preco_venda'];
    $imagem = "../images/cards/" . $_FILES['imagem']['name'];

    $local_imagem = $_FILES['imagem']['tmp_name'];
    move_uploaded_file($local_imagem, $imagem);

    // var_dump($produto, $grupo, $preco_custo, $preco_venda, $imagem);
    $sql = "INSERT INTO produtos VALUES ('', '$produto', '$preco_custo', '$preco_venda', '$imagem', $grupo)";
    $insert = mysqli_query($connection, $sql);

    header('Location: ../views/produtos.php');
?>