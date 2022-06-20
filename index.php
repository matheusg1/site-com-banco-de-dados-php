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
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico"/>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <title>Fiction - Soluções completas em telefonia e internet</title>
</head>
<body onload="getLocation()">
    <div id="particles-container" oncontextmenu="return false"><script>particlesJS.load('particles-container', 'particlesjs-config.json');</script></div>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="px-5 d-none d-lg-block"></div>
        <div class="container-fluid"><a class="navbar-brand titulo degradeMovimento" href="<?php echo mudaLink() ?>">
                <img src="Imagens/Fiction-icon.png" alt="" width="78.4px" height="78.4px" class="d-inline-block align-text-middle">
                Fiction
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav fs-4 text-uppercase">
                    <?php mostraBotaoLogout() ?>
                    <li class="nav-item degradeMovimento">
                    <a class="nav-link " aria-current="page" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item degradeMovimento">
                    <a class="nav-link" href="modelagem.php">Modelo de dados</a>
                    </li>
                    <li class="nav-item degradeMovimento">
                    <a class="nav-link" href="queries.php">Queries SQL</a>
                    </li>
                </ul>
                <div class="pe-5 d-none d-lg-block"></div>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row align-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-4 col-xl-4 col-xxl-2 m-auto mt-5">
                    <div class="card border-0 shadow rounded-0">
                        <div class="card-body">
                            <?php mostraAviso(); apagaAviso() ?>
                            <form action="valida.php" method="POST" name="frm" class="bg-white text-dark">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Login</label>
                                    <input type="text" name="login" class="form-control rounded-0" placeholder="Digite seu login" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                    <input type="password" name="senha" class="form-control rounded-0" id="senhaId" placeholder="Digite sua senha">
                                </div>
                                <input type="hidden" name="latitude">
                                <input type="hidden" name="longitude">
                                <div class="text-center d-grid gap-2">
                                    <button type="submit" class="btn btn-outline-primary rounded-0" name="botaoLogin" value="botaoLogin">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
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
</body>
</html>