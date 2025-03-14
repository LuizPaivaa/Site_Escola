<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styleheader.css">
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .school-name {
            font-family: "arial", sans-serif;
            font-size: 1.2rem;
            color: white;
            margin-left: 10px;
            line-height: 1.2;
            text-align: left;
            font-weight: 600;
           

        }
        .school-name .line1 {
            display: block;
            font-size: 1.2em;
        }
        .school-name .line2 {
            display: block;
            font-size: 0.9em;
        }
        /* Esconde o texto no celular */
        @media (max-width: 768px) {
            .school-name {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
    $is_logged_in = isset($_SESSION['user_id']);
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logobranca.png" alt="Logo" class="logo">
                <div class="school-name">
                    <span class="line1">COLÉGIO TÉCNICO</span>
                    <span class="line2">MUNICIPAL DE APARECIDA</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="cursosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CURSOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="cursosDropdown">
                            <a class="dropdown-item" href="administracao.php">Administração</a>
                            <a class="dropdown-item" href="informatica.php">Informática</a>
                            <a class="dropdown-item" href="nutricao.php">Nutrição e Dietética</a>
                            <a class="dropdown-item" href="turismo.php">Guia de Turismo</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="avisos.php">AVISOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php">SOBRE</a>
                    </li>
                </ul>
                <div class="navbar-buttons">
                    <?php if ($is_logged_in): ?>
                        <a class="nav-link" href="<?php echo $_SESSION['user_tipo'] === 'admin' ? 'admin_dashboard.php' : ($_SESSION['user_tipo'] === 'aluno' ? 'dashboard_aluno.php' : 'dashboard_professor.php'); ?>">
                            <?php echo htmlspecialchars($_SESSION['user_nome']); ?>
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-light btn-login">Login</a>
                        <a href="cadastro_aluno.php" class="btn btn-light btn-signup">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
