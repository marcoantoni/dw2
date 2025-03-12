<?php
	// arquivo data.php

	$dia = date("d");	// recupera o dia do mes com 2 digitos
	$mes = date("m");	// recupera o mes com 2 digitos
	$ano = date("Y");	// recupera o ano com 4 digitos

	echo ("Hoje é $dia/$mes/$ano<br>");
	
	echo (date("j/n/y"));

	$hora = date("H");	// retorna a hora com 2 digitos
	$min = date("i");	// retorna os minutos com 2 digitos
	$seg = date("s");	// retorna os segundos com 2 digitos

	echo ("Agora é " . date("H:i:s") );	// exibindo a hora atual com a função date como 2 argumento do echo

	// 

	echo ("<br>Timestamp atual: " . time() );
?>