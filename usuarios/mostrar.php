<?php
    
    require_once("../protege.php");

    /*
        Função que recebe um código númerico que corresponde ao tipo do vinculo do usuário (conforme definido na aula de 15/04) e retorna uma string
    */
    function tipoParaTexto($tipo){
        switch($tipo){
            case 1: return "Administrador";
            case 2: return "Pessoa física";
            case 3: return "Pessoa jurídica";
            default: return "Desconhecido";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            margin: 0 auto;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media screen and (max-width: 600px) {
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
                .btn {
            display: inline-block;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none; /* remove sublinhado */
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-edit {
            background-color: #ffc107; /* amarelo */
            color: #212529;
        }

        .btn-edit:hover {
            background-color: #e0a800;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545; /* vermelho */
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Mensagem de sucesso -->
        <?php
            // a linha abaixo pode ficar comentada, pois a sessão já é iniciada no arquivo protege.php
            //session_start();    // inicia a sessão
            // testa se existe a variavel de sessão para mostrar a mensagem de sucesso
            if (isset($_SESSION["msg_sucesso"])) :
        ?>
            <div class="alert">
                <?php echo ($_SESSION["msg_sucesso"]); ?>
            </div>
        <?php 
            unset($_SESSION["msg_sucesso"]);    // exclui a variavel de sessão
            endif; // fechamento do if na sintaxe alternativa
        ?>

        <h2>Usuários Cadastrados</h2>

        <?php
            // estabelece a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1", "root", "", "dw2");

            // testa se a conexão ocorreu com sucesso
            if (!$conn){
                die("Houve um erro ao conectar com o banco de dados");
            }

            $sql = "SELECT id, nome, DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento, email, tipo FROM usuarios ORDER BY nome ASC";

            // ao exececutar uma consulta do tipo select, a função mysqli_query retorna um resultset 
            $resultado = mysqli_query($conn, $sql);

            // mysqli_num_rows conta quantas linhas o resultset tem
            // se há mais de 0 linhas, é porque tem algo para ser exibido
            if (mysqli_num_rows($resultado) > 0) {
                
                // gera a parte inicial da tabela, que exibirá os dados
                echo ('<div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nascimento</th>
                                <th>E-mail</th>
                                <th>Tipo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>');

            // exibibindo os registro que estão vindos do banco de dados
            // Recupera a próxima linha do resultado da consulta SQL como um array associativo. A função mysqli_fetch_assoc é usada para obter uma linha do resultado de uma consulta SQL 
            
            while ($row = mysqli_fetch_assoc($resultado) ){
                echo ("<tr>");  // abre uma nova linha da tabela
                // adiciona os dados (td) da tabela
                // A função htmlspecialchars() em PHP é usada para converter caracteres especiais em entidades HTML
                echo ("<td>" . htmlspecialchars($row["nome"]) . "</td>");
                echo ("<td>" . htmlspecialchars($row["nascimento"]) . "</td>");
                echo ("<td>" . htmlspecialchars($row["email"]) . "</td>");
                // chama a função tipoParaTexto
                echo ("<td>" . tipoParaTexto($row["tipo"]) . "</td>");
                echo ("<td><a class='btn btn-edit' href='editar.php?id=" . urlencode($row['id'])) . "'>Editar</a>";
                echo ("<a class='btn btn-delete' href='excluir.php?id=" . urlencode($row['id'])) . "'>Excluir</a></td>";
                
                echo ("</tr>"); // fecha uma nova linha da tabela
            }
            
            // ao terminar o while, é necessário fechar as tags da tabela, que foram abertas antes do laço de repetição
            echo ("</tbody></table>"); 
            } else {
                // se a consulta retornou 0 linhas
                echo ("<h1>Não há nada para ser exibido</h1>");
            }
        ?>
        </div>
    </div>
    <script>
        // javascript para ocultar a div que contém as mensagens de erro
        setTimeout(function() {

            const alertas = document.querySelectorAll('.alert');

            alertas.forEach(alerta => {
                alerta.style.opacity = '0';
                setTimeout(() => alerta.style.display = 'none', 500);
            })
        }, 5000);
    </script>
</body>
</html>
