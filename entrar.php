<?php 
    session_start();
    require_once('conexao.php');
?>
<?php 
        if(isset($_POST['entrar'])){
            // Atribuindo erros ao array $erros
            $erros = array();
            /* mysqli_escape_string() - Escapa caracteres especiais em uma string para uso em uma instrução SQL,
             levando em consideração o conjunto de caracteres atual da conexão*/
            $email = mysqli_escape_string($conexao,$_POST['email']);
            $senha = mysqli_escape_string($conexao,$_POST['senha']);
            // Verifica se os campos estão vazios. valores verdadeiros se email or(ou) senha for true
            if(empty($email) or empty($senha)){

                $erros[] = "Insira seu email e senha!";

                // verifica se tem os dados do usuario na base de dados
            }else{
                    
                $consulta = "SELECT email FROM usuarios WHERE email='$email'";
                $res_consulta = mysqli_query($conexao,$consulta);

                if(mysqli_num_rows($res_consulta) > 0){
                    $senha = md5($senha);
                    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
                    $result = mysqli_query($conexao,$sql);

                    if(mysqli_num_rows($result) == 1){
                        $dados = mysqli_fetch_array($result);
                        mysqli_close($conexao);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        header('Location: home.php');
                    }else{
                        $erros[] = "Dados inválidos";
                    }
                }else{
                    $erros[] = "Usuário não existe";
                }
            
            }
        }

        ?>
        <?php             
            if(!empty($erros)){
                foreach($erros as $erro){
                echo "<script >alert('$erro');</script>";
            }
        }  
        ?>
                <?php 
            if(isset($_POST['voltar'])){
                header('Location: index.php');
            }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="icon" type="imagem/png" href="img/logo.png" />
    <!-- Font awesome-->
    <script src="https://kit.fontawesome.com/b8ba5b8e96.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="container-fluid pt-3 pb-3">
        <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <a class="index-link" href="index.php"><img class="img-fluid"  src="img/logo.png" alt="Página principal"></a>
        <h2 class="form-info">Entrar</h2>
        <div class="container" id="campos">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Digite seu e-mail" aria-describedby="emailHelp">
                    <small id="emailHelp" class="text-muted">Insira seu e-mail.</small>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Digite sua senha" aria-describedby="senhaHelp">
                    <small id="senhalHelp" class="text-muted">Insira sua senha.</small>
                </div>
                <button class="btnForm" type="submit" class="btn btn-primary" name="entrar">Entrar</button><button style="margin-left:32%;" class="voltar" class="btn btn-primary" name="voltar">Voltar</button>
            </div>
        </form>
        <div class="lado">            
    </div>
</body>

</html>