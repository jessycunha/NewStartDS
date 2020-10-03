<?php
    if(isset($_POST['busca']) && $_POST['busca'] == 'sim'){
        include_once "../database/config.php";
        $textoBusca = strip_tags($_POST['texto']);
        $buscar = $pdo->prepare("SELECT * FROM `produtos` INNER JOIN `grupos` ON grupo_id = id_grupo WHERE `nome` LIKE '%$textoBusca%'");
        //"SELECT * FROM `produtos` WHERE `nome` LIKE '%$textoBusca%'"
        $buscar->execute();

        $retorno = array();
        $retorno['dados'] = '';
        $retorno['qtd'] = $buscar->rowCount();
        if($retorno['qtd'] >= 0){
            while($conteudo = $buscar->fetchObject()){
                $retorno['dados'] .= $conteudo->nome . ' (' . $conteudo->tipo . '): ' . $conteudo->preco_venda;
            }
        }
        echo json_encode($retorno);
    }
?>