<?php
	// create_cookie.php

	// criando um cookie
	setcookie("nome", "Júlia");

	// recuperando um cookie
	echo ("Nome: " . $_COOKIE["nome"] );

	// criando um cookie que expira

	//echo (time() );
	// o terceiro parametro representa a validade, sendo um parametro do tipo timestamp
	// criando um cookie com validade de 30 dias
	setcookie("idade", 25, time() + 60 * 60 * 24 * 30);

	setcookie("time", "Grêmio", 0);	// 0 cria um cookie que expira ao fechar o navegador
?>