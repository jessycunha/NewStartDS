<?php
    include "../database/connection.php";

    $veiculo = $_POST['veiculo'];
    $placa = $_POST['placa'];

    $sql = "INSERT INTO veiculos VALUES ('', '$veiculo', '$placa')";
    $insert = mysqli_query($connection, $sql);

    header('Location: ../views/admin.php');
?>