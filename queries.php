<?php
session_start();
require_once("funcoes.php");
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
    <title>Fiction - Soluções em telefonia e internet</title>
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
    <div class="card position-absolute top-50 start-50 translate-middle">
        <div class="card-body">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-pause="hover">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8" aria-label="Slide 9"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9" aria-label="Slide 10"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="10" aria-label="Slide 11"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="11" aria-label="Slide 12"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="12" aria-label="Slide 13"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="13" aria-label="Slide 14"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="14" aria-label="Slide 15"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="15" aria-label="Slide 16"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="16" aria-label="Slide 17"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="17" aria-label="Slide 18"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="18" aria-label="Slide 19"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="19" aria-label="Slide 20"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="Imagens/valida/query1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Query para receber os registros do usuário</h5>
                        <p>Usada na aplicação valida.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/valida/query2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Query para adicionar a data e hora atual no momento do login</h5>
                        <p>Usada na aplicação valida.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/valida/query3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Coloca o id do usuário no último registro da tabela de tentativa de acesso</h5>
                        <p>Usada na aplicação valida.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/autentica/query4.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Usada para adicionar o tipo de autenticação</h5>
                        <p>Usada na página autentica.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/autentica/query5.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Adiciona na tabela se o usuário autenticou ou não "S/N"</h5>
                        <p>Usada duas vezes na página autentica.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/dados_1/query6.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Recebe os dados para exibição de todos registros de tentativa de login</h5>
                        <p>Usada na página dados_acesso_1.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/dados_2/query7.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Apaga os registros de tentativa de acesso relacionados ao id do usuário</h5>
                        <p>Usada na página dados_acesso_2.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/dados_2/query8.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Apaga os registros do usuário</h5>
                        <p>Usada na página dados_acesso_2.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query9.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o nome do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query10.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera a data de nascimento do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query11.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o nome materno do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query12.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Verifica se o CPF digitado já existe no banco de dados</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query13.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o CPF do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query14.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o número de celular do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query15.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o número de telefone fixo do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query16.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o endereço do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query17.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Verifica se o login já existe no banco de dados</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query18.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera o login do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/updates/query19.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Altera a senha do usuário</h5>
                        <p>Usada na aplicação updates.php</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="Imagens/baixaPdf/query20.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Recebe os dados para exibição de todos registros de tentativa de login</h5>
                        <p>Usada na página baixarPdf.php</p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <canvas id="nokey" width="100%" height="100%" oncontextmenu="return false;"></canvas>
    <script src="script.js"></script>
</body>
</html>