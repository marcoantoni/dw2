<?php
	// array.php

	// criando um array da forma 1
	$array = ["Mateus", 23, 71.8, "28/01/2004", "Desenvolvedor web"];

	// recuperando valores do array
	echo ($array[0] . " nasceu em " . $array[3]);

	// outra forma de criar um array é através da função array

	$array2 = array("Júlia", "Estudante TADS");

	// print_r é uma função usada para printar arrays na tela
	print_r($array2);

	// para adicionar valores a um array existem 3 formas

	echo ("<br>Exibindo o array1 <br>");
	print_r($array);

	// adicionando um valor da forma 1
	$array[] = 3850;	// sem especificar o indice, o valor é inserido no final do array

	// adicionando um valor da forma 2
	$array[8] = "Javascript, NODE.js, PHP, Laravel";	// adicionando as formações 

	// 3 forma de adicionar valores
	array_push($array, "Igrejinha");	// adicionando uma informação de endereço do funcionário

	echo ("<br>Exibindo o array1 após adicionar informações<br>");
	print_r($array);

	// tentando acessar um indice inexistente 
	echo ($array[6]);

	$alunos = ["Júlia", "Nicolas", "Leonardo", "Rayane", "Rayssa", "Gabriel", "Samuel", "Mauricio", "Lucas", "Matheus", "Leandro", "Alan", "Aureo", "Vinicius"];

	$qtd_alunos = count($alunos); 	// conta os elementos de um array

	echo ("<br>A turma tem $qtd_alunos alunos, sendo eles: <br>");

	// percorrendo o array com um for
	for ($i=0; $i < $qtd_alunos; $i++)
		echo ($alunos[$i] . ", ");	// colocando uma virgula (concatenando) para separar nomes

	// foreach é outro laço de repetição que é usado para iterar arrays 

	foreach($alunos as $aluno){
		echo ("$aluno <br>");
	}

	// criando um array associativo
	$funcionario = array(
		"nome" => "Leonardo",
		"nascimento" => "28/09/2004",
		"cargo" => "Desenvolvedor web",
		"salario" => 3428.76
	);

	// printando o array associativo
	print_r($funcionario);

	// recuperando o indice de um array associativo
	echo ($funcionario["nome"]);

	// procurando o nome "Rayssa" no array

	$posicao = array_search("Rayssa", $alunos);

	echo ("<br>O nome Rayssa está na posição $posicao");

	// ordenando o array de maneira crescente
	sort($alunos);

	echo ("<br>Exibindo o array em ordem crescente<br>");
	print_r($alunos);

	// ordenando o array de maneira descrescente
	rsort($alunos);

	echo ("<br>Exibindo o array em ordem decrescente<br>");
	print_r($alunos);

	$frutas = "Maçã, pera, uva, moranguinho, acerola";

	// explode cria um array a partir de uma string que delimita elemenos. As frutas estão separadas por ,
	$array_frutas = explode(",", $frutas);
	
	print_r($array_frutas);

?>