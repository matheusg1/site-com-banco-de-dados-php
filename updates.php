<?php 
if (isset($btnNome)) {          

    $newNome = filter_input(INPUT_POST, 'newNome');

    if ($newNome != $_SESSION['usu_nome']) {

        $sql ='UPDATE usuario SET usu_nome =? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newNome;

        preparaEnviaFecha($sql, "s", $param_id);
        
        if(preparaEnviaFecha($sql, "s", $param_id)){

            $_SESSION['usu_nome'] = $newNome;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnData)) {          

    $newData = filter_input(INPUT_POST, 'newData');

    if ($newData != $_SESSION['usu_nascimento']) {

        $sql ='UPDATE usuario SET usu_nascimento =? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newData;

        preparaEnviaFecha($sql, "s", $param_id);

        if(preparaEnviaFecha($sql, "s", $param_id)){
            $_SESSION['usu_nascimento'] = $newData;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnNomemat)) {          

    $newNomemat = filter_input(INPUT_POST, 'newNomemat');

    if ($newNomemat != $_SESSION['usu_nomemat']) {

        $sql ='UPDATE usuario SET usu_nomemat =? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newNomemat;

        preparaEnviaFecha($sql, "s", $param_id);
        
        if(preparaEnviaFecha($sql, "s", $param_id)){
            $_SESSION['usu_nomemat'] = $newNomemat;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnCpf)) {          

    $newCpf = filter_input(INPUT_POST, 'newCpf');
    $query = 'SELECT usu_cpf FROM usuario WHERE usu_cpf = "' . $newCpf . '"'; 
    $add = mysqli_query($conexao, $query);

    if (checaRepeticao($add)) {
        $_SESSION['mudaDados'] = "CPF já cadastrado";
    } 
    else {

        if ($newCpf != $_SESSION['usu_cpf']) {

            $sql ='UPDATE usuario SET usu_cpf =? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
            $param_id = $newCpf;

            preparaEnviaFecha($sql, "s", $param_id);
            
            if(preparaEnviaFecha($sql, "s", $param_id)){

                $_SESSION['usu_cpf'] = $newCpf;
                $_SESSION['mudaDados'] = "Dados modificados com sucesso!";

            }
            else {
                echo "Erro";
            }
        }
    }
}

if (isset($btnCelular)) {          

    $newCelular = filter_input(INPUT_POST, 'newCpf');

    if ($newCelular != $_SESSION['usu_celular']) {

        $sql ='UPDATE usuario SET usu_celular=? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newCelular;
        
        preparaEnviaFecha($sql, "s", $param_id);

        if(preparaEnviaFecha($sql, "s", $param_id)){
            $_SESSION['usu_celular'] = $newCelular;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnFixo)) {          

    $newFixo = filter_input(INPUT_POST, 'newFixo');

    if ($newFixo != $_SESSION['usu_fixo']) {

        $sql ='UPDATE usuario SET usu_fixo=? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newFixo;

        preparaEnviaFecha($sql, "s", $param_id);
        
        if(preparaEnviaFecha($sql, "s", $param_id)){
            $_SESSION['usu_fixo'] = $newFixo;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnEndereco)) {          

    $newEndereco = filter_input(INPUT_POST, 'newEndereco');

    if ($newEndereco != $_SESSION['usu_endereco']) {

        $sql ='UPDATE usuario SET usu_endereco=? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newEndereco;

        preparaEnviaFecha($sql, "s", $param_id);
        
        if(preparaEnviaFecha($sql, "s", $param_id)){
            $_SESSION['usu_endereco'] = $newEndereco;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}

if (isset($btnLogin)) {          

    $newLogin = filter_input(INPUT_POST, 'newLogin');
    $query = 'SELECT usu_login FROM usuario WHERE usu_login = "' . $newLogin . '" '; 
    $add = mysqli_query($conexao, $query);

    if (checaRepeticao($add)) {
        $_SESSION['mudaDados'] = "Login já existente";
    } 
    else {

        if ($newLogin != $_SESSION['usu_login']) {

            $sql ='UPDATE usuario SET usu_login=? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
            $param_id = $newLogin;

            preparaEnviaFecha($sql, "s", $param_id);
            
            if(preparaEnviaFecha($sql, "s", $param_id)){

                $_SESSION['usu_login'] = $newLogin;
                $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
            }
            else {
                echo "Erro";
            }
        }
    }
}

if (isset($btnSenha)) {          

    $newSenha = filter_input(INPUT_POST, 'newSenha');
    $newSenha = password_hash($newSenha, PASSWORD_DEFAULT);

    if ($newSenha != $_SESSION['usu_senha']) {

        $sql ='UPDATE usuario SET usu_senha=? WHERE usu_id = "'. $_SESSION['usu_id'] . '"';
        $param_id = $newSenha;

        preparaEnviaFecha($sql, "s", $param_id);
        
        if(preparaEnviaFecha($sql, "s", $param_id)){

            $_SESSION['usu_senha'] = $newSenha;
            $_SESSION['mudaDados'] = "Dados modificados com sucesso!";
        }
        else {
            echo "Erro";
        }
    }
}
?>