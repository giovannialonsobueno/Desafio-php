<?php

include('functions.php');
session_start();
if (!$_SESSION) {
header('location: login.php');
}

if($_POST){

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $confi = $_POST['confi'];

    $emailOk = false;
    $senhaOk = false;
    $nomeOk = false;
    if(empty($_POST['email']) === false){
    $emailOk = true;
    }
    if(empty($_POST['nome']) === false){
    $nomeOk = true;
    }
    if(strlen($senha) > 5 || $senha == $confi){
    $senhaOk = true;
    }
    if($nomeOk and $senhaOk and $emailOk){
        $cripto= password_hash($senha, PASSWORD_DEFAULT);
        addUsuario($nome,$email,$cripto);
        header('location: login.php');
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
    <form class="" action="createUsuario.php" method="post">

    <label for="nome">Nome</label> <br>
    <input type="text" name="nome" value="" placeholder="Digite seu Nome"> <br>


    <label for="email">E-mail</label> <br>
    <input type="email" name="email" value="" placeholder="Digite seu E-mail"> <br>


    <label for="senha">Senha</label> <br>
    <input type="password" name="senha" value="" placeholder="Senha1234"> <br>

    <label for="confi">Confirme sua Senha</label> <br>
    <input type="password" name="confi" value="" placeholder="Confirme a sua senha"> <br>

    <button type="submit" name="cadastrar">Cadastrar-se</button>
    </form>
  </body>
</html>
