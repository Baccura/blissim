CREATE TABLE `blissim`.`users` (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# mot de passe 'blissim'
INSERT INTO `blissim`.`users` (`id`, `email`, `pseudo`, `password`)
VALUES 
(1, 'blissim@test.com', 'blissim', '$2y$10$b92/9vxnJd5CGO2M3PyHP.wg5x7L5NxUXLkzAAl4tyafaVdoyO8qu'),
(2, 'test@blissim.com', 'test', '$2y$10$b92/9vxnJd5CGO2M3PyHP.wg5x7L5NxUXLkzAAl4tyafaVdoyO8qu');

CREATE TABLE `blissim`.`products` (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price FLOAT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `blissim`.`products` (`id`, `name`, `description`, `price`)
VALUES
(1, 'Spray fondant visage et corps haute protection SPF50 Nuxe Sun', 'Une haute protection divinement clean ! Ce Spray Solaire SPF50 protège visage et corps des rayons du soleil tout en contribuant au respect du milieu marin. Son complexe filtrant breveté** offre une protection large spectre UVA/UVB et prévient le photo-vieillissement cutané prématuré. Sa texture ultra-légère hydrate et pénètre immédiatement pour sublimer le bronzage. La peau est douce, sans fini gras ni collant, comme si elle était nue. Son parfum d’évasion aux notes d’Orange douce, de Fleur de Tiaré et de Vanille est une irrésistible invitation à profiter de l’été.', 28.40),
(2, 'Lait solaire SPF 50+', 'Le Lait solaire SPF 50+ offre à votre visage et votre corps une protection maximale contre les effets néfastes du soleil et le vieillissement cutané. Riche en huile d’abricot BIO, il nourrit et illumine votre peau pour un bronzage parfait et lumineux. Sa texture est fluide, son fini transparent et non collant.', 24.50),
(3, 'Poudre de Soleil effet bonne mine Bronzing Compact', 'Dans mon maquillage, tout le soin Clarins. Tous les bénéfices des plantes. Cette poudre de soleil réchauffe, ensoleille le teint et lisse le grain de peau. Une texture légère, douce et fine qui laisse respirer la peau. Idéale pour un effet bonne mine et un teint naturellement unifié et rayonnant.', 49.00),
(4, 'Déodorant solide en stick Pêche blanche', 'Ce déodorant, au format stick (contrairement au premier déodorant Respire qui est au format roll-on), est le fruit de 18 mois de recherche et développement au sein d’un laboratoire français, pour mettre au point le déodorant le plus abouti du marché : une efficacité 48h approuvée par un laboratoire indépendant, une formule totalement clean avec 100% des ingrédients d’origine naturelle et certifiée BIO + Vegan, un packaging zéro plastique en carton recyclable et une production française.', 11.90),
(5, 'Shampoing réparateur REPAIR-ME.WASH', 'Ce shampooing réparateur va devenir le meilleur allié des cheveux normaux à épais. Sa formule à base de protéines de bambou, d’acides aminés de soie et de papaye a été spécialement élaborée pour fortifier la chevelure et éliminer les impuretés tout en lui donnant de la brillance. Le résultat ? Une chevelure disciplinée, lissée et hydratée et un cuir chevelu en pleine santé !', 35.50);

CREATE TABLE `blissim`.`comments` (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    products_id INTEGER NOT NULL,
    users_id INTEGER NOT NULL,
    FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `blissim`.`comments` (`content`, `created_at`, `products_id`, `users_id`)
VALUES
('commentaire 1 - produit 1', NOW(), 1, 1),
('commentaire 2 - produit 1', NOW(), 1, 1),
('commentaire 3 - produit 1', NOW(), 1, 2),
('commentaire 4 - produit 1', NOW(), 1, 2),
('commentaire 5 - produit 1', NOW(), 1, 1),
('commentaire 1 - produit 2', NOW(), 2, 1),
('commentaire 2 - produit 2', NOW(), 2, 1),
('commentaire 3 - produit 2', NOW(), 2, 2),
('commentaire 4 - produit 2', NOW(), 2, 2),
('commentaire 5 - produit 2', NOW(), 2, 1),
('commentaire 1 - produit 3', NOW(), 3, 1),
('commentaire 2 - produit 3', NOW(), 3, 1),
('commentaire 3 - produit 3', NOW(), 3, 2),
('commentaire 4 - produit 3', NOW(), 3, 2),
('commentaire 5 - produit 3', NOW(), 3, 1),
('commentaire 1 - produit 4', NOW(), 4, 1),
('commentaire 2 - produit 4', NOW(), 4, 1),
('commentaire 3 - produit 4', NOW(), 4, 2),
('commentaire 4 - produit 4', NOW(), 4, 2),
('commentaire 5 - produit 4', NOW(), 4, 1),
('commentaire 1 - produit 5', NOW(), 5, 1),
('commentaire 2 - produit 5', NOW(), 5, 1),
('commentaire 3 - produit 5', NOW(), 5, 2),
('commentaire 4 - produit 5', NOW(), 5, 2),
('commentaire 5 - produit 5', NOW(), 5, 1);