-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/05/2025 às 02:18
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
-- Banco de dados: `dw2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolaridades`
--

CREATE TABLE `escolaridades` (
  `id` int(11) NOT NULL,
  `escolaridade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escolaridades`
--

INSERT INTO `escolaridades` (`id`, `escolaridade`) VALUES
(1, 'Ensino fundamental'),
(2, 'Ensino médio');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `id_escolaridade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `nascimento`, `email`, `tipo`, `senha`, `id_escolaridade`) VALUES
(14, 'Jim Kurose', '1956-01-01', 'kurose@network.com', 2, 'aula', 0),
(15, 'Paulo Henrique da Costa', '1995-04-21', 'paulo@ymail.com', 1, '1234', 2),
(16, 'rayane', '0000-00-00', 'raymeloc@gmail.com', 2, '******', 2),
(17, 'rayane', '2001-07-19', 'raymeloc@gmail.com', 2, '******', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `escolaridades`
--
ALTER TABLE `escolaridades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `escolaridades`
--
ALTER TABLE `escolaridades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
