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
    <main>
        <?php
        include("conexao.php");

        $nome = filter_input(INPUT_POST, 'nome');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $nascimento = filter_input(INPUT_POST, 'nascimento');

        try {
            $stmt = $conn->prepare('INSERT INTO pessoa (nome, endereco, telefone, email, nascimento) VALUES (:nome, :endereco, :telefone, :email, :nascimento)');

            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':endereco', $endereco);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':nascimento', $nascimento);

            $stmt->execute();
            echo "Cadastrado com sucesso";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?> 
        <button><a href="index.php">voltar</a></button>
    </main>
  </body>
</html>

        
        
  
         
    
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>