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
    <div class="card position-absolute top-50 start-50 translate-middle" id="formAutenticacao">
        <div class="card-body">
            <form action="" method="POST" class="bg-white text-dark">
                <div class="botoesCores">
                    <?php
                        $botaoLogin = filter_input(INPUT_POST, 'botaoLogin');
                        $_SESSION['botaoLogin'] = $botaoLogin; 
                        $cpf = $_SESSION['usu_cpf'];
                        $nomemat = $_SESSION['usu_nomemat'];
                        $celular = $_SESSION['usu_celular'];
                        $nascimento = $_SESSION['usu_nascimento'];
                        $numeroAleatorio = $_SESSION['numeroAleatorio'];
                        if ($_SESSION['usu_tipo'] == 2) { 

                            $sql = "UPDATE tentativa_acesso SET tent_tipo_aut=? ORDER BY tent_id DESC LIMIT 1"; 
                            $tipo = "i";
                            $param_id = $numeroAleatorio;
                            preparaEnviaFecha($sql, $tipo, $param_id);
                        }

                        switch ($numeroAleatorio) {

                            case 1:                                                 
                                $cpf1 = filter_input(INPUT_POST, 'cpf1');
                                

                                echo '<div class="input-group mb-3">
                                <label for="cpf1" class="col-sm-2 col-form-label col-form-label-lg">3 primeiros números do CPF</label>
                                <input type="text" class="form-control" name="cpf1" id="cpf1" maxlength="3" placeholder=" Digite os 3 primeiros números do seu CPF" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>';

                                if (obter3Primeiros($cpf) == $cpf1) {

                                    $_SESSION['aut'] = true;
                                }
                                break;

                            case 2:
                                $cpf2 = filter_input(INPUT_POST, 'cpf2');          

                                echo'<div class="input-group mb-3">
                                <label for="cpf2" class="col-sm-2 col-form-label col-form-label-lg">3 últimos números do CPF</label>
                                <input type="text" class="form-control" name="cpf2" id="cpf2" maxlength="3" placeholder="Digite os 3 últimos números do seu CPF" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>';

                                if (obter3Ultimos($cpf) == $cpf2) {

                                    $_SESSION['aut'] = true;
                                }
                                break;
                            case 3:                                             
                                $celular2 = filter_input(INPUT_POST, 'celular2');   

                                echo'<div class="input-group mb-3">
                                <label for="celularId2" class="col-sm-2 col-form-label col-form-label-lg">Número do celular</label>
                                <input type="text" class="form-control" name="celular2" id="celularId2" maxlength="11" placeholder="Digite o número do seu celular" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>';

                                if ($celular == $celular2) {
                                    
                                    $_SESSION['aut'] = true;
                                }
                                break;

                            case 4:                                                 
                                $nascimento2 = filter_input(INPUT_POST, 'nascimento2');
                                

                                echo'<div class="input-group mb-3">
                                <label for="nascimentoId2" class="col-sm-2 col-form-label col-form-label-lg">Data de nascimento</label>
                                <input type="date" class="form-control" name="nascimento2" id="nascimentoId2" max="' ,dataLimite(), '" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>';

                                if ($nascimento == $nascimento2) {
                                    
                                    $_SESSION['aut'] = true;
                                }

                                break;

                            case 5:                                                 

                                $nomemat2 = filter_input(INPUT_POST, 'nomemat2');

                                echo'<div class="input-group mb-3">
                                <label for="nomemat2" class="col-sm-2 col-form-label col-form-label-lg">Nome Materno</label>
                                <input type="text" class="form-control" name="nomemat2" id="nomemat2" aria-label="Recipients username" placeholder="Digite nome de sua mãe" aria-describedby="button-addon2" required>';

                                if (strtolower($nomemat) == strtolower($nomemat2)) {
                                    
                                    $_SESSION['aut'] = true;    
                                }
                            }

                        if ($_SESSION['usu_tipo'] == 1) {                           //caso usuário seja tipo 1, autenticação é definida como "S"

                            $_SESSION['aut'] = true;
                        }

                        if (($botaoLogin) or $_SESSION['usu_tipo'] == 1) {          //caso o 2º botão de login seja apertado ou o usuário seja tipo 1

                            if ($_SESSION['aut']) {

                                $sql = "UPDATE tentativa_acesso SET tent_aut=? ORDER BY tent_id DESC LIMIT 1";
                                $tipo = "s";
                                $param_id = "S";

                                preparaEnviaFecha($sql, $tipo, $param_id);

                                if (preparaEnviaFecha($sql, $tipo, $param_id)) {
                                    switch ($_SESSION['usu_tipo']) {

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
                                
                                $sql = "UPDATE tentativa_acesso SET tent_aut=? ORDER BY tent_id DESC LIMIT 1";
                                $tipo = "s";
                                $param_id = "N";
                                preparaEnviaFecha($sql, $tipo, $param_id);

                                if (preparaEnviaFecha($sql, $tipo, $param_id)) {

                                    $_SESSION['msg'] = "Dados incorretos";
                                
                                    header("Location: index.php");
                                } 
                            }
                        }
                    ?>

                        <button type="submit" name="botaoLogin" class="btn btn-outline-primary" value="botaoLogin" id="button-addon2">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>