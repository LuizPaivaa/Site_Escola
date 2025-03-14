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
    <title>Curso CTMA - Administrção</title>
    <link rel="stylesheet" href="subirtela.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    

    <style>
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
    background-color: blue !important;  /* Cor verde */
    
    }
    /* Responsividade para Tabela */
    @media (max-width: 768px) {
    .table {
        font-size: 0.9rem;
        }
    }

    .table th {
    background-color: blue;  /* Cor verde */
    color: white;  /* Cor da fonte branca */
    font-weight: bold;
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
                    <img src="img/TurnaG (2).jpeg" class="d-block w-100" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Curso de Administração</h5>
                        <p>Habilite-se em uma area de muitos segmentos no mercado de trabalho.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/adm.jpeg" class="d-block w-100" alt="Banner 2">
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
                         A Administração oferece uma ampla gama de opções de atuação. Com um diploma na área, você pode trabalhar em praticamente qualquer setor: empresas privadas, públicas, ONGs, consultorias, empreendendo seu próprio negócio ou até mesmo em cargos de liderança em instituições internacionais. Seja qual for sua paixão ou área de interesse, as habilidades adquiridas em Administração são aplicáveis e valiosas em diversos contextos.
                   
                         <br>
                        
                             O curso de Administração vai além dos conceitos teóricos. Ele proporciona o desenvolvimento de habilidades essenciais como liderança, tomada de decisão, negociação, comunicação, trabalho em equipe, visão estratégica e análise crítica. 
                             <br>Essas competências são fundamentais em qualquer carreira e são altamente valorizadas no mercado de trabalho.
                   
                             <br>
                            Se você sonha em ter seu próprio negócio, a Administração é a base ideal para isso. <br>
                            Durante o curso, você aprende sobre planejamento estratégico, gestão financeira, marketing, recursos humanos e muitas outras áreas cruciais para empreender com sucesso. 
                            <br>
                            O conhecimento adquirido vai ajudar a transformar uma ideia em um projeto real e sustentável, minimizando riscos e aumentando as chances de sucesso.
                  
                           <br>
                            A formação em Administração é uma das mais procuradas pelas empresas, especialmente em tempos de transformação digital e globalização. <br>
                            Profissionais capacitados para gerenciar recursos, otimizar processos e pensar estrategicamente são sempre requisitados. <br>
                            Isso garante uma alta taxa de empregabilidade, com possibilidades de crescimento contínuo na carreira
                   
                            <br>
                            Uma das maiores vantagens do curso de Administração é a capacidade de desenvolver uma visão global sobre os negócios. <br>
                             Você aprende a enxergar as organizações como um todo, entendendo a interdependência entre áreas como finanças, marketing, recursos humanos, operações, entre outras. <br>
                              Essa visão ampla é crucial para a tomada de decisões eficazes e para o sucesso de qualquer organização.
                </p>
            </div>
            <div class="col-md-6 d-flex flex-column gap-3">
                <img src="img/adm1.jpeg" class="img-fluid rounded" alt="Imagem 1">
                <img src="img/TurnaG (4).jpeg" class="img-fluid rounded" alt="Imagem 2">
            </div>
        </div>
    </section>

    <!-- Grade Curricular -->

    <!-- 1º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">1º Módulo – Técnico em Administração</h3>
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
                    <td>046</td>
                    <td>CAL</td>
                    <td>Cálculos Financeiros</td>
                    <td>60</td>
                    <td>3</td>
                    <td>NELSON</td>
                </tr>
                <tr>
                    <td>047</td>
                    <td>GPI</td>
                    <td>Gestão de Pessoas I</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>048</td>
                    <td>IED</td>
                    <td>Introdução ao Estudo do Direito</td>
                    <td>40</td>
                    <td>2</td>
                    <td>ANDRÉ</td>
                </tr>
                <tr>
                    <td>049</td>
                    <td>LTT</td>
                    <td>Linguagem, Trabalho e Tecnologia</td>
                    <td>40</td>
                    <td>2</td>
                    <td>MARISA</td>
                </tr>
                <tr>
                    <td>050</td>
                    <td>PLE</td>
                    <td>Planejamento Estratégico</td>
                    <td>60</td>
                    <td>3</td>
                    <td>CARLOS MAGNO</td>
                </tr>
                <tr>
                    <td>051</td>
                    <td>POC</td>
                    <td>Processos Operacionais Contábeis</td>
                    <td>80</td>
                    <td>4</td>
                    <td>NELSON</td>
                </tr>
                <tr>
                    <td>052</td>
                    <td>TEO</td>
                    <td>Técnicas Organizacionais</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>053</td>
                    <td>TGA</td>
                    <td>Teoria Geral da Administração</td>
                    <td>100</td>
                    <td>5</td>
                    <td>CARLOS MAGNO</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- 2º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">2º Módulo – Técnico em Administração</h3>
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
                    <td>054</td>
                    <td>MKT</td>
                    <td>Administração em Marketing</td>
                    <td>100</td>
                    <td>5</td>
                    <td>CARLOS MAGNO</td>
                </tr>
                <tr>
                    <td>055</td>
                    <td>CAE</td>
                    <td>Cálculos Estatísticos</td>
                    <td>40</td>
                    <td>2</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>056</td>
                    <td>COC</td>
                    <td>Custos e Operações Contábeis</td>
                    <td>60</td>
                    <td>3</td>
                    <td>NELSON</td>
                </tr>
                <tr>
                    <td>057</td>
                    <td>GPII</td>
                    <td>Gestão de Pessoas II</td>
                    <td>80</td>
                    <td>4</td>
                    <td>NELSON</td>
                </tr>
                <tr>
                    <td>058</td>
                    <td>GEI</td>
                    <td>Gestão Empreendedora e Inovação</td>
                    <td>100</td>
                    <td>5</td>
                    <td>CARLOS MAGNO</td>
                </tr>
                <tr>
                    <td>059</td>
                    <td>LEG</td>
                    <td>Legislação Empresarial</td>
                    <td>60</td>
                    <td>3</td>
                    <td>ANDRÉ</td>
                </tr>
                <tr>
                    <td>060</td>
                    <td>TRD</td>
                    <td>Tecnologia e Recursos Digitais</td>
                    <td>60</td>
                    <td>3</td>
                    <td>CRISTIANE</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- 3º MÓDULO -->
    <section class="container my-5">
        <h3 class="text-center mb-4">3º Módulo – Técnico em Administração</h3>
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
                    <td>061</td>
                    <td>GPM</td>
                    <td>Gestão da Produção e Materiais</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>062</td>
                    <td>GPIII</td>
                    <td>Gestão de Pessoas III</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>063</td>
                    <td>GFE</td>
                    <td>Gestão Financeira e Econômica</td>
                    <td>100</td>
                    <td>5</td>
                    <td>NELSON</td>
                </tr>
                <tr>
                    <td>064</td>
                    <td>ING</td>
                    <td>Inglês Instrumental</td>
                    <td>40</td>
                    <td>2</td>
                    <td>LUIZ CLEBERTOM</td>
                </tr>
                <tr>
                    <td>065</td>
                    <td>LOG</td>
                    <td>Logística Empresarial</td>
                    <td>100</td>
                    <td>5</td>
                    <td>CARLOS MAGNO</td>
                </tr>
                <tr>
                    <td>066</td>
                    <td>MKI</td>
                    <td>Marketing Institucional</td>
                    <td>40</td>
                    <td>2</td>
                    <td>CARLOS MAGNO</td>
                </tr>
                <tr>
                    <td>067</td>
                    <td>NEG</td>
                    <td>Negociação Internacional</td>
                    <td>40</td>
                    <td>2</td>
                    <td>SIMONE</td>
                </tr>
                <tr>
                    <td>068</td>
                    <td>PIN</td>
                    <td>Projeto Integrado de Negócios</td>
                    <td>60</td>
                    <td>3</td>
                    <td>SIMONE</td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php include_once"footer.php" ?>

      <!-- Botão para voltar ao topo -->
      <button onclick="scrollToTop()" id="backToTopBtn" title="Voltar ao topo">↑</button>

    <!-- Bootstrap e JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="subirtela.js"></script>
    
</body>
</html>
