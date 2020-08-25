<?php
    include '../templates/adm_header.php';
    include 'conexao.php';

    $id_produto = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id_produto = $id_produto";
    $delete = mysqli_query($conexao, $sql);

    include '../templates/adm_footer.php';
?>
    <div class='container' style='width: 500px; margin-top: 20px'>
        <h4>Produto deletado com sucesso!</h4>
    </div>