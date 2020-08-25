<?php include '../templates/adm_header.php'; ?>

    <div class='container' id='tamanhocontainer' style='margin-top: 40px'>
        <h4>Formulário de Cadastro</h4>
        <form action='_inserir_produto.php' method='post' style='margin-top: 20px'>

            <div class="form-group">
                <div class="col-lg-6 col-md-6 mb-4">
                    <label>Nome</label>
                    <input type="text" class="form-control" name='nome' placeholder='Insira o nome do produto' required>
                </div>    
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-md-6 mb-4">
                    <label>Preço de Compra</label>
                    <input type="text" class="form-control" name='preco_compra' placeholder='Insira o preço de compra' required>
                </div> 
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-md-6 mb-4">
                    <label>Preço de Venda</label>
                    <input type="text" class="form-control" name='preco_venda' placeholder='Insira o preço de venda' required>
                </div> 
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-md-6 mb-4">
                    <label>Imagem</label>
                    <input type="text" class="form-control" name='imagem' placeholder='Insira a imagem' required>
                </div> 
            </div>

            <div class="form-group">
                <div class="col-lg-6 col-md-6 mb-4">
                    <label>Grupo</label>
                    <select class="form-control" name="grupo_id" placeholder="Escolha o grupo" required>
                        <option></option>
                        <option value="1">Frutas</option>
                        <option value="2">Verduras</option>
                        <option value="3">Legumes</option>
                        <option value="4">Grãos</option>
                        <option value="5">Temperos</option>
                        <option value="6">Granja</option>
                    </select>
                </div>
            </div>    

            <div style='text-align: center'>
                <button type='submit' id='botao' class='btn btn-sm btn-success'>Cadastrar</button>
            </div>
        
        </form>
    </div>

<?php include '../templates/adm_footer.php'; ?>


