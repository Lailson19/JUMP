-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Abr-2021 às 10:45
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jump_squad8`
--
CREATE DATABASE IF NOT EXISTS `jump_squad8` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jump_squad8`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `comentario` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_comentario` datetime DEFAULT current_timestamp(),
  `status_comentario` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_pessoa`, `comentario`, `data_comentario`, `status_comentario`) VALUES
(50, 48, 'Parabéns, conteúdo muito interessante!', '2021-04-02 04:04:47', 0),
(53, 50, 'Show \\o/', '2021-04-02 04:07:35', 0),
(54, 47, 'Que beleza....', '2021-04-02 04:08:47', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
CREATE TABLE `conteudo` (
  `id_conteudo` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `id_vid_produtor` int(11) DEFAULT NULL,
  `id_vid_traducao` int(11) DEFAULT NULL,
  `titulo_conteudo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `assunto_conteudo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `capa_conteudo` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `descricao_conteudo` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `status_conteudo` tinyint(4) DEFAULT 0,
  `data_conteudo` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id_conteudo`, `id_pessoa`, `id_vid_produtor`, `id_vid_traducao`, `titulo_conteudo`, `assunto_conteudo`, `capa_conteudo`, `descricao_conteudo`, `status_conteudo`, `data_conteudo`) VALUES
(28, 47, 36, 26, 'Três técnicas para programar', 'Tecnologia', '9677c7fed84fb94782e7076105cae5d3.jpg', 'Três técnicas que eu uso para aprender a programar qualquer coisa.', 0, '2021-04-02 03:20:26'),
(29, 47, 36, NULL, 'Segundo conteúdo', 'Outros', '88e7bc838881fa3374fb46c8bd2040ff.jpg', 'Esse é o segundo conteúdo do Filipe, para o propósito de exemplificar uma segunda postagem.', 0, '2021-04-02 03:23:02'),
(30, 50, 38, 26, 'Jump', 'Exemplo', '477a53054d079ac643c64e7e9792c7b9.jpg', 'Esse é um conteúdo para exemplificar uma postagem de um outro produtor de conteúdo.', 0, '2021-04-02 03:39:52'),
(31, 50, 38, 26, 'A Industria automotiva no Brasil', 'História', '93260d1803941b397ee3323c31fa2b43.jpg', 'Esse é um conteúdo para exemplificar outra postagem de outro produtor de conteúdo.', 0, '2021-04-02 03:57:38'),
(32, 50, 38, NULL, 'A indústria no Brasil', 'História', '4353393a7aa5f13853499d8f7a2827c6.jpg', 'Esse é outro conteúdo para exemplificar uma postagem do produtor de conteúdo.', 0, '2021-04-02 03:59:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL DEFAULT 'avatar.png',
  `email` varchar(80) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  `grau` varchar(45) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `dt_pessoa` datetime DEFAULT current_timestamp(),
  `nivel_acesso` varchar(10) NOT NULL DEFAULT 'comum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `img`, `email`, `senha`, `sexo`, `situacao`, `grau`, `dt_nasc`, `status`, `dt_pessoa`, `nivel_acesso`) VALUES
(47, 'Filipe', '7a125d2e4f1a6f8e925c665407fc60de.png', 'filipe@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '2001-01-01', 0, '2021-04-02 02:46:58', 'produtor'),
(48, 'Lailson', 'avatar.png', 'lailson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-04-02 03:26:47', 'comum'),
(49, 'Sara', 'b13acab965e9e95186426c4d8bbce0e8.jpg', 'sara@123', '4297f44b13955235245b2497399d7a93', 'Feminino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-04-02 03:32:26', 'interprete'),
(50, 'Andesson', 'ee902965006c7c59f5c40485b993a394.jpg', 'andesson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-04-02 03:34:40', 'produtor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_produtor`
--

DROP TABLE IF EXISTS `video_produtor`;
CREATE TABLE `video_produtor` (
  `id_vid_produtor` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `nome_vid_produtor` varchar(500) COLLATE utf8_bin NOT NULL,
  `temp_vid_produtor` varchar(45) COLLATE utf8_bin NOT NULL,
  `data_vid_produtor` datetime DEFAULT current_timestamp(),
  `avaliacao_vid_produtor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `video_produtor`
--

INSERT INTO `video_produtor` (`id_vid_produtor`, `id_pessoa`, `nome_vid_produtor`, `temp_vid_produtor`, `data_vid_produtor`, `avaliacao_vid_produtor`) VALUES
(36, 47, '9677c7fed84fb94782e7076105cae5d3.mp4', '', '2021-04-02 03:20:26', NULL),
(38, 50, '477a53054d079ac643c64e7e9792c7b9.mp4', '', '2021-04-02 03:39:52', NULL),
(39, 50, '93260d1803941b397ee3323c31fa2b43.mp4', '', '2021-04-02 03:57:37', NULL),
(40, 50, '4353393a7aa5f13853499d8f7a2827c6.mp4', '', '2021-04-02 03:59:54', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_traducao`
--

DROP TABLE IF EXISTS `video_traducao`;
CREATE TABLE `video_traducao` (
  `id_vid_traducao` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `nome_vid_traducao` varchar(45) COLLATE utf8_bin NOT NULL,
  `temp_vid_traducao` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `data_vid_traducao` datetime DEFAULT current_timestamp(),
  `avaliacao_vid_traduc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `video_traducao`
--

INSERT INTO `video_traducao` (`id_vid_traducao`, `id_pessoa`, `nome_vid_traducao`, `temp_vid_traducao`, `data_vid_traducao`, `avaliacao_vid_traduc`) VALUES
(26, 49, '2b96a38cd5dc45ae6a632ec4dab8b345.mp4', NULL, '2021-04-02 04:01:39', NULL),
(27, 49, '9c82b5e23355e64bf60957fd2ee0739e.mp4', NULL, '2021-04-02 04:02:17', NULL),
(28, 49, '93c11a205fef3cca1ddd3b8976710017.mp4', NULL, '2021-04-02 04:02:42', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `comentario_pessoa_idx` (`id_pessoa`);

--
-- Índices para tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_conteudo`),
  ADD KEY `conteudo_midia_idx` (`id_vid_produtor`),
  ADD KEY `conteudo_traducao_idx` (`id_vid_traducao`),
  ADD KEY `conteudo_pessoa_idx` (`id_pessoa`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices para tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  ADD PRIMARY KEY (`id_vid_produtor`),
  ADD KEY `pessoa_vidprodutor_idx` (`id_pessoa`);

--
-- Índices para tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  ADD PRIMARY KEY (`id_vid_traducao`),
  ADD KEY `traducao_pessoa_idx` (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  MODIFY `id_vid_produtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  MODIFY `id_vid_traducao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD CONSTRAINT `conteudo_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conteudo_produtor` FOREIGN KEY (`id_vid_produtor`) REFERENCES `video_produtor` (`id_vid_produtor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  ADD CONSTRAINT `produtor_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  ADD CONSTRAINT `traducao_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
