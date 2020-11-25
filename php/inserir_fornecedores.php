<?php
    include "../database/connection.php";

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $cnpj = $_POST['cnpj'];

    $sql = "INSERT INTO fornecedores VALUES ('', '$nome', '$contato', '$cnpj')";
    $insert = mysqli_query($connection, $sql);

    header('Location: ../views/admin.php');
?>