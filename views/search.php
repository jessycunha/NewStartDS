<?php
    include_once "../database/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Produtos</title>

    <script type="text/javascript" src="../vendor/jquery/jquery.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>
</head>
<body>
    
    <form action="" method="POST" enctype="multipart/form-data" id="form-busca">
        <label for="">
            <span>Buscar produtos</span>
            <input type="text" name="buscar" id="busca">
        </label>
    </form>

    <div id="resultado_busca">
        
    </div>

    <script>
        $(function(){
            $("#busca").keyup(function(){
                var buscaTexto = $(this).val();
                if(buscaTexto.length >= 3){
                    $.ajax({
                        method: 'post',
                        url: '../sys/search.php',
                        data: {busca: 'sim', texto: buscaTexto},
                        dataType: 'json',
                        success: function(retorno){
                            if(retorno.qtd == 0){
                                $('#resultado_busca').html('<p>Nenhum item encontrado.</p>')
                            }else{
                                $('#resultado_busca').html(retorno.dados);
                            }
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>