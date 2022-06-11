
<?php
session_start();
require_once("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico" />
    <title>Fiction - Soluções completas em telefonia e internet</title>
</head>
<body>
    <div class="top-0 start-0 end-0">
        <nav class="navbar navbar-light bg-light">
            <div class="titulo">
                <a class="navbar-brand degradeMovimento mx-5" href="<?php echo mudaLink() ?>">
                <img src="Imagens/Fiction-icon.png" alt="" class="d-inline-block align-text-middle">
                <span class="px-3">Fiction</span>
                </a>
            </div>
            <div class="barraNav">
                <ul class="d-flex float-end mx-5 text-uppercase">
                    <?php mostraBotaoLogout() ?>
                    <li><a class="navbar-brand degradeMovimento" href="cadastro.php">Cadastro</a></li>
                    <li><a class="navbar-brand degradeMovimento" href="modelagem.php">Modelo de dados</a></li>
                    <li><a class="navbar-brand degradeMovimento " href="queries.php">Queries SQL</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="card position-absolute top-50 start-50" style="transform: translate(-50%, -40%);">
        <div class="card-body">
            <img src="Imagens/modeloDadosBg.png" class="position-absolute top-50 start-50 rounded-1" style="transform: translate(-50%, -50%);" alt="...">
            <img src="Imagens/modeloDadosPng.png" id="modeloDados" class="position-absolute top-50 start-50" style="transform: translate(-50%, -50%);" alt="...">
        </div>
    </div>
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>