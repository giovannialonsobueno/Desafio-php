<?php

include('functions.php');


  function chamar(){
  $produto = pegarProduto($_POST['nomeId']);

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
  <input type="text" name="nomeId" placeholder="id Produto">
  <button type="submit" name="buscar">Buscar Produto</button>
</form>

<?php

if ($_POST) {
  chamar();
  deletar();
}
 ?>
