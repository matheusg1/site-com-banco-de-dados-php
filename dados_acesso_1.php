<?php
    session_start();
    require_once("conexao.php");
    require_once("funcoes.php");
    permiteUsuario1();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico" />
    <title>Fiction - Soluções completas em telefonia e internet</title>
</head>
<body>
    <div class="top-0 start-0 end-0">
        <nav class="navbar navbar-light bg-light">
            <div class="titulo">
                <a class="navbar-brand degradeMovimento mx-5" href="<?php echo mudaLink() ?>">
                <img src="Imagens/Fiction-icon.png" alt="" class="d-inline-block align-text-middle">
                <span class="px-3">Fiction</span>
                </a>
            </div>
            <div class="barraNav">
                <ul class="d-flex float-end mx-5 text-uppercase">
                    <?php mostraBotaoLogout() ?>
                    <li><a class="navbar-brand degradeMovimento" href="cadastro.php">Cadastro</a></li>
                    <li><a class="navbar-brand degradeMovimento" href="modelagem.php">Modelo de dados</a></li>
                    <li><a class="navbar-brand degradeMovimento " href="queries.php">Queries SQL</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="position-absolute translate-middle-x table-hover m-5 centraliza">
        <table class="table table-hover text-black table-bordered caption-top rounded-top" id="tableRegistros">
        <caption class="text-white">Registros de login</caption>
            <thead class="table-light border-dark border-bottom border-3 rounded-top">
                <tr>
                <th scope="col">Login</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Autenticou</th>
                <th scope="col">Tipo de autenticação</th>
                <th scope="col">Endereço IP</th>
                <th scope="col">Coordenadas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $busca = "SELECT us.usu_login, ta.tent_data, ta.tent_hora, aut.aut_desc, tia.tipo_desc, ta.tent_ip, ta.tent_lat, ta.tent_lon
                    FROM tentativa_acesso AS ta
                    JOIN usuario AS us ON us.usu_id = ta.tent_usu_id 
                    JOIN autenticou AS aut ON ta.autenticou_id = aut.autenticou_id 
                    JOIN tipo_autenticacao AS tia ON ta.tipo_aut_id = tia.tipo_id
                    ORDER BY ta.tent_id DESC";

                    $_SESSION['busca'] = $busca;

                    $total_reg = "8"; // número de registros por página
                    @$pagina=$_GET['pagina'];
                    if (!$pagina) {

                        $pc = "1";
                    } 
                    else {
                        $pc = $pagina;
                    }
                    $inicio = $pc - 1;
                    $inicio = $inicio * $total_reg;
                    $limite = mysqli_query($conexao, "$busca LIMIT $inicio, $total_reg");
                    $todos = mysqli_query($conexao, "$busca");

                    $tr = mysqli_num_rows($todos); // verifica o número total de registros
                    $tp = $tr / $total_reg; // verifica o número total de páginas

                    while ($dados = mysqli_fetch_array($limite)) {              //xxxxxxx
                        
                        echo '<tr>';
                        echo '<td>'.$dados["usu_login"].'</td>';
                        echo '<td>'. formataData($dados["tent_data"]).'</td>';
                        echo '<td>'.$dados["tent_hora"].'</td>';
                        echo '<td>'.$dados["aut_desc"].'</td>';
                        echo '<td>'.$dados["tipo_desc"].'</td>';
                        echo '<td>'.$dados["tent_ip"].'</td>';
                        echo "<form action='mapa.php' method='POST'>";
                        echo "<input type='hidden' name='lati' value='" . $dados['tent_lat'] . "'>";
                        echo "<input type='hidden' name='longi' value='" . $dados['tent_lon'] . "'>";
                        echo "<td><button type='submit' class='botaoInvisivel'>" . $dados['tent_lat']." " . $dados['tent_lon']." </button> </td>";
                        echo "</form>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <div class="card rounded-0 rounded-bottom">
            <div class="card-body botoesCores">
                <form action="" method="GET" >
                    <div class="input-group mb-3">
                        <label for="1" class="col-form-label col-form-label-lg">Página</label>
                        <input type="text" name="pagina" class="form-control" id="1" style="max-width:50px;" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $pc ?>">
                        <button class="btn btn-outline-primary" name="btnPag" type="submit" id="button-addon2">Ir</button> <div class="col-form-label col-form-label-lg">de <?php echo ceil($tp) ?></div>
                    </div>
                        <a href="baixaPlanilha.php" class="btn btn-outline-primary" name="btnPlanilha" type="button" id="button-addon2" aria-label="Recipient's username" aria-describedby="button-addon2" target="_blank">Baixar Planilha</a>
                        <a href='logout.php' type="button" name="botaoLogout" class="btn btn-outline-primary" >Deslogar</a>
                </form>
            </div>
        </div>
    </div>
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;" ></canvas>
    <script src="script.js"></script>
</body>
</html>