<?php
session_start();
if ($_SESSION['tipo_usu_id'] != 1) {

    $_SESSION['msg'] = "Área restrita";
    header("Location: index.php");
}
require_once("conexao.php");
require_once("funcoes.php");
$latitude = filter_input(INPUT_POST, 'lati');
$longitude = filter_input(INPUT_POST, 'longi');
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
        <div class="card position-absolute translate-middle-x" id="cardMapa">
            <div class="card-body">
                <?php mostraMudanca() ?>
                <div id="googleMap"></div>
                    <script>
                        function myMap() {
                            var mapProp= {
                            center:new google.maps.LatLng(<?php echo $latitude ?>,<?php echo $longitude ?>),
                            zoom:16,
                            };
                            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                        }
                    </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIonYmVYj89m94E69F1caIa4MhMOTS1Jk&callback=myMap"></script>
                </body>
            </div>
        </div> 
    <canvas id="nokey"oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>