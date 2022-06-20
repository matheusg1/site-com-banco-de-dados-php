<?php
date_default_timezone_set('America/Sao_Paulo');

function preparaEnviaFecha($sql, $tipo, $param_id) {

    require("conexao.php");

    $conexao = mysqli_connect($host, $user, $pass, $banco); // pq refiz a conexao? nao sei

    if ($stmt = mysqli_prepare($conexao, $sql)) {

        mysqli_stmt_bind_param($stmt, $tipo, $param_id);

        if(mysqli_stmt_execute($stmt)) {

            mysqli_commit($conexao);
            mysqli_stmt_close($stmt);
            mysqli_close($conexao);
            return true;
        }
    }
}

function dataLimite(){ //função que limita a data de nascimento

    echo date('Y-m-d',strtotime('-120 month', strtotime(str_replace("/", "-", (date('d-m-Y')))))); // 10 anos
}

function formataData($x) {                      //função que formata a data para um padrão mais convencional
    
    return date('d/m/Y',strtotime($x));

}

function obter3Primeiros($x) {          

    return substr($x, 0, -8);
}

function obter3Ultimos($x) {

    return substr($x, -3);
}

function mudaLink(){

    if (@isset($_SESSION['tipo_usu_id'])){ // caso haja valor no tipo de usuario

        switch($_SESSION['tipo_usu_id']){
    
            case 1:
                $mudaLink = 'dados_acesso_1.php';
                break;
            case 2:
                $mudaLink = 'dados_acesso_2.php';
                break;
        }
    }
    else{
        $mudaLink = 'index.php';
    }
    return $mudaLink;
}

function mostraBotaoLogout(){
    
    if (isset($_SESSION['aut'])){

        if ($_SESSION['aut']) {
            
            echo '<li class="nav-item degradeMovimento"><a class="nav-link " aria-current="page" href="logout.php">Deslogar</a></li>';
        }
    }
}

function mostraMudanca() { //usada na alteração de dados

    if (isset($_SESSION['mudaDados'])){

        echo   '<div class="card border-dark mb-3" style="max-width: 100%; max-height:20px; text-align:center; align-items:center; margin: 0 300px 0 300px; padding-bottom:60px ">
                    <div class="card-body text-dark">
                        <h5 class="card-title">' . $_SESSION['mudaDados'] . '<br></h5>
                    </div>
                </div>';
        unset ($_SESSION['mudaDados']);
    }
}

function checaRepeticao($resultado){ //cpf e login

    switch(mysqli_num_rows($resultado)) {

        case(0):
            return false;

        case(1):
            return true;
    } 
}

function recebeIp($tipo){

    if ($tipo == "local"){

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];

        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    else {

        return file_get_contents("http://ipecho.net/plain");
    }
}

function mostraAviso(){

    if(isset($_SESSION['msg'])){
                        
        echo '<div class="alert alert-secondary rounded-0" role="alert">';
        echo $_SESSION['msg'] . '</div>';
        return $_SESSION['msg'];

    }
    if(isset($_SESSION['msgcad'])){

        echo '<div class="alert alert-secondary rounded-0" role="alert">';
        echo $_SESSION['msgcad'] . '</div>';
        return $_SESSION['msgcad'];
    }
}

function apagaAviso(){
    
    if(isset($_SESSION['msg'])){
                        
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION['msgcad'])){

        unset($_SESSION['msgcad']);
    }
}

function permiteUsuario1(){

    if ($_SESSION['tipo_usu_id'] != 1) {

        $_SESSION['msg'] = "Área restrita";
        header("Location: index.php");
    }
}

function permiteUsuario2(){
    
    if (($_SESSION['tipo_usu_id'] != 2) || (!$_SESSION['aut'])) { 

        $_SESSION['msg'] = "Área restrita";
        header("Location: index.php");
    }
}
?>
