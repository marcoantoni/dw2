<?php
	// retrieve_session.php

	// por mais a sessão foi inicida, em cada arquivo que se deseja salvar/recuperar valores da sessão, é necessário iniciar a sessão novamente
	session_start();

	// recuperando o valor criado em create_session.php

	echo ("Nome: " . $_SESSION["nome"] . "<br>");
	echo ("Idade: " . $_SESSION["idade"] . "<br>");
	echo ("Time do coração: " . $_SESSION["time"] . "<br>");

	// excluindo UMA variavel de sessão

	unset($_SESSION["nome"]);
	
	echo ("Nome: " . $_SESSION["nome"] . "<br>");
?>