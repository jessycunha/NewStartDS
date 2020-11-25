<?php
    include "../database/connection.php";

    session_start();
    if(isset($_POST['enter'])) :
        $email = mysqli_escape_string($connection, $_POST['email']);
        $password = mysqli_escape_string($connection, $_POST['password']);

        $sqlEmail = "SELECT email FROM usuarios WHERE email = '$email'";
        $resultEmail = mysqli_query($connection, $sqlEmail);

        if(mysqli_num_rows($resultEmail) > 0) : 
            $password = md5($password);
            $sqlPass = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$password'";
            $resultPass = mysqli_query($connection, $sqlPass);

            if(mysqli_num_rows($resultPass) == 1) :
                $dados = mysqli_fetch_array($resultPass);
                $_SESSION['logon'] = true;
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                header('Location: index.php');
            else:
                $erros[] = "Senha Incorreta";
            endif;
        else: $erros[] = "E-mail não cadastrado";
        endif;
    endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../vendor/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="login">
            <h4>Entrar</h4>
            <form action="#" method="POST">
                <div class="row">
                    <label for="email">Usuário</label>
                    <input type="email" name="email" required>
                </div>
                <div class="row">  
                    <label for="password">Senha</label>
                    <input type="password" name="password" required>
                </div>

                <?php
                    if(!empty($erros)):
                        foreach($erros as $erro):
                            echo $erro;
                        endforeach;
                    endif;
                ?>
                <br>
                    <button class="btn btn-large btn-warning" type="button" id="cadastro" name="cadastro">Cadastre-se</button>
                    <button class="btn btn-large btn-success" type="submit" id="enter" name="enter">Entre</button>
                
            </form>
        </div>

        <div id="signin">
            <h4>Cadastre-se</h4>
            <form action="../php/signin.php" id="FormCad" method="POST">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Nome completo</label>
                        <input type="text" id="nome" name="nome">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">CPF</label>
                        <input type="number" id="cpf" name="cpf" > <!--retirar setas-->
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Telefone</label>
                        <input type="number" id="contato" name="contato"> <!-- colocar máscara (__) _____-____ -->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">CEP</label>
                        <input type="number" id="cep" name="cep"><!--retirar setas-->
                    </div>    
                    <div class="form-group col-md-9">
                        <label for="">Endereço</label>
                        <input type="text" id="endereco" name="endereco">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Bairro</label>
                        <input type="text" id="bairro" name=bairro>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="">Cidade</label>
                        <input type="text" id="cidade" name="cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Estado</label>
                        <input type="text" id="uf" name="uf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>
                            <input type="text" id="emailcad" name="emailcad">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Senha</label>
                            <input type="password" id="senhacad" name="senhacad">
                        </div>
                    </div>    

                    <button class="btn btn-large btn-warning" type="button" id="logar" name="logar">Entre</button>
                    <button class="btn btn-large btn-success" id="cadastrar" name="cadastrar">Cadastre-se</button>
            </form>
        </div>
    </div>
    


    <script>
        $("#cadastro").click(function(){
            $("#login").hide();
            $("#signin").show();
        });
        
        $("#logar").click(function(){
            console.log("oi");
            $("#signin").hide();
            $("#login").show();
        });
        
        // $("#cadastrar").click(function(){
        //     var nome = $("#nome").val();
        //     var cpf = $("#cpf").val();
        //     var contato = $("#contato").val();
        //     var cep = $("#cep").val();
        //     var endereco = $("#endereco").val();
        //     var bairro = $("#bairro").val();
        //     var cidade = $("#cidade").val();
        //     var uf = ("#uf").val();
        //     var emailcad = $("#emailcad").val();
        //     var senhacad = $("#senhacad").val();
        //     $("#FormCad").submit(function(){
        //         var dados = jQuery(this).serialize();
        //     })
        //     $.ajax({
        //         url: "../php/signin.php",
        //         type: "POST",
        //         data: {
        //             nome: nome,
        //             cpf: cpf,
        //             contato: contato,
        //             cep: cep,
        //             endereco: endereco,
        //             bairro: bairro,
        //             cidade: cidade,
        //             uf: uf,
        //             emailcad: emailcad,
        //             senhacad: senhacad
        //         },
        //         // dataType: "JSON",
        //         success: function(data){
        //             console.log(data);
        //         },
        //         error: function(xhr, status, error) {
        //             alert(xhr.responseText);
        //         }
        //     });
            // console.log(nome, cpf, contato, cep, endereco, bairro, cidade, uf, emailcad, senhacad);
        // });

        $('#cep').focusout(function () {
            var cep = $('#cep').val().replace('.', '').replace('-', '');
            $.ajax({
                url: `https://viacep.com.br/ws/${cep}/json/`,
                type: 'GET',
                dataType: 'json',
                success: function (dados) {
                    $('#endereco').val(dados.logradouro);
                    $('#bairro').val(dados.bairro);
                    $('#cidade').val(dados.localidade);
                    $('#uf').val(dados.uf);
                }
            });
        });

       
    </script>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/dist/umd/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>