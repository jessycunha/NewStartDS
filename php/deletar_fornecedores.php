<?php
    include '../database/connection.php';

    $id_fornecedor = $_GET['id'];

    $sql = "DELETE FROM fornecedores WHERE id_fornecedor = $id_fornecedor";
    $delete = mysqli_query($connection, $sql);

    header('Location: ../views/admin.php');
?>