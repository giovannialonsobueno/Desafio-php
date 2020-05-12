<?php

include('functions.php');

$extensaoFoto = ['image/jpeg', 'image/png', 'image/jpg'];

$precoOk = true;
$produtoOk = true;
$imagemOk = true;
$enviarOk = true;


      if($_POST) {

        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $imagem = $_FILES['imagem'];

        //Validando o 'nProduto'
        if(strlen($_POST['produto']) == 0) {
            $nProdutoOk = false;
        }

        //Validando o 'preco'
        if(is_numeric($_POST['preco']) == false) {
          $precoOk = false;
        }

        if ($_FILES) {

        //validando a 'imagem'
        if($_FILES['imagem']['error'] == 0) {
          $extensaoFoto = ['image/jpeg', 'image/png', 'image/jpg'];
          if(array_search($_FILES['imagem']['type'], $extensaoFoto) === false) {
            exit;
          }
        } else {
          $imagemOk = false;
        }
    }
    if ($produtoOk and $precoOk and $imagemOk){
      move_uploaded_file($imagem['tmp_name'], 'img/'.$imagem['name']);
      $imagem = 'img/'.$imagem['name'];
        addProduto($produto, $preco, $imagem,$descricao);
        header('location: indexProdutos.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="createProduto.php" method="post" enctype="multipart/form-data">
    <label for="nProduto">Nome do Produto</label> <br>
    <input type="text" name="produto" placeholder="Nome do produto"> <br>
    <?= ($produtoOk? '' : '<span class="erro"> Você precisa preencher o campo com o nome do produto </span>')."<br>"."<br>";?>


    <label for="descProduto">Descrição do Produto (Opcional)</label> <br>
    <input type="text" name="descricao" placeholder="Descrição do Produto"> <br> <br>


    <label for="preco">Preço</label> <br>
    <input type="text" name="preco" placeholder="Preço"> <br>
    <?= ($precoOk? '' : '<span class="erro"> Preencha o campo com o preço, apenas numero </span>')."<br>"."<br>";?>

    <label for="foto">Foto</label> <br>
    <input type="file" name="imagem"> <br>
    <?= ($imagemOk? '' : '<span class="erro"> Você precisa adicionar uma imagem </span>')."<br>"."<br>";?>

    <button type="submit">Enviar</button>
    </form>

  </body>
</html>
