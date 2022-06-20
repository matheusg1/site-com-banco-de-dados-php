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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-8 mx-auto mt-4">
                <div class="card border-0 rounded-0 shadow">
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
                                    <h5>Query para adicionar registros na tabela de tentativa de login</h5>
                                    <p>Usada na aplicação valida.php</p>
                                </div>
                                </div>
                                <div class="carousel-item">
                                <img src="Imagens/autentica/query24.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Atualiza o tipo de autenticação usado caso seja usuário comum</h5>
                                    <p>Usada na página autentica.php</p>
                                </div>
                                </div>
                                <div class="carousel-item">
                                <img src="Imagens/autentica/query25.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Adiciona na tabela se o usuário autenticou ou não "S/N"</h5>
                                    <p>Usada na página autentica.php</p>
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
                                <img src="Imagens/baixaPlanilha/query20.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Recebe os registros de login, incluindo IP e geolocalização</h5>
                                    <p>Usada na aplicação baixaPlanilha.php</p>
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
            </div>
        </div>
    </div>
</body>
</html>