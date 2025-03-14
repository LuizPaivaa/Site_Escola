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
    <title>Curso CTMA - Nutrição</title>
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
    background-color: #28a745 !important;  /* Cor verde */
    
    }

    /* Responsividade para Tabela */
    @media (max-width: 768px) {
    .table {
        font-size: 0.9rem;
        }
    }

    .table th {
    background-color: #28a745;  /* Cor verde */
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
                    <img src="img/banner.jpg" class="d-block w-100" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Curso de Nutrição e Dietética</h5>
                        <p>Desenvolva habilidades em nutrição e bem-estar.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/panqueca.jpg" class="d-block w-100" alt="Banner 2">
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
                <p>O Curso Técnico em Nutrição e Dietética do CTMA forma profissionais preparados para atuar em diferentes áreas da alimentação, com foco na saúde e qualidade de vida. Desde o início, o aluno é introduzido a disciplinas como Higiene e Microbiologia de Alimentos, que ensina os cuidados necessários para garantir a segurança alimentar, além de Princípios Básicos de Nutrição Humana, que aborda os nutrientes essenciais para a saúde.</p>
                <p>O curso inclui uma forte base prática, com disciplinas como Técnicas em Dietética, que ensina o planejamento e preparação de refeições equilibradas, e Administração em Serviços Alimentares, capacitando o aluno a gerir cozinhas industriais, hospitalares e de restaurantes, assegurando qualidade e eficiência.</p>
                <p>A avaliação nutricional também é um ponto-chave do curso, abordada em disciplinas como Avaliação Diagnóstica Nutricional, onde o aluno aprende a analisar o estado nutricional de indivíduos e grupos. Já em Planejamento Alimentar, são ensinadas técnicas para desenvolver dietas personalizadas, considerando aspectos como idade, sexo, condições de saúde e estilo de vida.</p>
                <p>O curso aborda ainda questões importantes como Educação Nutricional, que capacita os alunos a desenvolver programas de conscientização sobre a alimentação saudável, e Tecnologia dos Alimentos, que explora os processos de conservação e industrialização de alimentos, preparando o aluno para inovar na área de produção alimentícia. Matérias complementares como Bioestatística e Empreendedorismo também são abordadas, garantindo uma formação completa para atuar em hospitais, escolas, empresas de alimentação e consultórios.</p>
            </div>
            <div class="col-md-6 d-flex flex-column gap-3">
                <img src="img/prato_zika.jpg" class="img-fluid rounded" alt="Imagem 1">
                <img src="img/cozinha1.jpg" class="img-fluid rounded" alt="Imagem 2">
            </div>
        </div>
    </section>

    <!-- Grade Curricular -->
    <section class="container my-5">
        <h3 class="text-center mb-4">Grade Curricular</h3>

        <!-- 1º Módulo - 1º Semestre -->
        <h4 class="mb-3 text-center">1º Módulo</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>025</td>
                    <td>ASAI</td>
                    <td>Administração em Serviços Alimentares I</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Maria Helena</td>
                </tr>
                <tr>
                    <td>026</td>
                    <td>ETC</td>
                    <td>Ética e Cidadania</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Talita</td>
                </tr>
                <tr>
                    <td>027</td>
                    <td>HMA</td>
                    <td>Higiene e Microbiologia de Alimentos</td>
                    <td>80h</td>
                    <td>4</td>
                    <td>Heverton</td>
                </tr>
                <tr>
                    <td>028</td>
                    <td>ING</td>
                    <td>Inglês Básico</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Luiz Clebertom</td>
                </tr>
                <tr>
                    <td>029</td>
                    <td>POR</td>
                    <td>Português Instrumental</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Marisa</td>
                </tr>
                <tr>
                    <td>030</td>
                    <td>PBN</td>
                    <td>Princípios Básicos da Nutrição Humana</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Maria Helena</td>
                </tr>
                <tr>
                    <td>031</td>
                    <td>TDI</td>
                    <td>Técnicas em Dietética I</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Heverton</td>
                </tr>
            </tbody>
        </table>

        <!-- 2º Módulo - 2º Semestre -->
        <h4 class="mb-3 text-center">2º Módulo</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>032</td>
                    <td>UPA</td>
                    <td>Adm. e Qual. em Unidades de Preparação de Alimentos</td>
                    <td>80h</td>
                    <td>4</td>
                    <td>Talita</td>
                </tr>
                <tr>
                    <td>033</td>
                    <td>ADN</td>
                    <td>Avaliação Diagnóstica Nutricional</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Talita</td>
                </tr>
                <tr>
                    <td>034</td>
                    <td>BEA</td>
                    <td>Bioestatística Aplicada à Nutrição</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Heverton</td>
                </tr>
                <tr>
                    <td>035</td>
                    <td>EDN</td>
                    <td>Educação Nutricional</td>
                    <td>80h</td>
                    <td>4</td>
                    <td>Maria Helena</td>
                </tr>
                <tr>
                    <td>036</td>
                    <td>NSC</td>
                    <td>Nutrição e Saúde Coletiva</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Maria Helena</td>
                </tr>
                <tr>
                    <td>037</td>
                    <td>PLA</td>
                    <td>Planejamento Alimentar e Nutrição Humana</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Maria Helena</td>
                </tr>
                <tr>
                    <td>038</td>
                    <td>TDII</td>
                    <td>Técnica em Dietética II</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Heverton</td>
                </tr>
            </tbody>
        </table>

        <!-- 3º Módulo - 3º Semestre -->
        <h4 class="mb-3 text-center">3º Módulo</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sigla</th>
                    <th>Disciplina</th>
                    <th>C/H</th>
                    <th>A/S</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>039</td>
                    <td>ASAII</td>
                    <td>Administração em Serviços Alimentares II</td>
                    <td>80h</td>
                    <td>4</td>
                    <td>Talita</td>
                </tr>
                <tr>
                    <td>040</td>
                    <td>EMT</td>
                    <td>Empreendedorismo e Mercado de Trabalho</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Simone</td>
                </tr>
                <tr>
                    <td>041</td>
                    <td>GRA</td>
                    <td>Gestão da Rotulagem de Alimentos</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Heverton</td>
                </tr>
                <tr>
                    <td>042</td>
                    <td>INF</td>
                    <td>Informática Básica</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>043</td>
                    <td>NDA</td>
                    <td>Noções de Dietoterápica Aplicada</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Talita</td>
                </tr>
                <tr>
                    <td>044</td>
                    <td>GAH</td>
                    <td>Técnica Dietética e Gastronomia Hospitalar</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Heverton</td>
                </tr>
                <tr>
                    <td>045</td>
                    <td>TEA</td>
                    <td>Tecnologia dos Alimentos</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Maria Helena</td>
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
