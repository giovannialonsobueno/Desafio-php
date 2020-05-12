<?php
include('functions.php');

session_start();
if (!$_SESSION) {
header('location: login.php');
}

$produtos = carregaProduto();


foreach ($produtos as $produto) {
  $_GET['id'] = $produto['id'];
  echo $produto['produto'];
  echo $produto['preco'];
  echo $produto['descricao'];
  }

?>

<a href="showProduto.php">Ver mais</a>
