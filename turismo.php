<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso CTMA - Guia de Turismo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <style>
      /* Estilo para o Carrossel */
    #carouselSection .carousel-item img {
    height: 400px;
    object-fit: cover;
    }

    .carousel-caption h5 {
    font-size: 2rem;
    font-weight: bold;
    }

    .carousel-caption p {
    font-size: 1.2rem;
    }

    /* Imagens Laterais */
    section.container .img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    }
    .table th {
        background-color: rgb(255, 217, 0) !important;  /* Cor verde */
    
    }
    /* Responsividade para Tabela */
    @media (max-width: 768px) {
    .table {
        font-size: 0.9rem;
        }
    }

    .table th {
    background-color: rgb(255, 217, 0);  /* Cor verde */
    color: white;  /* Cor da fonte branca */
    font-weight: bold;
    }

    #backToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: blue; /* Fundo azul */
    color: white; /* Seta branca */
    border: none;
    border-radius: 50%; /* Botão redondo */
    width: 50px;
    height: 50px;
    font-size: 24px; /* Tamanho da seta */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

#backToTopBtn:hover {
    background-color: #0056b3; /* Tom de azul mais escuro ao passar o mouse */
}

    </style>
</head>

<body>
<?php include_once"header.php" ?>
    <!-- Carrossel -->
    <section id="carouselSection" class="container my-4">
        <div id="courseCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/TurnaG (1).jpeg" class="d-block w-100" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Curso de Guia Turismo</h5>
                        <p>Desenvolva uma Metologia de Tipos de Turismos Diversos</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/trenzinho.jpg" class="d-block w-100" alt="Banner 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Aprenda com os melhores</h5>
                        <p>Professores qualificados para seu aprendizado.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#courseCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#courseCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </section>

    <!-- Texto Explicativo e Imagens Laterais -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <br>
                    O turismo é um dos setores mais dinâmicos da economia mundial. No Brasil, com sua diversidade de
                    atrações, desde as praias paradisíacas até as cidades históricas e culturais, a demanda por
                    profissionais qualificados é crescente. Ao se tornar um guia de turismo, você terá acesso a um
                    mercado amplo e repleto de oportunidades, tanto em destinos populares como em locais menos
                    explorados.
                    <br>
                    <br>
                    O curso de Guia de Turismo oferece não apenas o aprendizado sobre os aspectos técnicos da profissão,
                    mas também um vasto conhecimento sobre a história, cultura, geografia e aspectos ambientais do
                    Brasil e do mundo. É uma chance de se aprofundar em temas fascinantes e se tornar uma referência no
                    que diz respeito à valorização do patrimônio cultural e natural.
                    <br>
                    <br>
                    Ser guia de turismo exige mais do que apenas saber informações sobre um destino: é necessário transmitir essas informações de forma clara, envolvente e empática. O curso prepara você para desenvolver habilidades de comunicação, oratória e interpretação, qualidades que são extremamente valorizadas em diversas áreas profissionais.
                    <br>
                    <br>
                    A profissão de guia de turismo é gratificante. Ao levar os visitantes a conhecer lugares novos e fascinantes, você se torna um facilitador de momentos inesquecíveis. Não há sensação melhor do que ver o brilho nos olhos de um turista ao descobrir uma nova cultura ou uma paisagem deslumbrante, sabendo que você foi parte disso. A satisfação pessoal vem ao perceber o impacto positivo que você tem na experiência de cada visitante.
                    <br>




                </p>

            </div>
            <div class="col-md-6 d-flex flex-column gap-3">
                <img src="img/cachoeira.jpg" class="img-fluid rounded" alt="Imagem 1">
                <img src="img/guia2.jpg" class="img-fluid rounded" alt="Imagem 2">
            </div>
        </div>
    </section>


    <!-- 1º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">1º Módulo – Técnico em Guia de Turismo</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Nome da Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>069</td>
                    <td>CEO</td>
                    <td>Comunicação e Expressão Oratória em Guiamentos</td>
                    <td>100</td>
                    <td>5</td>
                    <td>ANA PAULA</td>
                </tr>
                <tr>
                    <td>070</td>
                    <td>TUR</td>
                    <td>Fundamentos do Turismo</td>
                    <td>60</td>
                    <td>3</td>
                    <td>LUCIANE</td>
                </tr>
                <tr>
                    <td>071</td>
                    <td>GEO</td>
                    <td>Geografia Aplicada em Turismo Regional</td>
                    <td>60</td>
                    <td>3</td>
                    <td>ANA PAULA</td>
                </tr>
                <tr>
                    <td>072</td>
                    <td>MKT</td>
                    <td>Marketing e Empreendedorismo</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>073</td>
                    <td>EVE</td>
                    <td>Planejamento e Organização de Eventos</td>
                    <td>100</td>
                    <td>5</td>
                    <td>LUCIANE</td>
                </tr>
                <tr>
                    <td>074</td>
                    <td>TEG</td>
                    <td>Técnicas de Guiamento</td>
                    <td>60</td>
                    <td>3</td>
                    <td>ANA PAULA</td>
                </tr>
                <tr>
                    <td>075</td>
                    <td>HOT</td>
                    <td>Turismo em Hotelaria</td>
                    <td>60</td>
                    <td>3</td>
                    <td>LUCIANE</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- 2º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">2º Módulo – Técnico em Guia de Turismo</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Nome da Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>076</td>
                    <td>ESPI</td>
                    <td>Espanhol Aplicado ao Guiamento de Turismo I</td>
                    <td>60</td>
                    <td>3</td>
                    <td>ELIANA</td>
                </tr>
                <tr>
                    <td>077</td>
                    <td>HIS</td>
                    <td>História Aplicada ao Turismo Regional</td>
                    <td>100</td>
                    <td>5</td>
                    <td>LUCIANE</td>
                </tr>
                <tr>
                    <td>078</td>
                    <td>INGI</td>
                    <td>Inglês Aplicado no Setor Turístico I</td>
                    <td>60</td>
                    <td>3</td>
                    <td>LUIZ CLEBERTOM</td>
                </tr>
                <tr>
                    <td>079</td>
                    <td>DIR</td>
                    <td>Introdução ao Direito no Turismo</td>
                    <td>40</td>
                    <td>2</td>
                    <td>LUCIANE</td>
                </tr>
                <tr>
                    <td>080</td>
                    <td>LIBI</td>
                    <td>Libras I</td>
                    <td>40</td>
                    <td>2</td>
                    <td>RAFAEL</td>
                </tr>
                <tr>
                    <td>081</td>
                    <td>REC</td>
                    <td>Planejamento do Lazer e Recreações Turísticas</td>
                    <td>40</td>
                    <td>2</td>
                    <td>LUIZ FERNANDO</td>
                </tr>
                <tr>
                    <td>082</td>
                    <td>POR</td>
                    <td>Português Técnico</td>
                    <td>40</td>
                    <td>2</td>
                    <td>MARISA</td>
                </tr>
                <tr>
                    <td>083</td>
                    <td>AGE</td>
                    <td>Técnicas de Agenciamento em Turismo Receptivo</td>
                    <td>60</td>
                    <td>3</td>
                    <td>ANA PAULA</td>
                </tr>
                <tr>
                    <td>084</td>
                    <td>APL</td>
                    <td>Tecnologias e Aplicativos para o Turismo</td>
                    <td>60</td>
                    <td>3</td>
                    <td>CRISTIANE</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- 3º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">3º Módulo – Técnico em Guia de Turismo</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Nome da Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>085</td>
                    <td>ESPII</td>
                    <td>Espanhol Aplicado ao Guiamento de Turismo II</td>
                    <td>60</td>
                    <td>3</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>086</td>
                    <td>INGII</td>
                    <td>Inglês Aplicado no Setor Turístico II</td>
                    <td>40</td>
                    <td>2</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>087</td>
                    <td>LIBII</td>
                    <td>Libras II</td>
                    <td>60</td>
                    <td>3</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>088</td>
                    <td>PMP</td>
                    <td>Patrimônio e Manifestações Populares do Estado de São Paulo</td>
                    <td>100</td>
                    <td>5</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>089</td>
                    <td>PPT</td>
                    <td>Prática Profissional do Guia de Turismo Regional</td>
                    <td>100</td>
                    <td>5</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>090</td>
                    <td>PSO</td>
                    <td>Primeiros Socorros</td>
                    <td>40</td>
                    <td>2</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>091</td>
                    <td>TMA</td>
                    <td>Turismo e Meio Ambiente</td>
                    <td>100</td>
                    <td>5</td>
                    <td>---</td>
                </tr>
            </tbody>
        </table>
    </section>

    <button onclick="scrollToTop()" id="backToTopBtn" title="Voltar ao topo">↑</button>
    <?php include_once"footer.php" ?>
    <!-- Bootstrap e JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="subirtela.js"></script>
</body>

</html>