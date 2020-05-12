<?php

function carregaProduto(){
  $data = file_get_contents("produtos.json");
      $pdt = json_decode($data, true);
      return $pdt;
}

function addProduto($produto, $preco, $imagem,$descricao=''){
    $produtos = carregaProduto();
        if(empty($produtos)){
          $id = 1;
        } else {
        $id = sizeof($produtos) + 1;
        }
        $product = ['id'=>$id,'produto'=>$produto,'preco'=>$preco,'imagem'=>$imagem,'descricao'=>$descricao];
        $produtos[]= $product;
        $data = json_encode($produtos);
        if($data){file_put_contents('produtos.json', $data);}
}

function carregaUsuarios(){

        $strJson = file_get_contents("usuarios.json");

        $usuarios = json_decode($strJson, true);

        return $usuarios;

    }

    function addUsuario($nome, $email, $senha){

        $usuarios = carregaUsuarios();

        $user = ['$nome'=>$nome, '$email'=>$email, '$senha'=>$senha];

        $usuarios[]= $user;

        $stringjson = json_encode($usuarios);

        if($stringjson){
            file_put_contents('usuarios.json', $stringjson);
        }
    }

function pegarProduto($id){
  $produtos = carregaProduto();
  foreach ($produtos as $produto) {
    if($produto['id'] == $id) {
      return $produto;
    }
  }
  return false;
}

 ?>
