<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <form class="form-container">
   <h2>Formulário dinâmico - AJAX com javascript puro</h2>
    <div class="form-group">
      <label for="uf">Estado (UF)</label>
      <!-- -->
      <select name="estado" id="estado">
          <?php
              require("conecta.php");

              $sql = "SELECT * FROM estado ORDER BY nome";

              $resultado = mysqli_query($conn, $sql);

              // usando a sintaxe alternativa do php para não ficar concatenando strings...
              while ($row = mysqli_fetch_assoc($resultado) ):

          ?>

              <option value="<?= $row['Uf']?>"><?= $row["Nome"] ?></option>

          <?php
              endwhile;
          ?>
      
      </select>
    </div>

    <div class="form-group">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="cidade" required>
        <option value="">Selecione a cidade</option>
        <!-- opções populadas dinamicamente (a lógica adicionada através do AJAX via jQuery -->
      </select>
    </div>

    <button type="submit" class="submit-btn">Enviar</button>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const estadoSelect = document.getElementById('estado');
      const cidadeSelect = document.getElementById('cidade');

      cidadeSelect.disabled = true;

      estadoSelect.addEventListener('change', function () {
        const uf = estadoSelect.value;

        if (!uf) {
          cidadeSelect.innerHTML = '';
          cidadeSelect.disabled = true;
          return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'buscar_cidade.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              try {
                const cidades = JSON.parse(xhr.responseText);

                cidadeSelect.innerHTML = '';

                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Selecione a cidade';
                cidadeSelect.appendChild(defaultOption);

                cidades.forEach(function (cidade) {
                  const option = document.createElement('option');
                  option.value = cidade.id;
                  option.textContent = cidade.municipio;
                  cidadeSelect.appendChild(option);
                });

                cidadeSelect.disabled = false;
              } catch (e) {
                alert('Erro ao processar resposta do servidor.');
                console.error(e);
              }
            } else {
              alert('Erro na requisição. Código: ' + xhr.status);
              cidadeSelect.innerHTML = '';
              cidadeSelect.disabled = true;
            }
          }
        };

        xhr.send('uf=' + encodeURIComponent(uf));
      });
    });
  </script>
</body>
</html>
