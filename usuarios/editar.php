<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
            $id_usuario = isset($_GET["id"]) ? (int) $_GET["id"] : 0; // pegando o parametro de usuário que vem da url e faz a conversão para int

            // abrindo uma conexão de banco de dados usando o mysqli
            $conn = new mysqli("localhost", "root", "", "dw2");

            // testa se conectou com o banco de dados
            if ($conn->connect_error) {
                die ("Houve um erro ao conectar com o banco de dados");
            }            

            // string da consulta responsável por recuperar o registro a ser editado
            // o ? será o parametro que será inserido na consulta
            $sql = "SELECT * FROM usuarios WHERE id = ?";

            // definindo e preparando a consulta parametrizada
            $stmt = $conn->prepare($sql);    

            // definindo os paramatros da consulta (cada ?) 
            // i - int
            // f - float
            // s - string
            $stmt->bind_param("i", $id_usuario); 

            $stmt->execute();    // executando a consulta

            $resultado = $stmt->get_result();   // armazenando o resultado da consulta no result set

            //testando quantas linhas o result set retornou
            if ($resultado->num_rows == 1) {
                // encontrou o registro 
                $usuario = $resultado->fetch_assoc();

                $nome = $usuario["nome"];
                $nasc = $usuario["nascimento"];
                $email = $usuario["email"];
                $tipo = $usuario["tipo"];
            } else {
                // não encontrou nenhum registro
                header("location: mostrar.php");
            }
            
            $stmt->close(); // encerra a consulta
            $conn->close(); // fecha a conexão com o banco de dados
        ?>
        <h2>Editando usuário</h2>
        <form method="POST" action="proc_cad.php">
            <input type="text" name="nome" placeholder="Nome Completo" value="<?= $nome ?>" required>
            <input type="date" name="nasc" placeholder="Nascimento" value="<?= $nasc ?>">
            <input type="email" name="email" placeholder="E-mail" value="<?= $email ?>" >
            <div class="radio-group">
                <label><input type="radio" name="tipo" value="1" <?= $tipo == 1 ? 'checked' : '' ?> > Administrador</label>
                <label><input type="radio" name="tipo" value="2" <?= $tipo == 2 ? 'checked' : '' ?> > Pessoa física</label>
                <label><input type="radio" name="tipo" value="3" <?= $tipo == 3 ? 'checked' : '' ?> > Pessoa jurídica</label>
            </div>
            <input type="password" name="senha" placeholder="Senha" >
            <input type="password"  name="senha2" placeholder="Confirme a Senha" >
            <!-- criando um campo oculto de formulário para controlar se a operação é de edição -->
            <input type="hidden" name="id_usuario" value="<?=  $id_usuario ?>">
            <p id="mensagemErro" class="error"></p>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>
