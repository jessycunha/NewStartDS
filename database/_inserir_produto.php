<?php

    include 'conexao.php';
    
    $nome = $_POST['nome'];
    $precocompra = $_POST['preco_compra'];
    $precovenda = $_POST['preco_venda'];
    $imagem = $_POST['imagem'];
    $grupo = $_POST['grupo_id'];
    
    // var_dump($nome, $precocompra, $precovenda, $imagem, $grupo);

    $sql = "INSERT INTO produtos (nome, preco_compra, preco_venda, imagem, grupo_id) VALUES ('$nome', $precocompra, $precovenda, '$imagem', $grupo)";
    $inserir = mysqli_query($conexao, $sql);
?>

    <div class='container' style='width: 500px; margin-top: 20px'>
        <h4>Produto adicionado com sucesso!</h4>
    </div>