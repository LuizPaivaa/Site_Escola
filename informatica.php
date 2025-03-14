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
    background-color: #be0b0b !important;  /* Cor verde */
    
    }
    /* Responsividade para Tabela */
    @media (max-width: 768px) {
    .table {
        font-size: 0.9rem;
        }
    }

    .table th {
    background-color: #be0b0b;  /* Cor verde */
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
                    <img src="img/cs.jpg" class="d-block w-100" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Curso de Informática</h5>
                        <p>Desenvolva habilidades em Informática.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/feira.jpg" class="d-block w-100" alt="Banner 2">
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
                <p>O Curso Técnico em Informática do CTMA proporciona uma formação completa voltada para as necessidades da era digital. O aluno é capacitado para atuar no desenvolvimento de sistemas, programação, e gestão de redes e dados. Desde o início, são apresentadas disciplinas como Fundamentos da Informática, que aborda a estrutura dos computadores e seus componentes, além de Lógica de Programação, essencial para a criação de algoritmos e soluções eficientes.</p>
                <p>A formação continua com disciplinas práticas como Programação Web, onde o aluno aprende a desenvolver sites e aplicações para a internet, utilizando linguagens como HTML, CSS, e JavaScript, e Banco de Dados, que ensina a modelagem e gerenciamento de sistemas de informação. Com a matéria de Desenvolvimento para Dispositivos Móveis, os estudantes adquirem competências para criar aplicativos para smartphones e tablets, atendendo à crescente demanda por mobilidade.</p>
                <p>Além das habilidades técnicas, o curso inclui disciplinas como Redes de Computadores, que ensina a configurar e administrar redes locais e de longa distância, e Sistemas Operacionais, onde os alunos aprendem sobre o gerenciamento de sistemas Windows e Linux. A segurança da informação é outra área de destaque, abordada em disciplinas como Segurança Digital, capacitando o aluno a proteger sistemas contra ameaças cibernéticas.</p>
                <p>Para complementar a formação técnica, disciplinas como Gestão do Ambiente de TI e Administração de Serviços de Rede preparam o aluno para lidar com a infraestrutura de tecnologia da informação dentro de empresas, enquanto Empreendedorismo e Inglês Instrumental desenvolvem habilidades interpessoais e de comunicação, essenciais para o mercado globalizado.</p>
            </div>
            <div class="col-md-6 d-flex flex-column gap-3">
                <img src="img/computador.jpg" class="img-fluid rounded" alt="Imagem 1">
                <img src="img/pecas.jpg" class="img-fluid rounded" alt="Imagem 2">
            </div>
        </div>
    </section>

    <!-- Grade Curricular -->
    <section class="container my-5">
        <h3 class="text-center mb-4">Grade Curricular</h3>

        <!-- 1º Módulo - 1º Semestre -->
        <h4 class="mb-3 text-center">1º Módulo – 1º Semestre</h4>
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
                    <td>001</td>
                    <td>APL</td>
                    <td>Aplicativos</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Alexandre</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>ARD</td>
                    <td>Arte Digital</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Alexandre</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>BDI</td>
                    <td>Banco de Dados I</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Cristiane</td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>FUN</td>
                    <td>Fundamentos da Informática</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>GCW</td>
                    <td>Gestão de Conteúdo Web</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>006</td>
                    <td>ING</td>
                    <td>Inglês Instrumental</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Luiz Clebertom</td>
                </tr>
                <tr>
                    <td>007</td>
                    <td>LOG</td>
                    <td>Lógica de Programação</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Cristiane</td>
                </tr>
                <tr>
                    <td>008</td>
                    <td>PWI</td>
                    <td>Programação Web I</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Andresa</td>
                </tr>
                <tr>
                    <td>009</td>
                    <td>SOI</td>
                    <td>Sistema Operacional I</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
            </tbody>
        </table>

        <!-- 2º Módulo - 2º Semestre -->
        <h4 class="mb-3 text-center">2º Módulo – 2º Semestre</h4>
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
                    <td>010</td>
                    <td>ANS</td>
                    <td>Análise de Sistema</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Alexandre</td>
                </tr>
                <tr>
                    <td>011</td>
                    <td>BDII</td>
                    <td>Banco de Dados II</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Cristiane</td>
                </tr>
                <tr>
                    <td>012</td>
                    <td>GTI</td>
                    <td>Gestão do Ambiente de TI</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>013</td>
                    <td>LPI</td>
                    <td>Linguagem de Programação I</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Andresa</td>
                </tr>
                <tr>
                    <td>014</td>
                    <td>PWII</td>
                    <td>Programação Web II</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Cristiane</td>
                </tr>
                <tr>
                    <td>015</td>
                    <td>RED</td>
                    <td>Redes</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>016</td>
                    <td>SOII</td>
                    <td>Sistema Operacional II</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>017</td>
                    <td>TOO</td>
                    <td>Técnicas de Orientação a Objeto</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Cristiane</td>
                </tr>
            </tbody>
        </table>

        <!-- 3º Módulo - 3º Semestre -->
        <h4 class="mb-3 text-center">3º Módulo – 3º Semestre</h4>
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
                    <td>018</td>
                    <td>ASR</td>
                    <td>Administração e Serviços de Rede</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>019</td>
                    <td>DDM</td>
                    <td>Desenvolvimento para Dispositivos Móveis</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Alexandre</td>
                </tr>
                <tr>
                    <td>020</td>
                    <td>EMP</td>
                    <td>Empreendedorismo</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Alexandre</td>
                </tr>
                <tr>
                    <td>021</td>
                    <td>ERD</td>
                    <td>Ética nas Relações Digitais</td>
                    <td>40h</td>
                    <td>2</td>
                    <td>Humberto</td>
                </tr>
                <tr>
                    <td>022</td>
                    <td>LPII</td>
                    <td>Linguagem de Programação II</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Andresa</td>
                </tr>
                <tr>
                    <td>023</td>
                    <td>PWIII</td>
                    <td>Programação Web III</td>
                    <td>100h</td>
                    <td>5</td>
                    <td>Andresa</td>
                </tr>
                <tr>
                    <td>024</td>
                    <td>SED</td>
                    <td>Segurança Digital</td>
                    <td>60h</td>
                    <td>3</td>
                    <td>Humberto</td>
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
