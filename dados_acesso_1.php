<?php
session_start();
/* aqui iria fuso horario*/
require_once("conexao.php");
require_once("funcoes.php");
if ($_SESSION['usu_tipo'] != 1) {

    $_SESSION['msg'] = "Área restrita";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Imagens/favicon.ico" />
    <title>Fiction - Soluções em tecnologia</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-12 col-sm-12">
                <div class="position-absolute top-0 start-0 end-0">
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand degradeMovimento" id="titulo" href="<?php echo mudaLink() ?>">
                        <img src="Imagens/fiction-icon.png" alt="" width="78.4px" height="78.4px" class="d-inline-block align-text-top">
                        Fiction
                        </a>
                        <ul class="d-flex">
                            <?php mostraBotaoLogout() ?>
                            <li><a class="navbar-brand degradeMovimento" href="cadastro.php">Cadastro</a></li>
                            <li><a class="navbar-brand degradeMovimento" href="modelagem.php">Modelo de dados</a></li>
                            <li><a class="navbar-brand degradeMovimento " href="queries.php">Queries SQL</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container overflow-hidden">
        <div class="row gy-5">
            <div class="card position-absolute top-50 start-50 translate-middle col-lg-4 col-md-6 col-sm-8">
                <div class="card-body">
                    <?php
                        $busca = "SELECT us.usu_login, ta.tent_data, ta.tent_hora, ta.tent_tipo_aut, ta.tent_aut FROM usuario AS us JOIN tentativa_acesso AS ta ON ta.tent_usu_id = us.usu_id"; 
                        $total_reg = "3"; // número de registros por página
                        @$pagina=$_GET['pagina'];
                        if (!$pagina) {

                            $pc = "1";
                            } 
                            else {
                                $pc = $pagina;
                        }
                        $inicio = $pc - 1;
                        $inicio = $inicio * $total_reg;
                        $limite = mysqli_query($conexao, "$busca LIMIT $inicio,$total_reg");
                        $todos = mysqli_query($conexao, "$busca");

                        $tr = mysqli_num_rows($todos); // verifica o número total de registros
                        $tp = $tr / $total_reg; // verifica o número total de páginas

                        while ($dados = mysqli_fetch_array($limite)) {

                            echo    '<ul class="list-group"> ';
                            echo        '<li class="list-group-item">' ;
                                    mostraRegistro($dados);
                            echo        '</li>';
                            echo    '</ul>';
                            echo '<hr>';
                        }

                        $anterior = $pc - 1;
                        $proximo = $pc + 1;
                        if ($pc > 1) {

                            echo '<div style="display: inline-block; margin-right: 100px">';
                            echo " <a href='?pagina=$anterior'><- Anterior</a> ";
                            echo '</div>';
                        }
                        if ($pc < $tp) {

                            echo '<div style="display: inline-block;">';
                            echo " <a href='?pagina=$proximo'>Próxima -></a>";
                            echo '</div>';
                        }
                    ?>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <label for="1" class="col-form-label col-form-label-lg"  style="font-size: 20px; display: inline-block">Página</label>
                                    <input type="text" name="pagina" class="form-control" id="1" style="max-width:50px;" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $pc ?>">
                                    <button class="btn btn-outline-primary" name="btnPag" style="max-width:50px;" type="submit" id="button-addon2">Ir</button>
                                </div>
                                    <a href="baixaPdf.php" target="_blank"><button class="btn btn-outline-primary" name="btnPdf" type="button" id="button-addon2" aria-label="Recipient's username" aria-describedby="button-addon2">Baixar PDF</button></a>
                                    <a href='logout.php'><button type="button" name="botaoLogout" class="btn btn-outline-primary" ><?php echo "Deslogar" ?></button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <ul class="list-group"> 
            <li class="list-group-item">tedsadas</li>
        </ul>
    </div>
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;" ></canvas>
    <script src="script.js"></script>
</body>
</html>