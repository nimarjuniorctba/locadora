-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jan-2023 às 04:17
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
  `cli_id` int(11) NOT NULL,
  `cli_nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `cli_email` varchar(255) COLLATE utf16_bin NOT NULL,
  `cli_dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cli_status` varchar(1) COLLATE utf16_bin NOT NULL COMMENT 'a=ativo;i=intativo;e=excluido'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

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
  `loc_dt_retirada` date NOT NULL,
  `loc_dt_entrega` date NOT NULL,
  `loc_status` varchar(1) COLLATE utf16_bin NOT NULL COMMENT 'a=ativa;cancelada;f=finalizada',
  `loc_valor_total` double NOT NULL,
  `loc_valor_multa` double NOT NULL,
  `loc_valor_subtotal` double NOT NULL,
  `loc_status_pgto` varchar(2) COLLATE utf16_bin NOT NULL COMMENT 'np=nao pago;i=isento;p=pago;',
  `loc_forma_pgto` varchar(30) COLLATE utf16_bin NOT NULL,
  `id_cli_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_titulos`
--

CREATE TABLE `mod_titulos` (
  `tit_id` bigint(20) UNSIGNED NOT NULL,
  `tit_capa` varchar(255) COLLATE utf16_bin NOT NULL,
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
  ADD PRIMARY KEY (`cli_id`);

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
-- AUTO_INCREMENT for table `mod_itens_locacao`
--
ALTER TABLE `mod_itens_locacao`
  MODIFY `itl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mod_locacao`
--
ALTER TABLE `mod_locacao`
  MODIFY `loc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mod_titulos`
--
ALTER TABLE `mod_titulos`
  MODIFY `tit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
