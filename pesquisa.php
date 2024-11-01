<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body >
    
    <?php
        if(isset($_POST['busca'])){
            $pesquisa = $_POST['busca'];
            
        }   else{
            $pesquisa = "";
        }
        include("conexao.php");
        $sql = "SELECT * FROM pessoa WHERE nome LIKE :nome";
        $stmt =  $conn -> prepare($sql);
        $stmt -> bindValue(':nome', "%$pesquisa%", PDO::PARAM_STR);
        $stmt->execute();
        $dados =$stmt -> fetchAll(PDO::FETCH_ASSOC);

        ?>

      
    
        <h1>Pesquisar</h1>
        <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" action="pesquisa.php" method="POST">
      <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
      <button class="btn btn-outline-success" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

<table class="table table-bordered" >
  <thead>
    <tr>
      
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Funções</th>
    </tr>
  </thead>
  <tbody>
  <?php


    foreach($dados as $linha) {
    $cod_pessoa = $linha['cod_pessoa'];
    $nome = $linha['nome'];
    $endereco = $linha['endereco'];
    $telefone = $linha['telefone'];
    $email = $linha['email'];
    $nascimento = mostra_data($linha['nascimento']);

       echo"<tr>
       <td>$nome</td>
       <td>$endereco</td>
       <td>$telefone</td>
       <td>$email</td>
       <td>$nascimento</td>
       <td>
       <a href='editar.php?id=$cod_pessoa' class = 'btn btn-success btn-sm'>Editar</a>
       <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'onclick=".'"' . "pegar_dados($cod_pessoa, '$nome')".'"'.">Excluir</a> 
       </td>
       
       </tr>";
}

?>
    
  </tbody>
</table>
    <button> <a href="index.php" style="text-decoration: none; color: black;">Voltar</a></button>

    <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="post">
        <p>Deseja realmente excluir os dados selecionados?</p>
        <p id="nome_pessoa"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa1" value="">
        <input type="hidden" name="id" id="cod_pessoa" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
      </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function pegar_dados(id,nome){
  document.getElementById("nome_pessoa").innerHTML= nome;
  document.getElementById("cod_pessoa").value= id;
  document.getElementById("nome_pessoa1").value= nome;
  }
</script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>