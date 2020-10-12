<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/products.css">
</head>
<body>
    <div class='container' width='300px'>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-produtos">Novo Produto</button>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço de Custo</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../database/connection.php';
                $sql = "SELECT * FROM produtos p JOIN grupos g ON p.grupo_id = g.id_grupo ORDER BY produto ASC";
                $search = mysqli_query($connection, $sql);

                $i = 0;
                while ($array = mysqli_fetch_array($search)){
                    $id_produto = $array['id_produto'];
                    $imagem = $array['imagem'];
                    $produto = $array['produto'];
                    $preco_custo = $array['preco_custo'];
                    $preco_venda = $array['preco_venda'];
                    $grupo = $array['grupo'];
                ?>
                <tr>
                    <th><img style="width: 40px;"src="<?php echo $imagem ?>" alt=""></th>
                    <th><?php echo $produto ?></th>
                    <th><?php echo $preco_custo ?></th>
                    <th><?php echo $preco_venda ?></th>
                    <th><?php echo $grupo ?></th>
                    <th>
                        <a class='btn btn-warning btn-sm' style='color: #fff' href='editar_produtos.php?id=<?php echo $id_produto ?>' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' style='color: #fff' href='../php/deletar_produtos.php?id=<?php echo $id_produto ?>'>Deletar</a>
                    </th>
                </tr>

                <?php $i++; } ?>
            </tbody>
        </table>
        <p>Total de itens cadastrados: <?php echo $i ?></p>
    </div>
    

    <div class="modal fade" id="modal-produtos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/inserir_produtos.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="produto" placeholder="Nome">
                    <select name="grupo" >
                        <option value="1">Frutas</option>
                        <option value="2">Verduras</option>
                        <option value="3">Legumes</option>
                        <option value="4">Grãos</option>
                        <option value="5">Temperos</option>
                        <option value="6">Granja</option>
                    </select>
                    <input type="number" name="preco_custo" placeholder="Preço de Custo">
                    <input type="number" name="preco_venda" placeholder="Preço de Venda">
                    <input type="file" name="imagem">
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
            </div>
        </div>
    </div>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/dist/umd/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>