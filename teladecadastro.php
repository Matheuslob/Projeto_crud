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
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="post">
        <div class="mb-3">
            <label for="nome" >Nome</label>
            <input type="text" name="nome" id="nome" required>
         </div>
         <div class="mb-3">
            <label for="endereco" >Endereço</label>
            <input type="text" name="endereco" id="endereco required">
         </div>
         <div class="mb-3">
            <label for="telefone" >Telefone</label>
            <input type="text" name="telefone" id="telefone" required>
         </div>
         <div class="mb-3">
            <label for="email" >email</label>
            <input type="email" name="email" id="email" required>
         </div>
         <div class="mb-3">
            <label for="nascimento" >data de nascimento</label>
            <input type="date" name="nascimento" id="nascimento" required>
         </div>
         <div class="mb-3">
            <input type="submit" value="Cadastrar">
            <button> <a href="index.php" style="text-decoration: none; color: black;">Voltar</a></button>
            
            
         </div>
  
         
    </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>