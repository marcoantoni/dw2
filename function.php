<?php
	// function.php

	// exemplo de função sem retorno
	function saudacao($nome) {
		echo ("Olá <b>$nome</b>, seja bem vindo a aula <br>");
	}

	// chamada a uma função sem retorno
	saudacao("Nicolas");
	saudacao("Leandro");
	saudacao("Alan");

	// criando uma função com retorno
	function calcularIMC($peso, $altura){
		// código sem validação, pois presume-se que o $peso e a $altura já foram validados
		$imc = $peso / ($altura * $altura);

		return $imc; 
	}

	$imc_carlos = calcularIMC(68, 1.77);

	echo ("O IMC de Carlos é $imc_carlos <br>");

	echo ("O IMC de Marcelo é " . calcularIMC(65, 1.74) );

	echo ("$imc"); // o que vai acontecer? vai dar warning pois a variavel $imc só existe dentro da function calcularIMC

	// exemplo de variavel global

	$a = 5;
	$b = 5;

	echo ("a = $a b = $b");

	function somar(){
		global $a, $b;	// isso permite importar as variaveis para dentro da função. Dessa forma, ao alterar o valor de $b aqui dentro, as modificações são refletidas fora da função

		$b = $a + $b;
	}

	somar();

	echo ("b = $b");	// agora b vale 10

	// outra forma de criar variaveis globais é usando o array $GLOBALS

	$GLOBALS["nome"] = "Micaela";

	function mostrarNome(){
		// ambas as construções irão mostrar a mesma coisa
		echo ("Olá $GLOBALS[nome] ");	// ao acessar um array associativo dentro do echo, as aspas DEVEM ser omitidas
		echo ("Olá " . $GLOBALS["nome"]);
	}

	mostrarNome();
?>