<?php
	// proc_cad.php

	// testa se não existe a variavel $_POST["cadastrar"]
	// para ela não existir, significa que o usuário acessou diretamente o arquivo proc_cad.php sem ter acessado o formulário de cadastro
	if (! isset($_POST["cadastrar"]) ){
		header("location: cadastro.html");	// redirecionada para a página de cadastro
	} 

	// armazena as informações vindas do formulário em variaveis
	$nome = $_POST["nome"];
	$nascimento = $_POST["nasc"];
	$email = $_POST["email"];
	$tipo = $_POST["tipo"];
	$senha = $_POST["senha"];
	$senha2 = $_POST["senha2"];

	// array para controle dos erros. Em cada cada validação, se houver um erro, a mensagem será armazenada neste array 
	$erros = [];	

	// isset testa se a variavel existe (retorna true se ela existir)
	/*if (isset($nome) ){
		echo ("Variavel nome existe");
	} else {
		echo ("Variavel nome não existe");
	}*

	// empty testa se a variavel está vazia (retorna true se for fazia)
	// uma variavel vazia existe, portanto, as funções empty e isset não tem a mesma finalidade

	/*
	if (empty($nome) ){
		echo ("Nome está vazio");
	} else {
		echo ("Nome está preenchido (não vazio)");
	}
	*/

	// validando cada variavel para saber se ela foi preenchida corretamente
	if (empty($nome) ){
		$erros[] = "Preencha o <b>nome</b>";	// adicionando a mensagem de erro ao array
	}

	if (empty($nascimento) ){
		$erros[] = "Preencha a <b>data de nascimento</b>";
	}

	if (empty($email) ){
		$erros = ["Preencha o <b>email</b>"];
	}

	if (empty($tipo) ){
		$erros [] = "Preencha o <b>tipo de conta</b>";
	}

	// testa se uma senha não foi preenchida
	if (empty($senha) || empty($senha2) ){
		$erros[] = "Preencha a <b>senha<b> corretamente";
		//se as duas senhas forem preenchidas, testa se são diferentes
	} else if ($senha != $senha2) {
		$erros[] = "As senhas não são iguais";
	}


	// se o array estiver zerado é por que não teve nenhum erro no preenchimento
	if (count($erros) == 0){
		echo ("Nome: <b>$nome</b><br>");
		echo ("Data de nascimento: <b>$nascimento</b><br>");
		echo ("Email: <b>$email</b><br>");
		echo ("Tipo da conta: <b>$tipo</b><br>");
		echo ("Senha: <b>$senha</b><br>");
	} else {
		// percorrendo o array para mostrar os erros de preenchimento noi formulário
		for ($i=0; $i < count($erros); $i++){
			echo ($erros[$i] . "<br>");	// exibindo cada erro armazenado no array
		}
	}
?>