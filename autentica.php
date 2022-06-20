<?php
session_start();
require_once("funcoes.php");
require_once("conexao.php");
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
<body>
    <div id="particles-container" oncontextmenu="return false"><script>particlesJS.load('particles-container', 'particlesjs-config.json');</script></div>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm"">
        <div class="px-5 d-none d-lg-block"></div>
        <div class="container-fluid"><a class="navbar-brand titulo degradeMovimento" href="<?php echo 'logout.php' ?>">
                <img src="Imagens/Fiction-icon.png" alt="" width="78.4px" height="78.4px" class="d-inline-block align-text-middle">
                Fiction
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav fs-4 text-uppercase">
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
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-6 mx-auto">
                <div class="card rounded-0 border-0 shadow">
                    <div class="card-body">
                        <form action="" method="POST" class="bg-white text-dark">
                                <?php

                                    $botaoLogin = filter_input(INPUT_POST, 'botaoLogin');
                                    $_SESSION['botaoLogin'] = $botaoLogin; 
                                    $cpf = $_SESSION['usu_cpf'];
                                    $nomemat = $_SESSION['usu_nomemat'];
                                    $celular = $_SESSION['usu_celular'];
                                    $nascimento = $_SESSION['usu_nascimento'];
                                    $numeroAleatorio = $_SESSION['numeroAleatorio'];

                                    if ($_SESSION['tipo_usu_id'] == 2) { 

                                        $sql = "UPDATE tentativa_acesso SET tipo_aut_id=? ORDER BY tent_id DESC LIMIT 1"; //tipo de autenticação (1,5)
                                        $tipo = "i";
                                        $param_id = $numeroAleatorio;
                                        preparaEnviaFecha($sql, $tipo, $param_id);
                                    }

                                    switch ($numeroAleatorio) {

                                        case 1:                                                 
                                            $cpf1 = filter_input(INPUT_POST, 'cpf1');
                                            
                                            echo '<div class="input-group">
                                            <label for="cpf1" class="col-sm-4 col-form-label col-form-label-lg">3 primeiros números do CPF</label>
                                            <input type="text" class="form-control" name="cpf1" id="cpf1" maxlength="3" placeholder=" Digite os 3 primeiros números do seu CPF" aria-label="Recipients username" aria-describedby="button-addon2" required>';

                                            if (obter3Primeiros($cpf) == $cpf1) {

                                                $_SESSION['aut'] = true;
                                            }
                                            break;

                                        case 2:
                                            $cpf2 = filter_input(INPUT_POST, 'cpf2');          

                                            echo'<div class="input-group">
                                            <label for="cpf2" class="col-sm-2 col-form-label col-form-label-lg">3 últimos números do CPF</label>
                                            <input type="text" class="form-control" name="cpf2" id="cpf2" maxlength="3" placeholder="Digite os 3 últimos números do seu CPF" aria-label="Recipients username" aria-describedby="button-addon2" required>';

                                            if (obter3Ultimos($cpf) == $cpf2) {

                                                $_SESSION['aut'] = true;
                                            }
                                            break;
                                        case 3:                                             
                                            $celular2 = filter_input(INPUT_POST, 'celular2');   

                                            echo'<div class="input-group">
                                            <label for="celularId2" class="col-sm-2 col-form-label col-form-label-lg">Número do celular</label>
                                            <input type="text" class="form-control" name="celular2" id="celularId2" maxlength="11" placeholder="Digite o número do seu celular" aria-label="Recipients username" aria-describedby="button-addon2" required>';

                                            if ($celular == $celular2) {
                                                
                                                $_SESSION['aut'] = true;
                                            }
                                            break;

                                        case 4:                                                 
                                            $nascimento2 = filter_input(INPUT_POST, 'nascimento2');
                                            echo'<div class="input-group">
                                            <label for="nascimentoId2" class="me-2 col-form-label col-form-label-lg">Data de nascimento</label>
                                            <input type="date" class="form-control" name="nascimento2" id="nascimentoId2" max="' ,dataLimite(), '" aria-label="Recipients username" aria-describedby="button-addon2" required>';

                                            if ($nascimento == $nascimento2) {
                                                
                                                $_SESSION['aut'] = true;
                                            }
                                            break;

                                        case 5:                                                 

                                            $nomemat2 = filter_input(INPUT_POST, 'nomemat2');

                                            echo'<div class="input-group">
                                            <label for="nomemat2" class="col-sm-2 col-form-label col-form-label-lg">Nome Materno</label>
                                            <input type="text" class="form-control" name="nomemat2" id="nomemat2" aria-label="Recipients username" placeholder="Digite nome de sua mãe" aria-describedby="button-addon2" required>';

                                            if (@strtolower($nomemat) == @strtolower($nomemat2)) {
                                                
                                                $_SESSION['aut'] = true;    
                                            }
                                        }

                                    if ($_SESSION['tipo_usu_id'] == 1) { 

                                        $_SESSION['aut'] = true;
                                    }

                                    if (($botaoLogin) or $_SESSION['tipo_usu_id'] == 1) {

                                        if ($_SESSION['aut']) {

                                            $sql = "UPDATE tentativa_acesso SET autenticou_id=? ORDER BY tent_id DESC LIMIT 1";
                                            $tipo = "i";
                                            $param_id = "1";
                                            preparaEnviaFecha($sql, $tipo, $param_id);

                                            if (preparaEnviaFecha($sql, $tipo, $param_id)) {

                                                switch ($_SESSION['tipo_usu_id']) {

                                                    case 1:

                                                        header("Location: dados_acesso_1.php");
                                                        break;

                                                    case 2:
                                                        header("Location: dados_acesso_2.php");
                                                }
                                            }

                                        }
                                        else{

                                            $_SESSION['aut'] = false;
                                            
                                            $sql = "UPDATE tentativa_acesso SET autenticou_id=? ORDER BY tent_id DESC LIMIT 1";
                                            $tipo = "i";
                                            $param_id = "2";
                                            preparaEnviaFecha($sql, $tipo, $param_id);

                                            if (preparaEnviaFecha($sql, $tipo, $param_id)) {

                                                $_SESSION['msg'] = "Dados incorretos";
                                            
                                                header("Location: index.php");
                                            } 
                                        }
                                    }
                                ?>
                                    <button type="submit" name="botaoLogin" class="btn btn-outline-primary rounded-0" value="botaoLogin" id="button-addon2">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>