<?php 
    session_start();
?>
<?php 
        require_once('conexao.php');
        if(isset($_POST['enviar'])){
            $erros = array();
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            // VALIDAÇÃO DO CAMPO EMAIL
            if(!$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
                $erros[] = "Preencha todos os campos!";
            }else{
                // CASO O EMAIL ESTEJA CORRETO, ESSE SCRIPT INSERI OS DADOS NO BANCO DE DADOS.
                $senha = md5($senha);
                $inseri = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')";
                $result_inseri = mysqli_query($conexao,$inseri);
    
                if($result_inseri){
                    echo "<script>alert('Dados inseridos com sucesso!');</script>";
                }else{
                    echo "<script>alert('Error!');</script>";
                }
            }
            // PERCORRE O ARRAY ERROS E VERIFICA SE HÁ ALGUM VALOR.
            if(!empty($erros)){
                foreach($erros as $erro){
                    echo "<script >alert('$erro');</script>";
                }
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
    <title>Criar conta</title>
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
        <h2 class="form-info">Criar conta</h2>
        <div class="container" id="campos">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="inputNome" class="form-control" placeholder="Digite seu nome" aria-describedby="nomelHelp">
                    <small id="nomelHelp" class="text-muted">Não compartilhamos suas informações.</small>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Digite seu e-mail" aria-describedby="emailHelp">
                    <small id="emailHelp" class="text-muted">Não compartilhamos suas informações.</small>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Digite sua senha" aria-describedby="senhaHelp">
                    <small id="senhalHelp" class="text-muted">Não compartilhamos suas informações.</small>
                </div>
                <button class="btnForm" type="submit" class="btn btn-primary" name="enviar">Criar conta</button ><button class="voltar" class="btn btn-primary" name="voltar">Voltar</button>
            </div>
        </form>
        <div class="lado">            
    </div>
</body>
</html>