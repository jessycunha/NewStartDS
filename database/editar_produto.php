<?php
    include '../templates/adm_header.php';
    include 'conexao.php';
?>
<div class='container' width='200px'>
    <form action='_editar_produto.php' method='post'>
        <?php
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM produtos WHERE id_produto = $id";
        $buscar = mysqli_query($conexao, $sql);

        while ($array = mysqli_fetch_array($buscar)){
            $id_produto = $array['id_produto'];
            $nome = $array['nome'];
            $preco_compra = $array['preco_compra'];
            $preco_venda = $array['preco_venda'];
            $imagem = $array['imagem'];
        ?>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name='nome' value='<?php echo $nome ?>'>
            <input type="number" class="form-control" name='id' value='<?php echo $id_produto ?>' style='display: none'>
        </div>
        <div class="form-group">
            <label>Preço de Compra</label>
            <input type="number" class="form-control" name='preco_compra' value='<?php echo $preco_compra ?>'>
        </div>
        <div class="form-group">
            <label>Preço de Venda</label>
            <input type="number" class="form-control" name='preco_venda' value='<?php echo $preco_venda ?>'>
        </div>
        <div class="form-group">
            <label>Imagem</label>
            <input type="text" class="form-control" name='imagem' value='<?php echo $imagem ?>'>
        </div>

        <div style='text-align: right'>
            <button type='submit' class='btn btn-sm btn-success'>Atualizar</button>
        </div>
            
        <?php } ?>
    </form>
</div>

<?php include '../templates/adm_footer.php'; ?>