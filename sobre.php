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
    <title>CTMA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            line-height: 1.6;
        }


        /* Seção sobre o CTMA */
        .about-section {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 40px;
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        /* Estilo do texto */
        .about-text {
            max-width: 60%;
            margin-right: 20px;
        }

        .about-section .section-title {
            font-size: 32px;
            font-weight: bold;
            color: #003566;
            margin-bottom: 20px;
            border-left: 5px solid #003566;
            padding-left: 15px;
        }

        .about-section p {
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }

        /* Container de imagem ajustado para a direita */
        .image-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 35%;
        }

        .about-image {
            width: 100%;
            /* Garante que a imagem ocupe 100% do espaço disponível */
            height: auto;
            /* Mantém a proporção da imagem */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .about-image:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .about-section {
                flex-direction: column;
                align-items: center;
            }

            .image-container {
                max-width: 100%;
                /* Imagem ocupa 100% do espaço em telas pequenas */
            }

            .about-image {
                width: 90%;
                /* Ajusta o tamanho da imagem para caber bem em telas pequenas */
            }
        }


        /* Seção de Dúvidas Frequentes */
        .faq-section {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .faq-section h2 {
            font-size: 28px;
            color: #003566;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #003566;
            padding-bottom: 10px;
        }

        /* Estilo do accordion para as perguntas */
        .faq-item {
            margin: 10px 0;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            font-size: 18px;
            color: #003566;
            background-color: #e6f0fa;
            padding: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }

        .faq-question:hover {
            background-color: #cce0f5;
        }

        .faq-answer {
            padding: 15px;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            display: none;
        }

        .faq-question::after {
            content: '+';
            font-size: 24px;
            color: #003566;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question::after {
            content: '-';
            transform: rotate(180deg);
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Seção de Fale Conosco */
        .contact-section {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .contact-section h2 {
            font-size: 28px;
            color: #003566;
            margin-bottom: 20px;
            border-bottom: 2px solid #003566;
            padding-bottom: 10px;
        }

        /* Estilos do formulário de contato */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-form label {
            font-size: 16px;
            color: #333;
            text-align: left;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #d0d7de;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .contact-form input[type="text"]:focus,
        .contact-form input[type="email"]:focus,
        .contact-form textarea:focus {
            border-color: #003566;
            outline: none;
        }

        .contact-form textarea {
            resize: vertical;
        }

        .contact-form button[type="submit"] {
            padding: 12px;
            font-size: 16px;
            color: #ffffff;
            background-color: #003566;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button[type="submit"]:hover {
            background-color: #004d99;
        }

        /* Adicionando um container para as seções */
        .sections-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
            /* Espaço entre as seções */
            padding: 0 20px;
        }

        /* Seções com o mesmo tamanho e alinhamento */
        section {
            width: 70%;
            max-width: 28%;
            /* Reduzindo a largura das seções */
            box-sizing: border-box;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            margin-bottom: 40px;
        }

        /* Estilos para a seção sobre o CTMA */
        .about-section,
        .faq-section,
        .contact-section {
            padding: 40px;
            max-width: 100%;
        }

        /* Ajustes na responsividade */
        @media (max-width: 768px) {
            section {
                max-width: 100%;
            }

            .sections-container {
                flex-direction: column;
                gap: 20px;
            }
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

    <?php include_once "header.php" ?>
    <div class="sections-container">
        <!-- Seção sobre o CTMA -->
        <section class="about-section">
            <div class="about-text">
                <h2 class="section-title">Sobre o CTMA</h2>
                <p>Fundado em dezembro de 1957 pela Lei Municipal nº 366 de 10/12/1957 na época do prefeito José Geraldo
                    Lemes Valadão o CTMA inicialmente era um estabelecimento de ensino de 2º Grau, voltado para a
                    formação de Técnicos em Contabilidade. A escola funcionava no prédio da E.E. "Chagas Pereira". Desde
                    então, o colégio cresceu progressivamente. Em 1972, ganhou um prédio próprio e, em 1977, foi
                    oficializada a oferta das habilitações profissionais plenas de Técnico em Contabilidade e Técnico em
                    Secretariado, além da habilitação parcial de Desenhista de Arquitetura. Atualmente, o CTMA oferece
                    os cursos de Técnico em Informática, Técnico em Administração, Técnico em Nutrição e Dietética e
                    Técnico em Guia de Turismo. Anteriormente conhecido como COTECA e também como Escola Técnica de
                    Comércio de Aparecida, o CTMA tem formado profissionais para o mercado de trabalho da região ao
                    longo de seus 67 anos de existência.</p>
            </div>

            <div class="image-container">
                <img src="img/auditorio.jpg" alt="Foto do Auditório do CTMA" class="about-image">
                <img src="img/faixadaCTMA.jpeg" alt="Foto da fachada do CTMA" class="about-image">
            </div>
        </section>

        <!-- Seção Dúvidas Frequentes -->
        <section class="faq-section">
            <h2>Dúvidas Frequentes</h2>

            <div class="faq-item">
                <div class="faq-question">P: Quanto tempo dura o curso técnico?</div>
                <div class="faq-answer">R: Os cursos têm duração de três semestres.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">P: Quais são os requisitos para entrar no curso técnico?</div>
                <div class="faq-answer">R: É necessário o ensino fundamental completo, além de ter concluído, ou estar
                    cursando, o ensino médio.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">P: O que posso esperar encontrar depois de terminar o curso?</div>
                <div class="faq-answer">R: Há muitas oportunidades de emprego em diferentes áreas. Você pode trabalhar
                    em empresas, hospitais, laboratórios, entre outros. Alguns alunos podem até continuar estudando ou
                    buscar certificações adicionais.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">P: O curso inclui estágio ou prática?</div>
                <div class="faq-answer">R: Sim, todos os cursos incluem estágios e aulas práticas para você ganhar
                    experiência e conhecer o mercado de trabalho.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">P: Qual é a diferença entre um curso técnico e um curso de graduação?</div>
                <div class="faq-answer">R: Enquanto um curso técnico é mais focado em habilidades específicas para um
                    trabalho, os cursos de graduação são mais amplos e teóricos. O técnico é mais curto e te prepara
                    mais rápido para o mercado de trabalho.</div>
            </div>
        </section>

        <script>
            // Script para a funcionalidade de accordion
            document.querySelectorAll('.faq-item').forEach(item => {
                item.addEventListener('click', () => {
                    item.classList.toggle('active');
                });
            });
        </script>


        <!-- Seção Fale Conosco -->
        <section class="contact-section">
            <h2>Fale Conosco</h2>
            <form class="contact-form" action="enviar_formulario.php" method="POST">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>
    </div>
    <button onclick="scrollToTop()" id="backToTopBtn" title="Voltar ao topo">↑</button>
    <?php include_once "footer.php" ?>
    <script src="subirtela.js"></script>

</body>

</html>