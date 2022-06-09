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

function mostraAutenticacao($x) {               //função que traduz os tipos de autenticação

    switch ($x) {

        case 1:                     
            $x = "3 primeiros dígitos do CPF"; 
            break;
        case 2:
            $x = "3 últimos dígitos do CPF";    
            break;
        case 3:
            $x = "Número do celular";          
            break;
        case 4:
            $x = "Data de nascimento";          
            break;
        case 5:
            $x = "Nome materno";                
            break;
        default:
            $x = "Não necessária";              
        
    }
    return $x;
}

function autenticou($x) {                       

    if ($x == 'S') {
        return $x = "Sim";

    }
    else {
        return $x = "Não"; 
    }
}

function formataData($x) {                      //função que formata a data para um padrão mais convencional
    
    return date('d/m/Y',strtotime($x));

}

function mostraRegistro($dados) { 

    echo "Login: " . $dados['usu_login'] . "<br>";
    echo "Data: " . formataData($dados['tent_data']) . "<br>";
    echo "Hora: " . $dados['tent_hora'] . "<br>";
    echo "Autenticou: " . autenticou($dados['tent_aut']) . "<br>";
    echo "Tipo de autenticação: " . mostraAutenticacao($dados['tent_tipo_aut']) . "<br>";
}

function obter3Primeiros($x) {

    return substr($x, 0, -8);
}

function obter3Ultimos($x) {

    return substr($x, -3);
}

function mudaLink(){

    if (@isset($_SESSION['usu_tipo'])){

        switch($_SESSION['usu_tipo']){
    
            case 1:
                $mudaLink = 'dados_acesso_1.php';
                break;
            case 2:
                $mudaLink = 'dados_acesso_2.php';
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
            echo '<li><a class="navbar-brand degradeMovimento" href="logout.php">Deslogar</a></li>';
        }
    }
}

function mostraMudanca() {

    if (isset($_SESSION['mudaDados'])){
        echo   '<div class="card border-dark mb-3" style="max-width: 100%; max-height:20px; text-align:center; align-items:center; margin: 0 300px 0 300px; padding-bottom:60px ">
                    <div class="card-body text-dark">
                        <h5 class="card-title">' . $_SESSION['mudaDados'] . '<br></h5>
                    </div>
                </div>';
        unset ($_SESSION['mudaDados']);
    }
}
?>
