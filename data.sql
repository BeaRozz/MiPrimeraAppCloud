-- mi_primera_db.tablita definition

CREATE TABLE `tablita` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO mi_primera_db.tablita
(id, name)
VALUES(1, 'Victor');
INSERT INTO mi_primera_db.tablita
(id, name)
VALUES(2, 'Waffle');