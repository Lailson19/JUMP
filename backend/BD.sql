-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2021 às 20:23
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

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `comentario` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_comentario` datetime DEFAULT current_timestamp(),
  `status_comentario` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

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
(18, 24, 26, NULL, 'JUMP - Projeto Social', 'Social', '4e2fcef5c26742edc3f367efa7618c51.jpg', 'Projeto elaborado pela SQUAD8, na Recode Pro 2020.', 0, '2021-02-22 15:52:28'),
(19, 25, 27, 21, 'Três técnicas para programar', 'Tecnologia', '5e78e9c32c65a5c211b3731263744bba.jpg', 'Compartilhando minhas experiências.', 0, '2021-02-22 15:58:01'),
(20, 24, 26, NULL, 'Indústria', 'Trabalho', '2a3c56cf44da892189cfa882c584819c.jpg', 'História da indústria no Brasil. E mais...', 0, '2021-02-22 16:19:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `img` varchar(500) DEFAULT 'avatar.png',
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
(23, 'Sara', '7b2ccfb5d009a6fff740d581a8b4ec32.jpg', 'sara@123', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, 0, '2021-02-22 15:38:32', 'interprete'),
(24, 'Andesson', '5b11780c1eb2723d135f36326d75f5d2.jpg', 'andesson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-02-22 15:39:08', 'produtor'),
(25, 'Filipe', 'af4ea2c040036e7ff2eed8f6415fdaf5.png', 'filipe@123', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, 0, '2021-02-22 15:55:02', 'produtor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_produtor`
--

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
(26, 24, '4e2fcef5c26742edc3f367efa7618c51.mp4', '', '2021-02-22 15:52:28', NULL),
(27, 25, '5e78e9c32c65a5c211b3731263744bba.mp4', '', '2021-02-22 15:58:01', NULL),
(28, 24, '2a3c56cf44da892189cfa882c584819c.mp4', '', '2021-02-22 16:19:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_traducao`
--

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
(21, 23, '5b8abd71e4433431d0a1ada523bacf2e.mp4', NULL, '2021-02-22 16:17:06', NULL);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  MODIFY `id_vid_produtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  MODIFY `id_vid_traducao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
