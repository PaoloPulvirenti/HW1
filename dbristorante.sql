-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2021 alle 19:05
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbristorante`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_like`
--

CREATE TABLE `dati_like` (
  `ID` int(11) NOT NULL,
  `FK_piatto` int(11) DEFAULT NULL,
  `FK_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dati_like`
--

INSERT INTO `dati_like` (`ID`, `FK_piatto`, `FK_utente`) VALUES
(196, 18, 7),
(197, 19, 7),
(198, 21, 7),
(199, 18, 9),
(200, 20, 9),
(201, 24, 9),
(202, 21, 9),
(203, 18, 16),
(204, 19, 16),
(205, 21, 16),
(206, 22, 16),
(207, 20, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_recensioni`
--

CREATE TABLE `dati_recensioni` (
  `ID` int(11) NOT NULL,
  `FK_piatto` int(11) DEFAULT NULL,
  `FK_utente` int(11) DEFAULT NULL,
  `commento` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dati_recensioni`
--

INSERT INTO `dati_recensioni` (`ID`, `FK_piatto`, `FK_utente`, `commento`, `data`) VALUES
(255, 18, 7, 'Davvero molto buono!', '2021-05-24 11:09:47'),
(256, 18, 9, 'Delizioso!', '2021-05-24 11:09:48'),
(257, 20, 17, 'Buonissimo!', '2021-05-24 11:09:48'),
(258, 21, 16, 'Davvero ottimo!', '2021-05-24 11:09:49');

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendente`
--

CREATE TABLE `dipendente` (
  `ID` int(11) NOT NULL,
  `FK_Ristorante` int(11) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `Eta` int(11) DEFAULT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dipendente`
--

INSERT INTO `dipendente` (`ID`, `FK_Ristorante`, `Nome`, `Cognome`, `DataNascita`, `Eta`, `Tipo`) VALUES
(4, 3, 'paolo', 'pulvi', '1999-10-31', 0, 'Cameriere');

-- --------------------------------------------------------

--
-- Struttura della tabella `direttore`
--

CREATE TABLE `direttore` (
  `CF` char(16) NOT NULL,
  `FK_Ristorante` int(11) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `DataAssunzione` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `direttore`
--

INSERT INTO `direttore` (`CF`, `FK_Ristorante`, `Nome`, `Cognome`, `DataNascita`, `DataAssunzione`, `username`, `password`, `email`) VALUES
('EEEEEEEEEEEEEDAS', NULL, 'Erminio', 'Bastiano', '1988-01-30', NULL, NULL, NULL, NULL),
('FFFFFFFFFFASWERT', 3, 'Fabiano', 'Nespola', '1983-08-10', '2016-11-05', NULL, NULL, NULL),
('GGGGGGGGGGASDWDA', 4, 'Giovanna', 'Brinati', '1953-05-21', '2015-11-14', NULL, NULL, NULL),
('IIIIIIIIISDDDSDD', 1, 'Isidoro', 'Dimitri', '1953-02-01', '2014-11-16', 'Isidoro.Dimitri', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'Isidoro.Dimitri@gmail.com'),
('LLLLLLDSDSDLLDSD', 2, 'Lucia', 'Rinaldi', '1979-10-21', '2012-01-21', NULL, NULL, NULL),
('MMMMMMMFAESFEFFE', 0, 'Mario', 'Rossi', '1960-12-11', '2019-12-14', NULL, NULL, NULL),
('SSSSSSSSIUIIIIDF', 5, 'Silvia', 'Lorefice', '1983-05-21', '2013-11-14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `dirigeva`
--

CREATE TABLE `dirigeva` (
  `ID` int(11) NOT NULL,
  `FK_Direttore` char(16) DEFAULT NULL,
  `FK_Ristorante` int(11) DEFAULT NULL,
  `DataAssunzione` date DEFAULT NULL,
  `DataLicenziamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dirigeva`
--

INSERT INTO `dirigeva` (`ID`, `FK_Direttore`, `FK_Ristorante`, `DataAssunzione`, `DataLicenziamento`) VALUES
(1, 'MMMMMMMFAESFEFFE', 0, '2008-12-14', '2016-12-14'),
(2, 'IIIIIIIIISDDDSDD', 3, '2000-11-05', '2010-11-16'),
(3, 'EEEEEEEEEEEEEDAS', 5, '2001-10-21', '2009-01-21'),
(4, 'FFFFFFFFFFASWERT', 1, '2003-11-12', '2011-11-11'),
(5, 'SSSSSSSSIUIIIIDF', 2, '2005-02-02', '2007-09-10'),
(6, 'EEEEEEEEEEEEEDAS', 4, '2003-05-05', '2007-10-10');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitore`
--

CREATE TABLE `fornitore` (
  `ID_Fornitore` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `fornitore`
--

INSERT INTO `fornitore` (`ID_Fornitore`, `Nome`) VALUES
(1, 'Mulino bianco'),
(2, 'Sole'),
(3, 'deco\''),
(4, 'Crai'),
(5, 'Spampinato');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitura`
--

CREATE TABLE `fornitura` (
  `FK_Fornitore` int(11) NOT NULL,
  `FK_Prodotto` int(11) NOT NULL,
  `FK_Ristorante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `fornitura`
--

INSERT INTO `fornitura` (`FK_Fornitore`, `FK_Prodotto`, `FK_Ristorante`) VALUES
(1, 2, 5),
(2, 3, 3),
(3, 1, 4),
(4, 4, 2),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `piatto`
--

CREATE TABLE `piatto` (
  `ID` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descrizione` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `piatto`
--

INSERT INTO `piatto` (`ID`, `img`, `nome`, `descrizione`) VALUES
(18, './img/img2.jpg', 'Costata di manzo e patate', 'Una squisitezza unica, carne davvero succulenta, morbida e piena di proteine. Accompagnata da un contorno di patate deliziose!'),
(19, './img/img3.jpg', 'Caviale e vongole', 'Una specialità pugliese composta da linguine con caviale rosso e vongole.'),
(20, './img/img4.jpg', 'Arrosto con verdure', 'Arrosto di vitello con verdure arrostite tra cui peperoni, zucchine.'),
(21, './img/img5.jpg', 'Pizza napoletana', 'Questa pizza è speciale per il suo impasto a lunga lievitazione.'),
(22, './img/img6.jpg', 'Babà al rum', 'Questo dolce molto buono e di origini francesi, con il suo retrogusto di rum fa innamorare chiunque lo assaggi.'),
(24, './img/img7.jpg', 'Lasagne al ragù', 'Tipico piatto siciliano, molto gustoso con formaggio, prosciutto e carne di manzo.');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `ID_Prodotto` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Descrizione` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`ID_Prodotto`, `Nome`, `Descrizione`) VALUES
(1, 'Salsa', 'La migliore salsa d\'italia'),
(2, 'Panino', 'Panini semplici integrali'),
(3, 'Cipolla', 'Cipola fresca'),
(4, 'Carote', 'Carota italiana'),
(5, 'Gambero', 'Gamberi di qualita\'');

-- --------------------------------------------------------

--
-- Struttura della tabella `ristorante`
--

CREATE TABLE `ristorante` (
  `ID_Ristorante` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `N_Dipendenti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ristorante`
--

INSERT INTO `ristorante` (`ID_Ristorante`, `Nome`, `N_Dipendenti`) VALUES
(0, 'Il covo marino', 0),
(1, 'Cavaddari', 0),
(2, 'Ruderi', 0),
(3, 'Maso Limaro', 0),
(4, 'La Taverna da Giovanni', 0),
(5, 'Osteria del Pettirosso', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `sede`
--

CREATE TABLE `sede` (
  `ID_sede` int(11) NOT NULL,
  `FK_Ristorante` int(11) DEFAULT NULL,
  `Indirizzo` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `data_apertura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sede`
--

INSERT INTO `sede` (`ID_sede`, `FK_Ristorante`, `Indirizzo`, `citta`, `data_apertura`) VALUES
(1, 0, 'Via rugero 21', 'Napoli', '1990-12-14'),
(2, 1, 'Via catanzaro 42', 'Napoli', '1990-11-16'),
(3, 2, 'Via riccardo wagner 124', 'Catania', '1980-01-21'),
(4, 3, 'Via mandorle 76', 'Acireale', '1970-11-05'),
(5, 4, 'Via balatelle 23', 'Napoli', '1990-11-14'),
(6, 5, 'Via Sandrero 132', 'Roma', '2000-12-11');

-- --------------------------------------------------------

--
-- Struttura della tabella `supervisore`
--

CREATE TABLE `supervisore` (
  `CF` char(16) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `Salario` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `supervisore`
--

INSERT INTO `supervisore` (`CF`, `Nome`, `Cognome`, `DataNascita`, `Salario`) VALUES
('CCCCCCCCCCASDWDA', 'Carlo', 'Conti', '1923-08-10', 5000),
('DDDDDDDDDDASDWDA', 'Dario', 'Toscano', '1943-05-21', 2600),
('GGGGGGDSGSDGGAAA', 'Gennaro', 'Riccardi', '1976-02-01', 4500),
('MMMMTRHAADFVEVRA', 'Mariella', 'Verdi', '1960-12-11', 2000),
('RRRRRRWERSTTGSGG', 'Riccardo', 'Marino', '1989-10-21', 2300);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `Nome`, `Cognome`, `DataNascita`, `username`, `Password`, `email`) VALUES
(7, 'paolo', 'pulvi', '1999-10-31', 'paololiberty', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'paolo.pulvirenti3110@gmail.com'),
(9, 'silvia', 'lorefice', '2001-01-04', 'silvialiberty', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'silvia.lorefice@gmail.com'),
(16, 'pippo', 'liggeri', '1999-03-31', 'pippoliberty', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'poppi.pluto@gmail.com'),
(17, 'paolo', 'scalzo', '1999-10-31', 'paololiberta', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'paolo.pulvirenti3199@gmail.com'),
(18, 'Seby', 'Belfiore', '1999-07-07', 'sebyliberty', '$2y$10$D5liK.6/974GFjuD5vsfd.LxwJXw.BuHbYVdjH3SbzI/twnLPd4nG', 'seby.belfiore@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `visiona`
--

CREATE TABLE `visiona` (
  `FK_Ristorante` int(11) NOT NULL,
  `FK_Supervisore` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `visiona`
--

INSERT INTO `visiona` (`FK_Ristorante`, `FK_Supervisore`) VALUES
(5, NULL),
(3, 'CCCCCCCCCCASDWDA'),
(4, 'DDDDDDDDDDASDWDA'),
(1, 'GGGGGGDSGSDGGAAA'),
(0, 'MMMMTRHAADFVEVRA'),
(2, 'RRRRRRWERSTTGSGG');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dati_like`
--
ALTER TABLE `dati_like`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `l1` (`FK_piatto`),
  ADD KEY `l2` (`FK_utente`);

--
-- Indici per le tabelle `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `l1` (`FK_piatto`),
  ADD KEY `l2` (`FK_utente`);

--
-- Indici per le tabelle `dipendente`
--
ALTER TABLE `dipendente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `R5` (`FK_Ristorante`);

--
-- Indici per le tabelle `direttore`
--
ALTER TABLE `direttore`
  ADD PRIMARY KEY (`CF`),
  ADD KEY `R3` (`FK_Ristorante`);

--
-- Indici per le tabelle `dirigeva`
--
ALTER TABLE `dirigeva`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `R4` (`FK_Ristorante`),
  ADD KEY `D1` (`FK_Direttore`);

--
-- Indici per le tabelle `fornitore`
--
ALTER TABLE `fornitore`
  ADD PRIMARY KEY (`ID_Fornitore`);

--
-- Indici per le tabelle `fornitura`
--
ALTER TABLE `fornitura`
  ADD PRIMARY KEY (`FK_Fornitore`,`FK_Prodotto`,`FK_Ristorante`),
  ADD KEY `R6` (`FK_Ristorante`),
  ADD KEY `P1` (`FK_Prodotto`),
  ADD KEY `F1` (`FK_Fornitore`);

--
-- Indici per le tabelle `piatto`
--
ALTER TABLE `piatto`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`ID_Prodotto`);

--
-- Indici per le tabelle `ristorante`
--
ALTER TABLE `ristorante`
  ADD PRIMARY KEY (`ID_Ristorante`);

--
-- Indici per le tabelle `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID_sede`),
  ADD KEY `R1` (`FK_Ristorante`);

--
-- Indici per le tabelle `supervisore`
--
ALTER TABLE `supervisore`
  ADD PRIMARY KEY (`CF`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `visiona`
--
ALTER TABLE `visiona`
  ADD PRIMARY KEY (`FK_Ristorante`),
  ADD KEY `R2` (`FK_Ristorante`),
  ADD KEY `S1` (`FK_Supervisore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dati_like`
--
ALTER TABLE `dati_like`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT per la tabella `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT per la tabella `dipendente`
--
ALTER TABLE `dipendente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `dirigeva`
--
ALTER TABLE `dirigeva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `piatto`
--
ALTER TABLE `piatto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `sede`
--
ALTER TABLE `sede`
  MODIFY `ID_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dati_like`
--
ALTER TABLE `dati_like`
  ADD CONSTRAINT `dati_like_ibfk_1` FOREIGN KEY (`FK_piatto`) REFERENCES `piatto` (`ID`),
  ADD CONSTRAINT `dati_like_ibfk_2` FOREIGN KEY (`FK_utente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `dati_recensioni`
--
ALTER TABLE `dati_recensioni`
  ADD CONSTRAINT `dati_recensioni_ibfk_1` FOREIGN KEY (`FK_piatto`) REFERENCES `piatto` (`ID`),
  ADD CONSTRAINT `dati_recensioni_ibfk_2` FOREIGN KEY (`FK_utente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `dipendente`
--
ALTER TABLE `dipendente`
  ADD CONSTRAINT `dipendente_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`);

--
-- Limiti per la tabella `direttore`
--
ALTER TABLE `direttore`
  ADD CONSTRAINT `direttore_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`);

--
-- Limiti per la tabella `dirigeva`
--
ALTER TABLE `dirigeva`
  ADD CONSTRAINT `dirigeva_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`),
  ADD CONSTRAINT `dirigeva_ibfk_2` FOREIGN KEY (`FK_Direttore`) REFERENCES `direttore` (`CF`);

--
-- Limiti per la tabella `fornitura`
--
ALTER TABLE `fornitura`
  ADD CONSTRAINT `fornitura_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`),
  ADD CONSTRAINT `fornitura_ibfk_2` FOREIGN KEY (`FK_Prodotto`) REFERENCES `prodotto` (`ID_Prodotto`),
  ADD CONSTRAINT `fornitura_ibfk_3` FOREIGN KEY (`FK_Fornitore`) REFERENCES `fornitore` (`ID_Fornitore`);

--
-- Limiti per la tabella `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`);

--
-- Limiti per la tabella `visiona`
--
ALTER TABLE `visiona`
  ADD CONSTRAINT `visiona_ibfk_1` FOREIGN KEY (`FK_Ristorante`) REFERENCES `ristorante` (`ID_Ristorante`),
  ADD CONSTRAINT `visiona_ibfk_2` FOREIGN KEY (`FK_Supervisore`) REFERENCES `supervisore` (`CF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
