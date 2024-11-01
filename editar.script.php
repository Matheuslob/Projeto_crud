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
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $nascimento = $_POST['nascimento'];

        
    try{
    $stmt = $conn->prepare("UPDATE pessoa SET nome = :nome, endereco = :endereco, telefone = :telefone, email= :email, nascimento = :nascimento WHERE cod_pessoa = :id");
        
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindValue(':telefone', $telefone, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':nascimento', $nascimento, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Alterado com sucesso";
    } else {
        echo "Erro, verifique os dados e tente novamente";
    }
    } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    }
?>
    
    
            <button> <a href="pesquisa.php" style="text-decoration: none; color: black;">Voltar</a></button>
        </section>
  
         
    </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>