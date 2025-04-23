<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Escolar do CTMA</title>
    <!-- LINKS DOS CSS -->
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- BOOTSTRAP ICONS -->
</head>

<body>
<?php include_once"header.php" ?>
    <!-- DESENVOLVIMENTO DO SITE -->
    <main>
<a href="https://docs.google.com/forms/d/e/1FAIpQLSe-PAJPH56xH2Hh80-_1NFaUq9-MnEtKVIFsHpzJVtnI0kNhg/viewform?embedded=true"><div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/banner_ctma1.png" class="d-block w-100" alt="Imagem 1">
        </div>
        <div class="carousel-item">
            <img src="img/banner_ctma2.png" class="d-block w-100" alt="Imagem 2">
        </div>
        <div class="carousel-item">
            <img src="img/banner_ctma1.png" class="d-block w-100" alt="Imagem 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
</div>


        </div></a>
    
        <!--FIM-JAVASCRIPT-BOOTSTRAP-CARROSEL-->

        </div>
        <!--FIM-CARROSSEL-->

        <section class="cursos">
    <div class="interface" id="cursos">
        <h2 class="titulo">CURSOS <span>DISPONÍVEIS.</span></h2>
        <div class="row">
            <div class="col-md-6 cursos-box destaque-informatica">
                
                <h3>Informática</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                <a href="informatica.php" class="btn saiba-mais">Saiba Mais</a>
            </div><!-- cursos-box -->

            <div class="col-md-6 cursos-box destaque-administracao">
                
                <h3>Administração</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                <a href="administracao.php" class="btn saiba-mais">Saiba Mais</a>
            </div><!-- cursos-box -->

            <div class="col-md-6 cursos-box destaque-nutricao">
                <h3>Nutrição e Dietética</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                <a href="nutricao.php" class="btn saiba-mais">Saiba Mais</a>
            </div><!-- cursos-box -->

            <div class="col-md-6 cursos-box destaque-turismo">
              
                <h3>Guia de Turismo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                <a href="turismo.php" class="btn saiba-mais">Saiba Mais</a>
            </div><!-- cursos-box -->
        </div><!-- row -->
    </div><!-- interface -->
</section><!-- cursos -->

<h2 class="titulo">NOSSA <span>EQUIPE.</span></h2>
<div class="team-container">
    <!-- Seletores de Cursos -->
    <div class="course-selector mb-4">
        <span class="course-link active" data-course="informatica" style="color: #ff0000;">Informática</span>
        <span class="course-link" data-course="administracao" style="color: #0000ff;">Administração</span>
        <span class="course-link" data-course="nutricao" style="color: #008000;">Nutrição</span>
        <span class="course-link" data-course="turismo" style="color: #ffa500;">Turismo</span>
        <span class="course-link" data-course="coordenacao" style="color: #00000;">Coordenação</span>
    </div>

    <!-- Slider de Professores -->
    <div class="d-flex justify-content-between align-items-center">
        <span class="navigation" id="prev">&lt;</span>
        <div id="professors-slider" class="d-flex justify-content-center flex-wrap"></div>
        <span class="navigation" id="next">&gt;</span>
    </div>
</div>


                    <!-- AREA DE NOTICIAS -->
                    <section class="noticias">
                        <h2 class="titulo">Últimas <span>Notícias</span></h2>
                        <div class="noticias-grid">
                            <div class="noticia">
                                <div class="data">08 de Novembro, 2024</div>
                                <img src="img/ctma2.png" alt="Imagem da notícia">
                                <h3>Tecnologia revoluciona o setor da educação</h3>
                                <p>Com o avanço da tecnologia, novas ferramentas estão transformando o ambiente
                                    educacional...</p>
                                    <a href="avisos.php" class="btn saiba-mais">Saiba Mais</a>
                            </div>
                            <div class="noticia">
                                <div class="data">07 de Novembro, 2024</div>
                                <img src="img/ctma2.png" alt="Imagem da notícia">
                                <h3>Inteligência Artificial: o futuro da saúde</h3>
                                <p>Pesquisas apontam que a inteligência artificial está ajudando no diagnóstico precoce
                                    de doenças...</p>
                                    <a href="avisos.php" class="btn saiba-mais">Saiba Mais</a>
                            </div>
                            <div class="noticia">
                                <div class="data">06 de Novembro, 2024</div>
                                <img src="img/ctma2.png" alt="Imagem da notícia">
                                <h3>Mercado de trabalho e as novas habilidades digitais</h3>
                                <p>As empresas estão demandando profissionais com habilidades digitais...</p>
                                <a href="avisos.php" class="btn saiba-mais">Saiba Mais</a>
                            </div>
                        </div>
                    </section>
                    <!-- Adicione mais notícias aqui, conforme necessário -->

                </div><!--flex-->

            </div><!--interface-->
        </section>
        <!--SECAO CURSOS-->

    </main>
    <!--FIM DESENVOLVIMENTO-->
    <?php include_once "footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

<button onclick="scrollToTop()" id="backToTopBtn" title="Voltar ao topo">↑</button>

<script>
 const professorsData = {
        informatica: [
            { name: 'Prof. Alexandre', desc: 'Especialista em Desenvolvimento Web', img: 'img/careca.png' },
            { name: 'Prof. Andresa', desc: 'Mestre em Ciência da Computação', img: 'img/andresa.png' },
            { name: 'Prof. Cristiane', desc: 'Especialista em Redes', img: 'img/cris.png' },
            { name: 'Prof. Humberto', desc: 'Doutor em Segurança Digital', img: 'img/humberto.png' }
            
        ],
        administracao: [
            { name: 'Prof. João Almeida', desc: 'Doutor em Administração', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Renata Costa', desc: 'MBA em Finanças', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Pedro Amaral', desc: 'Especialista em Marketing', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Julia Teixeira', desc: 'Doutora em Recursos Humanos', img: 'https://via.placeholder.com/100' }
        ],
        nutricao: [
            { name: 'Prof. Fernanda Lira', desc: 'Nutricionista Clínica', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Marcos Rocha', desc: 'Mestre em Nutrição Esportiva', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Lucas Nogueira', desc: 'Especialista em Nutrição Infantil', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Mariana Silva', desc: 'Doutora em Nutrição Funcional', img: 'https://via.placeholder.com/100' }
        ],
        turismo: [
            { name: 'Prof. Paula Souza', desc: 'Doutora em Turismo Sustentável', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Carlos Mendes', desc: 'Especialista em Ecoturismo', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Eduardo Farias', desc: 'Mestre em Turismo Cultural', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Beatriz Castro', desc: 'Especialista em Hospitalidade', img: 'https://via.placeholder.com/100' }
        ],
        coordenacao: [
            { name: 'Diretora', desc: 'Doutora em Turismo Sustentável', img: 'https://via.placeholder.com/100' },
            { name: 'Diretora', desc: 'Especialista em Ecoturismo', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Eduardo Farias', desc: 'Mestre em Turismo Cultural', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Beatriz Castro', desc: 'Especialista em Hospitalidade', img: 'https://via.placeholder.com/100' }
        ]
        
    };

    let currentCourse = 'informatica';
    let currentIndex = 0;
    const itemsToShow = 4;

    function loadProfessors(course) {
        currentIndex = 0;
        $('#professors-slider').empty();
        
        professorsData[course].forEach(professor => {
            const profCard = `
                <div class="professor-card">
                    <img src="${professor.img}" alt="${professor.name}">
                    <h5>${professor.name}</h5>
                    <p>${professor.desc}</p>
                </div>
            `;
            $('#professors-slider').append(profCard);
        });
        updateSlider();
    }

    function updateSlider() {
        $('.professor-card').hide();
        $('.professor-card').slice(currentIndex, currentIndex + itemsToShow).show(); // Mostra quatro professores de cada vez
    }

    $(document).ready(function () {
        // Carregar professores do curso inicial
        loadProfessors(currentCourse);

        // Alterar curso ao clicar no nome
        $('.course-link').on('click', function () {
            currentCourse = $(this).data('course');
            $('.course-link').removeClass('active');
            $(this).addClass('active');
            loadProfessors(currentCourse);
        });

        // Navegação do slider
        $('#next').on('click', function () {
            if (currentIndex < professorsData[currentCourse].length - itemsToShow) {
                currentIndex++;
                updateSlider();
            }
        });

        $('#prev').on('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
    });

</script>
<script src="subirtela.js"></script>
</html>