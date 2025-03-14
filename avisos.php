<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
$is_logged_in = isset($_SESSION['user_id']);

// Conexão com o banco de dados
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avisos - CTMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Banner com vídeo de fundo */
        .special-banner {
            position: relative;
            color: white;
            padding: 5rem 1.5rem;
            /* Aumentado de 3rem para 5rem */
            text-align: center;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .special-banner video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .special-banner .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            /* camada preta transparente */
            z-index: 2;
        }

        .special-banner .content {
            position: relative;
            z-index: 3;
        }

        .aviso-item,
        .card-evento {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Animação dos cards */
        .aviso-item:hover,
        .card-evento:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            margin: 2rem 0 1rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background-color: #ff7e5f;
        }

        .links {
            margin-bottom: 30px !important;
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
    <!-- Cabeçalho -->
    <?php include_once "header.php"; ?>

    <div class="container mt-4">
        <!-- Banner Especial para Inscrição no Vestibular com Vídeo de Fundo -->
        <div class="special-banner">
            <video autoplay muted loop playsinline>
                <source src="img/videoctma.mp4" type="video/mp4">
            </video>
            <div class="overlay"></div>
            <div class="content">
                <h2>Inscrições Abertas para o Vestibular!</h2>
                <p>Garanta sua vaga e estude no CTMA. Clique abaixo para saber mais sobre o processo de inscrição.</p>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSe-PAJPH56xH2Hh80-_1NFaUq9-MnEtKVIFsHpzJVtnI0kNhg/viewform?embedded=true"
                    class="btn btn-light btn-lg">Inscreva-se Agora</a>
            </div>
        </div>

        <!-- Notícias Recentes -->
        <h2 class="section-title">Notícias Recentes</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="aviso-item">
                    <h5>Visita Técnica ao INPE</h5>
                    <p>Data: 10/11/2024</p>
                    <p>Alunos do curso de informática participaram de uma visita técnica ao INPE para complementar o
                        aprendizado prático.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="aviso-item">
                    <h5>Seminário sobre Educação e Tecnologia</h5>
                    <p>Data: 15/11/2024</p>
                    <p>Professores do CTMA apresentam tendências da tecnologia aplicada ao ensino.</p>
                </div>
            </div>
        </div>

        <!-- Próximos Eventos Acadêmicos -->
        <h2 class="section-title">Próximos Eventos Acadêmicos</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card-evento">
                    <h4>Semana da Administração</h4>
                    <p>Data: 15/12/2024</p>
                    <p>Aprenda novas habilidades em nossas oficinas.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-evento">
                    <h4>Semana da Informática</h4>
                    <p>Data: 20/10/2024</p>
                    <p>Descubra mais sobre o setor de tecnologia!</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-evento">
                    <h4>Provas Finais</h4>
                    <p>Data: 22/11/2024</p>
                    <p>Prepare-se para as provas finais do semestre!</p>
                </div>
            </div>
        </div>

        <!-- Recursos e Links Úteis -->
        <h2 class="section-title">Recursos e Links Úteis</h2>
        <div class="links">
            <div class="row">
                <div class="col-md-12">
                    <a href="calendario_escolar.pdf" class="btn btn-secondary btn-block mt-2">Calendário Escolar</a>
                    <a href="regulamento_interno.pdf" class="btn btn-secondary btn-block mt-2">Regulamento Interno</a>
                 
                </div>
            </div>
        </div>
    </div>
    <button onclick="scrollToTop()" id="backToTopBtn" title="Voltar ao topo">↑</button>
    <?php include_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
        <script src="subirtela.js"></script>
</body>

</html>