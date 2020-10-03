<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>
<body>
    <div>
        <form action="../php/signin.php" method="POST">
            <label for="">Nome completo</label><br>
            <input type="text" name="name"><br>

            <label for="">CPF</label><br>
            <input type="number" name="cpf" placeholder="Apenas números"><br> <!--retirar setas-->

            <label for="">Telefone</label><br>
            <input type="number" name="contact"><br> <!-- colocar máscara (__) _____-____ -->

            <label for="">Endereço</label><br>
            <input type="text" name="address" placeholder="Logradouro, número e complemento"><br>

            <label for="">CEP</label><br>
            <input type="number" name="cep" placeholder="Apenas números"><br> <!--retirar setas-->

            <label for="">Bairro</label><br>
            <input type="text" name=bairro><br>

            <label for="">Cidade</label><br>
            <input type="text" name="city"><br>

            <label for="">Estado</label><br>
            <input type="text" name="state"><br>

            <label for="">E-mail</label><br>
            <input type="text" name="email"><br>

            <label for="">Senha</label><br>
            <input type="password" name="password"><br>

            <a href="login.php" type="button" class="btn btn-primray">Voltar</a>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>
</body>
</html>