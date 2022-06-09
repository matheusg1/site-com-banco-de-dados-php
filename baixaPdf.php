<?php
    require_once("conexao.php");
	require_once("funcoes.php");
	

    $html = '<table border=1 align="center">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Login</th>';
	$html .= '<th>Data</th>';
	$html .= '<th>Hora</th>';
	$html .= '<th>Autenticou</th>';
	$html .= '<th>Tipo de autenticação</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_query = "SELECT us.usu_login, ta.tent_data, ta.tent_hora, ta.tent_tipo_aut, ta.tent_aut FROM usuario AS us JOIN tentativa_acesso AS ta ON ta.tent_usu_id = us.usu_id";
	$resultado_query = mysqli_query($conexao, $result_query);

	while ($row_dados = mysqli_fetch_array($resultado_query)) {

		$html .= '<tr><td>'.$row_dados['usu_login'] . "</td>";
		$html .= '<td>'. formataData($row_dados['tent_data']) . "</td>";
		$html .= '<td>'.$row_dados['tent_hora'] . "</td>";
		$html .= '<td>'. autenticou($row_dados['tent_aut']) . "</td>";	
		$html .= '<td>'. mostraAutenticacao($row_dados['tent_tipo_aut']) . "</td></tr>";
	}
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new Dompdf();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Fiction - Relatório de entradas</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_fiction.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>