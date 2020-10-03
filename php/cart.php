<?php
    include '../database/connection.php';

    $produto_id = $_POST['id_produto'];
    $usuario_id = 1; //$_POST['id_usuario']; //Logado na sessão
    $quantidade = 5; //$_POST['quantidade'];

    $sql = "SELECT * FROM produtos WHERE id_produto = $produto_id";
    $buscar = mysqli_query($connection, $sql);

    while ($array = mysqli_fetch_array($buscar)){
        $produto[] = '<input type="" value="' . $array['id_produto'] . '" />';
        $produto[] = '<h6>' . $array['produto'] . '</h6>';
        $produto[] = '<h6>' . $array['preco_venda'] . '</h6>';
        $produto[] = '<img src="' . $array['imagem'] . '">';
    
        // $button = "<button type='button' onclick='removeItem(id_produto)'>Remover</button>";
        // $produto[] = $button;

        // Sem HTML
        // $produto[] = $array['id_produto'];
        // $produto[] = $array['nome'];
        // $produto[] = $array['preco_venda'];
        // $produto[] = $array['imagem'];
    }

    echo json_encode($produto);

?>