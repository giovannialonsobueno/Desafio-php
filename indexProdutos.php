<?php
include('functions.php');

$produtos = carregaProduto();


foreach ($produtos as $produto) {
  $_GET['id'] = $produto['id'];
  echo $produto['produto'];
  echo $produto['preco'];
  echo $produto['descricao'];
  }

?>

<a href="showProduto.php?id=<?php echo $_GET['id'];?>">Ver mais</a>
