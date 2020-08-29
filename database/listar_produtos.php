

    <div class='container' width='300px'>
        <a class='btn btn-success btn-sm' style='color: #fff' href='inserir_produto.php?' role='button'>Novo Produto</a>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço de Compra</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Grupo</th>
                    <th scope='col'>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'conexao.php';
                $sql = "SELECT * FROM produtos ORDER BY nome ASC";
                $buscar = mysqli_query($conexao, $sql);

                $i = 0;
                while ($array = mysqli_fetch_array($buscar)){
                    $id_produto = $array['id_produto'];
                    $nome = $array['nome'];
                    $preco_compra = $array['preco_compra'];
                    $preco_venda = $array['preco_venda'];
                    $grupo_id = $array['grupo_id'];
                ?>
                <tr>
                    <th><?php echo $nome ?></th>
                    <th><?php echo $preco_compra ?></th>
                    <th><?php echo $preco_venda ?></th>
                    <th><?php echo $grupo_id ?></th>
                    <th>
                        <a class='btn btn-warning btn-sm' style='color: #fff' href='editar_produto.php?id=<?php echo $id_produto ?>' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' style='color: #fff' href='_deletar_produto.php?id=<?php echo $id_produto ?>'>Deletar</a>
                    </th>
                </tr>

                <?php $i++; } ?>
            </tbody>
        </table>
        <p>Total de itens cadastrados: <?php echo $i ?></p>
    </div>


