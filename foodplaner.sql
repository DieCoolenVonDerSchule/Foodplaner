-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Nov 2020 um 11:40
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `foodplaner`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `calender_entry`
--

CREATE TABLE `calender_entry` (
  `calender_entry_id` int(11) NOT NULL,
  `calender_entry_date` date NOT NULL,
  `group_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `calender_entry`
--

INSERT INTO `calender_entry` (`calender_entry_id`, `calender_entry_date`, `group_id`, `recipe_id`) VALUES
(1, '2020-11-24', 1, 1),
(2, '2020-11-27', 1, 7),
(3, '2020-11-28', 1, 8),
(4, '2020-11-30', 1, 2),
(5, '2020-12-24', 1, 5),
(16, '0000-00-00', 1, 5),
(17, '2020-11-27', 1, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_private` tinyint(1) NOT NULL,
  `group_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_private`, `group_password`) VALUES
(1, 'Die coolen', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredients_id` int(11) NOT NULL,
  `ingredients_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients_recipes`
--

CREATE TABLE `ingredients_recipes` (
  `ingredients_recipes_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'Gramm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `recipe_image` text NOT NULL,
  `recipe_description` varchar(16000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `recipe_image`, `recipe_description`) VALUES
(1, 'Curry Reis Pfanne', 'https://img.chefkoch-cdn.de/rezepte/1216401227258521/bilder/809824/crop-600x400/reispfanne.jpg', 'Den Reis kochen, Zwiebel in Würfel schneiden, zum Hackfleisch geben. Brötchen, Salz, Pfeffer und eine gehackte Knoblauchzehe dazu. Aus der Masse kleine Kugeln (etwa 2cm) formen und in Butter braten. Lauchzwiebeln in Ringe schneiden, restlichen Knoblauch hacken, Pilze wenn nötig klein schneiden, alles zu den Hackbällchen geben und mitbraten. Etwas Brühe angießen (1/8 l). Pfirsiche in Würfel schneiden. Den Reis zu den Hackbällchen geben, mit Curry, Salz und Pfeffer würzen. Pfirsiche dazu, etwas Pfirsichsaft angießen, alles aufkochen, fertig!'),
(2, 'Hähnchen-Curry-Lauch-Suppe', 'https://img.chefkoch-cdn.de/rezepte/2997561452604004/bilder/1344001/crop-600x400/haehnchen-curry-lauch-suppe.jpg', 'Den Porree putzen, das Wurzelende sowie 2/3 vom Grün wegschneiden. Den Rest in ca. 5 mm breite Ringe schneiden, gut abspülen und in leicht gesalzenem Wasser garen.\r\n\r\nIn der Zwischenzeit die Hähnchenbrustfilets waschen, in ca. 2 cm große Stücke schneiden und in etwas Öl portionsweise in einer hohen Pfanne anbraten und beiseitestellen.\r\n\r\nDie Paprika waschen, entkernen und in ca. 1 cm große Stücke schneiden. Die Zwiebeln schälen und zusammen mit der Paprika in etwas Öl anschwitzen. Nach ca. 5 Min. die geputzten und in Scheiben geschnittenen Champignons zugeben und weitere 5 Min. anschwitzen, danach beiseitestellen.\r\n\r\nDie angebratenen Hähnchenstücke mit der Margarine oder Butter wieder in die Pfanne geben und kurz erhitzen. Das Mehl und das Currypulver zugeben, kurz anschwitzen und dann mit der Brühe ablöschen. Den Streichkäse zugeben und bei mittlerer Hitze unter Rühren schmelzen lassen, die Sahne einrühren. Die vorbereitete Paprika-Zwiebel-Pilz-Mischung sowie den gegarten Lauch zugeben und mit der Teriyakisauce, der Currypaste und etwas Pfeffer abschmecken. Bei geschlossenem Deckel noch ca. 5 Min. bei kleiner Hitze durchziehen lassen, gelegentlich umrühren. Zum Schluss die Petersilie unterrühren und die Suppe heiß servieren.'),
(5, 'Einfacher Zwiebelkuchen', 'https://img.chefkoch-cdn.de/rezepte/1716851280413039/bilder/668287/crop-600x400/einfacher-zwiebelkuchen.jpg', 'Mehl, Hefe, Zucker und Salz in eine Schüssel geben. In die Mitte eine Mulde drücken und das kalte Wasser hineingeben. Die weiche Butter zufügen und alles zu einem Teig kneten. Den Teig ca. 30 Minuten ruhen lassen.\r\n\r\nSpäter auf einer mit Mehl bestäubten Arbeitsfläche in Backblechgröße ausrollen. Auf das Backblech legen und die Ränder nach oben andrücken.\r\n\r\nFür die Füllung Ei und Sahne mit einem Pürierstab verquirlen und mit Salz, Muskat und Pfeffer würzen.\r\n\r\nZwiebel pellen, halbieren und in Streifen schneiden. Speck klein schneiden. Beides in einer Pfanne mit der Butter und dem Öl Farbe nehmen lassen. Den Topf vom Herd nehmen, die Eiermasse zufügen und unterrühren. Abschmecken und gegebenenfalls noch einmal nachwürzen.\r\n\r\nDie Füllung auf den Teig geben, Käse darüber streuen und im vorgeheizten Backofen bei 200 °C ca. 30 min backen.\r\n\r\nDazu schmeckt ein Federweißer oder ein gut gekühlter Weißwein.'),
(6, 'Schweinefilet auf Süßkartoffelpüree mit Lebkuchenjus und Rosenkohl', 'https://img.chefkoch-cdn.de/rezepte/1417941246631682/bilder/1349825/crop-600x400/schweinefilet-auf-suesskartoffelpueree-mit-lebkuchenjus-und-rosenkohl.jpg', 'Kartoffeln waschen, schälen und klein schneiden. Anschließend in Salzwasser durchgaren und danach ausdampfen lassen. Den Topf wieder auf den Herd stellen, erhitzte Sahne und Milch dazu geben, mit Salz, Pfeffer und Muskat würzen. Nun die Masse mit einem Schneebesen glatt rühren, bis eine cremige Konsistenz entsteht. Noch einmal abschmecken.\r\n\r\nDie Schweinemedaillons in einer Pfanne mit Rapsöl anbraten und anschließend im vorgeheizten Ofen bei 160 °C Umluft garen (ca. 12 min). Mit Salz und Pfeffer würzen.\r\n\r\nDie Bratpfanne mit Rotwein ablöschen und Honig zufügen. Ist der Rotwein fast verkocht, mit dem Bratenfond auffüllen und den Lebkuchen mit hineingeben. Gegebenenfalls etwas einkochen. Abschmecken.\r\n\r\nDen Rosenkohl blanchieren. Butter in einem Topf erhitzen und den Rosenkohl darin angehen lassen. Mit Salz und Muskat würzen. Semmelbrösel zufügen und weiter braten, bis diese etwas Farbe genommen haben.\r\n\r\nAnrichten:\r\nDas Püree auf einen flachen Teller geben, die Medaillons darauf seitlich anlegen ebenso wie den Rosenkohl. Nun das Fleisch mit der Bratensauce nappieren. Guten Appetit!\r\n'),
(7, 'Kalter Hund', 'https://img.chefkoch-cdn.de/rezepte/1139681220190047/bilder/939045/crop-600x400/kalter-hund.jpg', 'Eine Kastenform mit einem aufgeschnittenen Gefrierbeutel auslegen. Für die Schokoladencreme beide Kuvertüren grob hacken, das Kokosfett klein schneiden, alles zusammen mit der Sahne in einem Topf schmelzen und gut verrühren. Zuletzt Vanillinzucker unterrühren.\r\n\r\nDie Kastenform mit einer Schicht Butterkeksen auslegen, die Kekse eventuell zerbrechen. Nun so viel Schokoladencreme auf der Keksschicht verteilen, dass diese bedeckt ist. Abwechselnd Schokoladencreme und Kekse in die Kastenform schichten (7 - 8 Schichten).\r\n\r\nDie Kastenform etwa 5 Stunden in den Kühlschrank stellen (am besten über Nacht), damit die Creme fest wird. Das Gebäck mit einem Messer und mithilfe des Gefrierbeutels aus der Form lösen und vorsichtig auf eine Platte stürzen. Den Gefrierbeutel vorsichtig abziehen und das Gebäck am besten gekühlt und in Scheiben geschnitten servieren.\r\n\r\nTipp: Rühren Sie unter die Schokoladencreme 1 Päckchen geriebene Orangenschale. Wer mag, kann auch den Kekskuchen mit etwas Alkohol verfeinern.'),
(8, 'Knusprige Bratkartoffeln nach Muttis Rezept', 'https://img.chefkoch-cdn.de/rezepte/1338991238751459/bilder/1212396/crop-600x400/knusprige-bratkartoffeln-nach-muttis-rezept.jpg', 'Die Kartoffeln schälen, in gleich große Stücke schneiden und kurz in kaltes Wasser legen, damit die Stärke austreten kann. Das ist wichtig, denn nur so werden die Bratkartoffeln nicht matschig, sondern schön knusprig.\r\n\r\nÖl in eine Pfanne geben und auf der höchsten Stufe erhitzen, die Kartoffel durch ein Sieb abgießen und in die heiße Pfanne geben, sofort die Pfanne mit einem Deckel verschließen. Nach etwa fünf Minuten die Kartoffeln das erste Mal wenden und dann immer wieder zwischendurch wenden, ggf. die Hitze reduzieren, jedoch nach jedem Wenden den Deckel wieder auf die Pfanne setzen, damit die Kartoffeln vom Dampf gegart werden können. Etwa 35 Minuten braten.\r\n10 Minuten vor Ende der Garzeit eine gewürfelte Zwiebel auf die Kartoffeln geben, ohne sie mit den Kartoffeln zu vermischen. Die Zwiebeln etwa 5 Minuten in der geschlossenen Pfannen dünsten und dann erst mit den Kartoffeln vermischen. Noch etwa fünf Minuten offen braten.\r\n\r\nDie fertigen Bratkartoffeln nach Geschmack salzen und pfeffern.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_forename` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_forename`, `user_surname`, `user_email`) VALUES
(1, 'Marc Kevin', 'Zenzen', 'marckevinzenzen@gmx.de'),
(2, 'Stefan ', 'Steinhauer', 'stefansteinhauer@gmx.de'),
(3, 'Luca', 'Stamos', 'lucastamos@gmx.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `calender_entry`
--
ALTER TABLE `calender_entry`
  ADD PRIMARY KEY (`calender_entry_id`),
  ADD KEY `fk2_group_id` (`group_id`),
  ADD KEY `fk2_recipe_id` (`recipe_id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indizes für die Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredients_id`);

--
-- Indizes für die Tabelle `ingredients_recipes`
--
ALTER TABLE `ingredients_recipes`
  ADD PRIMARY KEY (`ingredients_recipes_id`),
  ADD KEY `fk_ingredient_id` (`ingredient_id`),
  ADD KEY `fk_recipe_id` (`recipe_id`);

--
-- Indizes für die Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `fk_group_id` (`group_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `calender_entry`
--
ALTER TABLE `calender_entry`
  MODIFY `calender_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ingredients_recipes`
--
ALTER TABLE `ingredients_recipes`
  MODIFY `ingredients_recipes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `calender_entry`
--
ALTER TABLE `calender_entry`
  ADD CONSTRAINT `fk2_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `fk2_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`);

--
-- Constraints der Tabelle `ingredients_recipes`
--
ALTER TABLE `ingredients_recipes`
  ADD CONSTRAINT `fk_ingredient_id` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`ingredients_id`),
  ADD CONSTRAINT `fk_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`);

--
-- Constraints der Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
