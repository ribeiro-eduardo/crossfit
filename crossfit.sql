-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15-Jun-2016 às 03:14
-- Versão do servidor: 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crossfit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `benchmarks`
--

CREATE TABLE `benchmarks` (
  `id` int(11) NOT NULL,
  `id_categoria_treino` int(11) NOT NULL,
  `id_classe_treino` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `benchmarks`
--

INSERT INTO `benchmarks` (`id`, `id_categoria_treino`, `id_classe_treino`, `titulo`, `descricao`, `status`) VALUES
(1, 2, 2, 'Angie', '100 Pull-ups 100 Push-ups 100 Sit-ups 100 Squats', 1),
(2, 2, 2, 'Barbara', '20 Pull-ups\r\n30 Push-ups\r\n40 Sit-ups\r\n50 Squats', 1),
(3, 2, 3, 'Chelsea', '5 Pull-ups\r\n10 Push-ups\r\n15 Squats', 0),
(4, 1, 2, 'The Seven', '7 Handstand push-ups\r\n135 pound Thruster, 7 reps\r\n7 Knees to elbows\r\n245 pound Deadlift, 7 reps\r\n7 Burpees\r\n7 Kettlebell swings, 2 pood\r\n7 Pull-ups', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_treino`
--

CREATE TABLE `categoria_treino` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria_treino`
--

INSERT INTO `categoria_treino` (`id`, `nome`) VALUES
(1, 'Hero'),
(2, 'Girl'),
(3, 'Challenge');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_treino`
--

CREATE TABLE `classe_treino` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe_treino`
--

INSERT INTO `classe_treino` (`id`, `titulo`, `status`) VALUES
(1, 'Amrap', 1),
(2, 'For Time', 1),
(3, 'Emom', 1),
(4, 'Heavy Day', 1),
(5, 'Tabata', 1),
(6, 'Fight Gone Bad', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crossfit`
--

CREATE TABLE `crossfit` (
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `crossfit`
--

INSERT INTO `crossfit` (`texto`) VALUES
('<p>Crossfit &eacute\n\r\n<p>&nbsp\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `demos`
--

CREATE TABLE `demos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `demos`
--

INSERT INTO `demos` (`id`, `titulo`, `link`, `status`) VALUES
(1, 'Air squat', 'https://www.youtube.com/watch?v=C_VtOYc6j5c', 1),
(2, 'Front Squat', 'https://www.youtube.com/watch?v=m4ytaCJZpl0', 1),
(9, 'Demonstração de video no youtube', 'https://www.youtube.com/watch?v=R0VAx-mvny4', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `local`, `data`, `status`) VALUES
(1, 'Evento Teste', 'HD Elite Team', '12 de junho - 14h30', 1),
(2, 'Evento Teste 1', 'HD Elite Team', 'Evento Teste', 0),
(3, 'Evento  2', 'Teste de local', '01/07 - 20h00', 0),
(4, 'Evento Teste', 'HD Elite Team', 'Evento Teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `galerias`
--

INSERT INTO `galerias` (`id`, `nome`, `status`) VALUES
(16, 'Galeria 1123213', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias_fotos`
--

CREATE TABLE `galerias_fotos` (
  `id` int(11) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `galerias_fotos`
--

INSERT INTO `galerias_fotos` (`id`, `id_galeria`, `nome`) VALUES
(16, 16, '36560723643406527105.jpg'),
(17, 16, '67682548592902296922.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `data`, `status`) VALUES
(1, 'Notícia 1', '<p style="margin: 0px 0px 15px\n\n<p style="margin: 0px 0px 15px\n\n<p style="margin: 0px 0px 15px\n', '2016-05-30 10:20:59', 1),
(7, 'Notícia 1', '<p>Mauris tristique erat mauris, sed condimentum risus pharetra a. Maecenas ut leo at neque accumsan fringilla sodales et mi. Mauris fringilla lectus vitae feugiat vestibulum. Vestibulum lobortis erat sed efficitur ultrices. Nulla eu massa orci. Pellentesque at sagittis dui. Donec ut augue odio. Mauris mollis augue tincidunt urna fermentum tincidunt vitae porta nisi.</p>\n\n<p>&nbsp\n\n<p><img alt="" src="/crossfit/upload/Capturar.PNG" style="width: 312px\n\n<p>Donec diam nisi, sodales at gravida id, iaculis quis justo. Ut porta nibh at nisl pharetra sagittis. Sed at lorem sodales, placerat mauris non, rutrum erat. Pellentesque quis metus at nisl malesuada tristique a nec ante. Morbi non lorem ut lacus rhoncus tincidunt. Vivamus fermentum luctus mauris, sit amet maximus enim congue non. Fusce ut tellus malesuada, semper turpis ut, lobortis lorem. Sed auctor enim et est euismod, sit amet molestie arcu pharetra. Curabitur in iaculis nibh.</p>\n', '2016-05-30 11:04:38', 1),
(9, 'Teste img', '<p>Ut sollicitudin urna sed blandit scelerisque. Sed rhoncus suscipit quam, lacinia luctus ex fringilla id. In mi tortor, ultricies non dignissim nec, convallis at eros. Mauris porttitor mollis dignissim. Nullam viverra nec diam vel porttitor. Mauris eget semper massa, in fermentum risus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n\r\n<p><img alt="" src="/crossfit/upload//Capturar.PNG" style="width: 150px\n\r\n<p>Donec vel consequat ex. Sed facilisis diam quis purus accumsan, at porta purus molestie. Phasellus at purus vel turpis pharetra porta in et tortor. Nulla lacinia quis metus in tincidunt. Proin a ornare mauris. Praesent faucibus nunc non ipsum maximus hendrerit. Pellentesque elementum mi quis ante facilisis, non hendrerit ex condimentum.</p>\r\n', '2016-05-30 12:24:32', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE `sobre` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `descricao`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'Coach', 1),
(3, 'Atleta', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinos`
--

CREATE TABLE `treinos` (
  `id` int(11) NOT NULL,
  `id_classe_treino` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `treinos`
--

INSERT INTO `treinos` (`id`, `id_classe_treino`, `titulo`, `descricao`, `data`, `status`) VALUES
(1, 0, 'TESTE', 'TESTE DE AJAX', '2016-05-23', 1),
(2, 0, 'Teste completo', 'Descricao completa', '2016-05-26', 1),
(3, 0, 'Teste completo 2', 'Descricao completa 2', '2016-05-25', 1),
(7, 2, 'Eva', 'Run 800 meters\r\n2 pood KB swing, 30 reps\r\n30 pullups', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` char(40) DEFAULT NULL,
  `id_tipo_usuario` int(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `altura` int(3) NOT NULL,
  `peso` float NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `celular`, `login`, `senha`, `id_tipo_usuario`, `data_nascimento`, `altura`, `peso`, `data_cadastro`, `status`) VALUES
(1, 'Administrador', '1123457898', 'admin@hd.com', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1988-03-08', 0, 0, '2016-06-02 16:06:09', 1),
(50, 'Coach Joaquim', '06352364942', 'edu0995@gmail.com', '(41) 3203-7580', '(41) 8703-2512', 'teste', '698dc19d489c4e4db73e28a713eab07b', 2, '1995-12-05', 0, 0, '2016-06-02 16:36:53', 1),
(51, 'José Hilário dos Santos Corrêa', '09876543213', 'castro.alves@gmail.com', '(41) 3267-7654', '(41) 9009-9876', 'castro.alves@gmail.com', 'sheCvAaF', 3, '1991-12-09', 0, 0, '2016-04-26 16:39:56', 1),
(52, 'David R. Sandell', '123123234', 'david@skduch.com', '(12) 3123-2132', '(12) 3123-1231', 'david@skduch.com', 'UHF5pmLX', 2, '1990-12-12', 0, 0, '2016-05-30 13:11:43', 1),
(53, 'Admin 2', '06352364942', 'admin2@admin.com', '(41) 3209-8920', '(41) 8998-8765', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 1, '1989-11-09', 0, 0, '2016-06-03 03:15:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benchmarks`
--
ALTER TABLE `benchmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria_treino`
--
ALTER TABLE `categoria_treino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe_treino`
--
ALTER TABLE `classe_treino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerias_fotos`
--
ALTER TABLE `galerias_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sobre`
--
ALTER TABLE `sobre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benchmarks`
--
ALTER TABLE `benchmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categoria_treino`
--
ALTER TABLE `categoria_treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classe_treino`
--
ALTER TABLE `classe_treino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `demos`
--
ALTER TABLE `demos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `galerias_fotos`
--
ALTER TABLE `galerias_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sobre`
--
ALTER TABLE `sobre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `treinos`
--
ALTER TABLE `treinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
