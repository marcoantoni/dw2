<?php
	// create_session.php

	// para usar a sessão, é necessário incialiá-la explicitamente
	session_start();

	// criando uma variavel de sessão chamada nome
	$_SESSION["nome"] = "Alan";
	$_SESSION["idade"] = 21;
	$_SESSION["time"] = "Internacional";


	// recuperando a variavel de sessão criada acima
	echo ("Nome: " . $_SESSION["nome"] );
?>