-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2023 às 05:24
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_clientes`
--

CREATE TABLE `mod_clientes` (
  `cli_id` bigint(20) UNSIGNED NOT NULL,
  `cli_nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `cli_email` varchar(255) COLLATE utf16_bin NOT NULL,
  `cli_dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cli_status` varchar(1) COLLATE utf16_bin NOT NULL COMMENT 'a=ativo;i=intativo;e=excluido'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_configuracoes`
--

CREATE TABLE `mod_configuracoes` (
  `conf_id` bigint(20) UNSIGNED NOT NULL,
  `conf_multa` double NOT NULL DEFAULT '2',
  `conf_prazo` int(11) NOT NULL DEFAULT '3',
  `conf_empresa` varchar(255) COLLATE utf16_bin NOT NULL DEFAULT 'Projeto Locadora',
  `conf_empresa_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Extraindo dados da tabela `mod_configuracoes`
--

INSERT INTO `mod_configuracoes` (`conf_id`, `conf_multa`, `conf_prazo`, `conf_empresa`, `conf_empresa_id`) VALUES
(5, 2, 4, 'Dvd Home Buster 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_itens_locacao`
--

CREATE TABLE `mod_itens_locacao` (
  `itl_id` bigint(20) UNSIGNED NOT NULL,
  `itl_dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tit_id_fk` int(11) NOT NULL COMMENT 'mod_titulos',
  `loc_id_fk` int(11) NOT NULL COMMENT 'mod_locacao'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_locacao`
--

CREATE TABLE `mod_locacao` (
  `loc_id` bigint(20) UNSIGNED NOT NULL,
  `loc_dt_retirada` date DEFAULT NULL,
  `loc_dt_entrega` date DEFAULT NULL,
  `loc_dt_entrega_prevista` date DEFAULT NULL,
  `loc_status` varchar(1) COLLATE utf16_bin DEFAULT NULL COMMENT 'a=ativa;cancelada;f=finalizada',
  `loc_valor_total` double DEFAULT NULL,
  `loc_valor_multa` double DEFAULT NULL,
  `loc_valor_subtotal` double DEFAULT NULL,
  `loc_forma_pgto` varchar(30) COLLATE utf16_bin DEFAULT NULL,
  `id_cli_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_titulos`
--

CREATE TABLE `mod_titulos` (
  `tit_id` bigint(20) UNSIGNED NOT NULL,
  `tit_nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `tit_valor` double NOT NULL,
  `tit_quantidade` int(11) NOT NULL,
  `tit_dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tit_status` varchar(1) COLLATE utf16_bin NOT NULL COMMENT 'a=ativo;i=inativo;e=excluido'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_clientes`
--
ALTER TABLE `mod_clientes`
  ADD PRIMARY KEY (`cli_id`),
  ADD UNIQUE KEY `cli_id` (`cli_id`);

--
-- Indexes for table `mod_configuracoes`
--
ALTER TABLE `mod_configuracoes`
  ADD UNIQUE KEY `conf_id` (`conf_id`);

--
-- Indexes for table `mod_itens_locacao`
--
ALTER TABLE `mod_itens_locacao`
  ADD PRIMARY KEY (`itl_id`),
  ADD UNIQUE KEY `itl_id` (`itl_id`);

--
-- Indexes for table `mod_locacao`
--
ALTER TABLE `mod_locacao`
  ADD PRIMARY KEY (`loc_id`),
  ADD UNIQUE KEY `loc_id` (`loc_id`);

--
-- Indexes for table `mod_titulos`
--
ALTER TABLE `mod_titulos`
  ADD PRIMARY KEY (`tit_id`),
  ADD UNIQUE KEY `tit_id` (`tit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mod_clientes`
--
ALTER TABLE `mod_clientes`
  MODIFY `cli_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mod_configuracoes`
--
ALTER TABLE `mod_configuracoes`
  MODIFY `conf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mod_itens_locacao`
--
ALTER TABLE `mod_itens_locacao`
  MODIFY `itl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `mod_locacao`
--
ALTER TABLE `mod_locacao`
  MODIFY `loc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mod_titulos`
--
ALTER TABLE `mod_titulos`
  MODIFY `tit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
