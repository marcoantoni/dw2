<!DOCTYPE html>
<html lang="pt-br">
<title>Cadastro de usuário</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="proc_cad.php">
            <input type="text" name="nome" placeholder="Nome Completo" required>
            <input type="date" name="nasc" placeholder="Nascimento" >
            <input type="email" name="email" placeholder="E-mail" >
            <div class="radio-group">
                <label><input type="radio" name="tipo" value="1"> Administrador</label>
                <label><input type="radio" name="tipo" value="2"> Pessoa física</label>
                <label><input type="radio" name="tipo" value="3"> Pessoa jurídica</label>
            </div>
            <!-- criando um select dinamico para escolha da escolaridade -->
            <select name="escolaridade">
                <?php
                    require("conecta.php");

                    $sql = "SELECT * FROM escolaridades";

                    $resultado = mysqli_query($conn, $sql);

                    // usando a sintaxe alternativa do php para não ficar concatenando strings...
                    while ($row = mysqli_fetch_assoc($resultado) ):

                ?>

                    <option value="<?= $row['id']?>"><?= $row["escolaridade"] ?></option>

                <?php
                    endwhile;
                ?>
            
            </select>

            <input type="password" name="senha" placeholder="Senha" >
            <input type="password"  name="senha2" placeholder="Confirme a Senha" >
            <p id="mensagemErro" class="error"></p>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>
