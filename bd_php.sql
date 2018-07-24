-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2017 às 00:36
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artistas`
--

CREATE TABLE `artistas` (
  `cod_artista` int(11) NOT NULL,
  `nome_artista` varchar(50) NOT NULL,
  `idade` varchar(3) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `cod_banda` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artistas`
--

INSERT INTO `artistas` (`cod_artista`, `nome_artista`, `idade`, `funcao`, `cod_banda`, `num_likes`) VALUES
(1, 'Axl Rose', '55', 'Vocalista', 1, 0),
(2, 'Slash', '52', 'Guitarrista', 1, 0),
(3, 'Duff McKagan', '53', 'Baixista', 1, 0),
(4, 'Frank Ferrer', '51', 'Baterista', 1, 0),
(5, 'Dizzy Reed', '54', 'Tecladista', 1, 0),
(6, 'Melissa Reese', '---', 'Tecladista', 1, 0),
(7, 'Richard Fortus', '50', 'Guitarrista', 1, 0),
(8, 'João Barone', '55', 'Baterista', 2, 0),
(9, 'Bi Ribeiro', '56', 'Baixista', 2, 0),
(10, 'Anthony Kiedis', '54', 'Vocalista', 3, 0),
(11, 'Flea', '54', 'Baixista', 3, 0),
(12, 'Chad Smith', '55', 'Baterista', 3, 0),
(13, 'Josh Klinghoffer', '37', 'Guitarrista', 3, 0),
(14, 'Renato Russo', '36', 'Vocalista', 4, 0),
(15, 'Eduardo Paraná', '---', 'Guitarrista', 4, 0),
(16, 'Ico Ouro-Preto', '---', 'Guitarrista', 4, 0),
(17, 'Paulo Paulista', '---', 'Tecladista', 4, 0),
(18, 'Renato Rocha ', '36', 'Baixista', 4, 0),
(19, 'Lars Ulrich', '53', 'Baterista', 5, 0),
(20, 'Kirk Hammett', '54', 'Guitarrista', 5, 0),
(21, 'Rob Trujillo', '52', 'Baixista', 5, 0),
(22, 'Fernandinho', '---', 'Guitarrista', 6, 0),
(23, 'Franja', '---', 'Guitarrista', 6, 0),
(24, 'Samambaia', '---', 'Baixista', 6, 0),
(25, 'Juliano Hodapp', '---', 'Baterista', 6, 0),
(26, 'The Edge', '56', 'Guitarrista', 7, 0),
(27, 'Adam Clayton', '57', 'Baixista', 7, 0),
(28, 'Larry Mullen Jr.', '55', 'Baterista', 7, 0),
(29, 'Paul McCarterney', '75', 'Baixista', 8, 0),
(30, 'George Harrison', '58', 'Guitarrista', 8, 0),
(31, 'Ringo Starr', '77', 'Baterista', 8, 0),
(32, 'Gláucio Ayala', '43', 'Baterista', 9, 0),
(33, 'Fernando Aranha', '44', 'Guitarrista', 9, 0),
(34, 'Pedro Augusto', '54', 'Tecladista', 9, 0),
(35, 'Brian May', '70', 'Tecladista', 10, 0),
(36, 'Freddie Mercury', '45', 'Vocalista', 10, 0),
(37, 'Jonh Deacon', '66', 'Guitarrista', 10, 0),
(38, 'Roger Taylor', '---', 'Baterista', 10, 0),
(39, 'Dinho', '---', 'Vocalista', 11, 0),
(40, 'Júlio Rasec', '---', 'Tecladista', 11, 0),
(41, 'Bento Hinoto', '---', 'Guitarrista', 11, 0),
(42, 'Samuel Reis de Oliveira', '---', 'Baixista', 11, 0),
(43, 'Sérgio Reis de Oliveira', '---', 'Baterista', 11, 0),
(44, 'Guto Goffi', '---', 'Baterista', 12, 0),
(45, 'Maurício Barros', '---', 'Tecladista', 12, 0),
(46, 'Axl Rose', '55', 'Vocalista', 1, 0),
(47, 'Slash', '52', 'Guitarrista', 1, 0),
(48, 'Duff McKagan', '53', 'Baixista', 1, 0),
(49, 'Frank Ferrer', '51', 'Baterista', 1, 0),
(50, 'Dizzy Reed', '54', 'Tecladista', 1, 0),
(51, 'Melissa Reese', '---', 'Tecladista', 1, 0),
(52, 'Richard Fortus', '50', 'Guitarrista', 1, 0),
(53, 'Helbert Vianna', '56', 'Vocalista e Guitarrista', 2, 0),
(54, 'João Barone', '55', 'Baterista', 2, 0),
(55, 'Bi Ribeiro', '56', 'Baixista', 2, 0),
(56, 'Anthony Kiedis', '54', 'Vocalista', 3, 0),
(57, 'Flea', '54', 'Baixista', 3, 0),
(58, 'Chad Smith', '55', 'Baterista', 3, 0),
(59, 'Josh Klinghoffer', '37', 'Guitarrista', 3, 0),
(60, 'Renato Russo', '36', 'Vocalista', 4, 0),
(61, 'Eduardo Paraná', '---', 'Guitarrista', 4, 0),
(62, 'Ico Ouro-Preto', '---', 'Guitarrista', 4, 0),
(63, 'Paulo Paulista', '---', 'Tecladista', 4, 0),
(64, 'Renato Rocha ', '36', 'Baixista', 4, 0),
(65, 'James Hetfield', '54', 'Guitarrista e Vocalista', 5, 0),
(66, 'Lars Ulrich', '53', 'Baterista', 5, 0),
(67, 'Kirk Hammett', '54', 'Guitarrista', 5, 0),
(68, 'Rob Trujillo', '52', 'Baixista', 5, 0),
(69, 'Zeider', '---', 'Violonista e Vocalista', 6, 0),
(70, 'Fernandinho', '---', 'Guitarrista', 6, 0),
(71, 'Franja', '---', 'Guitarrista', 6, 0),
(72, 'Samambaia', '---', 'Baixista', 6, 0),
(73, 'Juliano Hodapp', '---', 'Baterista', 6, 0),
(74, 'Bono', '57', 'Guitarrista e Vocalista', 7, 0),
(75, 'The Edge', '56', 'Guitarrista', 7, 0),
(76, 'Adam Clayton', '57', 'Baixista', 7, 0),
(77, 'Larry Mullen Jr.', '55', 'Baterista', 7, 0),
(78, 'John Lenon', '40', 'Guitarrista e Vocalista', 8, 0),
(79, 'Paul McCarterney', '75', 'Baixista', 8, 0),
(80, 'George Harrison', '58', 'Guitarrista', 8, 0),
(81, 'Ringo Starr', '77', 'Baterista', 8, 0),
(82, 'Humberto Gessinger', '53', 'Vocalista e Violonista', 9, 0),
(83, 'Gláucio Ayala', '43', 'Baterista', 9, 0),
(84, 'Fernando Aranha', '44', 'Guitarrista', 9, 0),
(85, 'Pedro Augusto', '54', 'Tecladista', 9, 0),
(86, 'Brian May', '70', 'Tecladista', 10, 0),
(87, 'Freddie Mercury', '45', 'Vocalista', 10, 0),
(88, 'Jonh Deacon', '66', 'Guitarrista', 10, 0),
(89, 'Roger Taylor', '---', 'Baterista', 10, 0),
(90, 'Dinho', '---', 'Vocalista', 11, 0),
(91, 'Júlio Rasec', '---', 'Tecladista', 11, 0),
(92, 'Bento Hinoto', '---', 'Guitarrista', 11, 0),
(93, 'Samuel Reis de Oliveira', '---', 'Baixista', 11, 0),
(94, 'Sérgio Reis de Oliveira', '---', 'Baterista', 11, 0),
(95, 'Guto Goffi', '---', 'Baterista', 12, 0),
(96, 'Maurício Barros', '---', 'Tecladista', 12, 0),
(97, 'Fernando Magalhães', '---', 'Vocalista', 12, 0),
(98, 'Rodrigo Santos', '---', 'Baixista', 12, 0),
(99, 'Rodrigo Suricato', '---', 'Guitarrista', 12, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bandas`
--

CREATE TABLE `bandas` (
  `cod_banda` int(11) NOT NULL,
  `nome_banda` varchar(50) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `ano_fundacao` varchar(4) NOT NULL,
  `num_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bandas`
--

INSERT INTO `bandas` (`cod_banda`, `nome_banda`, `genero`, `ano_fundacao`, `num_likes`) VALUES
(1, 'Guns N Roses', 'Rock', '1985', 0),
(2, 'Paralamas do Sucesso', 'MPB', '1983', 0),
(3, 'Red Hot Chili Peppers', 'Rock', '1983', 0),
(4, 'Legião Urbana', 'MPB', '1982', 0),
(5, 'Metallica', 'Rock', '1981', 0),
(6, 'Planta e Raiz', 'Reggae', '1998', 0),
(7, 'U2', 'Rock', '1998', 0),
(8, 'Beatles', 'Rock', '1960', 0),
(9, 'Engenheiros do Hawaii', 'MPB', '1984', 0),
(10, 'Queen', 'Rock', '1970', 0),
(11, 'Mamonas Assassinas', 'Rock', '1995', 0),
(12, 'Barão Vermelho', 'Rock', '1981', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

CREATE TABLE `musicas` (
  `cod_musica` int(11) NOT NULL,
  `nome_musica` varchar(50) NOT NULL,
  `ano_lancamento` varchar(4) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `cod_banda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`cod_musica`,`nome_musica`, `ano_lancamento`, `num_likes`, `cod_banda`) VALUES
(1, 'Sweet Child O Mine', '1987', 0, 1),
(2, 'Welcome to the Jungle', '1987', 0, 1),
(3, 'Paradise City', '1987', 0, 1),
(4, 'Patience', '1988', 0, 1),
(5, 'Knockin on Heavens Door', '1990', 0, 1),
(6, 'November Rain', '1990', 0, 1),
(7, 'Civil War', '1991', 0, 1),
(8, 'Estranged', '1991', 0, 1),
(9, 'Dont Cry', '1991', 0, 1),
(10, 'You Could Be Mine', '1991', 0, 1),
(11, 'Vital e sua moto', '1983', 0, 2),
(12, 'Ska', '1984', 0, 2),
(13, 'Romance Ideal', '1984', 0, 2),
(14, 'Oculos', '1984', 0, 2),
(15, 'Meu Erro', '1984', 0, 2),
(16, 'Alagados', '1986', 0, 2),
(17, 'A novidade', '1986', 0, 2),
(18, 'Lanterna dos Afogados', '1989', 0, 2),
(19, 'Caleidoscópio', '1995', 0, 2),
(20, 'Ela disse adeus', '1998', 0, 2),
(21, 'Under the Bridge', '1991', 0, 3),
(22, 'Aeroplane', '1995', 0, 3),
(23, 'Otherside', '1999', 0, 3),
(24, 'Road Trippin', '1999', 0, 3),
(25, 'Californication', '1999', 0, 3),
(26, 'Dani California', '2006', 0, 3),
(27, 'Tell Me Baby', '2006', 0, 3),
(28, 'The Adventures of Rain Dance Maggie', '2011', 0, 3),
(29, 'Go Robot', '2016', 0, 3),
(30, 'Dark Necessities', '2016', 0, 3),
(31, 'Será', '1985', 0, 4),
(32, 'Ainda é cedo', '1985', 0, 4),
(33, 'Geração Coca-Cola', '1985', 0, 4),
(34, 'Índios', '1986', 0, 4),
(35, 'Eduardo e Mônica', '1986', 0, 4),
(36, 'Faroeste Caboclo', '1987', 0, 4),
(37, 'Que País É Este', '1987', 0, 4),
(38, 'Monte Castelo', '1989', 0, 4),
(39, 'Pais e Filhos', '1989', 0, 4),
(40, 'Tempo Perdido', '2001', 0, 4),
(41, 'Fade to Black', '1984', 0, 5),
(42, 'For Whom th Bell Tolls', '1984', 0, 5),
(43, 'Creeping Death', '1984', 0, 5),
(44, 'Battery', '1986', 0, 5),
(45, 'Master of Puppets', '1986', 0, 5),
(46, 'One', '1988', 0, 5),
(47, 'Nothing Else Matters', '1991', 0, 5),
(48, 'Enter Sandman', '1991', 0, 5),
(49, 'The Unforgiven', '1991', 0, 5),
(50, 'Welcome Home', '2007', 0, 5),
(51, 'Com Certeza', '2002', 0, 6),
(52, 'Pra Poucos', '2002', 0, 6),
(53, 'De você só quero amor', '2002', 0, 6),
(54, 'A dois passos do Paraíso', '2004', 0, 6),
(55, 'Segue a Vida', '2007', 0, 6),
(56, 'Amor e Paz', '2010', 0, 6),
(57, 'Oh Chuva', '2010', 0, 6),
(58, 'De sol a sol', '2012', 0, 6),
(59, 'Bora Viver', '2012', 0, 6),
(60, 'Flores do Meu Jardim', '2013', 0, 6),
(61, 'New Years Day', '1983', 0, 7),
(62, 'Sunday Bloody Sunday', '1983', 0, 7),
(63, 'Pride(In The Name of Love)', '1984', 0, 7),
(64, 'With or Without You', '1987', 0, 7),
(65, 'I Still Havent Found What Im Looking For', '1987', 0, 7),
(66, 'Where the Streeys Have No Name', '1987', 0, 7),
(67, 'Mysterious Ways', '1991', 0, 7),
(68, 'Beautiful Day', '2000', 0, 7),
(69, 'Walk on', '2000', 0, 7),
(70, 'Vetrtigo', '2004', 0, 7),
(71, 'Yesterday', '1964', 0, 8),
(72, 'Eleanor Rigby', '1966', 0, 8),
(73, 'A Day in the life', '1967', 0, 8),
(74, 'Strawberry Fields Forever', '1967', 0, 8),
(75, 'Hey Jude', '1968', 0, 8),
(76, 'While My Guitar Gently Weeps', '1968', 0, 8),
(77, 'Somethings', '1969', 0, 8),
(78, 'Here Comes the Sun', '1969', 0, 8),
(79, 'Let It Be', '1990', 0, 8),
(80, 'In My Life', '2010', 0, 8),
(81, 'Além dos Outdoors', '1987', 0, 9),
(82, 'Tribo e Tribunais', '1988', 0, 9),
(83, 'A violência travestida faz seu trotoir', '1990', 0, 9),
(84, 'Nunca é sempre', '1991', 0, 9),
(85, 'Pose', '1992', 0, 9),
(86, 'Realidade Virtual', '1993', 0, 9),
(87, 'O Olho do Furacão', '1999', 0, 9),
(88, 'Números', '2000', 0, 9),
(89, 'Arame Farpado', '2002', 0, 9),
(90, 'De Fé', '2004', 0, 9),
(91, 'Killer Queen', '1974', 0, 10),
(92, 'Bohemian Rhapsody', '1975', 0, 10),
(93, 'We are the champions', '1977', 0, 10),
(94, 'We will rock you', '1977', 0, 10),
(95, 'Dont Stop me Now', '1978', 0, 10),
(96, 'Another One Bites the Dus', '1980', 0, 10),
(97, 'I want To Break Free', '1984', 0, 10),
(98, 'Radio Ga Ga', '1984', 0, 10),
(99, 'The Show Must Go On', '1991', 0, 10),
(100, 'Somebody to Love', '2004', 0, 10),
(101, 'Sábado de Sol', '1995', 0, 11),
(102, 'Pelados em Santos', '1995', 0, 11),
(103, 'Robocop Gay', '1995', 0, 11),
(104, 'Vira-Vira', '1995', 0, 11),
(105, 'Chopis Centis', '1995', 0, 11),
(106, 'Débil Mental', '1995', 0, 11),
(107, 'Lá vem o Alemão', '1995', 0, 11),
(108, 'Mundo Animal', '1995', 0, 11),
(109, 'Jumento Celestino', '1995', 0, 11),
(110, 'Uma Arlinda Mulher', '1995',0, 11),
(111, 'Pro Dia Nascer Feliz', '1983', 0, 12),
(112, 'Bete Balanço', '1984', 0, 12),
(113, 'Maior Abandono', '1984', 0, 12),
(114, 'Codinome Beija-Flor', '1985', 0, 12),
(115, 'O Tempo Não Para', '1988', 0, 12),
(116, 'O Poeta está vivo', '1990', 0, 12),
(117, 'Os meus bons Amigos', '1994', 0, 12),
(118, 'Puro Êxtase', '1998', 0, 12),
(119, 'Pra toda Vida', '2004', 0, 12),
(120, 'A Chave da Porta da Frente', '2005', 0, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`cod_artista`),
  ADD KEY `cod_banda` (`cod_banda`);

--
-- Indexes for table `bandas`
--
ALTER TABLE `bandas`
  ADD PRIMARY KEY (`cod_banda`);

--
-- Indexes for table `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`cod_musica`),
  ADD KEY `cod_banda` (`cod_banda`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artistas`
--
ALTER TABLE `artistas`
  MODIFY `cod_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `bandas`
--
ALTER TABLE `bandas`
  MODIFY `cod_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `musicas`
--
ALTER TABLE `musicas`
  MODIFY `cod_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_ibfk_1` FOREIGN KEY (`cod_banda`) REFERENCES `bandas` (`cod_banda`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `musicas_ibfk_1` FOREIGN KEY (`cod_banda`) REFERENCES `bandas` (`cod_banda`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
