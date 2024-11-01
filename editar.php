<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

   <?php
      include("conexao.php");
      $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

      
      $sql = "SELECT * FROM pessoa WHERE cod_pessoa = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $linha = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$linha) {
          echo "Registro não encontrado.";
          exit;
      }
   ?>
    <main>
        <h1>Cadastro</h1>
        <form action="editar.script.php" method="post">
        <div class="mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required value="<?php echo htmlspecialchars($linha['nome']); ?>">
         </div>
         <div class="mb-3">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" required value="<?php echo htmlspecialchars($linha['endereco']); ?>">
         </div>
         <div class="mb-3">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" required value="<?php echo htmlspecialchars($linha['telefone']); ?>">
         </div>
         <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($linha['email']); ?>">
         </div>
         <div class="mb-3">
            <label for="nascimento">Data de Nascimento</label>
            <input type="date" name="nascimento" id="nascimento" required value="<?php echo htmlspecialchars($linha['nascimento']); ?>">
         </div>
         <div>
            <input type="submit" value="Salvar alterações">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['cod_pessoa']); ?>">
         </div>
    </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
