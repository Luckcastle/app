<?php 
session_start();
require_once('conexao.php');
    //Verificação
    if(!isset($_SESSION['logado'])){
        header('Location: entrar.php');
    }
    // Consulta no banco e lista o valor
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conexao,$sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css.css">
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="icon" type="imagem/png" href="img/logo.png" />
    <!-- Font awesome-->
    <script src="https://kit.fontawesome.com/b8ba5b8e96.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
            <header>
                <div class="container" id="nav-container">
                    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
                            <a class="navbar-brand" href="index.php">
                            <img id="logo" src="img/logo.png" alt="SpaceWhite"> Space White
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" id="pf-menu" href="home.php"><?php echo $dados['nome'];?></a>
                            <a class="nav-item nav-link" id="pf-menu" href="index.php">Sair</a>
                        </div>
                        </div>
                    </nav>
                </div>
        </header>
        <main>
            <!-- Conteudo -->
            <div class="container-fluid">
                <div id="services-area">
                        <div class="row">
                            <div class="col-md-3 service-box1">
                                <h2>Mais vistos</h2>
                            </div>
                            <div class="col-md-9 service-box2">

                                <div class="row">
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video" src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video" src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                    <div class="col-md-6 service-boxfilha">
                                        <video class="video"  src="" controls></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </main>
</div>
</body>
</html>