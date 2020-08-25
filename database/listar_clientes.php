<?php include '../templates/adm_header.php'; ?>

    <table>
        <thead>
            <th>Nome</th>
            <th>CPF</th>
            <th>Contato</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Nº</th>
            <th>Bairro</th>
            <th>Complemento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
        </thead>
        <tbody>
            <?php include 'conexao.php';

            $sql = "SELECT * FROM clientes ORDER BY nome ASC";
            $buscar = mysqli_query($conexao, $sql) or die ("Erro");

            while ($array = mysqli_fetch_array($buscar)){
                $id_cliente = $array['id_cliente'];
                $nome = $array['nome'];
                $cpf = $array['cpf'];
                $contato = $array['contato'];
                $email = $array['email'];
                $endereco = $array['endereco'];
                $numero = $array['numero'];
                $bairro = $array['bairro'];
                $complemento = $array['complemento'];
                $cidade = $array['cidade'];
                $estado = $array['estado'];
                $cep = $array['cep'];
                ?>

                <th><?= $nome ?></th>
                <th><?= $cpf ?></th>




            <?php } ?>
        </tbody>
    
    </table>










<?php include '../templates/adm_footer.php'; ?>