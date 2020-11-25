<!DOCTYPE html>
<html lang="pr-br">

  <head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title> 
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
  </head>  

  <body>
      
    <div id="sidebar">
      <div class="toggle-btn">
        <span>&#9776</span>
      </div>
      <ul class="tab_navigation">
        <li class="active"><img src="../images/logo/logotipo.png" alt="Veg e tal" class="logo"></li>
        <li>Produtos</li>
        <li>Clientes</li>
        <li>Veículos</li>
        <li>Fornecedores</li>
        <li>Pedidos</li>
        <li>Entregas</li>
      </ul>
    </div>

    <div class="tab_container_area" id="tab_container_area">
      
      <div class="tab_container">
        <img id="dashboard" src="../images/dashboard.png" alt="Dashboard">
      </div>

      <div class="tab_container">
        <button id="new" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-produtos">Novo Produto</button>
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
          <div id="modal-products" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/inserir_produtos.php" method="POST" enctype="multipart/form-data">
                    <div class="custom-input">
                      <input type="text" name="produto" required>
                      <label for="">Produto</label>
                      <div class="underline"></div>
                    </div>
                    <div class="custom-input">
                      <select name="grupo" >
                        <option value="1">Frutas</option>
                        <option value="2">Verduras</option>
                        <option value="3">Legumes</option>
                        <option value="4">Grãos</option>
                        <option value="5">Temperos</option>
                        <option value="6">Granja</option>
                      </select>
                      <label for="">Grupo</label>
                    </div>
                    <div class="custom-input">
                      <input type="number" name="preco_custo">
                      <label for="">Preço de Custo</label>
                    </div>
                    <div class="custom-input">
                      <input type="number" name="preco_venda">
                      <label for="">Preço de Venda</label>
                    </div>
                    <div class="custom-input">
                      <input type="file" name="imagem">
                      <label for="">Imagem do Produto</label>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="tab_container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../database/connection.php';
                $sql = "SELECT * FROM clientes c JOIN usuarios u ON c.id_cliente = u.cliente_id ORDER BY c.nome ASC";
                $search = mysqli_query($connection, $sql);

                $i = 0;
                while ($array = mysqli_fetch_array($search)){
                    $nome = $array['nome'];
                    $contato = $array['contato'];
                    $cidade = $array['cidade'];
                    $email = $array['email'];
                ?>
                <tr>
                    <th><?php echo $nome ?></th>
                    <th><?php echo $contato ?></th>
                    <th><?php echo $cidade ?></th>
                    <th><?php echo $email ?></th>
                </tr>

                <?php $i++; } ?>
            </tbody>
        </table>
        <p>Total de itens cadastrados: <?php echo $i ?></p>
      </div>

      <div class="tab_container">
        <button id="new" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-veiculos">Novo Veículo</button>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Veículo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../database/connection.php';
                $sql = "SELECT * FROM veiculos";
                $search = mysqli_query($connection, $sql);

                $i = 0;
                while ($array = mysqli_fetch_array($search)){
                    $id_veiculo = $array['id_veiculo'];
                    $tipo = $array['tipo'];
                    $placa = $array['placa'];                ?>
                <tr>
                    <th><?php echo $id_veiculo ?></th>
                    <th><?php echo $tipo ?></th>
                    <th><?php echo $placa ?></th>
                    <th>
                        <a class='btn btn-warning btn-sm' style='color: #fff' href='editar_veiculos.php?id=<?php echo $id_veiculo ?>' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' style='color: #fff' href='../php/deletar_veiculos.php?id=<?php echo $id_veiculo ?>'>Deletar</a>
                    </th>
                </tr>

                <?php $i++; } ?>
            </tbody>
        </table>
        <p>Total de itens cadastrados: <?php echo $i ?></p>
      </div>

      <div class="modal fade" id="modal-veiculos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div id="modal-veiculos" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Veículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/inserir_veiculos.php" method="POST" enctype="multipart/form-data">
                    <div class="custom-input">
                      <label for="">Veículo: </label>
                      <input type="text" name="veiculo">
                    </div>
                    <div class="custom-input">
                      <label for="">Placa</label>
                      <input type="text" name="placa">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab_container">
        <button id="new" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-fornecedores">Novo Fornecedor</button>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">CNPJ</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../database/connection.php';
                $sql = "SELECT * FROM fornecedores";
                $search = mysqli_query($connection, $sql);

                $i = 0;
                while ($array = mysqli_fetch_array($search)){
                    $id_fornecedor = $array['id_fornecedor'];
                    $nome = $array['nome'];
                    $contato = $array['contato'];
                    $cnpj = $array['cnpj']; 
                ?>
                <tr>
                    <th><?php echo $id_fornecedor ?></th>
                    <th><?php echo $nome ?></th>
                    <th><?php echo $contato ?></th>
                    <th><?php echo $cnpj ?></th>
                    <th>
                        <a class='btn btn-warning btn-sm' style='color: #fff' href='editar_fornecedores.php?id=<?php echo $id_fornecedor ?>' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' style='color: #fff' href='../php/deletar_fornecedores.php?id=<?php echo $id_fornecedor ?>'>Deletar</a>
                    </th>
                </tr>

                <?php $i++; } ?>
            </tbody>
        </table>
        <p>Total de itens cadastrados: <?php echo $i ?></p>
      </div>

      <div class="modal fade" id="modal-fornecedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div id="modal-veiculos" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../php/inserir_fornecedores.php" method="POST">
                    <div class="custom-input">
                      <label for="">Nome: </label>
                      <input type="text" name="nome">
                    </div>
                    <div class="custom-input">
                      <label for="">Contato</label>
                      <input type="text" name="contato">
                    </div>
                    <div class="custom-input">
                      <label for="">CNPJ</label>
                      <input type="text" name="cnpj">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="tab_container">
        <table class="table table-sm">
              <thead>
                  <tr>
                      <th scope="col">Data</th>
                      <th scope="col">Cliente</th>
                      <th scope="col">Veículo de entrega</th>
                      <th scope="col">Quantidade de produtos</th>
                  </tr>
              </thead>
              <tbody>
                  <?php include '../database/connection.php';
                    $sql = "SELECT * FROM pedidos pe 
                            JOIN produtos pr ON pe.produto_id = pr.id_produto
                            JOIN veiculos v ON pe.veiculo_id = v.id_veiculo
                            JOIN clientes c ON pe.cliente_id = c.id_cliente 
                            ORDER BY pe.data ASC";
                  $search = mysqli_query($connection, $sql);

                  $i = 0;
                  while ($array = mysqli_fetch_array($search)){
                      $id_pedido = $array['id_pedido'];
                      $data = $array['data'];
                      $produto = $array['produto'];
                      $veiculo = $array['tipo'];
                      $nome = $array['nome'];
                  ?>
                  <tr>
                      <th><?php echo $data ?></th>
                      <th><?php echo $nome ?></th>
                      <th><?php echo $veiculo ?></th>
                      <th><?php echo "quant" ?></th>
                  </tr>

                  <?php $i++; } ?>
              </tbody>
          </table>
          <p>Total de itens cadastrados: <?php echo $i ?></p>
      </div>

      <div class="tab_container">
        <p>entregas</p>
      </div>

    </div>
    



    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/dist/umd/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebar.js"></script>
  </body>
</html>
