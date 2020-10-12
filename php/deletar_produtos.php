<?php
    include '../database/connection.php';

    $id_produto = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id_produto = $id_produto";
    $delete = mysqli_query($connection, $sql);

    header('Location: ../views/produtos.php');
?>