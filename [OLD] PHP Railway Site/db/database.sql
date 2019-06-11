SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS Courses;
DROP TABLE IF EXISTS Routes;
DROP TABLE IF EXISTS News;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXIST Contact;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Routes`
--

CREATE TABLE IF NOT EXISTS `Routes` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Route_Name` varchar(50) NOT NULL,
  `City_From` varchar(50) NOT NULL,
  `City_To` varchar(50) NOT NULL,
  `Stops` varchar(100) NOT NULL,
  `Time_Needed` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Route_ID` int(10) NOT NULL,
  `StartTime` float(10) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`Route_ID`) REFERENCES Routes(`Id`)
)  ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Date` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Header` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);



-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `User_ID` int(10) NOT NULL,
  `News_ID` int(10) NOT NULL,
  `date` date NOT NULL,
  `Content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`User_ID`) REFERENCES Users(`Id`),
  FOREIGN KEY (`News_ID`) REFERENCES News(`Id`)
);
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Contact`
--

CREATE TABLE IF NOT EXISTS `Contact` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Firm` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`)
) ;



-- 
--   Inserty
--
INSERT INTO `Users` (`id`, `UserName`, `Name`, `email`, `password`) VALUES
(1, 'Administrator', 'Szczepan Lis', 'Administrator@koleje.pl', 'Administrator'),
(2, 'MichalM', 'Michal Michalczyk', 'Michal@o2.pl', 'MMichalczyk'),
(3, 'AndrzejA', 'Andrzej Andrzejczyk', 'Andrzej@o2.pl', 'AAndrzejczyk;');

INSERT INTO `News` (`Id`, `Date`, `Header`, `Content`, `title`) VALUES
(1, '01.01.2017', 'Wprowadzamy nowa linie ktora bedzie kursowac pomiedzy Katowicami a Gdanskiem.', 'Informujemy, ze od dnia 18.03.2017r. zostanie wprowadzona nowa trasa miedzy Katowicami a Gdanskiem. Bedzie ona kursowac w soboty o godzinie 9.00. Przystanki posrednie to Lodz, Warszawa i Torun.', 'Nowy kurs!'),
(2, '01.01.2017', 'Wiecej miejsc w pociagach, wzmocniona informacja pasazerska, dodatkowe patrole SOK na dworcach i w pociagach.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus', 'Podroze w swieta!'),
(3, '01.01.2017', 'Z okazji Nowego Roku zyczymy wszystkich wszystkiego najlepszego!', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus', 'Nowy Rok'),
(4, '01.01.2017', 'Otworzylismy nowy przystanek w Poznaniu.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus', 'Nowy przystanek'),
(5, '01.01.2017', '31 Swiatowe dni mlodziezy byly najwieksza impreza masowa w historii naszego kraju.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus', 'Swiatowe dni kolei');

INSERT INTO `Comments` (`Id`, `User_ID`, `News_ID`, `date`, `Content`) VALUES
(1, 1, 1, '2017-03-11', 'Super Sprawa'),
(2, 1, 1, '2017-03-11', 'Bardzo Dobrze');

INSERT INTO `Routes` (`Id`, `Route_Name`, `City_From`, `City_To`, `Stops`, `Time_Needed`) VALUES
(1, 'Krakow-Warszawa', 'Krakow', 'Warszawa', 'Kielce', 3),
(2, 'Kraków-Gdansk', 'Krakow', 'Gdansk', 'Kielce, Warszawa, Torun', 8),
(3, 'Rzeszow-Szczecin', 'Rzeszow', 'Szczecin', 'Krakow, Kielce, Warszawa, Lodz, Poznan', 6),
(4, 'Zakopane-Szczecin', 'Zakopane', 'Szczecin', 'Krakow, Wroclaw, Poznan', 7),
(5, 'Zakopane-Gdansk', 'Zakopane', 'Gdansk', 'Kielce, Lodz, Warszawa, Torun', 12),
(6, 'Wroclaw-Gdansk', 'Wroclaw', 'Gdansk', 'Katowice, Lodz, Warszawa, Torun', 10),
(7, 'Wroclaw-Rzeszow', 'Wroclaw', 'Rzeszow', 'Katowice, Krakow', 8);


INSERT INTO `Courses` (`Id`, `Route_ID`, `StartTime`, `Date`) VALUES
(1, 1, 16.00, '2017-03-11'),
(2, 2, 10.00, '2017-03-11'),
(3, 2, 20.00, '2017-03-11'),
(4, 3, 12.00, '2017-03-11'),
(5, 7, 11.00, '2017-03-11'),
(6, 6, 4.00, '2017-03-11'),
(7, 4, 7.00, '2017-03-11'),
(8, 5, 17.00, '2017-03-11'),
(9, 1, 20.00, '2017-03-11');
