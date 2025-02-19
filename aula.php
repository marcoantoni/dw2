<?php
	// aula1.php

	$nome = "Marco";	// declaração de string
	$idade = 25;	// variavel tipo int

	$peso = 71.8;	// variavel do tipo float

	$temCNH = false;	// variavel do tipo boleano

	// exempo operadores aritméticos
	$num1 = 10;
	$num2 = 3;

	$soma = $num1 + $num2;
	$subtracao = $num1 - $num2;
	$multiplicacao = $num1 * $num2;
	$divisao = $num1 / $num2;
	$resto = $num1 % $num2;

	echo("Soma é $soma <br>");
	echo("Subtração é $subtracao <br>");
	echo("Multiplicação é $multiplicacao <br>");
	echo("Divisão é $divisao <br>");
	echo("Resto da $resto <br>");


	// imprimindo os dados

	echo ("Nome: <b>" . $nome . "</b><br>");	// concatenando strings
	echo ("Idade: <b>$idade</b><br>");
	echo ("Peso: <b>$peso</b> <br>");

	// estrutura de decisão if - teste de igualdade
	if ($temCNH == true){
		echo ("Possuí carteira de habilitação<br>");
	} else {
		echo ("Não possuí carteira de habilitação<br>");
	}
	// estrutura de decisão: condição de maior ou igual

	if ($idade >= 18) {
		echo ("É maior de idade<br>");
	} else {
		echo ("É menor de idade<br>");
	}

	// exemplo de if com duas condições (E) 

	$usuario = "admin";
	$senha = "1234";

	if ($usuario == "admin" && $senha == "1234"){
		echo ("Login realizado com sucesso");
	} else {
		echo ("Usuário ou senha incorretos");
	}

	// exemplo de if aninhado
	// escrevendo um numero por extenso
	$num = 3;

	if ($num == 0)
		echo ("ZERO");
	else if ($num == 1)
		echo ("UM");
	else if ($num == 2)
		echo ("DOIS");
	else if ($num == 3)
		echo ("TRÊS");
	else if ($num == 4)
		echo ("QUATRO");
	else if ($num == 5)
		echo ("CINCO");
	else 
		echo ("Só consigo testar numeros entre 0 e 5");
?>