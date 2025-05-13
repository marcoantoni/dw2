<?php
	// incluindo_arquivos.php

	require("exemplo_include.php");	// require inclui um arquivo e se não encontrar, gera um error, impedindo que o código siga executando

	echo ("Mostrando algo depois de fazer a inclusão");

	$numero++;

	echo ("Número = $numero ");

	echo("Usando o include para inserior o arquivo exemplo_include.php");

	// ao usar o include, o arquivo é incluído e é possível ver que ao incluir novamente um arquivo, as variaveis são resetadas. No exemplo, $numero volta a ser 10. Ao usar o _once, tanto no include como no require o arquivo não é incluído novamente
	include_once("exemplo_include.php");
	
	echo ("Número = $numero ");
?>