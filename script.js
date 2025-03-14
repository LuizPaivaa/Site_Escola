
    const professorsData = {
        informatica: [
            { name: 'Prof. Gabriel Santos', desc: 'Especialista em Desenvolvimento Web', img: 'img/diretora.png' },
            { name: 'Prof. Gabriel Santos', desc: 'Especialista em Desenvolvimento Web', img: 'img/diretora.png' },
            { name: 'Prof. Gabriel Santos', desc: 'Especialista em Desenvolvimento Web', img: 'img/diretora.png' },
            { name: 'Prof. Gabriel Santos', desc: 'Especialista em Desenvolvimento Web', img: 'img/diretora.png' }
        ],
        administracao: [
            { name: 'Prof. João Almeida', desc: 'Doutor em Administração', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Renata Costa', desc: 'MBA em Finanças', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Renata Costa', desc: 'MBA em Finanças', img: 'https://via.placeholder.com/100' }
        ],
        nutricao: [
            { name: 'Prof. Fernanda Lira', desc: 'Nutricionista Clínica', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Marcos Rocha', desc: 'Mestre em Nutrição Esportiva', img: 'https://via.placeholder.com/100' }
        ],
        turismo: [
            { name: 'Prof. Paula Souza', desc: 'Doutora em Turismo Sustentável', img: 'https://via.placeholder.com/100' },
            { name: 'Prof. Carlos Mendes', desc: 'Especialista em Ecoturismo', img: 'https://via.placeholder.com/100' }
        ]
    };

    let currentCourse = 'informatica';
    let currentIndex = 0;

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
    }

    function updateSlider() {
        $('.professor-card').hide();
        $('.professor-card').slice(currentIndex, currentIndex + 2).show(); // Mostra dois professores de cada vez
    }

    $(document).ready(function () {
        // Carregar professores do curso inicial
        loadProfessors(currentCourse);
        updateSlider();

        // Alterar curso ao clicar no nome
        $('.course-link').on('click', function () {
            currentCourse = $(this).data('course');
            $('.course-link').removeClass('active');
            $(this).addClass('active');
            loadProfessors(currentCourse);
            updateSlider();
        });

        // Navegação do slider
        $('#next').on('click', function () {
            if (currentIndex < professorsData[currentCourse].length - 2) {
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
