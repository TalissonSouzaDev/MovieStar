-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2023 às 14:38
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moviestar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `trailer` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image`, `trailer`, `category`, `length`, `user_id`) VALUES
(1, 'Sonic: O Filme', 'O Dr. Robotnik retorna à procura de uma esmeralda mística que tem o poder de destruir civilizações. Para detê-lo, Sonic se une a seu antigo parceiro, Tails, e parte em uma jornada para encontrar a joia antes que ela caia em mãos erradas.', 'a7f179fda191f2c42a7ca259156a787bfeda1fff9387089497756121687b38ff1c4c233bb6579fa3c3df4bac654e14c9b73993b320a6e8bbf25c51bc.jpg', 'https://www.youtube.com/embed/OsyVeiW3CZ8?si=Kq_E1uCf5I0-Jj4i', 'Ação', '2 h', 10),
(5, 'Star Wars', 'Jedi', '1a762ab60d714ff985c477f280a011e04a808bf7697811758a0ad3d8e3b6540f8eccc6cbace41e0496d49afb2664e46f6bceab6a1933e45d3a4ae54a.jpg', 'https://www.youtube.com/watch?v=sGbxmsDFVnE', 'Fantasia / Ficção', '2', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `movie_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `review`, `user_id`, `movie_id`) VALUES
(1, 4, 'Filme Ruim!', 6, 5),
(5, 7, 'bom!! otimo ooo', 10, 5),
(7, 5, 'otimo!!!', 10, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `image`, `token`, `bio`) VALUES
(6, 'talisson', 'souza', 'talissonmdsouza@gmail.com', '$2y$10$hXLxicQIo/.mRdenRcfJveQDN45veAcrvX1dXmvT.7vBzALtqr3xu', NULL, '4b3799ba9ae301fdb6793341bd2d5c1cd00d537394343069fff32e1d433b35f890014f48b900a5c695eda25d956ab9c915cb', NULL),
(7, 'teste', 'asdsad', 'teste@gmail.com', '$2y$10$BW7LowDVN13cjrV8KD6qjOwymd3nqg40v/4TpJSZD02/ApRFq5NVK', NULL, '8ae8953dd92927fcec909159dbd950c7db1113109ca813684bbbaf41f01359a58d8d6e3834c72e58468da8f09e459a220b7c', NULL),
(8, 'sere', 'werewrewr', 'testei@testeh.com', '$2y$10$E25K7sGs9SquRwmEkkx.Y.EZPNEVQl.cy0bAfxvBCLNVhoWufLNby', NULL, 'c8064b47ec0b534e7a9ca39deb4d3c0c30e5ef5a4d7b7d13aaec08bf92742ee660909e7189e8403dcb68432cb0e9753e63da', NULL),
(9, 'teste25', 'teste', 'teste25@teste.com', '$2y$10$eYDo.xjP1C/lbl5dK3PiAuPfVCXOInAnA7WKWHm3VbCeWclpRlSHG', NULL, '9e7c815589465f4ddccf73dd6e5b275365ada0502b2fd3660cfe886184de794df5eed0bd8b9b9a2973d751122e9493daf395', NULL),
(10, 'Talisson', 'souza', 'teste25@gmail.com', '$2y$10$Hqsins3QUjPIVPlE3YtXPuijJcpo4JJfq97oWlFYi1pRm1Un0RWZa', '94a820bd9beb270859c6016a347c784cded0247b218302faa11167062d8dd1fef8066c87828830dd45847249bdbd5a2bc1f41c789333d4f3b2e24bb5.jpg', 'cccf7ba651c516ec1f4191875bec311744a28b4548b7ac8159942ba520f1e4373ab021edba8f878baef81fe2bd9bda871187', 'Ola, sou talisson desenvolvedor.'),
(11, 'teste2659', 'teste', 'teste265@gmail.com', '$2y$10$NGfpyG.aWG5bNK8bBD7u3.LCiuDgXBEbMpj7IlrVdfp1RIUjwZfdW', NULL, 'ad6a0f6692dbead3a5a49aa9bc712dc5ba22dd3c55c8c473344f0745412b57cdf770e493786e22673784f33aad2ae182bffd', ''),
(12, 'José', 'Santos', 'joseraimundoalves@hotmail.com', '$2y$10$Ulkeo8rqpX.JoXR.KEQE4e47t9IyA6i10R7Gt8Odr9cZabiSx.PI.', NULL, 'fc406931671e5d0211d5ea7d96dbfeafa06941a1f77553c0b50f39df12472f207443e347901d33cc5d28a97e81c81029092b', 'asdasd');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`);

--
-- Índices para tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`),
  ADD KEY `movies_id` (`movie_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
