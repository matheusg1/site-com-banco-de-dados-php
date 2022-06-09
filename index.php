<?php
session_start();
require_once("funcoes.php");
$_SESSION['contaApagada'] = false;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico" />
    <title>Fiction - Soluções em tecnologia</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-12 col-sm-12">
                <div class="position-absolute top-0 start-0 end-0">
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand degradeMovimento" id="titulo" href="<?php echo mudaLink() ?>">
                        <img src="Imagens/fiction-icon.png" alt="" width="78.4px" height="78.4px" class="d-inline-block align-text-top">
                        Fiction
                        </a>
                        <ul class="d-flex">
                            <?php mostraBotaoLogout() ?>
                            <li><a class="navbar-brand degradeMovimento" href="cadastro.php">Cadastro</a></li>
                            <li><a class="navbar-brand degradeMovimento" href="modelagem.php">Modelo de dados</a></li>
                            <li><a class="navbar-brand degradeMovimento " href="queries.php">Queries SQL</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card position-absolute top-50 start-50 translate-middle" id="formLogin" >
        <div class="card-body">
            <?php
                if(isset($_SESSION['msg'])){
                    
                    echo '<div class="alert alert-secondary centraliza" role="alert">';
                    echo $_SESSION['msg'] . '</div>';
                    unset($_SESSION['msg']);
                }
                if(isset($_SESSION['msgcad'])){

                    echo '<div class="alert alert-secondary centraliza" role="alert">';
                    echo $_SESSION['msgcad'] . '</div>';
                    unset($_SESSION['msgcad']);
                }
            ?>
            <form action="valida.php" method="POST" class="bg-white text-dark botoesCores">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu login">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senhaId" placeholder="Digite sua senha">
                </div>
                <button type="submit" class="btn btn-outline-primary" name="botaoLogin" value="botaoLogin">Entrar</button>
            </form>
        </div>
    </div>

    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>