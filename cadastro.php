<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once("funcoes.php");

$botaoRegistrar = filter_input(INPUT_POST, 'botaoRegistrar');

if ($botaoRegistrar) {
    
    require_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados["senha"] = password_hash($dados["senha"], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO usuario VALUES (null, ?, ?, ?, ?, ?, ?, ?, '2', ?, ?)"; 
    
    if($stmt = mysqli_prepare($conexao, $sql)) {

        mysqli_stmt_bind_param($stmt, 'sssssssss', $param_usu_nome, $param_usu_nascimento, $param_usu_nomemat, $param_usu_cpf, $param_usu_celular, $param_usu_fixo, $param_usu_endereco, $param_usu_login, $param_usu_senha);

        $param_usu_nome = $dados['nome'];
        $param_usu_nascimento = $dados['nascimento'];
        $param_usu_nomemat = $dados['nomemat'];
        $param_usu_cpf = $dados['cpf'];
        $param_usu_celular = $dados['celular'];
        $param_usu_fixo = $dados['fixo'];
        $param_usu_endereco = $dados['endereco'];
        $param_usu_login = $dados['login'];
        $param_usu_senha = $dados['senha'];

        if(mysqli_stmt_execute($stmt)){

            mysqli_commit($conexao);
            mysqli_stmt_close($stmt);
            mysqli_close($conexao);

            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
            header("location: index.php");
        }
        else{

            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
        }
    }
}
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
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xxl-9 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                    <?php mostraAviso(); apagaAviso() ?>
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <label for="nomeId" class="col-sm-2 col-form-label col-form-label-lg">Nome*</label>
                                <input type="text" name="nome" class="form-control" id="nomeId" placeholder="Digite seu nome" aria-label="Recipients username" aria-describedby="button-addon2" autofocus>
                            </div>
                                
                            <div class="input-group mb-3">
                                <label for="nascimentoId" class="col-sm-2 col-form-label col-form-label-lg">Data de nascimento*</label>
                                <input type="date" name="nascimento" class="form-control" id="nascimentoId" max="<?php dataLimite() ?>" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="nomeMatId" class="col-sm-2 col-form-label col-form-label-lg">Nome materno*</label>
                                <input type="text" name="nomemat" class="form-control" id="nomeMatId" placeholder="Digite o nome da sua mãe" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="cpfId" class="col-sm-2 col-form-label col-form-label-lg">CPF*</label>
                                <input type="text" name="cpf" class="form-control" id="cpfId" minlength="11" maxlength="11" placeholder="Digite seu número de CPF" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="celularId" class="col-sm-2 col-form-label col-form-label-lg">Celular*</label>
                                <input type="text" name="celular" class="form-control" id="celularId" minlength="11" maxlength="11" placeholder="Digite seu número (com DDD)" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="fixoId" class="col-sm-2 col-form-label col-form-label-lg">Telefone</label>
                                <input type="text" name="fixo" class="form-control" minlength="8" id="fixoId" placeholder="Digite seu número" aria-label="Recipients username" aria-describedby="button-addon2">
                            </div>

                            <div class="input-group mb-3">
                                <label for="enderecoId" class="col-sm-2 col-form-label col-form-label-lg">Endereço</label>
                                <input type="text" name="endereco" class="form-control" id="enderecoId" placeholder="Digite seu endereço completo" aria-label="Recipients username" aria-describedby="button-addon2">
                            </div>

                            <div class="input-group mb-3">
                                <label for="login" class="col-sm-2 col-form-label col-form-label-lg">Login*</label>
                                <input type="text" name="login" id="login" maxlength="15" class="form-control" id="8" placeholder="Crie seu login" aria-label="Recipients username" aria-describedby="button-addon2" required>
                            </div>

                            <div class="input-group mb-3">
                                <label for="senha" class="col-sm-2 col-form-label col-form-label-lg">Senha*</label>
                                <input type="password" maxlength="15" name="senha" maxlength="15"  class="form-control" id="senha" placeholder="Crie sua senha" aria-label="Recipiens username" aria-describedby="button-addon2" required>
                            </div>
                            <div class="text-center d-grid gap-2 col-6 mx-auto">
                                <button type="submit" name="botaoRegistrar" value="registrar" class="btn btn-outline-primary btn-lg fs-5">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>