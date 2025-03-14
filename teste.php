<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo básico do container */
        .team-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 15px;
            max-width: 1000px;
            margin: auto;
            text-align: center;
        }
        /* Estilo dos nomes dos cursos */
        .course-selector {
            font-weight: bold;
            font-size: 1.2em;
        }
        .course-selector span {
            cursor: pointer;
            margin: 0 15px;
            position: relative;
        }
        .course-selector span.active {
            text-decoration: underline;
        }
        .course-selector span::after {
            content: '';
            display: block;
            width: 50%;
            height: 3px;
            background-color: currentColor;
            position: absolute;
            bottom: -5px;
            left: 25%;
        }
        /* Estilo dos cards dos professores */
        .professor-card {
            display: inline-block;
            width: 150px;
            margin: 10px;
            text-align: center;
        }
        .professor-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .navigation {
            font-size: 2em;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="team-container">
    <!-- Seletores de Cursos -->
    <div class="course-selector mb-4">
        <span class="course-link active" data-course="informatica" style="color: #ff0000;">Informática</span>
        <span class="course-link" data-course="administracao" style="color: #0000ff;">Administração</span>
        <span class="course-link" data-course="nutricao" style="color: #008000;">Nutrição</span>
        <span class="course-link" data-course="turismo" style="color: #ffa500;">Turismo</span>
    </div>

    <!-- Slider de Professores -->
    <div class="d-flex justify-content-between align-items-center">
        <span class="navigation" id="prev">&lt;</span>
        <div id="professors-slider" class="d-flex justify-content-center flex-wrap" style="width: 700px;"></div>
        <span class="navigation" id="next">&gt;</span>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const professorsData = {
        informatica: [
            { name: 'Prof. Gabriel Santos', desc: 'Especialista em Desenvolvimento Web', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Carla Silva', desc: 'Mestre em Ciência da Computação', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Ana Costa', desc: 'Especialista em Redes', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Lucas Ramos', desc: 'Doutor em Segurança Digital', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Sofia Lima', desc: 'Engenheira de Software', img: 'https://via.placeholder.com/100' }
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
</body>
</html>
