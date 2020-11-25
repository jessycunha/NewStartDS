<?php
    include '../database/connection.php';

    $id_veiculo = $_GET['id'];

    $sql = "DELETE FROM veiculos WHERE id_veiculo = $id_veiculo";
    $delete = mysqli_query($connection, $sql);

    header('Location: ../views/admin.php');
?>