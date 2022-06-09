<?php
session_start();
require_once("conexao.php");
require_once("funcoes.php");

if (($_SESSION['usu_tipo'] != 2) || (!$_SESSION['aut'])) { //alta chance de erro aqui   

    $_SESSION['msg'] = "Área restrita";
    header("Location: index.php");
}

if(isset($_SESSION['msg'])){

    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$btnNome = filter_input(INPUT_POST, 'btnNome');
$btnData = filter_input(INPUT_POST, 'btnData');
$btnNomemat = filter_input(INPUT_POST, 'btnNomemat');
$btnCpf = filter_input(INPUT_POST, 'btnCpf');
$btnCelular = filter_input(INPUT_POST, 'btnCelular');
$btnFixo = filter_input(INPUT_POST, 'btnFixo');
$btnEndereco = filter_input(INPUT_POST, 'btnEndereco');
$btnLogin = filter_input(INPUT_POST, 'btnLogin');
$btnSenha = filter_input(INPUT_POST, 'btnSenha');
$btnAualiza = filter_input(INPUT_POST, 'btnAualiza');
$btnApagaConta = filter_input(INPUT_POST, 'btnApagaConta');
$btnLogout = filter_input(INPUT_POST, 'btnLogout');
$btnApagaConfirma = filter_input(INPUT_POST, 'btnApagaConfirma');
$btnVoltar = filter_input(INPUT_POST, 'btnVoltar');
require_once("updates.php");

if (isset($btnApagaConfirma)){

    $sql = "DELETE FROM tentativa_acesso WHERE tent_usu_id=?";
    $param_id = $_SESSION['usu_id'];

    preparaEnviaFecha($sql, "i", $param_id);

    $sql = "DELETE FROM usuario WHERE usu_id=?";
    preparaEnviaFecha($sql, "i", $param_id);
    
    $_SESSION['contaApagada'] = true;
    header("Location: logout.php");
}

if (isset($btnVoltar)) {

    header("Refresh:0");
}

if (isset($btnLogout)) {

header("Location: logout.php");
}
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
        <div class="card position-absolute top-50 start-50 translate-middle rounded-1" id="formulario" style="width:1500px; margin-top: 65px;">
            <div class="card-body">
                            <?php mostraMudanca() ?>
                <form action="" method="POST" class="bg-white text-dark">
                    <div class="botoesCores">
                        <div class="input-group mb-3">
                            <label for="1" class="col-sm-2 col-form-label col-form-label-lg">Nome</label>
                            <input style="" type="text" name="newNome" class="form-control" id="1" placeholder="Recipiens username" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_nome'] ?>" autofocus>
                            <button class="btn btn-outline-primary" name="btnNome" type="submit" id="button-addon2" >Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="2" class="col-sm-2 col-form-label col-form-label-lg">Data de nascimento</label>
                            <input type="date" name="newData" class="form-control" id="2" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_nascimento'] ?>" max="<?php dataLimite()?>"> <!-- ECHO? -->
                            <button class="btn btn-outline-primary" name="btnData" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="3" class="col-sm-2 col-form-label col-form-label-lg">Nome materno</label>
                            <input type="text" name="newNomemat" class="form-control" id="3"  aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_nomemat'] ?>">
                            <button class="btn btn-outline-primary" name="btnNomemat" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="4" class="col-sm-2 col-form-label col-form-label-lg">CPF</label>
                            <input type="text" name="newCpf" maxlength="11" class="form-control" id="4"  aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_cpf'] ?>">
                            <button class="btn btn-outline-primary" name="btnCpf" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="5" class="col-sm-2 col-form-label col-form-label-lg">Celular</label>
                            <input type="text" name="newCelular" maxlength="11" class="form-control" id="5" aria-label="Recipien username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_celular'] ?>">
                            <button class="btn btn-outline-primary" name="btnCelular" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="6" class="col-sm-2 col-form-label col-form-label-lg">Fixo</label>
                            <input type="text" name="newFixo" maxlength="10" class="form-control" id="6" aria-label="Recipies username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_fixo'] ?>">
                            <button class="btn btn-outline-primary" name="btnFixo" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="7" class="col-sm-2 col-form-label col-form-label-lg">Endereço</label>
                            <input type="text" name="newEndereco" class="form-control" id="7" placeholder="Recipients username" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_endereco'] ?>">
                            <button class="btn btn-outline-primary" name="btnEndereco" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="8" class="col-sm-2 col-form-label col-form-label-lg">Login</label>
                            <input type="text" maxlength="15" name="newLogin" class="form-control" id="8" placeholder="Recipients username" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $_SESSION['usu_login'] ?>">
                            <button class="btn btn-outline-primary" name="btnLogin" type="submit" id="button-addon2">Salvar</button>
                        </div>

                        <div class="input-group mb-3">
                            <label for="9" class="col-sm-2 col-form-label col-form-label-lg">Senha</label>
                            <input type="password" maxlength="15" name="newSenha" class="form-control" id="9" placeholder="Nova senha" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" name="btnSenha" type="submit" id="button-addon2">Salvar</button>
                        </div>
                        <div class="centraliza">
                            <?php

                                if (!isset($btnApagaConta)) {

                                    echo '<button type="submit" name="btnLogout" class="btn btn-outline-primary">Deslogar</button>';
                                    echo '<button type="submit" name="btnApagaConta" class="btn btn-outline-primary">Apagar conta</button>';
                                }
                                else{
                                    echo            'Tem certeza? ';
                                    echo            '<button type="submit" name="btnApagaConfirma" class="btn btn-outline-danger" id="botaoVermelho">Confirma</button>';
                                    echo            '<button type="submit" name="btnVoltar" class="btn btn-outline-primary">Voltar</button>';
                                }

                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>