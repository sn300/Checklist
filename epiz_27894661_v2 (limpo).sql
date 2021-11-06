-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2021 às 15:12
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_27894661_v2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automoveis`
--

CREATE TABLE `automoveis` (
  `auto_id` int(11) NOT NULL,
  `auto_modelo` varchar(200) COLLATE utf8_bin NOT NULL,
  `auto_marca` varchar(10) COLLATE utf8_bin NOT NULL,
  `auto_placa` varchar(200) COLLATE utf8_bin NOT NULL,
  `auto_tipo` int(1) NOT NULL,
  `auto_foto` varchar(45) COLLATE utf8_bin NOT NULL,
  `auto_cidade` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramentas`
--

CREATE TABLE `ferramentas` (
  `fer_id` int(11) NOT NULL,
  `fer_descricao` varchar(200) COLLATE utf8_bin NOT NULL,
  `fer_tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  `fer_direcionamento` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramentas_has_transacao`
--

CREATE TABLE `ferramentas_has_transacao` (
  `ferramentas_fer_id` int(11) NOT NULL,
  `transacao_tra_id` int(11) NOT NULL,
  `fer_has_transacao_id` int(11) NOT NULL,
  `fer_has_transacao_descricao` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas`
--

CREATE TABLE `pecas` (
  `pe_id` int(11) NOT NULL,
  `pe_descricao` varchar(200) COLLATE utf8_bin NOT NULL,
  `pe_tipo` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `tra_id` int(11) NOT NULL,
  `tra_quilometragem` varchar(20) COLLATE utf8_bin NOT NULL,
  `tra_quilometragemf` varchar(20) COLLATE utf8_bin NOT NULL,
  `tra_data` varchar(20) COLLATE utf8_bin NOT NULL,
  `tra_obs` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `automoveis_auto_id` int(11) NOT NULL,
  `usuarios_usu_id` int(11) NOT NULL,
  `tra_tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  `tra_horai` varchar(45) COLLATE utf8_bin NOT NULL,
  `tra_horaf` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao_has_pecas`
--

CREATE TABLE `transacao_has_pecas` (
  `tran_pe_id` int(11) NOT NULL,
  `transacao_tra_id` int(11) NOT NULL,
  `pecas_pe_id` int(11) NOT NULL,
  `tran_pe_condicao` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `usu_cpf` varchar(20) COLLATE utf8_bin NOT NULL,
  `usu_email` varchar(200) COLLATE utf8_bin NOT NULL,
  `usu_senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `usu_tipo` int(1) NOT NULL,
  `usu_foto` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `usu_contato` varchar(45) COLLATE utf8_bin NOT NULL,
  `usu_cidade` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `automoveis`
--
ALTER TABLE `automoveis`
  ADD PRIMARY KEY (`auto_id`);

--
-- Índices para tabela `ferramentas`
--
ALTER TABLE `ferramentas`
  ADD PRIMARY KEY (`fer_id`);

--
-- Índices para tabela `ferramentas_has_transacao`
--
ALTER TABLE `ferramentas_has_transacao`
  ADD PRIMARY KEY (`fer_has_transacao_id`),
  ADD KEY `fk_ferramentas_has_transacao_transacao1_idx` (`transacao_tra_id`),
  ADD KEY `fk_ferramentas_has_transacao_ferramentas_idx` (`ferramentas_fer_id`);

--
-- Índices para tabela `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`pe_id`);

--
-- Índices para tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `fk_transacao_automoveis1_idx` (`automoveis_auto_id`),
  ADD KEY `fk_transacao_usuarios1_idx` (`usuarios_usu_id`);

--
-- Índices para tabela `transacao_has_pecas`
--
ALTER TABLE `transacao_has_pecas`
  ADD PRIMARY KEY (`tran_pe_id`),
  ADD KEY `fk_transacao_has_pecas_pecas1_idx` (`pecas_pe_id`),
  ADD KEY `fk_transacao_has_pecas_transacao1_idx` (`transacao_tra_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `automoveis`
--
ALTER TABLE `automoveis`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ferramentas`
--
ALTER TABLE `ferramentas`
  MODIFY `fer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ferramentas_has_transacao`
--
ALTER TABLE `ferramentas_has_transacao`
  MODIFY `fer_has_transacao_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pecas`
--
ALTER TABLE `pecas`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transacao_has_pecas`
--
ALTER TABLE `transacao_has_pecas`
  MODIFY `tran_pe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
