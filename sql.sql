CREATE TABLE `challenges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expect` varchar(255) DEFAULT NULL,
  `level` int NOT NULL,
  `timeout` int default(5),
  `points` int default(5),
  `help` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

insert into challenges ('expect', 'level', 'help', 'points') values ('12Fizz4BuzzFizz78FizzBuzz', 1, 'Escreva uma função, que irá receber 1 parâmetros, do tipo integer.
Comece do 1 ao número recebido.
Para cada múltiplo de 3, irá imprimir "Fizz", invés do número.
Para cada múltiplo de 5, irá imprimir "Buzz", invés do número.
Para cada múltiplo de 3 e também de 5, irá imprimir "FizzBuzz", invés do número.
Para qual não for múltiplo de 3, nem de 5, imprima somente o número.', 10)