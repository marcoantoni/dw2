<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Exemplo de estrutura de decisão switch</h1>
	<?php

		$num = 7;

		switch($num) {
			case 0:
				echo ("Zero");
				break;
			case 1:
				echo ("Um");
				break;
			case 2: 
				echo ("Dois");
				break;
			case 3: 
				echo ("Três");
				break;
			case 4: 
				echo ("Quatro");
				break;
			case 5: 
				echo ("Cinco");
				break;
			default:
				echo ("Só consigo testar numeros entre 0 e 5");
		}

		// exemplo laço de repetição for
		// formado por três condições:
		// 1º inicialização da variavel
		// 2º condição de saída 
		// 3º condição de incremento
		for ($i=0; $i < 10; $i++){
			echo ("Executando o laço for pela $i vez <br>");
		}

		// exemplo laço while
		// o laço while possui pré validação, ou seja, ao iniciá-lo, o valor da variavel será avaliado, podendo ser ser executado ou não

		$tempo = 30;	// a ideia é uma contagem regressiva de 30 seg

		while ($tempo > 0){

			echo ("A promoção acaba em $tempo segundos <br>");
			sleep(1);	// um segundo de delay na execução do laço

			$tempo--;	// reduzindo o tempo (condição de saída)
		}

		// o laço do while possui pós validação, ou seja, ele será executado ao menos uma vez, sendo que a condição de saída é avaliada no final

		$saldo = 500;

		$saque = 15; 

		do {
			if ($saque < 20) {
				echo ("O valor mínimo de saque é 20 reais <br>");
				$saque = $saque + 10;	// simulando nova entrada do usuário
			}
		} while ($saque < 20);	// condição de saída

		// IMPORTANTE: ao usar os laços while e do while, é importante definir a condição de saída para não ter loops infinitos

		echo ("Saque de $saque realizado com sucesso! <br>");
	?>
</body>
</html>