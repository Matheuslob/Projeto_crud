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

        
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            try {
                
                $stmt = $conn->prepare("DELETE FROM pessoa WHERE cod_pessoa = :id");
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Excluído com sucesso</div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro, verifique os dados e tente novamente</div>";
                }
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>ID não fornecido</div>";
        }
        ?>
        
        <button class="btn btn-primary mt-3">
            <a href="pesquisa.php" style="text-decoration: none; color: white;">Voltar</a>
        </button>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
