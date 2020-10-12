<?php
    include '../database/connection.php';

    $produto_id = $_POST['id_produto'];
    $usuario_id = 1; //$_POST['id_usuario']; //Logado na sessão
    $quantidade = 5; //$_POST['quantidade'];
    $dados = '';

    $sql = "SELECT * FROM produtos WHERE id_produto = $produto_id";
    $buscar = mysqli_query($connection, $sql);
    
    // while ($array = mysqli_fetch_array($buscar)){

    //     $id_produto = $array['id_produto'];
    //     $imagem = $array['imagem'];
    //     $produto = utf8_encode($array['produto']);
    //     $preco_venda = $array['preco_venda'];  
    // }

    // $item[] = array(
    //     "id_produto" => "<td>" . $id_produto . "</td>",
    //     "imagem" => "<td><img src='" . $imagem . "'></td>",
    //     "produto" => "<td>" . $produto . "</td>",
    //     "preco_venda" => "<td>" . $preco_venda . "</td>"
    // );

    // echo json_encode($item);

    $item = mysqli_fetch_assoc($buscar);

    $dados .= "<tr><td><img style='width: 40px;' src='" . $item['imagem'] . "'></td>";
    $dados .= "<td>" . $item['produto'] . "</td>";
    $dados .= "<td><input type='number'></td>";
    $dados .= "<td>" . $item['preco_venda'] . "</td>";
    $dados .= "<td><button type='button' onclick='remove-item(`<?php echo" . $item['id_produto'] . "?>`)' class='btn btn-danger'</button></tr>";

    echo $dados;

?>