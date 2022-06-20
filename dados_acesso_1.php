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
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xxl-9 mx-auto">
            <div class="card rounded-0 border-0 shadow mt-5">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <div class="table-hover">
                            <table class="table table-hover text-black  caption-top">
                            <caption class="text-white">Registros de login</caption>
                                <thead class="table-light border-dark border-bottom border-3">
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
                        </div>
                    </div>
                </div>
            </div>
                <div class="card rounded-0 border-0 shadow">
                    <div class="card-body">
                        <form action="" method="GET" >
                            <div class="text-center d-grid gap-2 col-6 mx-auto d-md-block">
                                <div class="input-group mb-3">
                                    <label for="1" class="col-form-label col-form-label-lg fs-4 px-3">Página</label>
                                    <input type="text" name="pagina" class="form-control col-xs-1" id="1" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $pc ?>">
                                    <button class="btn btn-outline-primary" name="btnPag" type="submit" id="button-addon2">Ir</button><div class="col-form-label col-form-label-md fs-4 px-3">de <?php echo ceil($tp) ?></div>
                                </div>
                                <a href="baixaPlanilha.php" class="btn btn-outline-primary mx-2 rounded-0" name="btnPlanilha" type="button" id="button-addon2" aria-label="Recipient's username" aria-describedby="button-addon2" target="_blank">Baixar Planilha</a>
                                <a href='logout.php' type="button" name="botaoLogout" class="btn btn-outline-primary mx-2 rounded-0" >Deslogar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>