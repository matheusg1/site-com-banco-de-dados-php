
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
    <div class="card position-absolute top-50 start-50" style="transform: translate(-50%, -40%);">
        <div class="card-body">
            <img src="Imagens/modeloDadosBg.jpg" class="position-absolute top-50 start-50 rounded-1" style="transform: translate(-50%, -50%);"img-thumbnail" alt="...">
            <img src="Imagens/modeloDadosPng.png" id="modeloDados" class="position-absolute top-50 start-50" style="transform: translate(-50%, -50%);"img-thumbnail" alt="...">
        </div>
    </div>

    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>