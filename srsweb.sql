-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2024 às 00:40
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `srsweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `srsbackup`
--

CREATE TABLE `srsbackup` (
  `backupFileID` int(11) NOT NULL,
  `backupData` longblob DEFAULT NULL,
  `backupName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backupFileType` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backupFileSize` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backupFileTmpName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backupFileError` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backFileURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `backupUpload_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `srscomp`
--

CREATE TABLE `srscomp` (
  `CompID` int(11) NOT NULL,
  `CompName` varchar(20) NOT NULL,
  `CompDescr` varchar(30) DEFAULT NULL,
  `CompDate` date NOT NULL,
  `CompCode` varchar(20) NOT NULL,
  `CompUserID` int(11) NOT NULL,
  `compDepend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srscomp`
--

INSERT INTO `srscomp` (`CompID`, `CompName`, `CompDescr`, `CompDate`, `CompCode`, `CompUserID`, `compDepend`) VALUES
(1, 'component1', 'test1', '2024-06-06', '001', 2, NULL),
(2, 'component2', 'test2', '2024-06-06', '002', 2, NULL),
(3, 'component3', 'test3', '2024-06-06', '003', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `srscompversion`
--

CREATE TABLE `srscompversion` (
  `VersionID` int(11) NOT NULL,
  `VersionName` varchar(40) NOT NULL,
  `VersionDate` date NOT NULL,
  `VersionCode` varchar(50) NOT NULL,
  `VersionCompID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srscompversion`
--

INSERT INTO `srscompversion` (`VersionID`, `VersionName`, `VersionDate`, `VersionCode`, `VersionCompID`) VALUES
(1, '33', '2024-06-09', '345', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `srsdevperm`
--

CREATE TABLE `srsdevperm` (
  `DevPermID` int(11) NOT NULL,
  `DevID` int(11) NOT NULL,
  `PermissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srsdevperm`
--

INSERT INTO `srsdevperm` (`DevPermID`, `DevID`, `PermissionID`) VALUES
(3, 2, 1),
(4, 2, 2),
(9, 2, 5),
(12, 2, 4),
(18, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `srsperm`
--

CREATE TABLE `srsperm` (
  `PermID` int(11) NOT NULL,
  `PermDescr` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srsperm`
--

INSERT INTO `srsperm` (`PermID`, `PermDescr`) VALUES
(1, 'Create new component'),
(2, 'Register new version'),
(3, 'Define dependency'),
(4, 'Change dependency'),
(5, 'Cancel dependency');

-- --------------------------------------------------------

--
-- Estrutura da tabela `srsuser`
--

CREATE TABLE `srsuser` (
  `UserID` int(11) NOT NULL,
  `LoginUsername` varchar(20) NOT NULL,
  `LoginPassword` varchar(30) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserAddress` varchar(70) NOT NULL,
  `UserNIF` varchar(9) NOT NULL,
  `UserEmail` varchar(40) NOT NULL,
  `UserRoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srsuser`
--

INSERT INTO `srsuser` (`UserID`, `LoginUsername`, `LoginPassword`, `UserName`, `UserAddress`, `UserNIF`, `UserEmail`, `UserRoleID`) VALUES
(1, 'adm', '123', 'admininin', 'rua bbbb', '12345789', 'dev@dev.dev', 1),
(2, 'dev', '321', 'devi', 'rua bbbb', '987654321', 'dev@dev.dev', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `srsuserrole`
--

CREATE TABLE `srsuserrole` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `srsuserrole`
--

INSERT INTO `srsuserrole` (`RoleID`, `RoleName`) VALUES
(1, 'admin'),
(2, 'developer');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `srsbackup`
--
ALTER TABLE `srsbackup`
  ADD PRIMARY KEY (`backupFileID`);

--
-- Índices para tabela `srscomp`
--
ALTER TABLE `srscomp`
  ADD PRIMARY KEY (`CompID`),
  ADD KEY `CompUserID` (`CompUserID`),
  ADD KEY `compDepend` (`compDepend`);

--
-- Índices para tabela `srscompversion`
--
ALTER TABLE `srscompversion`
  ADD PRIMARY KEY (`VersionID`),
  ADD KEY `VersionCompID` (`VersionCompID`);

--
-- Índices para tabela `srsdevperm`
--
ALTER TABLE `srsdevperm`
  ADD PRIMARY KEY (`DevPermID`),
  ADD KEY `DevID` (`DevID`),
  ADD KEY `PermissionID` (`PermissionID`);

--
-- Índices para tabela `srsperm`
--
ALTER TABLE `srsperm`
  ADD PRIMARY KEY (`PermID`);

--
-- Índices para tabela `srsuser`
--
ALTER TABLE `srsuser`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `LoginUsername` (`LoginUsername`),
  ADD UNIQUE KEY `UserNIF` (`UserNIF`),
  ADD KEY `UserRoleID` (`UserRoleID`);

--
-- Índices para tabela `srsuserrole`
--
ALTER TABLE `srsuserrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `srsbackup`
--
ALTER TABLE `srsbackup`
  MODIFY `backupFileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `srscomp`
--
ALTER TABLE `srscomp`
  MODIFY `CompID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `srscompversion`
--
ALTER TABLE `srscompversion`
  MODIFY `VersionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `srsdevperm`
--
ALTER TABLE `srsdevperm`
  MODIFY `DevPermID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `srsperm`
--
ALTER TABLE `srsperm`
  MODIFY `PermID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `srsuser`
--
ALTER TABLE `srsuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `srsuserrole`
--
ALTER TABLE `srsuserrole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `srscomp`
--
ALTER TABLE `srscomp`
  ADD CONSTRAINT `srscomp_ibfk_1` FOREIGN KEY (`CompUserID`) REFERENCES `srsuser` (`UserID`),
  ADD CONSTRAINT `srscomp_ibfk_2` FOREIGN KEY (`compDepend`) REFERENCES `srscomp` (`CompID`);

--
-- Limitadores para a tabela `srscompversion`
--
ALTER TABLE `srscompversion`
  ADD CONSTRAINT `srscompversion_ibfk_1` FOREIGN KEY (`VersionCompID`) REFERENCES `srscomp` (`CompID`);

--
-- Limitadores para a tabela `srsdevperm`
--
ALTER TABLE `srsdevperm`
  ADD CONSTRAINT `srsdevperm_ibfk_1` FOREIGN KEY (`DevID`) REFERENCES `srsuser` (`UserID`),
  ADD CONSTRAINT `srsdevperm_ibfk_2` FOREIGN KEY (`PermissionID`) REFERENCES `srsperm` (`PermID`);

--
-- Limitadores para a tabela `srsuser`
--
ALTER TABLE `srsuser`
  ADD CONSTRAINT `srsuser_ibfk_1` FOREIGN KEY (`UserRoleID`) REFERENCES `srsuserrole` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
