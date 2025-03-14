-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2024 às 22:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc_ctma`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avisos`
--

CREATE TABLE `avisos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `data_publicacao` date NOT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bimestres`
--

CREATE TABLE `bimestres` (
  `id` int(11) NOT NULL,
  `modulo_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `bimestres`
--

INSERT INTO `bimestres` (`id`, `modulo_id`, `numero`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `boletins`
--

CREATE TABLE `boletins` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `bimestre_id` int(11) DEFAULT NULL,
  `nota` decimal(4,2) DEFAULT NULL,
  `faltas` int(11) DEFAULT 0,
  `frequencia` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `coordenador` varchar(100) DEFAULT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `grade_curricular_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `descricao`, `duracao`, `coordenador`, `imagem_url`, `grade_curricular_url`) VALUES
(1, 'Informática', 'fffffffffffffff', 'fffffffffffff', 'ffffffffffffffff', NULL, NULL),
(17, 'Administração', NULL, NULL, NULL, NULL, NULL),
(20, 'Nutrição', NULL, NULL, NULL, NULL, NULL),
(21, 'Turismo', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `modulo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `curso_id`, `nome`, `modulo_id`) VALUES
(5, 1, 'Aplicativos', 1),
(6, 1, 'Arte Digital', 1),
(7, 1, 'Banco de Dados I', 1),
(8, 1, 'Fundamentos da Informática', 1),
(9, 1, 'Gestão de Conteúdo Web', 1),
(10, 1, 'Inglês Instrumental', 1),
(11, 1, 'Lógica de Programação', 1),
(12, 1, 'Programação Web I', 1),
(13, 1, 'Sistema Operacional I', 1),
(14, 1, 'Análise de Sistema', 2),
(15, 1, 'Banco de Dados II', 2),
(16, 1, 'Gestão do Ambiente de TI', 2),
(17, 1, 'Linguagem de Programação I', 2),
(18, 1, 'Programação Web II', 2),
(19, 1, 'Redes', 2),
(20, 1, 'Sistema Operacional II', 2),
(21, 1, 'Técnicas de Orientação a Objeto', 2),
(22, 1, 'Administração e Serviços de Rede', 3),
(23, 1, 'Desenvolvimento para Dispositivos Móveis', 3),
(24, 1, 'Empreendedorismo', 3),
(25, 1, 'Ética nas Relações Digitais', 3),
(26, 1, 'Linguagem de Programação II', 3),
(27, 1, 'Programação Web III', 3),
(28, 1, 'Segurança Digital', 3),
(29, 20, 'Administração em Serviços Alimentares I', 1),
(30, 20, 'Ética e Cidadania', 1),
(31, 20, 'Higiene e Microbiologia de Alimentos', 1),
(32, 20, 'Inglês Básico', 1),
(33, 20, 'Português Instrumental', 1),
(34, 20, 'Princípios Básicos da Nutrição Humana', 1),
(35, 20, 'Técnicas em Dietética I', 1),
(36, 20, 'Adm. e Qual. em Unidades de Preparação de Alimentos', 2),
(37, 20, 'Avaliação Diagnóstica Nutricional', 2),
(38, 20, 'Bioestatística Aplicada a Nutrição', 2),
(39, 20, 'Educação Nutricional', 2),
(40, 20, 'Nutrição e Saúde Coletiva', 2),
(41, 20, 'Planejamento Alimentar e Nutrição Humana', 2),
(42, 20, 'Técnica em Dietética II', 2),
(43, 20, 'Administração em Serviços Alimentares II', 3),
(44, 20, 'Empreendedorismo e Mercado de Trabalho', 3),
(45, 20, 'Gestão da Rotulagem de Alimentos', 3),
(46, 20, 'Informática Básica', 3),
(47, 20, 'Noções de Dietoterápica Aplicada', 3),
(48, 20, 'Técnica Dietética e Gastronomia Hospitalar', 3),
(49, 20, 'Tecnologia dos Alimentos', 3),
(50, 17, 'Cálculos Financeiros', 1),
(51, 17, 'Gestão de Pessoas I', 1),
(52, 17, 'Introdução ao Estudo do Direito', 1),
(53, 17, 'Linguagem, Trabalho e Tecnologia', 1),
(54, 17, 'Planejamento Estratégico', 1),
(55, 17, 'Processos Operacionais Contábeis', 1),
(56, 17, 'Técnicas Organizacionais', 1),
(57, 17, 'Teoria Geral da Administração', 1),
(58, 17, 'Administração em Marketing', 2),
(59, 17, 'Cálculos Estatísticos', 2),
(60, 17, 'Custos e Operações Contábeis', 2),
(61, 17, 'Gestão de Pessoas II', 2),
(62, 17, 'Gestão Empreendedora e Inovação', 2),
(63, 17, 'Legislação Empresarial', 2),
(64, 17, 'Tecnologia e Recursos Digitais', 2),
(65, 17, 'Gestão da Produção e Materiais', 3),
(66, 17, 'Gestão de Pessoas III', 3),
(67, 17, 'Gestão Financeira e Econômica', 3),
(68, 17, 'Inglês Instrumental', 3),
(69, 17, 'Logística Empresarial', 3),
(70, 17, 'Marketing Institucional', 3),
(71, 17, 'Negociação Internacional', 3),
(72, 17, 'Projeto Integrado de Negócios', 3),
(73, 21, 'Comunicação e Expressão Oratória em Guiamentos', 1),
(74, 21, 'Fundamentos do Turismo', 1),
(75, 21, 'Geografia Aplicada em Turismo Regional', 1),
(76, 21, 'Marketing e Empreendedorismo', 1),
(77, 21, 'Planejamento e Organização de Eventos', 1),
(78, 21, 'Técnicas de Guiamento', 1),
(79, 21, 'Turismo em Hotelaria', 1),
(80, 21, 'Espanhol Aplicado ao Guiamento de Turismo I', 2),
(81, 21, 'História Aplicada ao Turismo Regional', 2),
(82, 21, 'Inglês Aplicado no Setor Turístico I', 2),
(83, 21, 'Introdução ao Direito no Turismo', 2),
(84, 21, 'Libras I', 2),
(85, 21, 'Planejamento do Lazer e Recreações Turísticas', 2),
(86, 21, 'Português Técnico', 2),
(87, 21, 'Técnicas de Agenciamento em Turismo Receptivo', 2),
(88, 21, 'Tecnologias e Aplicativos para o Turismo', 2),
(89, 21, 'Espanhol Aplicado ao Guiamento de Turismo II', 3),
(90, 21, 'Inglês Aplicado no Setor Turístico II', 3),
(91, 21, 'Libras II', 3),
(92, 21, 'Patrimônio e Manifestações Populares do Estado de São Paulo', 3),
(93, 21, 'Prática Profissional do Guia de Turismo Regional', 3),
(94, 21, 'Primeiros Socorros', 3),
(95, 21, 'Turismo e Meio Ambiente', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modulos`
--

INSERT INTO `modulos` (`id`, `curso_id`, `numero`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('aluno','professor','admin') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `curso_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`, `data_cadastro`, `curso_id`, `modulo_id`) VALUES
(2, 'adm', 'adm@adm', '$2y$10$NHo3ZtmTBhpJpxEX0qymuud8CSkQ2lSHA872NBo27gHvH8KfWoYiS', 'admin', '2024-11-01 23:22:10', NULL, NULL),


--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `bimestres`
--
ALTER TABLE `bimestres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- Índices de tabela `boletins`
--
ALTER TABLE `boletins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `bimestre_id` (`bimestre_id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- Índices de tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuarios_curso` (`curso_id`),
  ADD KEY `fk_usuarios_modulo` (`modulo_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `bimestres`
--
ALTER TABLE `bimestres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `boletins`
--
ALTER TABLE `boletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `bimestres`
--
ALTER TABLE `bimestres`
  ADD CONSTRAINT `bimestres_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);

--
-- Restrições para tabelas `boletins`
--
ALTER TABLE `boletins`
  ADD CONSTRAINT `boletins_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `boletins_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`),
  ADD CONSTRAINT `boletins_ibfk_3` FOREIGN KEY (`bimestre_id`) REFERENCES `bimestres` (`id`);

--
-- Restrições para tabelas `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `disciplinas_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);

--
-- Restrições para tabelas `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `fk_usuarios_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
