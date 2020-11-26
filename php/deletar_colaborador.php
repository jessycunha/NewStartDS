<?php
    include "../database/connection.php";

    $id = $_GET['id'];

    $sql = "UPDATE usuarios SET nivel = 0 WHERE cliente_id = $id";
    $update = mysqli_query($connection, $sql);

    header('Location: ../views/admin.php');
?>