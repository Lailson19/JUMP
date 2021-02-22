-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2021 às 09:34
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
-- Criação: 21-Fev-2021 às 20:54
-- Última actualização: 22-Fev-2021 às 02:56
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `comentario` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `data_comentario` datetime DEFAULT current_timestamp(),
  `status_comentario` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONAMENTOS PARA TABELAS `comentario`:
--   `id_pessoa`
--       `pessoa` -> `id_pessoa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--
-- Criação: 22-Fev-2021 às 07:19
-- Última actualização: 22-Fev-2021 às 07:49
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
-- RELACIONAMENTOS PARA TABELAS `conteudo`:
--   `id_pessoa`
--       `pessoa` -> `id_pessoa`
--   `id_vid_produtor`
--       `video_produtor` -> `id_vid_produtor`
--   `id_vid_traducao`
--       `video_traducao` -> `id_vid_traducao`
--

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id_conteudo`, `id_pessoa`, `id_vid_produtor`, `id_vid_traducao`, `titulo_conteudo`, `assunto_conteudo`, `capa_conteudo`, `descricao_conteudo`, `status_conteudo`, `data_conteudo`) VALUES
(9, 17, 19, NULL, 'Três técnicas para programar', 'Programação', '9f15dd0915eb47a4f513c5ea96709bef.jpg', 'Três técnicas que eu uso para aprender a programar.', 0, '2021-02-22 03:09:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--
-- Criação: 21-Fev-2021 às 23:59
-- Última actualização: 22-Fev-2021 às 08:24
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
-- RELACIONAMENTOS PARA TABELAS `pessoa`:
--

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `img`, `email`, `senha`, `sexo`, `situacao`, `grau`, `dt_nasc`, `status`, `dt_pessoa`, `nivel_acesso`) VALUES
(17, 'Lailson', '7e80429bed496f8aad6a5876a1e5db64', 'lailson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-02-22 00:43:08', 'comum'),
(19, 'Andesson', '42b5b7f7625b26d3e50d90c3c195ebffjfif', 'andesson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Sim', 'Moderado', '1991-08-19', 0, '2021-02-22 04:01:38', 'produtor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_produtor`
--
-- Criação: 22-Fev-2021 às 07:17
-- Última actualização: 22-Fev-2021 às 07:49
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
-- RELACIONAMENTOS PARA TABELAS `video_produtor`:
--   `id_pessoa`
--       `pessoa` -> `id_pessoa`
--

--
-- Extraindo dados da tabela `video_produtor`
--

INSERT INTO `video_produtor` (`id_vid_produtor`, `id_pessoa`, `nome_vid_produtor`, `temp_vid_produtor`, `data_vid_produtor`, `avaliacao_vid_produtor`) VALUES
(19, 17, '9f15dd0915eb47a4f513c5ea96709bef.mp4', '', '2021-02-22 03:09:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_traducao`
--
-- Criação: 21-Fev-2021 às 20:55
-- Última actualização: 22-Fev-2021 às 02:56
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
-- RELACIONAMENTOS PARA TABELAS `video_traducao`:
--   `id_pessoa`
--       `pessoa` -> `id_pessoa`
--

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  MODIFY `id_vid_produtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  MODIFY `id_vid_traducao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `conteudo_produtor` FOREIGN KEY (`id_vid_produtor`) REFERENCES `video_produtor` (`id_vid_produtor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conteudo_traducao` FOREIGN KEY (`id_vid_traducao`) REFERENCES `video_traducao` (`id_vid_traducao`) ON DELETE CASCADE ON UPDATE CASCADE;

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
