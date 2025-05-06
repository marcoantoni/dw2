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
            $id_usuario = $_GET["id"]; // pegando o parametro de usuário que vem da url

            $conn = mysqli_connect("localhost", "root", "", "dw2");

            if ($conn) {

                // string da consulta responsável por recuperar o registro a ser editado
               $sql = "SELECT * FROM usuarios WHERE id = $id_usuario";

               $resultado = mysqli_query($conn, $sql);

               if (mysqli_num_rows( $resultado) == 1) {
                    // encontrou o registro 
                    $usuario = mysqli_fetch_array($resultado);

                    $nome = $usuario["nome"];
                    $nasc = $usuario["nascimento"];
                    $email = $usuario["email"];
                    $tipo = $usuario["tipo"];
               } else {
                    // não encontrou nenhum registro
                    header("location: mostrar.php");
               }
            }
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
