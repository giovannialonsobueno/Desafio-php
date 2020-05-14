<?php

include('functions.php');
session_start();
if (!$_SESSION) {
header('location: login.php');
}

  function chamar(){
  $produto = pegarProduto($_POST['nomeID']);

  if($produto) {
    echo $produto['produto'];
    echo $produto['preco'];
    echo $produto['descricao'];
    echo $produto['imagem'];
  } else {
    echo 'Produto não existe';
  }
}

 ?>

<form class="" action="showProduto.php" method="post">
  <label for="">Digite o ID</label>
  <input type="text" name="nomeID" placeholder="id Produto">
  <button type="submit" name="buscar">Buscar Produto</button>
</form>

<?php

if ($_POST) {
  chamar();
}
 ?>


<form action="delete.php" method="post">
  <input type="hidden" name="delete" value="<?= $produto['id'] ?>">
  <button>Deletar</button>
</form>
