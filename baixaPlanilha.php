<?php
	include_once("conexao.php");
		$arquivo = 'relatorioFiction.xls';

		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="6">Relatório Fiction</tr>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '<td><b>Login</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '<td><b>Hora</b></td>';
		$html .= '<td><b>Autenticou</b></td>';
		$html .= '<td><b>Forma de autenticação</b></td>';
		$html .= '<td><b>IP</b></td>';
		$html .= '</tr>';

		$result_msg_contatos = "SELECT us.usu_login, ta.tent_data, ta.tent_hora, aut.aut_desc, tia.tipo_desc, ta.tent_ip
		FROM tentativa_acesso AS ta
		JOIN usuario AS us ON us.usu_id = ta.tent_usu_id 
		JOIN autenticou AS aut ON ta.autenticou_id = aut.autenticou_id 
		JOIN tipo_autenticacao AS tia ON ta.tipo_aut_id = tia.tipo_id
		ORDER BY ta.tent_id DESC";
		$resultado_msg_contatos = mysqli_query($conexao , $result_msg_contatos);

		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["usu_login"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tent_data"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tent_hora"].'</td>';
			$html .= '<td>'.$row_msg_contatos["aut_desc"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tipo_desc"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tent_ip"].'</td>';
			$html .= '</tr>';
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
	exit;
?>