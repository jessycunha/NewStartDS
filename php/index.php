<?php
    
    include "../database/connection.php";
    $grupo = $_POST['grupo'];

    if ($grupo = 0){
        $sql = "SELECT * FROM produtos";
        $search = mysqli_query($connection, $sql);
        
        while ($array = mysqli_fetch_array($search)){
            $id_produto = $array['id_produto'];
            $produto = $array['produto'];
            $preco_venda = $array['preco_venda'];
            $imagem = $array['imagem'];
        
        var_dump($array);
        }
        echo json_encode($array);
    }
    else{
        $sql = "SELECT * FROM produtos WHERE grupo = $grupo";
        $search = mysqli_query($connection, $sql);
        
        while ($array = mysqli_fetch_array($search)){
            $id_produto = $array['id_produto'];
            $produto = $array['produto'];
            $preco_venda = $array['preco_venda'];
            $imagem = $array['imagem'];
        
        var_dump($array);
        }
        echo json_encode($array);
    }
?>