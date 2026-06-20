-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2023 às 17:54
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `click`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `nome` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `img_perfil` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `username`, `bio`, `email`, `img_perfil`, `header`, `adm`) VALUES
('aa', 'user-651f0b114acc63.', '', 'aa@a', 'profilepicture.webp', 'defaultheader.jpg', 0),
('emily', 'emy', '', 'emily.furtado8@gmail.com', 'profilepicture.webp', 'defaultheader.jpg', 0),
('euzinho', 'user-654d0e658d4963.', '', 'euzinho@gmail.com', 'profilepicture.webp', 'defaultheader.jpg', 0),
('Fillip', 'malvadonasafada', '', 'fillipgms@gmail.com', 'upload-657b306e0d3f51.63854074.webp', 'upload-657b306e0d5330.06279143.jpg_large', 0),
('luisa sonsa', 'user-654d29fd00b4b4.', '', 'sapequinha2@gmail.com', 'profilepicture.webp', 'defaultheader.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`url`, `email`, `titulo`, `descricao`) VALUES
('upload-651efa4334b5e0.34095388.jpg', 'emily.furtado8@gmail.com', 'Genebra - Suíça', '26/12/2019'),
('upload-651efa8818ecd9.52310970.jpg', 'emily.furtado8@gmail.com', 'Genebra - Suíça', '26/12/2019.'),
('upload-651efac99ff7a5.39898785.jpg', 'emily.furtado8@gmail.com', 'Genebra - Suíça', '03/01/2020'),
('upload-651efb23efd326.25052495.jpg', 'emily.furtado8@gmail.com', 'Genebra - Suíça', '03/01/2020'),
('upload-651efbd4cbf797.77772716.jpg', 'emily.furtado8@gmail.com', 'Balneário do Camboriu - SC', '2021'),
('upload-651efbe97db8f0.74315920.jpg', 'emily.furtado8@gmail.com', 'Avião', '.'),
('upload-651efc479b4287.67406408.jpg', 'emily.furtado8@gmail.com', 'Gatitos', 'Pandora e Atlas'),
('upload-651f026f84b760.56720188.jpg', 'fillipgms@gmail.com', 'meu bicinho de pelucia', '123123'),
('upload-651f0b5d9d1cd9.41129987.jpg', 'aa@a', 'aaa', 'aaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`) VALUES
('aa@a', '$2y$10$arAHvW8ETHySnN5l4yQvsObl1KtvqAXLt3GPZcIRtYYhi1xNglw7m'),
('emily.furtado8@gmail.com', '$2y$10$dMtoCOG3jQOGCK4oOn7A4OLxEj7G/qBJN9rpXFUeepbjGMfeQnuES'),
('euzinho@gmail.com', '$2y$10$Hj6uR1GheDOyb/WTpncS9Opi5d6PIS4BaJVQpAy/7fQF8.Clsz2j6'),
('fillipgms@gmail.com', '$2y$10$S0WuKl34Zw1EY.FaF7sg6OnvQqOra1UceSSq3AS5yeO1B7SPaE/vm'),
('sapequinha2@gmail.com', '$2y$10$tPBL7TUjDroBDUx7kzYiU.i7QTZ3P0hXQP9FyqeGf4bHeViMHGa/C');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`url`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
