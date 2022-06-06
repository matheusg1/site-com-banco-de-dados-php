<?php
session_start();
require_once("funcoes.php");
$_SESSION['contaApagada'] = false;
$_SESSION['numeroAleatorio'] = rand(1,5);
?>
<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico" />
    <title>Fiction - Soluções completas em telefonia e internet</title>
</head>
<body onload="getLocation()">
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
    <div class="card position-absolute translate-middle-x centraliza" style="margin-top:10%" >
        <div class="card-body">
            <?php @mostraAviso() ?>
            <form action="valida.php" method="POST" name="frm" class="bg-white text-dark botoesCores">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu login">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senhaId" placeholder="Digite sua senha">
                </div>
                <input type="hidden" name="latitude">
                <input type="hidden" name="longitude">
                <button type="submit" class="btn btn-outline-primary" name="botaoLogin" value="botaoLogin">Entrar</button>
            </form>
        </div>
    </div>

    <canvas id="nokey" oncontextmenu="return false;"></canvas>
    <script>
        function getLocation() {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getPosition);
            }
            else{ 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function getPosition(position) {

            var latitude = document.frm.latitude;
            var longitude = document.frm.longitude;
            latitude.value = position.coords.latitude;
            longitude.value = position.coords.longitude;
        }
        </script>
    <script src="script.js"></script>
</body>
</html>