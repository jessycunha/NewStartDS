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
</head>
<body>
    <form action="#" method="POST">
        <label for="">Usuário</label>
        <input type="email" name="email" required>

        <label for="">Senha</label>
        <input type="password" name="password" required>

        <?php
            if(!empty($erros)):
                foreach($erros as $erro):
                    echo $erro;
                endforeach;
            endif;
        ?>

        <button type="submit" name="enter">Entrar</button>
        <label for="">Cadastre-se</label>
        <a href="signin.php">aqui</a>
    </form>
</body>
</html>