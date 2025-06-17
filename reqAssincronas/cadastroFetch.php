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
    <h2>Formulário dinâmico - Usando a API Fetch</h2>
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

    // Desativa o select de cidade inicialmente
    cidadeSelect.disabled = true;

    estadoSelect.addEventListener('change', function () {
      const uf = this.value;

      // Se UF não selecionada, limpa e desativa o campo cidade
      if (!uf) {
        cidadeSelect.innerHTML = '';
        cidadeSelect.disabled = true;
        return;
      }

      // Faz a requisição via fetch
      fetch('buscar_cidade.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'uf=' + encodeURIComponent(uf)
      })
        .then(response => {
          if (!response.ok) throw new Error('Erro na resposta do servidor');
          return response.json();
        })
        .then(cidades => {
          // Limpa o select de cidades
          cidadeSelect.innerHTML = '';

          // Adiciona opção padrão
          const defaultOption = document.createElement('option');
          defaultOption.value = '';
          defaultOption.textContent = 'Selecione a cidade';
          cidadeSelect.appendChild(defaultOption);

          // Adiciona as cidades
          cidades.forEach(function (cidade) {
            const option = document.createElement('option');
            option.value = cidade.id;
            option.textContent = cidade.municipio;
            cidadeSelect.appendChild(option);
          });

          cidadeSelect.disabled = false;
        })
        .catch(error => {
          alert('Houve um erro ao carregar as cidades.');
          cidadeSelect.innerHTML = '';
          cidadeSelect.disabled = true;
          console.error(error);
        });
    });
  });
</script>


</body>
</html>
