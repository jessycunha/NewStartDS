<?php 
    include '../templates/adm_header.php';
    include 'conexao.php';
    
    $id_produto = $_POST['id'];
    $nome = $_POST['nome'];
    $preco_compra = $_POST['preco_compra'];
    $preco_venda = $_POST['preco_venda'];
    $imagem = $_POST['imagem'];
    
    $sql = "UPDATE produtos SET nome = '$nome', preco_compra = $preco_compra, preco_venda = $preco_venda, imagem = '$imagem' WHERE id_produto = $id_produto";
    $update = mysqli_query($conexao, $sql);

    include '../templates/adm_footer.php';
?>