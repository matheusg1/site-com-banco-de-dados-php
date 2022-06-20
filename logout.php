<?php
session_start();

unset($_SESSION['usu_id'], $_SESSION['usu_nome'], $_SESSION['usu_nascimento'], $_SESSION['usu_nomemat'],  $_SESSION['usu_cpf'], $_SESSION['usu_celular'], $_SESSION['usu_fixo'], $_SESSION['usu_endereco'], $_SESSION['tipo_usu_id'], $_SESSION['usu_login'], $_SESSION['usu_senha'], $_SESSION['botaoLogin'], $_SESSION['busca'], $_SESSION['ip_usu'], $_SESSION['lat'], $_SESSION['lon']);

if ($_SESSION['contaApagada']) {
    $_SESSION['msg'] = 'Dados excluídos com sucesso';
    unset($_SESSION['contaApagada']);
}
else if ($_SESSION['aut']){
    $_SESSION['msg'] = 'Deslogado com sucesso';
    unset($_SESSION['aut']);
}
else{
    $_SESSION['msg'] = 'Falha na autenticação';
    unset($_SESSION['usu_id'], $_SESSION['usu_nome'], $_SESSION['usu_nascimento'], $_SESSION['usu_nomemat'],  $_SESSION['usu_cpf'], $_SESSION['usu_celular'], $_SESSION['usu_fixo'], $_SESSION['usu_endereco'], $_SESSION['tipo_usu_id'], $_SESSION['usu_login'], $_SESSION['usu_senha'], $_SESSION['aut'], $_SESSION['botaoLogin'], $_SESSION['busca'], $_SESSION['ip_usu'], $_SESSION['lat'], $_SESSION['lon']);
}

header("Location: index.php");

/*mysqli_close($conexao);*/
?>
?>
