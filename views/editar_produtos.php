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
    <div class='container' width='200px'>
        <form action='../php/editar_produtos.php' method='post' enctype="multipart/form-data">
            <?php
            $id = $_GET['id'];
            
            include "../database/connection.php";
            $sql = "SELECT * FROM produtos WHERE id_produto = $id";
            $buscar = mysqli_query($connection, $sql);

            while ($array = mysqli_fetch_array($buscar)){
                $id_produto = $array['id_produto'];
                $produto = $array['produto'];
                $preco_custo = $array['preco_custo'];
                $preco_venda = $array['preco_venda'];
                $imagem = $array['imagem'];
                $grupo_id = $array['grupo_id'];
            ?>
            <div class="form-group">
                <img style="width: 100px;" src="<?php echo $imagem ?>" alt="">
                <br>
                <label>Nome</label>
                <input type="text" class="form-control" name='produto' value='<?php echo $produto ?>'>
                <input type="hidden" class="form-control" name='id_produto' value='<?php echo $id_produto ?>'>
            </div>
            <div class="form-group">
                <label>Preço de Custo</label>
                <input type="number" class="form-control" name='preco_custo' value='<?php echo $preco_custo ?>'>
            </div>
            <div class="form-group">
                <label>Preço de Venda</label>
                <input type="number" class="form-control" name='preco_venda' value='<?php echo $preco_venda ?>'>
            </div>
            <div class="form-group">
                <label>Grupo</label>
                <select name="grupo_id">
                    <option value="1" <?= ($grupo_id == 1) ? 'selected' : '' ?> >Frutas</option>
                    <option value="2" <?= ($grupo_id == 2) ? 'selected' : '' ?> >Verduras</option>
                    <option value="3" <?= ($grupo_id == 3) ? 'selected' : '' ?> >Legumes</option>
                    <option value="4" <?= ($grupo_id == 4) ? 'selected' : '' ?> >Grãos</option>
                    <option value="5" <?= ($grupo_id == 5) ? 'selected' : '' ?> >Temperos</option>
                    <option value="6" <?= ($grupo_id == 6) ? 'selected' : '' ?> >Granja</option>
                </select>
            </div>
            <div class="form-group">
                <label>Imagem</label>
                <input type="file" class="form-control" name="imagem">
            </div>

            <div style='text-align: right'>
                <button type='submit' class='btn btn-sm btn-success'>Atualizar</button>
            </div>
                
            <?php } ?>
        </form>
    </div>

</body>
</html>