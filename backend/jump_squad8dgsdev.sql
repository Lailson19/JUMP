-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Fev-2021 às 22:42
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

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_pessoa`, `comentario`, `data_comentario`, `status_comentario`) VALUES
(1, 2, 'olá mundo', '2021-02-18 19:46:55', 0),
(3, 3, 'olá mundo', '2021-02-18 20:06:43', 0),
(12, 2, 'Bem vindo a comunidade Jump!', '2021-02-19 18:27:49', 0),
(15, 3, 'Oie blz', '2021-02-19 18:48:21', 0),
(16, 4, 'kljghkljghljhgljhljhl', '2021-02-19 19:07:31', 0),
(17, 4, 'sgsgsg', '2021-02-19 19:08:29', 0),
(18, 4, 'ggfsdgs', '2021-02-19 19:10:11', 0),
(19, 4, 'tudo bem com vocês', '2021-02-19 19:17:02', 0),
(20, 4, 'rockkkk', '2021-02-19 19:18:37', 0),
(21, 4, 'POP', '2021-02-19 19:19:42', 0),
(22, 5, 'Marvel', '2021-02-19 19:21:49', 0),
(23, 2, 'Deu certooooooooooooooooooooooooo!', '2021-02-19 19:24:12', 0),
(24, 2, 'hi', '2021-02-19 20:02:21', 0),
(25, 6, 'oie vai uma música', '2021-02-19 21:01:21', 0),
(26, 7, 'Livras', '2021-02-19 22:37:56', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--
-- Criação: 21-Fev-2021 às 20:55
--

CREATE TABLE `conteudo` (
  `id_conteudo` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `id_vid_produtor` int(11) DEFAULT NULL,
  `id_vid_traducao` int(11) DEFAULT NULL,
  `titulo_conteudo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `assunto_conteudo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `capa_conteudo` varchar(150) COLLATE utf8_bin DEFAULT NULL,
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
(5, 2, 1, NULL, 'aprender', 'libras crianças', NULL, 'aulas crianças', 0, '2021-02-18 20:03:55'),
(6, 3, 2, NULL, 'aprender2', 'libras adultos', NULL, 'aulas adultos', 0, '2021-02-18 20:03:55'),
(7, 6, 6, 7, 'Carinhoso - Demo', 'Música popular brasileira', 'https://ik.imagekit.io/feq0hccnlg/wandavision_com_set_01_g6wyLn3WS.jpg', 'Música interpretada em Libras', 0, '2021-02-19 20:43:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--
-- Criação: 21-Fev-2021 às 20:52
-- Última actualização: 21-Fev-2021 às 20:59
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
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
(2, 'dgsdev', 'https://avatars.githubusercontent.com/u/65875860?s=460&u=97846b0ed123c9bb4e4a1ef2e499f24b2503be24&v=4', 'dgs@dgs.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-18 19:48:24', 'tradutor'),
(3, 'lailson', 'https://avatars.githubusercontent.com/u/54060265?s=460&u=de2e42a60757a7a2d8b119e20166fc5c4313b060&v=4', 'lailson@lailson.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-18 19:49:12', 'produtor'),
(4, 'teste', 'https://avatars.githubusercontent.com/u/72608626?s=460&u=18c68566217ffdcfc5c8d869f895b6f466af1345&v=4', 'teste@teste.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-19 16:33:38', 'comum'),
(5, 'teste2', 'https://ik.imagekit.io/feq0hccnlg/999107_LS_yxRktr.jpg', 'teste2@teste.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-19 16:44:22', 'comum'),
(6, 'Pixinguinha', 'https://ik.imagekit.io/feq0hccnlg/pixinguinha_HJ_JgKWYQk.jpg', 'pixinguinha@jump.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-19 20:59:39', 'produtor'),
(7, 'Maria de Alcantera', 'https://ik.imagekit.io/feq0hccnlg/maria_-CuHNPvkS.png', 'maria@jump.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 0, '2021-02-19 20:59:39', 'traducao'),
(8, 'Lailson EU', 'avatar.png', 'lailson@123', '4297f44b13955235245b2497399d7a93', 'Masculino', 'Não', 'Nenhum', '0000-00-00', 0, '2021-02-21 17:58:07', 'comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_produtor`
--
-- Criação: 21-Fev-2021 às 20:52
--

CREATE TABLE `video_produtor` (
  `id_vid_produtor` int(11) NOT NULL,
  `nome_vid_produtor` varchar(80) COLLATE utf8_bin NOT NULL,
  `temp_vid_produtor` varchar(45) COLLATE utf8_bin NOT NULL,
  `data_vid_produtor` datetime DEFAULT current_timestamp(),
  `avaliacao_vid_produtor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONAMENTOS PARA TABELAS `video_produtor`:
--

--
-- Extraindo dados da tabela `video_produtor`
--

INSERT INTO `video_produtor` (`id_vid_produtor`, `nome_vid_produtor`, `temp_vid_produtor`, `data_vid_produtor`, `avaliacao_vid_produtor`) VALUES
(1, 'libras', '', '2021-02-18 19:52:34', NULL),
(2, 'libras2', '', '2021-02-18 19:52:34', NULL),
(6, 'Carinhoso', '00:35', '2021-02-19 21:07:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_traducao`
--
-- Criação: 21-Fev-2021 às 20:55
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
-- Extraindo dados da tabela `video_traducao`
--

INSERT INTO `video_traducao` (`id_vid_traducao`, `id_pessoa`, `nome_vid_traducao`, `temp_vid_traducao`, `data_vid_traducao`, `avaliacao_vid_traduc`) VALUES
(5, 2, 'libras tradução', NULL, '2021-02-18 19:59:02', NULL),
(6, 3, 'libras2 tradução', NULL, '2021-02-18 19:59:02', NULL),
(7, 7, 'Carinhoso Libras', '00:36', '2021-02-19 21:08:32', NULL);

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
  ADD PRIMARY KEY (`id_vid_produtor`);

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
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `video_produtor`
--
ALTER TABLE `video_produtor`
  MODIFY `id_vid_produtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Limitadores para a tabela `video_traducao`
--
ALTER TABLE `video_traducao`
  ADD CONSTRAINT `traducao_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--

--
-- Metadata para tabela comentario
--

--
-- Metadata para tabela conteudo
--

--
-- Metadata para tabela pessoa
--

--
-- Metadata para tabela video_produtor
--

--
-- Metadata para tabela video_traducao
--

--
-- Metadata para o banco de dados jump_squad8
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
