-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2019 às 00:06
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendas`
--

CREATE TABLE `tb_vendas` (
  `id` int(11) NOT NULL,
  `valor` varchar(11) NOT NULL,
  `data` date NOT NULL,
  `vendedor` varchar(55) NOT NULL,
  `cliente` varchar(55) DEFAULT NULL,
  `n_NotaFiscal` int(11) NOT NULL,
  `pagamento` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_vendas`
--

INSERT INTO `tb_vendas` (`id`, `valor`, `data`, `vendedor`, `cliente`, `n_NotaFiscal`, `pagamento`) VALUES
(1, '36', '2011-01-19', '0', 'Nao Identificado', 302320, 'Dinheiro'),
(2, '36', '2011-01-19', '0', 'joao', 302320, 'Debito'),
(3, '36', '2011-01-19', '0', 'joao', 302320, 'Debito'),
(4, '36', '2011-01-19', '0', 'Nao Identificado', 302320, 'Dinheiro'),
(5, '36', '2011-01-19', 'augusto', 'Nao Identificado', 302320, 'Debito'),
(6, '36', '2011-01-19', 'augusto', 'Nao Identificado', 4732233, 'Dinheiro'),
(7, '36', '2011-01-19', 'augusto', 'Nao Identificado', 4732233, 'Dinheiro'),
(8, '18', '2011-01-19', 'augusto', 'Nao Identificado', 237222, 'Dinheiro'),
(9, '18', '2011-01-19', 'augusto', 'joao', 237222, 'Debito'),
(10, '18', '2011-01-19', 'augusto', 'Nao Identificado', 237222, 'Dinheiro'),
(11, '32.4', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(12, '32.4', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(13, '32.4', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(14, '32.4', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(15, '32.4', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(16, '32.76', '2011-01-19', 'augusto', 'Nao Identificado', 32402220, 'Dinheiro'),
(17, '35.64', '2011-07-19', 'augusto', 'Nao Identificado', 2739022, '36'),
(18, '17.64', '2011-07-19', 'augusto', 'Nao Identificado', 22302, 'Dinheiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
