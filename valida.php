<?php
session_start();
require_once("conexao.php");
require_once("funcoes.php");
$_SESSION['ip_usu'] = recebeIp("local");
$_SESSION['lat'] = filter_input(INPUT_POST, 'latitude');
$_SESSION['lon'] = filter_input(INPUT_POST, 'longitude');
$botaoLogin = filter_input(INPUT_POST, 'botaoLogin');
$dataAtual = date('Y-m-d', strtotime(date("Y-m-d")));	
$horaAtual = date('H:i:s');								

if($botaoLogin){ 

	$login = filter_input(INPUT_POST, 'login'); 
	$senha = filter_input(INPUT_POST, 'senha');	

	if ((!empty($login)) AND (!empty($senha))) {

		$result_usuario = "SELECT usu_id, usu_nome, usu_nascimento, usu_nomemat, usu_cpf, usu_celular, usu_fixo, usu_endereco, tipo_usu_id, usu_login, usu_senha FROM usuario WHERE usu_login = '$login' LIMIT 1"; 
		$resultadoUsuario = mysqli_query($conexao, $result_usuario); 

		if($resultadoUsuario) {

			$row_usuario = mysqli_fetch_array($resultadoUsuario); 

			if(password_verify($senha, $row_usuario['usu_senha'])){ 


				$sql = "INSERT INTO tentativa_acesso (tent_data, tent_hora, tent_ip, tent_usu_id, tent_lat, tent_lon) VALUES (?, ?, ?, ?, ?, ?)";

				if($stmt = mysqli_prepare($conexao, $sql)){

					mysqli_stmt_bind_param($stmt, "sssiss", $data, $hora, $ip, $usu_id, $tent_lat, $tent_lon);
					
					$data = $dataAtual;
					$hora = $horaAtual;
					$ip = $_SESSION['ip_usu'];
					$usu_id = $row_usuario['usu_id'];
					$tent_lat = $_SESSION['lat']; //'-22.89491722245782';
					$tent_lon = $_SESSION['lon']; //'-43.17969660783541';
					
					if(mysqli_stmt_execute($stmt)){
			
						mysqli_commit($conexao);
						mysqli_stmt_close($stmt);
						mysqli_close($conexao);
					}
				}

				$_SESSION['usu_id'] = $row_usuario['usu_id'];		
				$_SESSION['usu_nome'] = $row_usuario['usu_nome'];
				$_SESSION['usu_nascimento'] = $row_usuario['usu_nascimento'];
				$_SESSION['usu_nomemat'] = $row_usuario['usu_nomemat'];
				$_SESSION['usu_cpf'] = $row_usuario['usu_cpf'];
				$_SESSION['usu_celular'] = $row_usuario['usu_celular'];
				$_SESSION['usu_fixo'] = $row_usuario['usu_fixo'];
				$_SESSION['usu_endereco'] = $row_usuario['usu_endereco'];
				$_SESSION['tipo_usu_id'] = $row_usuario['tipo_usu_id'];
				$_SESSION['usu_login'] = $row_usuario['usu_login'];
				$_SESSION['usu_senha'] = $row_usuario['usu_senha'];

				mysqli_free_result($resultadoUsuario);

				$_SESSION['numeroAleatorio'] = rand(1,5);

				if ($_SESSION['tipo_usu_id']) {

					header("Location: autentica.php");
				}
			}
			else{

				$_SESSION['msg'] = "Login e senha incorretos";
				header("Location: index.php");
			}
		}
	}
	else{

		$_SESSION['msg'] = "Login e senha incorretos";
		header("Location: index.php");
	}
}
else{

	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}
?>