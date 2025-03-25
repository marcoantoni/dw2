<?php
	// delete_cookie.php

	// apagando os 3 cookies criados
	// necessário recriar o cookie, definindo um timestamp negativo (passado)

	setcookie("nome", "", time() - 60); 
	setcookie("idade", 0, time() - 60);
	setcookie("time", "", time() - 60);
?>