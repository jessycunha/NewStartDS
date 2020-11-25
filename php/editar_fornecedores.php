<?php 
    include '../database/connection.php';
    
    $id_produto = $_POST['id_produto'];
    $produto = $_POST['produto'];
    $preco_custo = $_POST['preco_custo'];
    $preco_venda = $_POST['preco_venda'];
    $grupo_id = $_POST['grupo_id'];
    $imagem = "../images/cards/" . $_FILES['imagem']['name'];

    $local_imagem = $_FILES['imagem']['tmp_name'];
    move_uploaded_file($local_imagem, $imagem);

    $sql = "UPDATE produtos SET produto = '$produto', preco_custo = $preco_custo, preco_venda = $preco_venda, imagem = '$imagem', grupo_id = $grupo_id WHERE id_produto = $id_produto";
    $update = mysqli_query($connection, $sql);

    header('Location: ../views/produtos.php');
?>