-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2019 às 00:07
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
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `telefone` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `cpf`, `nome`, `dataNascimento`, `endereco`, `numero`, `bairro`, `telefone`, `celular`, `email`) VALUES
(1, 2147483647, 'joao', '2019-09-11', 'julio de castilho', 36, 'centro', 37244567, 999280448, 'a@a.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedores`
--

CREATE TABLE `tb_fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `cnpj` int(20) NOT NULL,
  `inscricao` int(20) NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `cep` int(20) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedores`
--

INSERT INTO `tb_fornecedores` (`id`, `nome`, `cnpj`, `inscricao`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `uf`, `telefone`, `email`) VALUES
(1, 'fornecedor1', 2147483647, 2147483647, 'julio de castilho', 836, 'centro', 'cachoeira do sul', 96501, 'RS', 37244567, 'a@a.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lembrete`
--

CREATE TABLE `tb_lembrete` (
  `id` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_lembrete`
--

INSERT INTO `tb_lembrete` (`id`, `texto`, `data`, `usuario`) VALUES
(1, 'Recado 01', '2019-09-23', 2),
(2, 'recado 2', '2019-09-23', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(55) NOT NULL,
  `codInterno` int(20) NOT NULL,
  `codBarras` int(11) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `custo` int(11) NOT NULL,
  `venda` int(11) NOT NULL,
  `principio` varchar(55) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `descricao`, `codInterno`, `codBarras`, `fornecedor`, `custo`, `venda`, `principio`, `quantidade`) VALUES
(1, 'remedio ', 1, 777898888, 1, 10, 18, 'axxxxx', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `cargo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`) VALUES
(1, 'admin', 'admin', '12345', '0'),
(2, 'augusto', 'augusto', '12345', '0');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_venda_produtos`
--

CREATE TABLE `tb_venda_produtos` (
  `id` int(11) NOT NULL,
  `n_nota_fiscal` int(11) NOT NULL,
  `codBarras` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `quant` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_venda_produtos`
--

INSERT INTO `tb_venda_produtos` (`id`, `n_nota_fiscal`, `codBarras`, `descricao`, `quant`, `valor`) VALUES
(1, 32676, 777898888, 'remedio ', 3, 18),
(2, 32676, 777898888, 'remedio ', 3, 18),
(3, 32676, 777898888, 'remedio ', 3, 18),
(4, 32676, 777898888, 'remedio ', 3, 18),
(5, 32676, 777898888, 'remedio ', 3, 18),
(6, 33075234, 777898888, 'remedio ', 3, 18),
(7, 33075234, 777898888, 'remedio ', 3, 18),
(8, 6962323, 777898888, 'remedio ', 3, 18),
(9, 6962323, 777898888, 'remedio ', 3, 18),
(10, 35037225, 777898888, 'remedio ', 1, 18),
(11, 35037225, 777898888, 'remedio ', 1, 18),
(12, 2333322, 777898888, 'remedio ', 1, 18),
(13, 383422, 777898888, 'remedio ', 1, 18),
(14, 383422, 777898888, 'remedio ', 2, 18),
(15, 383422, 777898888, 'remedio ', 2, 18),
(16, 2025723, 777898888, 'remedio ', 1, 18),
(17, 32026, 777898888, 'remedio ', 1, 18),
(18, 2933, 777898888, 'remedio ', 1, 18),
(19, 22323333, 777898888, 'remedio ', 2, 18),
(20, 22323333, 777898888, 'remedio ', 1, 18),
(21, 22323333, 777898888, 'remedio ', 3, 18),
(22, 2003692, 777898888, 'remedio ', 1, 18),
(23, 2003692, 777898888, 'remedio ', 2, 18),
(24, 2003692, 777898888, 'remedio ', 3, 18),
(25, 3750383, 777898888, 'remedio ', 3, 18),
(26, 3750383, 777898888, 'remedio ', 1, 18),
(27, 0, 777898888, 'remedio ', 1, 18),
(28, 0, 777898888, 'remedio ', 1, 18),
(29, 233300, 777898888, 'remedio ', 1, 18),
(30, 233300, 777898888, 'remedio ', 3, 18),
(31, 92322, 777898888, 'remedio ', 1, 18),
(32, 92322, 777898888, 'remedio ', 1, 18),
(33, 92322, 777898888, 'remedio ', 3, 18),
(34, 7232022, 777898888, 'remedio ', 3, 18),
(35, 7232022, 777898888, 'remedio ', 1, 18),
(36, 332203, 777898888, 'remedio ', 1, 18),
(37, 332332, 777898888, 'remedio ', 1, 18),
(38, 4022273, 777898888, 'remedio ', 2, 18),
(39, 80, 777898888, 'remedio ', 1, 18),
(40, 80, 777898888, 'remedio ', 3, 18),
(41, 2022, 777898888, 'remedio ', 1, 18),
(42, 2022, 777898888, 'remedio ', 2, 18),
(43, 2022, 777898888, 'remedio ', 3, 18),
(44, 2022, 777898888, 'remedio ', 3, 18),
(45, 2022, 777898888, 'remedio ', 3, 18),
(46, 93290233, 777898888, 'remedio ', 1, 18),
(47, 93290233, 777898888, 'remedio ', 2, 18),
(48, 0, 777898888, 'remedio ', 1, 18),
(49, 3238092, 777898888, 'remedio ', 3, 18),
(50, 3238092, 777898888, 'remedio ', 1, 18),
(51, 330202, 777898888, 'remedio ', 2, 18),
(52, 62450, 777898888, 'remedio ', 3, 18),
(53, 220273, 777898888, 'remedio ', 1, 18),
(54, 220273, 777898888, 'remedio ', 3, 18),
(55, 332820, 777898888, 'remedio ', 1, 18),
(56, 332820, 777898888, 'remedio ', 1, 18),
(60, 3947225, 777898888, 'remedio ', 2, 18),
(61, 6022033, 777898888, 'remedio ', 1, 18),
(62, 23842, 777898888, 'remedio ', 3, 18),
(63, 342232, 777898888, 'remedio ', 1, 18),
(64, 302320, 777898888, 'remedio ', 2, 18),
(65, 4732233, 777898888, 'remedio ', 2, 18),
(66, 237222, 777898888, 'remedio ', 1, 18),
(67, 32402220, 777898888, 'remedio ', 1, 18),
(68, 32402220, 777898888, 'remedio ', 1, 18),
(69, 2739022, 777898888, 'remedio ', 2, 18),
(70, 22302, 777898888, 'remedio ', 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_venda_produtos`
--
ALTER TABLE `tb_venda_produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_venda_produtos`
--
ALTER TABLE `tb_venda_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_lembrete`
--
ALTER TABLE `tb_lembrete`
  ADD CONSTRAINT `tb_lembrete_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
